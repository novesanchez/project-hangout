<?php
header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Pragma: no-cache');
/**
 * home actions.
 *
 * @package    sf_sandbox
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
    
  public function preExecute()
  {
     
        if(!isset($_SESSION['username'])){
             $this->redirect("http://hangout.com");
         }
	 $this->conn = Doctrine_Manager::getInstance()->connection();		  
  }  
  
  public function executeIndex(sfWebRequest $request)
  {
        
        if(isset($_GET['viewposting']) && !empty($_GET['viewposting'])){
            $this->redirect("/index.php/postings/post?id={$_GET['viewposting']}");
        } 
        
	 $userId = $_SESSION['userId'];
	 try{
		 $sql = "SELECT member.*, photo.path FROM `member` join photo on member.profile_picture_id = photo.id where member.id=$userId";
		 $st = $this->conn->execute($sql);
		 $result = $st->fetchAll(); 
		
                 if(empty($result[0]['path']))
                 {
                     $result[0]['path'] = $result[0]['gender'] == 'f'? "images/female.jpg" : "images/male.png";
                 }
                 
		 $this->myAccount = array();
		 $this->myAccount['path'] = $result[0]['path'];
		 $this->myAccount['nickName'] = $result[0]['nick_name'];
		 $this->myAccount['username'] = $result[0]['username'];
		 $this->myAccount['email'] = $result[0]['email'];
		 $this->myAccount['country'] = $result[0]['country'];
		 $this->myAccount['state'] = $result[0]['state'];
		 $this->myAccount['zip_code'] = $result[0]['zip_code'];
                 $this->myAccount['profile_id'] = $result[0]['profile_id'];
		 $this->myAccount['bday'] = (!empty($result[0]['birthday']))? date("m-d-y",strtotime($result[0]['birthday'])):"";
	 }catch(Exception $e){
		die($e->getMessage());	 
	 }
         
         $this->setLayout('new_layout');
  }
  
  public function executeGetPostings(sfWebRequest $request)
  {
      try{
          
        $start  = $request->getParameter('start');
        $userId = $_SESSION['userId'];  
        $Postings = new Postings();
	$start = empty($start)? 0:$start;
        list($result, $total) = $Postings->getPostings($userId, $start);
//        die('total:' . $total);
        if($result->count() == 5)
            $current_total = $start;
        else
            $current_total = $start + $result->count();
        
        $hideLoadMorePostDiv = false;
        if($total == $current_total){
            $hideLoadMorePostDiv = true;
        }
        
        $postingData = array();
        foreach($result as $val){
            $postingData[] = array(
                'gender' => $val->getGenderType(),
                'date_to_hangout' => $val->getDateToHangout(),
                'num_ppl' => $val->getNumPpl(),
                'posting_enddt' => $val->getPostingEnddt(),
                'starttime' => $val->getStarttime(),
                'endtime' => $val->getEndtime(),
                'posting_title' => $val->getPostingTitle(),
                'posting_desc' => $val->getPostingDesc(),
                'date_created' => $val->getDateCreated(),
                'no_of_respondents' => $val->getRequester()->count()
            );
        }
        
       }catch(Exception $e){
          die($e->getMessage());
      }
            
//      $postingHtml = "";
//      foreach($postingData as $val){
//          $postingHtml .= "<div class='myPostings-body'>";
//
//            $postingHtml .= "<div style='float:left;width: 98%;font-weight:bold;'>";
//            $postingHtml .= "<div style='margin-left:10px;width: 45%; background-color:none; text-wrap:none;float:left;'>".$val['posting_title']."</div>";
//            $postingHtml .= "<div style='margin-left:10px;width: 50%;float:left;font-weight:normal;text-align: left;'>".date("l, F j, Y",strtotime($val['date_to_hangout']))." at ".date("h:i A",strtotime($val['starttime']))." to ".date("h:i A",strtotime($val['endtime']))."</div>";
//            $postingHtml .= "</div>";
//
//            $postingHtml .= "<div style='float:left; margin-left:9px; margin-top:5px;font-weight:bold;'>";
//            $postingHtml .= "<div>PEOPLE AGREED TO HANGOUT:<span style='color:#FF9801;'> ".$val['no_of_respondents']."</span> </div>";
//            $postingHtml .= "</div>";
//            
//            $remaining = CustomHangout::calculateRemainingDays(strtotime($val['posting_enddt']), 'till posting end time');
//            
//            $postingHtml .= "<div style='float:left;width: 100%;font-weight:bold;margin-top:5px; color:#084692;'>";
//            $postingHtml .= "<div style='margin-left:10px;width: 98%; background-color:none;text-align:center; float:left;'>".strtoupper($remaining)."</div>";
//            $postingHtml .= "</div>";
//            $postingHtml .= "<hr/>";
//          
//          $postingHtml .= "</div>";
//      }
      
      $postingHtml = "<ul class='list-group'>";
      foreach($postingData as $val){
            $remaining = CustomHangout::calculateRemainingDays(strtotime($val['posting_enddt']), 'till posting end time');
            $postingHtml .= '<li class="list-group-item">';
            $postingHtml .= "<div class='row'>";
            $postingHtml .= '<div class="col-xs-6"><span style="color:#008000;">'.$val['posting_title'].'</div>';
            $postingHtml .= '<div class="col-xs-6 hangout-date">'.date("l, F j, Y",strtotime($val['date_to_hangout']))." at ".date("h:i A",strtotime($val['starttime']))." to ".date("h:i A",strtotime($val['endtime'])).'</div>';
            $postingHtml .= "</div>";
            
            $postingHtml .= "<div class='row'>";  
            $postingHtml .= '<div class="col-xs-12"> People Agreed to Hangout: <span class="badge">'.$val['no_of_respondents'].'</span></div>';
            $postingHtml .= "</div>";
            
            $postingHtml .= "<div class='row'>";  
            $postingHtml .= '<div class="col-xs-12 remaining-hrs"><span class="label label-primary">'.strtoupper($remaining).'</span></div>';
            $postingHtml .= "</div>";
            $postingHtml .= "</li>";
      }
      $postingHtml .= "</ul>";
      
      sleep(2);
      $data = array('data'=>$postingHtml, 'start'=>($start + 5), 'hideLoadMorePostDiv' => $hideLoadMorePostDiv);
      die(json_encode($data));
  }
   
  public function executeGetUpcomingPostings(sfWebRequest $request)
  {
      try{
          
        $userId = $_SESSION['userId'];  
        $start  = $request->getParameter('start');
        $start = empty($start)? 0:$start;
        $Postings = new Postings();
        list($result, $total) = $Postings->getUpcomingPostings($userId, $start);
     
        if($result->count() == 5)
            $current_total = $start;
        else
            $current_total = $start + $result->count();
        
        $hideLoadMorePostDiv = false;
        if($total == $current_total){
            $hideLoadMorePostDiv = true;
        }
        
        $postingData = array();
        foreach($result as $val){
            
            $photo      = $val->getMember()->getPhoto();
            $path       = $photo[0]->getPath();
        
            $postingData[] = array(
                'photo' => $path,
                'username' => $val->getMember()->getUsername(),
                'gender' => $val->getGenderType(),
                'date_to_hangout' => $val->getDateToHangout(),
                'num_ppl' => $val->getNumPpl(),
                'posting_enddt' => $val->getPostingEnddt(),
                'enddate_hangout' => $val->getEnddateHangout(),
                'starttime' => $val->getStarttime(),
                'endtime' => $val->getEndtime(),
                'posting_title' => $val->getPostingTitle(),
                'posting_desc' => $val->getPostingDesc(),
                'date_created' => $val->getDateCreated(),
                'no_of_respondents' => $val->getRequester()->count()
            );
        }
        
       }catch(Exception $e){
          die($e->getMessage());
       }
      
//      $postingHtml = "";
//      foreach($postingData as $id => $val){
//          $postingHtml .= "<div class='myPostings-body'>";
//
//            $postingHtml .= "<div style='float:left;border: 1px solid #d2dce9;'>";
//            $postingHtml .= "<img height='80' width = '80' src='/{$val['photo']}'/>";
//            $postingHtml .= "</div>";
//
//            $postingHtml .= "<div style='float:left;width: 84%;font-weight:bold;'>";
    //            $postingHtml .= "<span style='margin-left:10px;float:left;'>".strtoupper($val['username'])."</span>";
//            $postingHtml .= "<div style='margin-left:10px;width: 75%; background-color:none;text-align:center; float:left;'>".$val['posting_title']."</div>";
//            $postingHtml .= "</div>";
//
//            $postingHtml .= "<div style='float:left; margin-left:9px; margin-top:5px;'>";
//            $postingHtml .= "<div> <span style='font-weight:bold;'> Start Time: </span> ".date("l, F j, Y",strtotime($val['date_to_hangout'])).' '.date("h:i A",strtotime($val['starttime']))." </div>";
//            $postingHtml .= "<div> <span style='font-weight:bold;'> End Time: </span> ".date("l, F j, Y",strtotime($val['enddate_hangout'])).' '.date("h:i A",strtotime($val['endtime']))." </div>";
//            $postingHtml .= "</div>";
//
//            $remaining = CustomHangout::calculateRemainingDays(strtotime($val['posting_enddt']), 'till hangout!');
//
//            $postingHtml .= "<div style='float:left;width: 84%;font-weight:bold;margin-top:5px; color:#084692;'>";
//            $postingHtml .= "<div style='margin-left:10px;width: 98%; background-color:none;text-align:center; float:left;'>".strtoupper($remaining)."</div>";
//            $postingHtml .= "</div>";
//            $postingHtml .= "<hr/>";
//            
//          $postingHtml .= "</div>";
//      }
      
      $postingHtml = "<ul class='list-group'>";
      foreach($postingData as $id => $val){
            $remaining = CustomHangout::calculateRemainingDays(strtotime($val['posting_enddt']), 'till posting end time');
            $postingHtml .= '<li class="list-group-item">';
            
            $postingHtml .= "<div style='padding-bottom:5px;'>";
            
            $postingHtml .= "<div class='row'>";
                $postingHtml .= "<div class='col-xs-2' style='width:10.667%!important;'>";
                    $postingHtml .= "<img height='80' width = '80' style='border:3px solid #DFF0D8;' src='/{$val['photo']}'/>";
                $postingHtml .= "</div>";
                $postingHtml .= "<div class='col-xs-10'>";
                    $postingHtml .= "<div class='row'>";
                    $postingHtml .= '<div class="col-xs-6"><span style="color:#008000;">'.strtoupper($val['username']).'</div>';
                    $postingHtml .= '<div class="col-xs-6 hangout-date">'.$val['posting_title'].'</div>';
                    $postingHtml .= "</div>";

                    $postingHtml .= "<div class='row'>";
                    $postingHtml .= '<div class="col-xs-12"><span style="color:#3E505C;">Start Time: </span>'.date("l, F j, Y",strtotime($val['date_to_hangout'])).' '.date("h:i A",strtotime($val['starttime'])).'</div>';           
                    $postingHtml .= "</div>";

                    $postingHtml .= "<div class='row'>";
                    $postingHtml .= '<div class="col-xs-12"><span style="color:#3E505C;">End Time: </span>'.date("l, F j, Y",strtotime($val['enddate_hangout'])).' '.date("h:i A",strtotime($val['endtime'])).'</div>';           
                    $postingHtml .= "</div>";

                    $postingHtml .= "</div>";

                    $postingHtml .= "<div class='row'>";  
                    $postingHtml .= '<div class="col-xs-12 remaining-hrs"><span class="label label-primary">'.strtoupper($remaining).'</span></div>';
                    $postingHtml .= "</div>";
                $postingHtml .= "</div>";
            $postingHtml .= "</div>";
            
            $postingHtml .= "</li>";
      }
      $postingHtml .= "</ul>";
      
      sleep(2);
      $data = array('data'=>$postingHtml, 'start'=>($start + 5), 'hideLoadMorePostDiv' => $hideLoadMorePostDiv);
      die(json_encode($data));
  }
  
  public function executeGetTodaysPostings(sfWebRequest $request)
  {
      try{
        
        $start  = $request->getParameter('start');
        $start = empty($start)? 0:$start;
        $Postings = new Postings();
        list($result, $total) = $Postings->getTodaysPostings($_SESSION['userId'], $start); //hangouts that responded to user's posting
        
        if($result->count() == 5)
            $current_total = $start;
        else
            $current_total = $start + $result->count();
        
        $hideLoadMorePostDiv = false;
        if($total == $current_total){
            $hideLoadMorePostDiv = true;
        }

        $postingData = array();
        foreach($result as $val){

            $photo      = $val->getMember()->getPhoto();
            $path       = $photo[0]->getPath();

            $postingData[] = array(
                'photo' => $path,
                'username' => $val->getMember()->getUsername(),
                'gender' => $val->getGenderType(),
                'date_to_hangout' => $val->getDateToHangout(),
                'enddate_hangout' => $val->getEnddateHangout(),
                'num_ppl' => $val->getNumPpl(),
                'posting_enddt' => $val->getPostingEnddt(),
                'starttime' => $val->getStarttime(),
                'endtime' => $val->getEndtime(),
                'posting_title' => $val->getPostingTitle(),
                'posting_desc' => $val->getPostingDesc(),
                'date_created' => $val->getDateCreated(),
                'no_of_respondents' => $val->getRequester()->count()
            );
        }
      
        $postingHtml = "<ul class='list-group'>";
        foreach($postingData as $id => $val){
                $remaining = CustomHangout::calculateRemainingDays(strtotime($val['posting_enddt']), 'till posting end time');
                $postingHtml .= '<li class="list-group-item">';

                $postingHtml .= "<div style='padding-bottom:5px;'>";

                $postingHtml .= "<div class='row'>";
                    $postingHtml .= "<div class='col-xs-2' style='width:10.667%!important;'>";
                        $postingHtml .= "<img height='80' width = '80' style='border:3px solid #DFF0D8;' src='/{$val['photo']}'/>";
                    $postingHtml .= "</div>";
                    $postingHtml .= "<div class='col-xs-10'>";
                        $postingHtml .= "<div class='row'>";
                        $postingHtml .= '<div class="col-xs-6"><span style="color:#008000;">'.strtoupper($val['username']).'</div>';
                        $postingHtml .= '<div class="col-xs-6 hangout-date">'.$val['posting_title'].'</div>';
                        $postingHtml .= "</div>";

                        $postingHtml .= "<div class='row'>";
                        $postingHtml .= '<div class="col-xs-12"><span style="color:#3E505C;">Start Time: </span>'.date("l, F j, Y",strtotime($val['date_to_hangout'])).' '.date("h:i A",strtotime($val['starttime'])).'</div>';           
                        $postingHtml .= "</div>";

                        $postingHtml .= "<div class='row'>";
                        $postingHtml .= '<div class="col-xs-12"><span style="color:#3E505C;">End Time: </span>'.date("l, F j, Y",strtotime($val['enddate_hangout'])).' '.date("h:i A",strtotime($val['endtime'])).'</div>';           
                        $postingHtml .= "</div>";

                        $postingHtml .= "</div>";

                        $postingHtml .= "<div class='row'>";  
                        $postingHtml .= '<div class="col-xs-12 remaining-hrs"><span class="label label-primary">'.strtoupper($remaining).'</span></div>';
                        $postingHtml .= "</div>";
                    $postingHtml .= "</div>";
                $postingHtml .= "</div>";

                $postingHtml .= "</li>";
        }
        $postingHtml .= "</ul>";
        
        sleep(2);

        $data = array('data'=>$postingHtml, 'start'=>($start + 5), 'hideLoadMorePostDiv' => $hideLoadMorePostDiv);
        die(json_encode($data));
      }catch(Exception $e){
        die($e->getMessage());
      }
  }
  
  public function executeDoneHangout(sfWebRequest $request)
  {
     $posting_id = $_REQUEST['id_'];
     
     $requester = Requester::getRequesterUsername($posting_id);
     
     $member = new Member();    
     $member->setId($_SESSION['userId']);
     $email = $member->getMemberInfo('email');

     $requesters = array();
     foreach($requester as $v)
     {
        $requesters[] = $v->getMember()->getUsername();
     }

     $requesters[ count($requesters)-1 ] = ' and '.$requesters[ count($requesters)-1 ];
     $requesters = implode(",", $requesters);
     $requesters = str_replace(", and"," and",$requesters);     
     $response = $this->sendEmailAfterHangout($_SESSION['username'], $requesters, $email);     
     if($response){
          $Postings = new Postings();
          $Postings->setPostingToComplete($posting_id);
     }
     die($response);
  }
  
  public function executeCancelledHangout(sfWebRequest $request)
  {
     $posting_id = $_REQUEST['id_'];
     
     $requester = Requester::getRequesterUsername($posting_id);
     
     $member = new Member();    
     $member->setId($_SESSION['userId']);
     $email = $member->getMemberInfo('email');

     $requesters = array();
     foreach($requester as $v)
     {
        $requesters[] = $v->getMember()->getUsername();
     }

     $requesters[ count($requesters)-1 ] = ' and '.$requesters[ count($requesters)-1 ];
     $requesters = implode(",", $requesters);
     $requesters = str_replace(", and"," and",$requesters);     
     $response = $this->sendEmailAfterHangoutButCancelled($_SESSION['username'], $requesters, $email);     
     if($response){
          $Postings = new Postings();
          $Postings->setPostingToComplete($posting_id,3);
     }
     die($response);
  }
  
  public function sendEmailAfterHangout($userName = '', $requesterName = '', $recipient = '')
  {
      $body = '
                <div style="font-family:tahoma;font-size:12px;">
                    <div style="font-weight:normal;">
                        To: <span style="color:#000000;font-weight:bold;">'.$userName.'</span><br/>
                        From: <span style="color:#A450DB;font-weight:bold;font-family:Arial Rounded;font-size:18px;">HangOut</span><span style="color:#F9CD4B;font-family:Arial Rounded;font-size:14px;">Today.com</span><br/>
                    </div>
                    <br/>
                    <p>
                        You have HangOut with '.$requesterName.'.  Log in now and rate your experience and add '.$requesterName.' as your friend!
                    </p>

                    <blockqoute>
                        <div>
                        Go to your Account and Click <b>Rate HangOut</b>
                        By not completing your HangOut Review for this HangOut, you will not be able to create or reply to any new posts.
                        <br/><br/>
                        Log in Now or click the following link <a href="http://hangout.com">HangOutToday.com</a>
                        </div>
                    </blockqoute>
                    <br/>
                    <blockqoute>
                        <div>*Disclaimer: <span style="font-size:11px;color:#969696;"> This member has been removed from your email contact list.  Once you rate your experience and add them as a friend, access to their email will be granted.
                        </span></div>
                    </blockqoute>
                </div>
            ';
      
      $response = CustomHangout::email($recipient, $body, 'HangOutToday', 'HangOutToday Notification');
      return $response;
  }
  
  public function executeProfileInfo(sfWebRequest $request)
  {      
      echo '<div style="height:250px;border:1px solid;">
            <div style="padding:5px;font-family:tahoma;">
                <div><img src="/images/members/1_photo/1.jpg"  style="width:80px;height:80px;float:left;"/></div>
                <div style="float:left;padding-left:5px;font-weight:bold;">BigBoobs29
                    <div style="font-size:12px;font-weight:normal;">Cincinnati, OH</div>
                    <hr/>
                    <div style="font-size:12px;font-weight:normal;"><a href="#">View Public Profile</a></div>
                </div>
                <div style="float:left;padding-left:150px;font-size:12px;">
                    <label> Date to HangOut :</label><br/>
                    <label><a href="#">Rate Now</a></label>
                </div>
            </div>
            </div><br/>
            <div class="myPostings-body">
            <div style="padding:5px;font-family:tahoma;">
                <div><img src="/images/members/1_photo/1.jpg"  style="width:80px;height:80px;float:left;"/></div>
                <div style="float:left;padding-left:5px;font-weight:bold;">BigBoobs29
                    <div style="font-size:12px;font-weight:normal;">Cincinnati, OH</div>
                    <hr/>
                    <div style="font-size:12px;font-weight:normal;"><a href="#">View Public Profile</a></div>
                </div>
                <div style="float:left;padding-left:150px;font-size:12px;">
                    <label> Date to HangOut :</label><br/>
                    <label><a href="#">Rate Now</a></label>
                </div>
            </div>
            </div>
          ';
      die();
  }
  
  public function sendEmailAfterHangoutButCancelled($userName = '', $requesterName = '', $recipient = '')
  {
      $body = 
            '
            <div style="font-family:tahoma;font-size:12px;">
                <div style="font-weight:normal;">
                    To: <span style="color:#000000;font-weight:bold;">'.$userName.'</span><br/>
                    From: <span style="color:#A450DB;font-weight:bold;font-family:Arial Rounded;font-size:18px;">HangOut</span><span style="color:#F9CD4B;font-family:Arial Rounded;font-size:14px;">Today.com</span><br/>
                </div>
                <br/>
                <p>
                    You have cancelled your HangOut with '.$requesterName.'. <br/><br/> Thank you!
                </p>
            </div>
          ';
     $response = CustomHangout::email($recipient, $body, 'HangOutToday', 'HangOutToday Notification');
     return $response;
  }
  
  public function executeEdit(sfWebRequest $request)
  {
      
     $this->setLayout('new_layout');
     $userId = $_SESSION['userId'];
   
     try
     {
                 $sql = "select * from member where id = $userId";
                 $st = $this->conn->execute($sql);
	 	 $result = $st->fetchAll(); 	 
     
		 if(count($result) == 0)
		 {
			$this->redirect('/index.php/login/index');	 
		 }
		 
		 //account tab
		 foreach($result as $val)
		 {
			$this->username = $result[0]['username'];	 
			$this->email = $result[0]['email'];
			$this->age = $result[0]['age'];
			$this->country = $result[0]['country'];
			$this->state = $result[0]['state'];	
                        $this->city = $result[0]['city'];
			$this->zipCode = $result[0]['zip_code'];
			$this->gender = $result[0]['gender'];
                        $this->nickname = $result[0]['nick_name'];
			$this->birthday = (!empty($result[0]['birthday']))? date("m/d/Y",strtotime($result[0]['birthday'])):"";
                        //change password tab
                        $this->password = $result[0]['password'];
		 }
		 
		 $sql = "select * from country_list";
		 $st = $this->conn->execute($sql);
		 $result = $st->fetchAll(); 
		 
		 $this->countries = array();
		 foreach($result as $val)
		 {
			 $this->countries[$val['id']] = $val['country_name'];
		 }
		
                 $this->states = array();
                 if(!empty($this->state))
                 {
                    $sql = "select * from fips_regions where code = '{$this->state}' limit 1"; //states
                    $st = $this->conn->execute($sql);
                    $result = $st->fetchAll(); 
                    
                    foreach($result as $v)
                    {
                        $this->state = $v['name']; //$this->states[$v['code']] = $v['name'];
                    }
                 }
                 else
                 {
                    $this->states['-'] = '-';
                 }
                 
                 $this->cities = array();
                 if(!empty($this->city))
                 {                     
                     $q = "select distinct city from zipcodes where lower(city) = lower('{$this->city}') limit 1";
                     $result = $this->conn->fetchAll($q);

                     foreach($result as $v)
                     {
                        $this->cities[strtolower($v['city'])] = $v['city'];
                     }
                 }
                 else
                 {
                    $this->cities['-'] = '-';
                 }
		 
                 $this->zipcodes = array();
                 if(!empty($this->zipCode))
                 {
                     $q = "select distinct zipcode from zipcodes where zipcode = '{$this->zipCode}' limit 1";
                     $result = $this->conn->fetchAll($q);

                     foreach($result as $v)
                     {
                        $this->zipcodes[$v['zipcode']] = $v['zipcode'];
                     }
                 }
                 else
                 {
                    $this->zipcodes['-'] = '-';
                 }
                 
		 //about yourself tab
		 $sql = "SELECT p.id as profile_id, p.name, pc.choice_name, pc.id, pi.object_name, p.has_custom_style, p.placement_id
		 		 FROM profile p 
				 left join profile_input_type pi on p.profile_input_type_id = pi.id
				 left join profile_choice pc on p.id = pc.profile_id
				order by p.order_number , pc.order_number";
				
                 $st = $this->conn->execute($sql);
	 	 $result = $st->fetchAll(); 	 
	 	
	 	 $this->aboutYourself = array();
	 	 foreach($result as $val)
	 	 {
		 	$this->aboutYourself[$val['name']]['input_type'] = $val['object_name'];
		 	$this->aboutYourself[$val['name']]['profile_id'] = $val['profile_id'];
		 	$this->aboutYourself[$val['name']]['has_custom_style'] = $val['has_custom_style'];
                        $this->aboutYourself[$val['name']]['placement_id'] = $val['placement_id'];
		 	if(in_array($val['object_name'],array('select_tag','radiobutton_tag')))
		 	{
                            $this->aboutYourself[$val['name']]['value'][] = array($val['id'],$val['choice_name']);
	 		}		 	 
	 	 }
			
                 
	 	 //query the values of member_profile table 
	 	 $sql = "SELECT * FROM member_profile where member_id = $userId";
	 	 $st = $this->conn->execute($sql);
	 	 $result = $st->fetchAll(); 
	 	 
	 	 $this->memberProfile = array();
	 	 foreach($result as $val)
	 	 {
		 	$this->memberProfile[$val['profile_id']] = $val['value'];
	 	 }

	 	 #------------Pictures tab-------------#
                 $this->photo = $this->getPhotoList($userId);
                 
 	 	 #------------Friends tab-------------#
                 $result = null;
                 $result = Friendship::getFriends($userId);
                 
	 	 $this->friends = array();
	 	 foreach($result as $val)
	 	 {
                     $path = $val['path'];
                     if($path == "" || empty($path))
                     {
                         $path = $val['gender'] == 'f'? "images/female.jpg" : "images/male.png";
                     }
                     
                     $this->friends[] = array($val['nick_name'], "/".$path, $val['email'], $val['id'], $val['profile_id'], $val['friend_id']);
	 	 }
	 	  
                 #------------Edit Postings tab-------------#
                 $postings = new Postings();
                 list($this->posts, $this->total, $this->totalPostings) = $postings->getAllPostings($userId);
                 //get the page count of pagination
                 $tmp = $this->totalPostings/5;
                 $wholeNumber = floor($tmp);
                 $fraction = $tmp - $wholeNumber;
                 $this->totalPostings = ($fraction == 0)? $wholeNumber : $wholeNumber + 1;
                 
 	 }catch(Exception $e){
	 	die($e->getMessage());	
 	 }	 
    	
  }  
  
  public function executeLoadPhotoList(sfWebRequest $request)
  {
      $userId = $_SESSION['userId'];
      
      try{
          $photo = $this->getPhotoList($userId);          
          die(json_encode(array('success' => true, 'data'=>$photo)));
      }catch(Exception $e){
          die(json_encode(array('success' => false, 'error'=>$e->getMessage())));
      }
  }
  
  public function getPhotoList($memberId)
  {
        $obPhoto = new Photo();
        $result = $obPhoto->getPhotos($memberId);

        $defaultImg = "/images/defaultProfilePhoto.jpg";
        $photo = array();
        if(count($result) == 0)
        {
            $photo[] = array("",$defaultImg);
            $photo[] = array("",$defaultImg);
            $photo[] = array("",$defaultImg);
        }
        else
        {
            $photo = array();
            foreach($result as $val)
            {
                $path = "/".$val['path'];
                if($val['is_delete'])
                {
                    $path = $defaultImg; //override with the defaultImg if photo is deleted thru is_delete field
                }

                $photo[] = array(date("Y-m-d H:i:s",strtotime($val['created_at'])), $path, $val['id']);	 
            }

            $count = count($photo);
            if($count < 3)
            {
                for($i=0;$i< ( 3 - $count );$i++)
                {
                   $photo[] = array("",$defaultImg);
                }	 
            }		 	 
        }
        
        return $photo;
  }
  
  public function executeSaveMyAccount(sfWebRequest $request)
  {
	  
	  $username  = isset($_REQUEST['username'])? addslashes($_REQUEST['username']):$_SESSION['username'];
	  $nickName  = isset($_REQUEST['nick_name'])? addslashes($_REQUEST['nick_name']):"";
	  $email     = isset($_REQUEST['email'])? addslashes($_REQUEST['email']):"";
	  $age       = isset($_REQUEST['age'])? addslashes($_REQUEST['age']):"";
	  $birthdate = isset($_REQUEST['birthdate'])? addslashes($_REQUEST['birthdate']):"";
	  $state     = isset($_REQUEST['state'])? addslashes($_REQUEST['state']):"";
	  $zipcode   = isset($_REQUEST['zipcode'])? addslashes($_REQUEST['zipcode']):"";
	  $city      = isset($_REQUEST['city'])? addslashes($_REQUEST['city']):"";
          
	  try{
//                $sql = "Update member 
//                        SET 
//                        state = '$state', 
//                        email = '$email',
//                        zip_code = '$zipcode', 
//                        city = '$city'
//                        WHERE id = ".$_SESSION['userId'];
              $sql = "UPDATE member 
                        SET 
                        email = '$email'
                        WHERE id = ".$_SESSION['userId'];
                $st = $this->conn->execute($sql);	 	                      
                die(json_encode(array('success' => true)));
 	   }catch(Exception $e){
	 	die(json_encode(array('success' => false, 'error' => $e->getMessage())));
 	   }
  }
  
  public function executeSaveAboutYourself(sfWebRequest $request)
  {
      try
      {         
            $data = $request->getParameter('data');
            $data = json_decode($data);
            $member_id = $_SESSION['userId'];
            foreach($data as $v)
            {
                $arrVal = (array)$v;
                $profile_choice_id = $arrVal['profile_choice_id'];
                $profile_id = $arrVal['profile_id'];
                $value = $arrVal['value'];
                
                $memProfile = new MemberProfile();
                $memProfile->savePersonalInformation($member_id, $profile_choice_id, $profile_id, $value);
            }
            die(json_encode(array('success' => true)));
      }
      catch(Exception $e)
      {
            die(json_encode(array('success' => false, 'error' => $e->getMessage())));
      }            
  }
  
  public function executeSaveMyAboutYourself(sfWebRequest $request)
  {
	    
        $sql[0] = "insert into member_profile ( member_id, profile_id, value ) values ";
        $sql[1] = "insert into member_profile ( member_id, profile_id, value, profile_choice_id ) values ";
        $del_ids  = array();
        $member_id = $_SESSION['userId'];
        foreach($_REQUEST as $key => $val)
        {
                if($key == "submit" || $key == 'symfony')
                    continue;

                $explode = explode("_",$key);	
                $profile_id = $explode[1];
                $value = is_numeric(addslashes($val))? addslashes($val):"'".addslashes($val)."'";

                if(in_array($profile_id, array(6,13,14,15,16,17,18)))
                {
                    $sql[0] .= " ( $member_id,$profile_id,$value ),";
                }
                else
                {
                     $sql[1] .= " ( $member_id,$profile_id,$value, $value ),";
                }
                                
                $q = "SELECT * FROM member_profile WHERE member_id = $member_id AND profile_id = $profile_id;";
                $result = $this->conn->fetchAll($q);
                
                if(count($result) > 0)
                {
                    foreach($result as $v)
                        $del_ids[] = $v['id'];
                }
                
        }
//print '<pre>';print_r($_REQUEST);
        $sql[0] = substr($sql[0],0,-1);
        $sql[0] .= ";";
        $sql[1] = substr($sql[1],0,-1);
        $sql[1] .= ";";
        
//die($sql);
        try{                
                $st = $this->conn->execute($sql[0]);
                $st = $this->conn->execute($sql[1]);
                if(count($del_ids) > 0)
                {
                    $this->conn->execute("delete from member_profile where id in (".implode(',',$del_ids).")");
                }
                $this->redirect("/index.php/home/edit/update/tab2");
        }catch(Exception $e){
                die($e->getMessage());	  
        }
	  
  }

  public function executeChangePassword(sfWebRequest $request)
  {
        try{

            $newPwd  = $request->getParameter('pwd');
            $memberId = $_SESSION['userId'];

            Member::changePassword($memberId, $newPwd);
            die(json_encode(array('success' => true)));
        }catch(Exception $e){
            die(json_encode(array('success' => false, 'error' => $e->getMessage())));
        }	  
  }	
  
  public function executeUploadPhotos(sfWebRequest $request)
  {
	  
    try{
		
	  $memberId = $_SESSION['userId'];
	  
          $photos = new Photo();
          $rsPhoto = $photos->getPhotos($memberId);
          
          $myPhoto = array();
          foreach($rsPhoto as $v)
          {
              $myPhoto[$v['id']] = $v;
          }
          
	  $max_order = (count($rsPhoto) > 0)? $rsPhoto[0]['sequence'] : 0;		  
	  $totalPhotos = count($rsPhoto);
          $filename_path  = '';

	  $err = 0;
	  foreach($_FILES as $key => $photo)
	  {
		  if($photo['error'] > 0) continue;		 
                  
		  $photoId = explode("_",$key); 
		  $photoId = $photoId[1];                                  
                  $filename_path  = '';
                  $filename_order = 1;
                  $isPhotoExist = false;
                  if(is_numeric($photoId))
                  {
                    $filename_path  = $myPhoto[$photoId]['path'];
                    $filename_order = $myPhoto[$photoId]['sequence'];         
                    $isPhotoExist = true;
                  }
                  else
                  {
                    $filename_order = $totalPhotos + 1;                    
                  }
                  
		  $path	= "images/members/".$memberId."_photo";
		  if(!is_dir($path))
		  {
			mkdir($path);
		  }
		  
                  $rand = substr(md5(microtime()),rand(0,26),5);
                  
		  $path .= "/$rand.jpg";
		  $uploadRs = move_uploaded_file($photo['tmp_name'], $path);
		  $err = ($uploadRs)? $err++ : $err;
		  
		  if($uploadRs)
		  {
                    if(!$isPhotoExist)
                    {                                             
                        $max_order++;  
                        Photo::addPhotoRecord($path, $memberId, $filename_order);                                               
                    }
                    else
                    {                          
                        Photo::updatePhotoRecord($path, $photoId);
                    }                    
		  }
		  else
		  {
			$err++;	                          
		  }
	  }

	  	  
	  if($err > 0)
	  {
                die(json_encode(array('success' => false)));
	  }
          
          if($filename_path != '')
          {
                unlink($filename_path);
          }
	  
	  die(json_encode(array('success' => true, 'error' => $err)));
	  
    }catch(Exception $e){
	  die(json_encode(array('success' => false, 'error' => $e->getMessage())));
    }
	
  }
  
  public function executeGetPhotos(sfWebRequest $request){
      
      try{
          
            $memberId = $_SESSION['userId'];

            $photos = $this->getPhotoList($memberId);

            $colMdBody = "";
            $tmpPhotoId = 'A';
            foreach($photos as $val)
            {
                $path = $val[1];
                $createdAt = (empty($val[0]))? "-":$val[0];
                $photo_id = isset($val[2])? $val[2]:$tmpPhotoId;
                $fileuploadName = "photo_$photo_id";

                $colMdBody .= '<div class="col-md-3">';
                    $colMdBody .= '<div class="panel panel-success" >';
                        $colMdBody .= '<div class="panel-body">';
                            $colMdBody .= "<img src='$path' class='photo'/>";
                        $colMdBody .= '</div>';
                        $colMdBody .= '<ul class="list-group list-group-home">';
                            $colMdBody .= '<li class="list-group-item">';
                                $colMdBody .= "<a href='#' id='mkProPic' name='mkProPic_$photo_id'> Set as Profile Picture </a>";
                            $colMdBody .= '</li>';
                            $colMdBody .= '<li class="list-group-item">';
                                $colMdBody .= "<input type='file' id='$fileuploadName' name='$fileuploadName' size='30px' /> ";
                            $colMdBody .= '</li>';
                            $colMdBody .= '<li class="list-group-item">';
                                $colMdBody .= "<a href='#' id='rmPic' name='rmPic_$photo_id'> Remove </a>";
                            $colMdBody .= '</li>';
                        $colMdBody .= '</ul>';
                    $colMdBody .= '</div>';
                $colMdBody .= '</div>';                                
            }
        
            die(json_encode(array('success'=>true, 'body'=>$colMdBody)));
        
      }catch(Exception $e){
            die(json_encode(array('success'=>false, 'body'=> '', 'error' => $e->getMessage())));
      }
  }


  public function executeMakeProfilePicture(sfWebRequest $request)
  {
        try{
            $photoId = $request->getParameter('photoId');
            $memberId = $_SESSION['userId'];

            Member::MakeProfilePicture($memberId, $photoId);
            
            die(json_encode(array('success'=>true)));
        }catch(Exception $e){
            die(json_encode(array('success'=>false, 'error'=>$e->getMessage())));	  
        }
  }
  
  public function executeRemovePhoto(sfWebRequest $request)
  {
        try{
            $photoId = $request->getParameter('photoId');
            
            Photo::RemovePhoto($photoId);
            
            die(json_encode(array('success'=>true)));
        }catch(Exception $e){
            die(json_encode(array('success'=>false, 'error'=>$e->getMessage())));	  
        }          
  }
  
  public function executeSendMessage(sfWebRequest $request)
  {	
    try{
        $msgEmail = $request->getParameter('msgEmail');
        $msgSubject = $request->getParameter('msgSubject');
        $msgContent = $request->getParameter('msgContent');
        $msgSender = $request->getParameter('msgSender');

    //            set_time_limit(0);
    //            $msgContent = " <p>$msgContent</p>";

    //            $headers   = array();
    //            $headers[] = "MIME-Version: 1.0";
    //            $headers[] = "Content-type: text/plain; charset=iso-8859-1";
    //            $headers[] = "From: Nove Sanchez <nove.sanchez@hotmail.com>";            
    //            $headers[] = "Reply-To: Nove Sanchez <nove.sanchez@hotmail.com>";
    //            $headers[] = "Subject: {$msgSubject}";
    //            $headers[] = "X-Mailer: PHP/".phpversion();

    //            mail($msgEmail, $msgSubject, $msgContent);

    //            $response = CustomHangout::email($msgEmail, $msgContent, $msgSender, $msgSubject);           
    //            if($response){
            die(json_encode(array('success'=>true)));
    //            }else{
    //                die(json_encode(array('success'=>false)));
    //            }       


    }catch(Exception $e){
        die(json_encode(array('success'=>false, 'error'=>$e->getMessage())));
    }
  }
  
  public function executeUnfriend(sfWebRequest $request)
  {
    try{

        $friendshipId = $request->getParameter('friendshipId');
        
        $rs = Friendship::unfriend($friendshipId);
        
        if($rs){
            die(json_encode(array('success'=>true)));
        } else {
            die(json_encode(array('success'=>false, 'error'=> $rs)));
        }
        
    }catch(Exception $e){
        die(json_encode(array('success'=>false, 'error'=> $e->getMessage())));
    }
  }
  
  public function executeGetFriends(sfWebRequest $request)
  {
    try{

        $memberId = $_SESSION['userId'];
        
        $rs = Friendship::getFriends($memberId);
        
        $colXsBodyOdd = '<div class="col-xs-6">';                            
        $colXsBodyEven = '<div class="col-xs-6">';                            
        $lstGrpOdd = '<ul class="list-group" id="list-grp-odd">';
        $lstGrpEven = '<ul class="list-group" id="list-grp-even">';
        $ctr = 1;
                            
        foreach($rs as $val) {
            
            $path = $val['path'];
            if($path == "" || empty($path))
            {
                $path = $val['gender'] == 'f'? "images/female.jpg" : "images/male.png";
            }

            $tmpLstItem  = '';
            $tmpLstItem .= '<li class="list-group-item">';
            $tmpLstItem .= "<input type='hidden' id='hd".$val['profile_id']."' name='hd".$val['profile_id']."' value='".$val['email']."' />";
            $tmpLstItem .= "<input type='hidden' id='fid".$val['profile_id']."' name='fid".$val['profile_id']."' value='".$val['friend_id']."' />";
            $tmpLstItem .= '<div class="col-xs-12 col-sm-3">';
            $tmpLstItem .= '<img src="/'.$path.'" alt="'.$val['nick_name'].'" class="img-responsive img-circle" style="height: 98px; width: 98px;"/>';
            $tmpLstItem .= '</div>';

            $tmpLstItem .= '<div class="col-xs-12 col-sm-9">';

            $tmpLstItem .= '<span class="name">'.$val['nick_name'].'</span><br/>';                                 
            $tmpLstItem .= '<span class="pull-left buttons">';
            $tmpLstItem .= '<button id="btnMsg" name="btn'.$val['profile_id'].'"  class="btn btn-sm btn-success" data-toggle="modal" data-target="#message"><i class="fa fa-fw fa-comments"></i> Message</button>';
            $tmpLstItem .= '&nbsp;';
            $tmpLstItem .= '<button id="btnRmvFriend" name="btnrm'.$val['profile_id'].'" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-times"></i>Unfriend</button>';
            $tmpLstItem .= '</span>';

            $tmpLstItem .= '</div>';

            $tmpLstItem .= '<div class="clearfix"></div>';

            $tmpLstItem .= '</li>';            

            if($ctr % 2)
            {
                $lstGrpOdd .= $tmpLstItem;   
            }
            else
            {                                    
                $lstGrpEven .= $tmpLstItem;
            }
            
            $ctr++;
            
        }
        
        $colXsBodyOdd .= $lstGrpOdd . '</ul></div>';
        $colXsBodyEven .= $lstGrpEven . '</ul></div>';

        $body = $colXsBodyOdd.$colXsBodyEven;  
                 
        die(json_encode(array('success'=>true, 'body'=>$body)));
        
    }catch(Exception $e){
        die(json_encode(array('success'=>false, 'body'=> '', 'error'=> $e->getMessage())));
    }      
  }
  
  public function executePageMyPosts(sfWebRequest $request)
  {
      try{
  
        $pageNum = $request->getParameter('pageNum');
        $userId = $_SESSION['userId'];
        
        $postings = new Postings();
        list($posts, $total, $totalPostings) = $postings->getAllPostings($userId, $pageNum);      

        $listBody = '';
        foreach($posts as $v)
        {
            
//            $listBody .= '<a href="#" class="list-group-item" title="Click to Edit or Remove a Post">';
//            $listBody .= '<h4 class="list-group-item-heading">'.$v->getPostingTitle().'<span class="text-muted" style="float:right;font-size:13px!important;">Created </span></h4>';
//            $listBody .= '<p class="list-group-item-text text-muted" style="font-size: 12px!important;">'.$v->getPostingDesc().'</p>';   
//            $listBody .= '</a>';
            
            $listBody .= '<div id="postItem" class="list-group-item" style="position:relative;overflow:hidden;">';
            $listBody .= '<div class="caption">';
            $listBody .= '<p><a href="/index.php/postings/edit?id='.$v->getId().'" class="label label-success" rel="tooltip">Edit</a>';
            $listBody .= '&nbsp;<a href="" class="label label-success" rel="tooltip">Delete</a></p>';
            $listBody .= '</div>';
            $listBody .= '<h4 class="list-group-item-heading">'.$v->getPostingTitle().'<span class="text-muted" style="float:right;font-size:13px!important;">Created </span></h4>';
            $listBody .= '<p class="list-group-item-text text-muted" style="font-size: 12px!important;">'.$v->getPostingDesc().'</p>';     
            $listBody .= '</div>';
        }

        die(json_encode(array('success' => true, 'total' => $total, 'body' => $listBody, 'totalPostings' => $totalPostings)));
        
     }catch(Exception $e){
         die(json_encode(array('success' => false, 'total' => 0, 'error' => $e->getMessage(), 'body' => '', 'totalPostings' => 0)));
     }
  }
  
  public function executeSignOut(sfWebRequest $request)
  {
      unset($_SESSION['username']);
      unset($_SESSION['userId']);
      
      $this->redirect("http://hangout.com");
  }        
          
  public function executeProfile(sfWebRequest $request)
  {           
        if(!isset($_GET['id'])){
            die('Sorry! page cannot be found.');
        }
        
        $profileId = $_GET['id'];
        
        $Member  = new Member();
        $Member->setId($profileId);
        $memberId = $Member->getMemberInfo('id');
        $age      = $Member->getMemberInfo('age');
        $gender   = $Member->getMemberInfo('gender');
        $this->username = $Member->getMemberInfo('username');
        $this->location = ucfirst($Member->getMemberInfo('city')).', '.$Member->getMemberInfo('state');
        $profilePictureId = $Member->getMemberInfo('profile_picture_id');
        $profile = $Member->getMemberProfileInfo($profileId, true);

        $Photo = new Photo();
        $this->path = $Photo->getPicturePath($profilePictureId);
        
        $this->photos = array();
        $this->photos = $Photo->getPhotos($memberId);

        if(empty($this->path)){
            $pictureName = (strtolower($gender) == 'f')? 'female.jpg':'male.png';
            $this->path = "images/$pictureName";
        }
      
        $profileInfo = array();
        foreach($profile as $p)
        {
            if(in_array($p['ProfileInputType']['id'],array(1,5)))
            {
                $val = $p['MemberProfile'][0]['value'];
            }
            else
            {
                $val = $p['MemberProfile'][0]['ProfileChoice']['choice_name'];
            }
            
            $profileInfo[$p['placement_id']][$p['name']] = $val;
       }            
       
       $this->basicProfile = array();
       $this->otherProfile = array();
       
       $tmpBasicPorfile = array('Gender','Age');
       $gender = ($gender == 'f')? 'Female'  : 'Male';
       $tmpBasicPorfileAns = array($gender,$age.' y/o');
   
       foreach($profileInfo as $i => $val)
       {    
           foreach($val as $name => $ans)
           {
                $tmpBasicPorfile[] = $name;
                $tmpBasicPorfileAns[] = ucwords($ans);
           }
           
           if($i > 3)
           {
                $this->otherProfile[] = array($tmpBasicPorfile,$tmpBasicPorfileAns);                
           }
           else
           {
                $this->basicProfile[] = $tmpBasicPorfile;
                $this->basicProfile[] = $tmpBasicPorfileAns;
           }
           $tmpBasicPorfile = array();
           $tmpBasicPorfileAns = array();
       }
           
       $this->basicProfile2 = array();
       $this->basicProfile2[] = $this->basicProfile[2];
       $this->basicProfile2[] = $this->basicProfile[3];
       $this->basicProfile2[] = $this->basicProfile[4];
       $this->basicProfile2[] = $this->basicProfile[5];
       
       unset($this->basicProfile[2]);
       unset($this->basicProfile[3]);
       unset($this->basicProfile[4]);
       unset($this->basicProfile[5]);
              
  
       
        $this->cssProfileSubbox = array();
        $this->cssProfileSubbox[] = "label_1";
        $this->cssProfileSubbox[] = "label_2";
        $this->ratings = array();
        $this->ratings = SurveyResults::getRating($_SESSION['userId']);
        
        if(count($this->ratings) == 0){
            $this->ratings = SurveyResults::getQuestionAverage();
        }
       
        $this->membersLeavingFeedback = SurveyResults::getMembersLeavingFeedback($_SESSION['userId']);
        
        $q = "SELECT count(*) as total FROM requester WHERE request_status_id = 4 AND member_id = {$_SESSION['userId']}";
        $rs = $this->conn->execute($q)->fetchAll();
        
        $this->number_of_hangouts = $rs[0]['total'];
                
        unset($tmpBasicPorfile);
        unset($tmpBasicPorfileAns);
  }
  
  public function executeRateHangout(sfWebRequest $request)
  {
      $userId = $_SESSION['userId'];
	 try{
		 $sql = "SELECT member.*, photo.path FROM `member` join photo on member.profile_picture_id = photo.id where member.id=$userId";
		 $st = $this->conn->execute($sql);
		 $result = $st->fetchAll(); 
		 
		 $this->myAccount = array();
		 $this->myAccount['path'] = $result[0]['path'];
		 $this->myAccount['nickName'] = $result[0]['nick_name'];
		 $this->myAccount['username'] = $result[0]['username'];
		 $this->myAccount['email'] = $result[0]['email'];
		 $this->myAccount['country'] = $result[0]['country'];
		 $this->myAccount['state'] = $result[0]['state'];
		 $this->myAccount['zip_code'] = $result[0]['zip_code'];
                 $this->myAccount['profile_id'] = $result[0]['profile_id'];
		 $this->myAccount['bday'] = (!empty($result[0]['birthday']))? date("m-d-y",strtotime($result[0]['birthday'])):"";
	 }catch(Exception $e){
		die($e->getMessage());	 
	 }      
  }
  
  public function executeHangoutReview(sfWebRequest $request)
  {
      $userId = $_SESSION['userId'];
	 try{
		 $sql = "SELECT member.*, photo.path FROM `member` join photo on member.profile_picture_id = photo.id where member.id=$userId";
		 $st = $this->conn->execute($sql);
		 $result = $st->fetchAll(); 
		 
		 $this->myAccount = array();
		 $this->myAccount['path'] = $result[0]['path'];
		 $this->myAccount['nickName'] = $result[0]['nick_name'];
		 $this->myAccount['username'] = $result[0]['username'];
		 $this->myAccount['email'] = $result[0]['email'];
		 $this->myAccount['country'] = $result[0]['country'];
		 $this->myAccount['state'] = $result[0]['state'];
		 $this->myAccount['zip_code'] = $result[0]['zip_code'];
                 $this->myAccount['profile_id'] = $result[0]['profile_id'];
		 $this->myAccount['bday'] = (!empty($result[0]['birthday']))? date("m-d-y",strtotime($result[0]['birthday'])):"";
	 }catch(Exception $e){
		die($e->getMessage());	 
	 }      
  }
  
  public function executeRateToHangout(sfWebRequest $request)
  {
     
        $requester = Postings::getHangoutToRate($_SESSION['userId']);
        
        $html = (count($requester) > 0)? '':'<span style="color:gray;font-weight:bold;">No Pending Hangouts to Rate.</span>';
        foreach($requester as $v){
            
            $html .= '  <div> <hr/> <h4> <a href="#">'.$v['posting_title'].'</a> </h4> ';
               
            $path = ($v['gender'] == 'f')? '/images/female.jpg':'/images/male.png';
            if(!empty($v['path'])){
                $path = "/{$v['path']}";
            }

            $is_awaiting_for_final_reply = '<span style="font-weight:bold;">
                                                <a href="/home/takeSurvey?id='.$v['id'].'&posting='.$v['posting_id'].'" >Rate Now</a>
                                            </span><br/>';

            $html .= '<div style="padding:5px;font-family:tahoma;height:92px;">';
            $html .= '  <div><img src="'.$path.'"  style="width:80px;height:80px;float:left;"/></div> ';
            $html .= '  <div style="float:left;padding-left:5px;font-weight:bold;">'.$v['username'];
            $html .= '      <div style="font-size:12px;font-weight:normal;">'.$v['city'].','.$v['state'].'</div>';
            $html .= '  ';
            $html .= '      <div style="font-size:12px;font-weight:normal;"><a href="/home/profile?id='.$v['profile_id'].'">View Public Profile</a></div>';
            $html .= '  </div>';
            $html .= '  <div style="float:left;padding-left:50px;font-size:12px;width:256px;">';
            $html .= '      <label>Date to HangOut : '.date('l, M d, Y',strtotime($v['date_to_hangout'])).' </label><br/>';
            $html .= '      '.$is_awaiting_for_final_reply.'<br/>';
            $html .= '  </div> <br/>';                
            $html .= '</div>';

            $html .= '  </div>';
            
        }
        die($html);         
  }
  
  public function executeLoadHangoutReviews(sfWebRequest $request)
  {
     
        $requester = Postings::getHangoutByReview($_SESSION['userId']);        
        
        $hangoutReviews = array();
        foreach($requester as $v)
        {
            if(!isset($hangoutReviews[$v['rg_id']])){
                $hangoutReviews[$v['rg_id']] = array(
                    'posting_title'=>$v['posting_title'],
                    'ratee'=>$v['ratee'],
                    'counter_done'=>$v['counter_done'],
                    'rater_path'=>$v['rater_path'],
                    'rater_username'=>$v['rater_username'],
                    'rater_city'=>$v['rater_city'],
                    'rater_state'=>$v['rater_state'],
                    'rater_profile_id'=>$v['rater_profile_id'],
                    'ratee_path'=>$v['ratee_path'],
                    'ratee_username'=>$v['ratee_username'],
                    'ratee_city'=>$v['ratee_city'],
                    'ratee_state'=>$v['ratee_state'],
                    'ratee_profile_id'=>$v['ratee_profile_id'],
                    'posting_id'=>$v['posting_id']
                );                            
            } 
            
            $hangoutReviews[$v['rg_id']]['comments'][$v['comment_id']] = array(
                'comments'  => $v['comments'],
                'sc_member_id'  => $v['sc_member_id'],
                'sc_nick_name' => $v['sc_nick_name']
            );
            $hangoutReviews[$v['rg_id']]['friendship'][$v['status']][] = $v['friend_id'];
        }
        
        $html = (count($hangoutReviews) > 0)? '<div id="review-container">':'<span style="color:gray;font-weight:bold;">No HangOut Reviews found.</span><br/>'; 
        $counter = 1;
        foreach($hangoutReviews as $rater_group_id => $v)
        {
            $html .= '<div id="review-subcontainer" style="width:100%;float:left;">';
            $overall_average = SurveyResults::getOverallAverageRaterGoup($rater_group_id);
            
            $is_awaiting_for_final_reply = '<span style="font-size:11px;"><a href="#" style="color:red!important;">Awaiting for Final Reply</a></span>';
            
            $html .= '  <div> <h6> <span style="font-weight:normal;">'.$v['posting_title'].'</span> </h6> ';
            $spnAddAsAFriend = '';
            if($_SESSION['userId'] == $v['ratee']){
                $hngt_path = $v['rater_path'];
                $hngt_username = $v['rater_username'];
                $hngt_city = $v['rater_city'];
                $hngt_state = $v['rater_state'];
                $hngt_profile_id = $v['rater_profile_id'];
            } else {
                $hngt_path = $v['ratee_path'];
                $hngt_username = $v['ratee_username'];
                $hngt_city = $v['ratee_city'];
                $hngt_state = $v['ratee_state'];
                $hngt_profile_id = $v['ratee_profile_id'];
                $spnAddAsAFriend = '<span style="font-size:12px;font-weight:bold;float:right;">
                                        <a href="#" id="addfriend" name="addfriend_'.$rater_group_id.'">Add as a Friend</a>
                                    </span>';
                
                if(in_array($v['ratee'], $v['friendship'][2])){
                    $spnAddAsAFriend = '<span style="font-size:12px;font-weight:normal;float:right;">
                                           <label style="color:#557FFF!important;"> Friend Request Confirmed </label>
                                        </span>';
                } else if(in_array($v['ratee'], $v['friendship'][1])) {
                    $spnAddAsAFriend = '<span style="font-size:12px;font-weight:normal;float:right;">
                                           <label style="color:#FB9601!important;"> Friend Request Pending </label>
                                        </span>';
                }
                $counter++;
            }
            
            $path = ($v['gender'] == 'f')? '/images/female.png':'/images/male.png';
            $path = (!empty($hngt_path))? '/'.$hngt_path:$path;
            
            if($v['counter_done'] < 3){
                $is_awaiting_for_final_reply = '<span style="font-size:12px;float:right;">*
                                                    <a href="#" style="color:red!important;">Awaiting for Final Reply</a>
                                                </span>';
            }else{
                $is_awaiting_for_final_reply = '<span style="font-size:12px;float:right;color:black!important;">Overall Average Rating: '.$overall_average.'%</span>';
            }
            
            $html .= '<div style="padding:5px;font-family:tahoma;height:92px;width:100%;">';
            
            $html .= '  <div style="float:left;padding-left:5px;font-weight:bold;width: 98%;"><img src="'.$path.'" style="width:80px;height:80px;float:left;padding-right:5px;"/>'.$hngt_username.$is_awaiting_for_final_reply;
            $html .= '      <div style="font-size:12px;font-weight:normal;">'.$hngt_city.','.$hngt_state.
                                '<span style="font-size:12px;font-weight:normal;float:right;"><a href="#" id="trigger" name="trigger_'.$rater_group_id.'">View Ratings</a></span>
                            </div>';
            $html .= '      <div style="font-size:12px;font-weight:normal;"><a href="/home/profile?id='.$hngt_profile_id.'">View Public Profile</a>
                                '.$spnAddAsAFriend.'
                            </div>';
            $html .= '      <div style="font-size:12px;font-weight:normal;"><a href="#" id="view_comment" name="view_comment_'.$rater_group_id.'">Show/Hide Comments</a></div>';
            $html .= '  </div> <br/>';
            
            $comments = $v['comments'];
            if(count($comments) > 0){
                $display = (count($comments) == 3)? 'none':'block';
                $html .= '  <div id="comment-div_'.$rater_group_id.'" style = "background-color: #ECEFF4;display:'.$display.';float:left;font-size:12px;font-weight:normal;padding:5px;width:530px; border-radius: 5px 5px 5px 5px; margin-top: 5px; margin-bottom: 5px; border: 1px solid #E1E1E1">';
                foreach($comments as $comment){
                    $isFromYou = false;
                    if($_SESSION['userId'] == $comment['sc_member_id']){
                        $comment_owner = '<span class="t-author" style="color:#F9CD4B!important;font-size:13px;"><b>You</b></span>';
                        $isFromYou = true;
                    } else {
                        $comment_owner = '<span class="t-author" style="color:#A450DB!important;font-size:13px;">'.$comment['sc_nick_name'].'</span>';
                        $isFromYou = false;
                    }
                    $html .= '<p>'.$comment['comments'].'</p>';
                    $html .= '<div class="t-info">'.$comment_owner.'</div>';                    
                    $html .= '<br/>';                    
                }
                
                if(!$isFromYou && count($comments) < 3){
                    $html .= "<br/>";
                    $html .= "<span style='font-weight:bold;'> <a href='#'>Reply</a> 
                                <textarea id='msg_{$rater_group_id}_{$_SESSION['userId']}' style='border-radius: 5px 5px 5px 5px;width:98%!important;'> </textarea> 
                                <span style='float:right; margin-right:18px; margin-top:3px;'> <button id='btnReply' name='surveyResult_{$rater_group_id}_{$_SESSION['userId']}'>Submit</button> </span>
                              </span>";
                }
                $html .= '</div>';     
            }
            
            $survey_results = SurveyResults::getRatingsPerRaterGroup($rater_group_id);
            $html .= '<div id="pop-up_'.$rater_group_id.'"  class="pop-up">';
            $html .= '<table>';
            foreach($survey_results as $sr){
                $html .= "<tr> <td> {$sr['questions']} </td> <td> {$sr['result']}% </td> </tr>";
            }
            $html .= '</table>';            
            $html .= '</div>';
            
            $html .= '<div class="clear"></div>';
            $html .= '</div>';
            $html .= '</div>';
        }
        $html .= '</div>'; 
        $html .= '<br/>'; 
//        $html .= '<div style="width:100%;float:left;"> [ <a href="#" id="myHangoutReviews" > Refresh </a> ] ';
//        $html .= '<div class="hr-pattern"></div></div>';
        
        die($html);         
  }
  
  public function executeLoadPublicHangoutReviews(sfWebRequest $request)
  {
        $userId = $request->getParameter('userId');
        $requester = Postings::getHangoutByReview($userId, true);        
        
        $hangoutReviews = array();
        foreach($requester as $v)
        {
            if(!isset($hangoutReviews[$v['rg_id']])){
                $hangoutReviews[$v['rg_id']] = array(
                    'posting_title'=>$v['posting_title'],
                    'ratee'=>$v['ratee'],
                    'counter_done'=>$v['counter_done'],
                    'rater_path'=>$v['rater_path'],
                    'rater_username'=>$v['rater_username'],
                    'rater_city'=>$v['rater_city'],
                    'rater_state'=>$v['rater_state'],
                    'rater_profile_id'=>$v['rater_profile_id'],
                    'ratee_path'=>$v['ratee_path'],
                    'ratee_username'=>$v['ratee_username'],
                    'ratee_city'=>$v['ratee_city'],
                    'ratee_state'=>$v['ratee_state'],
                    'ratee_profile_id'=>$v['ratee_profile_id'],
                    'posting_id'=>$v['posting_id']
                );                            
            } 
            
            $hangoutReviews[$v['rg_id']]['comments'][$v['comment_id']] = array(
                'comments'  => $v['comments'],
                'sc_member_id'  => $v['sc_member_id'],
                'sc_nick_name' => $v['sc_nick_name']
            );
            $hangoutReviews[$v['rg_id']]['friendship'][$v['status']][] = $v['friend_id'];
        }

        $html = '<div id="review-container">'; $counter = 1;
        foreach($hangoutReviews as $rater_group_id => $v)
        {
            $comments = array();
            foreach($v['comments'] as $comment){
                $comments[] = $comment['comments'];
            }
           
            $html .= '<div id="review-subcontainer" style="width:100%;float:left;">';
            $html .= '  <div> <h6> <span style="font-weight:normal;">'.$v['posting_title'].'</span> </h6> ';
            
            if($userId == $v['ratee']){
                $hngt_path = $v['rater_path'];
                $hngt_username = $v['rater_username'];
                $hngt_city = $v['rater_city'];
                $hngt_state = $v['rater_state'];
                $hngt_profile_id = $v['rater_profile_id'];
            } else {
                $hngt_path = $v['ratee_path'];
                $hngt_username = $v['ratee_username'];
                $hngt_city = $v['ratee_city'];
                $hngt_state = $v['ratee_state'];
                $hngt_profile_id = $v['ratee_profile_id'];
                $counter++;
            }
            
            $path = ($v['gender'] == 'f')? '/images/female.png':'/images/male.png';
            $path = (!empty($hngt_path))? '/'.$hngt_path:$path;
            $comment_1 = '
                    <span style="font-size:12px;float:right;color:black!important;font-weight:normal!important;">
                        <blockquote>'.$comments[0].'</blockquote>
                    </span>';
            $comment_2 = $comments[1];
            $comment_3 = $comments[2];
            
            $html .= '<div style="padding:5px;font-family:tahoma;height:92px;width:100%;">';
            
            $html .= '  <div style="float:left;padding-left:5px;font-weight:bold;width: 98%;">
                    <img src="'.$path.'" style="width:80px;height:80px;float:left;padding-right:5px;"/>'.$hngt_username.
                    $comment_1;
            $html .= '      <div style="font-size:12px;font-weight:normal;">'.
                    $hngt_city.','.$hngt_state.
                    '<span style="font-size:12px;font-weight:normal;float:right;">
                        <blockquote> '.$comment_2.' </blockquote>  
                    </span>
                            </div>';
            $html .= '      <div style="font-size:12px;font-weight:normal;">
                    <a href="/index.php/home/profile?id='.$hngt_profile_id.'">View Public Profile</a>
                    <span style="font-size:12px;font-weight:normal;float:right;"><blockquote>'.$comment_3.'</blockquote></a>
                            </div>';            
            $html .= '  </div> <br/>';
                        
            $survey_results = SurveyResults::getRatingsPerRaterGroup($rater_group_id);
            $html .= '<div id="pop-up_'.$rater_group_id.'"  class="pop-up">';
            $html .= '<table>';
            foreach($survey_results as $sr){
                $html .= "<tr> <td> {$sr['questions']} </td> <td> {$sr['result']}% </td> </tr>";
            }
            $html .= '</table>';            
            $html .= '</div>';
            
            $html .= '<div class="clear"></div>';
            $html .= '</div>';
            $html .= '</div>';
        }
        $html .= '</div>'; 
//        $html .= '<div style="width:100%;float:left;"> [ <a href="#" id="myPublicHangoutReviews" > Refresh </a> ] ';
//        $html .= '<div class="hr-pattern"></div></div>';
        
        die($html);         
  }
  
  public function executeSurveyDone(sfWebRequest $request) {}
  
  public function executeTakeSurvey(sfWebRequest $request)
  {
      $this->questions = Questions::getSurveyQuestions();
      
      $member = new Member();
      $member->setId($_GET['id']);
      $this->nickName = $member->getMemberInfo('nick_name');
  }
  
  public function executePostExperience(sfWebRequest $request)
  {
      $tmpRequest   = $_REQUEST;
      $ratee        = $tmpRequest['ratee'];
      $posting_id   = $tmpRequest['posting_id'];
      
      unset($tmpRequest['ratee']);
      unset($tmpRequest['posting_id']);
      unset($tmpRequest['submit']);
      
      $questions = Questions::getSurveyQuestions();
      
      $arr_questions = array();
      foreach($questions as $val){
	$arr_questions[$val->getId()] = array(
            'questions'   => $val->getQuestions(),
            'answer_type' => $val->getAnswerType(),
            'is_average'  => $val->getIsAverage()
        );
      }
      
      $surveyComments = array();
      foreach($tmpRequest as $index => $v)
      {
            $replace_string = str_replace("question_","",$index);
            $id = $replace_string;
	  	    
            $answer_type = $arr_questions[$id]['answer_type'];
	  	   
            $value = 0;
            switch($answer_type)
            {
                case 1:
                    $value = $v*20; // per star is eq 20%
                break;   
                case 2:
                    $value = ($v == 1)? 100:0; // yes = 100 and no = 0
                break;
                case 3:
                    $value = addslashes($v);
                    if($id == 5){
                        $surveyComments['comments'] = addslashes($v);
                    }
                break;
            }

            //insert to survey result table.
            $Data = array();
            $Data['participant_id'] = $_SESSION['userId'];
            $Data['ratee'] = $ratee;
            $Data['result'] = $value;
            $Data['question_id'] = $id;
            $Data['posting_id'] = $posting_id;            
            $RatersGroupId = SurveyResults::saveResults($Data);
           
      }
      
      if($RatersGroupId !== FALSE){          
        $surveyComments['member_id'] = $_SESSION['userId'];
        $surveyComments['rater_group_id'] = $RatersGroupId;        
        SurveyComments::saveComments($surveyComments);
      }
      
      $member = new Member();
      $member->setId($ratee);
      $to = $member->getMemberInfo('nick_name');
      $recipient = $member->getMemberInfo('email');
      
      $member->setId($_SESSION['userId']);
      $from = $member->getMemberInfo('nick_name');

      $body = '<div style="font-family:tahoma;font-size:12px;">
                Hi <b>'.$to.'</b>,
                <br/>
                <p>
                    <b> '.$from.' </b> has rated your recent HangOut Today Experience.  Log in now and leave your response.
                </p>

                <blockqoute>
                    <div>
                    Go to your Account and Click <b>Rate HangOut</b>
                    By not leaving a response from <b> '.$from.' </b> from your HangOut together, you will not be able to create or reply to any new posts.
                    <br/><br/>
                    Log in Now or click the following link <a href="http://hangout.com">HangOutToday.com</a>
                    </div>
                </blockqoute>
                <br/>                    
            </div>';
     
      Requester::updateRequesterSurveyStatus($ratee, $posting_id, $_SESSION['userId']);      
      CustomHangout::email($recipient, $body, 'HangOutToday', 'HangOutToday Notification');      
      $this->redirect("/index.php/home/surveyDone");
  }
  
  public function executeSendFriendRequest(sfWebRequest $request)
  {
      $rater_group_id = $_POST['rater_group_id'];
      $q  = Doctrine::getTable('RatersGroup')->findOneBy("id", $rater_group_id);
      
      $q1 = Doctrine::getTable('Member')->findOneBy("id", $q->rater);
      $q2 = Doctrine::getTable('Member')->findOneBy("id", $q->ratee);
      
      
      $body = '<div style="font-family:tahoma;font-size:12px;">
                Hi <b>'.$q2->nick_name.'</b>,
                <br/>
                <p>
                    <b> '.$q1->nick_name.' </b> would like to add you as a friend.
                </p>

                <blockqoute>
                    <div>
                    Log in Now to start hanging out with '.$q1->nick_name.'.
                    </div>
                </blockqoute>
                <br/>                    
            </div>';
      
      
      
      Friendship::addFriend($rater_group_id);
      
      $recipient = $q2->email;
      CustomHangout::email($recipient, $body, 'HangOutToday', 'HangOutToday Notification');   
      die();
  }
  
  public function executeSendFinalReply(sfWebRequest $request)
  {
      SurveyComments::saveComments($_REQUEST);
  }
  
  public function executePublicHangoutReview(sfWebRequest $request)
  {
     if(!isset($_GET['id'])){
            die('Sorry! page cannot be found.');
        }
        
        $profileId = $_GET['id'];
        
        $Member  = new Member();
        $Member->setId($profileId);
        $memberId = $Member->getMemberInfo('id');
        $gender   = $Member->getMemberInfo('gender');
        $profilePictureId = $Member->getMemberInfo('profile_picture_id');

        
        $Photo = new Photo();
        $this->path = $Photo->getPicturePath($profilePictureId);
        
        $this->photos = array();
        $this->photos = $Photo->getPhotos($memberId);

        if(empty($this->path)){
            $pictureName = (strtolower($gender) == 'f')? 'female.jpg':'male.png';
            $this->path = "images/$pictureName";
        }
        
        $this->userId = $memberId;
  }
  
  public function executeFriendRequest(sfWebRequest $request) 
  {
        $userId = $_SESSION['userId'];
	 try{
            $sql = "SELECT member.*, photo.path FROM `member` join photo on member.profile_picture_id = photo.id where member.id=$userId";
            $st = $this->conn->execute($sql);
            $result = $st->fetchAll(); 

            $this->myAccount = array();
            $this->myAccount['path'] = $result[0]['path'];
            $this->myAccount['profile_id'] = $result[0]['profile_id'];
            
            $userId = $_SESSION['userId'];
            $this->result = Friendship::getFriendRequests($userId);
	 }catch(Exception $e){
            die($e->getMessage());	 
	 }      
  }
  
  public function executeGetFriendRequests(sfWebRequest $request)
  {
      $userId = $_SESSION['userId'];
      $result = Friendship::getFriendRequests($userId);
            
      $html  = '<div style="font-size:12px;">';
      $html .= (count($result) > 0)? '<ul>':'<span style="color:gray;font-weight:bold;">No friend request found.</span>';
      foreach($result as $v)
      {
        $html .= '
            <li>
            <span class="profilePic left">
                <img src="/'.$v['path'].'" alt="" class="left"  height="45" width="45" />
            </span>';            
        if($v['friendship_status_id'] == 1){
            $html .= '<p>
                        <a href="/index.php/home/profile?id='.$v['profile_id'].'"><b>'.$v['nick_name'].'</b></a><br/>
                        <span class="social-link"><a href="#" id="request_stat" name="approve_'.$v['friendship_id'].'">Approve </a></span> |
                        <span class="social-link"><a href="#" id="request_stat" name="ignore_'.$v['friendship_id'].'">Deny</a></span>
                     </p>';	
        } else {
            $html .= '<p>
                        <a href="/index.php/home/profile?id='.$v['profile_id'].'"><b>'.$v['nick_name'].'</b></a><br/>
                        <span class="social-link">'.$v['friendship_status'].'</span>
                     </p>';
        }
        $html .= '</li>';
      }
      $html .= '</div>';
      $html .= '<br/>';
//      $html .= '<div style="width:100%;float:left;font-size:12px;"> [ <a href="#" id="GetFriendRequests" > Refresh </a> ] ';
//      $html .= '<div class="hr-pattern"></div></div>';
      die($html);
  }
  
  public function executeUpdateRequestStatus(sfWebRequest $request)
  {
      $userId = $_SESSION['userId'];
      $stat   = $_POST['stat'];
      $friendship_id = $_POST['friendship_id'];
      
      Friendship::updateRequestStatus($stat, $friendship_id);
      
      $q1 = Doctrine::getTable('Friendship')->findOneBy("id", $friendship_id);
      $q2 = Doctrine::getTable('Member')->findOneBy("id", $q1->member_id);
      $q3 = Doctrine::getTable('Member')->findOneBy("id", $userId);
      
      if($stat == 2)
      {
        $body = '<div style="font-family:tahoma;font-size:12px;">
                    Hi <b>'.$q2->nick_name.'</b>,
                    <br/>
                    <p>
                        <b> '.$q3->nick_name.' </b> has added you as their friend!
                    </p>

                    <blockqoute>
                        <div>
                        You can log onto your account and send messages to each other at any time.
                        </div>
                    </blockqoute>
                    <br/>                    
                </div>';
      }
      else
      {
        $body = '<div style="font-family:tahoma;font-size:12px;">
                    Hi <b>'.$q2->nick_name.'</b>,
                    <br/>
                    <p>
                        <b> '.$q3->nick_name.' </b> has decided not to add you as their friend at this time.
                    </p>

                    <blockqoute>
                        <div>
                        Don’t let that discourage you.  Log onto your account and respond to or create your own postings and meet a new friend today.
                        </div>
                    </blockqoute>
                    <br/>                    
                </div>';          
      }
      
      $recipient = $q2->email;
      CustomHangout::email($recipient, $body, 'HangOutToday', 'HangOutToday Notification');   
      die();
  }
  
  public function executeGetCountry(sfWebRequest $request)
  {      
      $q = 'SELECT * FROM country_list ORDER BY country_name;';
      $result = $this->conn->fetchAll($q);
      
      $country_list = array();
      foreach($result as $v)
      {         
         $country_list[] = array('code'=>$v['id'], 'name'=>$v['country_name'], 'is_country' => ($_SESSION['country'] == $v['country_name'])? true:false);
      }
      
      die(json_encode($country_list));
  }
  
  public function executeGetStates(sfWebRequest $request)
  {      
      $q = "select * from fips_regions where code = '{$_SESSION['state']}' limit 1";
      $result = $this->conn->fetchAll($q);
      
      $country_list = array();
      foreach($result as $v)
      {         
         $country_list[] = array('code'=>$v['id'], 'name'=>$v['name']);
      }
      
      die(json_encode($country_list));
  }  
  
  public function executeGetFipRegions(sfWebRequest $request)
  {
      $q = 'select * from fips_regions where code in (17,21,18,39,47) order by name;';
      $result = $this->conn->fetchAll($q);
      
      $fips_regions = array();
      foreach($result as $v)
      {
         $fips_regions[] = array('code'=>$v['code'], 'name'=>$v['name']);
      }
      
      die(json_encode($fips_regions));
  }
  
  public function executeGetCitiesByState(sfWebRequest $request)
  {
      $state_id = trim($request->getParameter('state_id_'));
      $q = empty($state_id)? '':"where fips_regions = '$state_id'";
      $q = "select distinct city from zipcodes $q order by city;";
      
      $result = $this->conn->fetchAll($q);
      
      $cities = array();
      foreach($result as $v)
      {
         $cities[] = array('code'=>strtolower($v['city']), 'name'=>$v['city']);
      }
      
      die(json_encode($cities));
  }  
  
  public function executeGetZipcodesByCity(sfWebRequest $request)
  {
      $city = trim($request->getParameter('city_'));
      $q = empty($city) || $city == 'undefined'? '':"where lower(city) = '$city'";
      $q = "select distinct zipcode from zipcodes $q order by zipcode;";
      $result = $this->conn->fetchAll($q);
      
      $cities = array();
      foreach($result as $v)
      {
         $cities[] = array('code'=>strtolower($v['zipcode']), 'name'=>$v['zipcode']);
      }
      
      die(json_encode($cities));
  }  
  
  public function executeCheckDocVr(sfWebRequest $request)
  {
      //echo Doctrine::VERSION;
      //echo (2 & 1)? 'odd':'even';
      //Doctrine_Query::
      echo uniqid('_');
      die();
  }
  
  public function executeLoadProfileChoices(sfWebRequest $request)
  {
      $profile_id = $request->getParameter('id');
      
      $q = "SELECT * FROM profile_choice WHERE profile_id = $profile_id ORDER BY order_number";
      $rs = $this->conn->fetchAll($q);
      
      $choices = array();
      foreach($rs as $v)
      {
         $choices[] = array('code'=>$v['id'], 'name'=>ucwords($v['choice_name']));
      }
      
      die(json_encode($choices));
  }
  
  public function executeGetDropdownFields(sfWebRequest $request)
  {
      $q = "SELECT * FROM `profile` WHERE `profile_input_type_id` = 4 ORDER BY order_number";
      $rs = $this->conn->fetchAll($q);
      
      $choices = array();
      foreach($rs as $v)
      {
         $choices[] = array('code'=>$v['id'], 'name'=>$v['name']);
      }
      
      die(json_encode($choices));
  }
}

