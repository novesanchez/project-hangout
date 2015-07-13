<?php
header("Cache-Control: no-cache, must-revalidate");
/**
 * login actions.
 *
 * @package    sf_sandbox
 * @subpackage login
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class loginActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
        $width = isset($_GET['width']) ? $_GET['width'] : '120';
	$height = isset($_GET['height']) ? $_GET['height'] : '40';
	$characters = isset($_GET['characters']) && $_GET['characters'] > 1 ? $_GET['characters'] : '6';
	new CaptchaSecurityImages($width,$height,$characters);
        
	$this->isConfirm = true;
	$this->isSuccess = true;
	
   	if(isset($_GET['err']))
   	{
	   	if(md5('not confirmed') == $_GET['err'])
	   	{
	 		$this->isConfirm = false;  	
 		}
	 	else if(md5('login failed') == $_GET['err'])
	 	{
	 		$this->isSuccess = false;
 		}
   	}
  }
  
  public function preExecute()
  { 
  	$this->conn = Doctrine_Manager::getInstance()->connection();	
        if(isset($_GET['alert001'])){
            CustomHangout::alert001();die();
        }

        if(isset($_SESSION['username'])){
            
            if(isset($_GET['viewposting']) && !empty($_GET['viewposting'])){
                $this->redirect("/index.php/postings/post?id={$_GET['viewposting']}");
            } else {
                $this->redirect("http://hangout.com/home/index");
            }
            
        }         	  
  }
  
  public function executeAuthenticateLogin(sfWebRequest $request)
  {
      $username = $request->getParameter('username');
      $password = $request->getParameter('password');
      
      $query = MemberTable::getInstance()
                    ->createQuery()
                    ->select('m.username, m.country')->from('Member m')
                    ->where('m.username = ?',$username)
                    ->andWhere('m.password = ?', $password);
                       
      $rs = $query->fetchOne();
      $rsCount = $query->execute()->count();
      
      if($rsCount > 0)
      {
          $_SESSION['username'] = $rs->getUsername();
          $_SESSION['userId'] = $rs->getId();
          $_SESSION['country'] = $rs->getCountry();
          $_SESSION['state'] = $rs->getState();
      }
      die(json_encode(array('success' => ($rsCount == 0)? false:true)));
  }
  
  public function executeLogin(sfWebRequest $request)
  {
	 $username = addslashes($_POST['username']);
	 $password = md5(addslashes($_POST['password']));
	 $viewposting = addslashes($_POST['viewposting']);
         
         $loginViaFb =  trim($_POST['fb']);
         $fb_email   =  trim($_POST['fb_email_']);
//         print_r($_POST);
	 try
	 {
             $q = ($loginViaFb == 'true')? "":"and password = '$password'";
             $username = ($loginViaFb == 'true')? '':$username;
             $email = ($loginViaFb == 'true')? $fb_email:$email;
             
		 $sql = "select * from member where 
                        ( email = '$email' OR username = '$username' ) $q;";
//		 die('sql:' . $sql);
		 $st = $this->conn->execute($sql);
		 $result = $st->fetchAll(); 	 
	 	
 	 }
 	 catch(Exception $e)
 	 {
	 	die($e->getMessage());
 	 }
	 
 	 
	 if(count($result) > 0)
	 {
		 if($result[0]['status'] == 1)
		 {
			$confirmationCode = $result[0]['confirmation_code'];
			if($loginViaFb == 'true')
                        {
                            die('/index.php/login/confirmation?cf='.$confirmationCode);
                        }   
                        
                        $this->redirect('/index.php/login/confirmation?cf='.$confirmationCode);
		 }
		 else
		 {
			$_SESSION['username'] = $result[0]['username'];
            		$_SESSION['userId'] = $result[0]['id'];
                        $viewposting = empty($viewposting)? '':"?viewposting=$viewposting";
                        if($loginViaFb == 'true')
                        {
                            die("/index.php/home/index".$viewposting);
                        }   
                        
                        $this->redirect("/index.php/home/index".$viewposting);
		 }
	 }	
	 else
	 {
		$tmpCode = md5('login failed');	
                if($loginViaFb == 'true')
                {
                    die('/index.php/login/index?err='.$tmpCode);
                } 
		$this->redirect('/index.php/login/index?err='.$tmpCode);
	 } 
	 
  }
  
  public function executeConfirmEmail(sfWebRequest $request)
  {
	 $confirmation_code = isset($_GET['cf'])? $_GET['cf']:"";
	 $email = addslashes($_POST['cf_email']);
	 $password = md5(addslashes($_POST['cf_password'])); 
	  
	 $sql = "select * from member where 
	 			confirmation_code = '$confirmation_code' and 
	 			status = 1 and 
	 			email = '$email' and 
	 			password = '$password'";
	 $st = $this->conn->execute($sql);
	 $result = $st->fetchAll(); 

	 if(count($result) > 0)
	 {
		//update membership status to active
		$sql = "update member set status=2,confirmed_date='".date("Y-m-d H:i:s")."' where confirmation_code = '$confirmation_code'";
		$st = $this->conn->execute($sql); 
		 
		$this->redirect("/login/confirmation?cf=$confirmation_code");
	 }		 
	 else
	 {
		die('Email and password does not matched!');	 
	 }
  }
  
  public function executeConfirmation(sfWebRequest $request)
  {
	 $this->confirmation_code = isset($_GET['cf'])? $_GET['cf']:"";
	 $this->isConfirm = false;
	 
	 if(empty($this->confirmation_code))
	 {
		$this->redirect('/login/index/');
	 }
	 else
	 {
		try{
			$sql = "select * from member where confirmation_code = '".$this->confirmation_code."' and status = 2";
			$st = $this->conn->execute($sql);
	    	$result = $st->fetchAll(); 
		}catch(Exception $e){
			die($e->getMessage());			
		}
		
		if(count($result) > 0)
		{
			$this->isConfirm = true;
			$result[0]['num_confirm'] += 1;
			$numConfirm = $result[0]['num_confirm'];
			$sql = "update member set num_confirm = $numConfirm where confirmation_code = '".$this->confirmation_code."'";
			$st = $this->conn->execute($sql);
		}
		else
		{
			$num_confirm = $result[0]['num_confirm']+1;
			$sql = "update member set num_confirm = $num_confirm where confirmation_code = '".$this->confirmation_code."'";
			$st = $this->conn->execute($sql);
			
			//$this->redirect('/login/index/');
		}
	 }
  }
  
  public function executeGetSecurityCode(sfWebRequest $request)
  {
	$width = isset($_GET['width']) ? $_GET['width'] : '120';
	$height = isset($_GET['height']) ? $_GET['height'] : '40';
	$characters = isset($_GET['characters']) && $_GET['characters'] > 1 ? $_GET['characters'] : '6';
	new CaptchaSecurityImages($width,$height,$characters);
        die();        
  }
  
  public function executeGetCaptchaCode(sfWebRequest $request)
  {
      die($_SESSION['security_code']);
  }
  
  public function executeSignUp(sfWebRequest $request)
  {	
          if(!isset($_GET['err']))
	  {
		$username         = addslashes(@$_REQUEST['su_username']);
	  	$password         = @$_REQUEST['su_password'];
	  	$email            = addslashes(@$_REQUEST['su_email']);
                
	  	$birthDate        = date('m-d-Y', strtotime("{$_REQUEST['select-month']}-{$_REQUEST['select-day']}-{$_REQUEST['select-year']}"));
	   	$birthdate  	  = date('Y-m-d', strtotime($birthDate));
                try
                {
                        $password           = md5(@$_REQUEST['su_password']);
                        $confirmation_code  = md5(uniqid(rand(), true));
                        $uniqid = uniqid('hngt_');
                        
                        $birthDate = explode("-", $birthDate);
                        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));
                        
                        $gender = $_REQUEST['gender'];
                        
                        //check if uniqid exists.
                        $sql = "insert into member(username,password,email,birthday,age,gender,confirmation_code,created_at) values('$username','$password','$email','$birthdate',$age,'$gender','$confirmation_code',now())";                        
                        $st =  $this->conn->execute($sql);
			
                        set_time_limit(0);
                        
                        $Body = " <p>
                                    <h2> Thank you for joining HangOut Today! </h2> <br/>
                                    Please click the link to confirm your registration <a href='www.hangout.com'>http://hangout.com?cf=$confirmation_code</a>
                                    <br/><br/>
                                    Connect now to HangOutToday and Create your Profile by following this link <a href='#'>www.HangOutToday.com</a>
                                  </p>";
                        $response = CustomHangout::email($email, $Body, 'HangOutToday', 'Welcome to HangOut Today!');
                        
                        unset($_SESSION['su_username']);
                        unset($_SESSION['su_password']);
                        unset($_SESSION['su_retype_password']);
                        unset($_SESSION['su_email']);
                        unset($_SESSION['su_mydate']);

                        unset($_REQUEST['su_username']);
                        unset($_REQUEST['su_password']);
                        unset($_REQUEST['su_retype_password']);
                        unset($_REQUEST['su_email']);
                        unset($_REQUEST['su_mydate']);

                }
                catch(Exception $e)
                {
                    die("Error:".$e->getMessage());	  
                }
    		  
  	  }
           $this->redirect('/index.php/home/index');
  }
   
  public function executeForgotUsername(sfWebRequest $request)
  {
      $email_address = $_POST['email_'];
      $email_address = trim($email_address);
      if(!$this->checkEmailAddress($email_address)){
          die('Please enter a valid email address!');
      }
      
      $member = Member::checkMemberInfo('email', $email_address);
      if($member->count() > 0){
          $username = $member[0]->getUsername();
          
          $Body = " <div style='font-family:tahoma;font-size:12px;'>
                <p>
                     You have requested for the username of the given email address $email_address. If you are not the account holder, please ignore this message.
                     <br/>
                     <br/>
                     Username: $username                                       
                </p>
                </div>
                  ";
          CustomHangout::email($email_address, $Body, 'HangOutToday', 'Request: Username Recovery');
          die('An email notification has been sent to your email address.');
      }else{
          die('Email address entered does not exist!');
      }
  }
  
  public function executeForgotPassword(sfWebRequest $request)
  {
      $email_address = $_POST['email_'];
      $email_address = trim($email_address);
      if(!$this->checkEmailAddress($email_address)){
          die('Please enter a valid email address!');
      }
      
      $member = Member::checkMemberInfo('email', $email_address);
      if($member->count() > 0){
          Member::resetPassword($email_address);
          $Body = " <div style='font-family:tahoma;font-size:12px;'>
                <p>
                     You have requested to reset your password. Below is your new password, you can login to your account and change the password.<br/>
                     If you are not the account holder, please ignore this message.
                     <br/>
                     <br/>
                     New Password : 123456                                          
                </p>
                </div>
                  ";
          CustomHangout::email($email_address, $Body, 'HangOutToday', 'Request: Reset Password');
          die('An email notification has been sent to your email address.');
      }else{
          die('Email address entered does not exist!');
      }
  }  
  
  public function checkEmailAddress($email_address)
  {      
      if(!preg_match('|^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$|i', $email_address)) {
         return false;
      }
      return true;
  }    
  
  public function executeValidateUsername(sfWebRequest $request)
  {
      $username = trim($_POST['username']);
      $member = Member::checkMemberInfo('username', $username);
      if($member->count() > 0){
          die('Username already exist. Please try another username!');
      } else {
          die('true');
      }
  }
  
  public function executeValidateEmail(sfWebRequest $request)
  {
      $email = trim($_POST['email']);
      $member = Member::checkMemberInfo('email', $email);
      if($member->count() > 0){
          die('Email address already exist. Please try to use another valid email address!');
      } else {
          die('true');
      }
  }  
  
  public function executeCheckHangoutFacebookAccount(sfWebRequest $request)
  {
      $fb_email = trim($_POST['fb_email_']);
      $member = Member::checkMemberInfo('email', $fb_email);
      if($member->count() > 0){
          die('true');
      } else {
          die('false');
      }
  }
}
