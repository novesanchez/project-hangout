<?php

/**
 * postings actions.
 *
 * @package    sf_sandbox
 * @subpackage postings
 * @author     Nove Sanchez
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class postingsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
    
  public function preExecute()
  {        
        if(!isset($_SESSION['userId']))
            $this->redirect('http://hangout.com');
        
	 $this->conn = Doctrine_Manager::getInstance()->connection();		  
  } 
  
  public function executeIndex(sfWebRequest $request)
  {
//        $sql = "select * from country_list";
//        $st = $this->conn->execute($sql);
//        $result = $st->fetchAll(); 

        $result = CountryList::getCountries();
      
        $this->countries = array();
        foreach($result as $rec)
        {
            $this->countries[$rec->getId()] = $rec->getCountryName();
        }

        //sort by entries
        $this->sort_by = array();
        $this->sort_by[] = "Postings Ending First";
        $this->sort_by[] = "Distance";
        $this->sort_by[] = "Age Range All";
        $this->sort_by[] = "Age Range Male";
        $this->sort_by[] = "Age Range Female";
        $this->sort_by[] = "Gender Male";
        $this->sort_by[] = "Gender Female";

        $this->post_id = $request->getParameter('id');
        $this->page = $request->getParameter('page');
        $this->sortby = $request->getParameter('sort_by');

        $this->setLayout('new_layout');
  }
     
  public function executeSearch(sfWebRequest $request)
  {
      $sortBy  = $_REQUEST['sortBy'];
      $userId  = $_SESSION['userId'];
      $post_id = $_REQUEST['id'];
      $page = $_GET['page'];
      
      $subSQL   = "";
      $subSQL_4 = "";
      $orderBy  = "ORDER BY cast(p.posting_enddt as datetime), p.date_to_hangout desc";
      
      $start   = empty($_REQUEST['start'])? 0:(isset($_REQUEST['page'])? $_REQUEST['page']:$_REQUEST['start']);
      $limit   = empty($_REQUEST['limit'])? 5:$_REQUEST['limit'];;

      switch($sortBy)
      {
          case 1:
              $subSQL_4 = '';//"WHERE (SELECT age FROM member WHERE id = $userId) BETWEEN p.age_range_1 AND p.age_range_2";
              break;
          case 2:
              $subSQL_4 = "WHERE (SELECT age FROM member WHERE id = $userId) BETWEEN p.age_range_1 AND p.age_range_2";
              break;
          case 3:
              $subSQL_4 = "WHERE 
                            (SELECT age FROM member where id = $userId) BETWEEN p.age_range_1 AND p.age_range_2
                            AND m.gender = 'm'";
              break;
          case 4:
              $subSQL_4 = "WHERE 
                            (SELECT age FROM member where id = $userId) BETWEEN p.age_range_1 AND p.age_range_2
                            AND m.gender = 'f'";
              break;
          case 5:
              $subSQL_4 = "WHERE m.gender in ('m')";
              break;
          case 6:
               $subSQL_4 = "WHERE m.gender in ('f')";
               break;
      }    
      
      if(!empty($subSQL_4))
      {
          $subSQL = $subSQL_4;
          if(isset($_REQUEST['country']))
             // $subSQL .= " AND m.country LIKE '%".addslashes($_GET['country'])."%'";
          if(isset($_REQUEST['city']))
              $subSQL .= " AND lower(m.city) LIKE '%".addslashes(strtolower($_REQUEST['city']))."%'";
          if(isset ($_REQUEST['zipcode']))
              $subSQL .= " AND m.zip_code = '".addslashes($_REQUEST['zipcode'])."'";
          if(isset ($_REQUEST['state']))
              $subSQL .= " AND m.state = '".addslashes($_REQUEST['state'])."'";
      }
      else
      {
          $tmp = array();
          if(isset($_REQUEST['city'])) $tmp[] = " lower(m.city) LIKE '%".addslashes(strtolower($_REQUEST['city']))."%'";
          if(isset($_REQUEST['zipcode'])) $tmp[] = " m.zip_code = '".addslashes($_REQUEST['zipcode'])."'";
          if(isset($_REQUEST['state'])) $tmp[] = " m.state = '".addslashes($_REQUEST['state'])."'";
          $subSQL .= count($tmp) > 0? ' WHERE '.implode(" AND ", $tmp) : '';
      }
      
      if(empty($subSQL)){
          $subSQL = " WHERE p.status = 1 AND posting_enddt >= CURRENT_TIMESTAMP 
              AND p.num_ppl > (SELECT count(*) FROM requester WHERE posting_id = p.id AND request_status_id = 4)";
      } else {
          $subSQL .= " AND p.status = 1 AND posting_enddt >= CURRENT_TIMESTAMP 
              AND p.num_ppl > (SELECT count(*) FROM requester WHERE posting_id = p.id AND request_status_id = 4)";
      }
      
        //retrieve all postings based on search criteria
        $sql = "SELECT 
                    m.username, 
                    CASE
                        WHEN p.gender_type = 'm' THEN 'Male'
                        WHEN p.gender_type = 'f' THEN 'Female'
                    ELSE 'Any'
                    END AS gender, 
                    date_to_hangout, 
                    num_ppl,
                    age_range_1, 
                    age_range_2, 
                    starttime, 
                    p.id as posting_id,
                    endtime, 
                    posting_title, 
                    posting_desc, 
                    ph.path, 
                    posting_enddt,
                    m.zip_code,
                    (SELECT count(*) FROM requester WHERE posting_id = p.id AND request_status_id = 4) as total_requesters,
                    ( SELECT latitude FROM zipcodes WHERE zipcode = m.zip_code limit 1) as latitude,
                    ( SELECT longitude FROM zipcodes WHERE zipcode = m.zip_code limit 1) as longitude,
                    ( SELECT city FROM zipcodes WHERE zipcode = m.zip_code limit 1) as city,
                    ( SELECT state FROM zipcodes WHERE zipcode = m.zip_code limit 1) as state
                FROM `postings` p
                JOIN member m ON p.member_id = m.id
                LEFT JOIN photo ph ON m.profile_picture_id = ph.id $subSQL $orderBy";
       
        
        try{
            $st = $this->conn->execute($sql);
            $result = $st->fetchAll();
         
            $total_count = count($result);
            $total_page  = $total_count/$limit;
            $total_page  = is_int($total_page)? $total_page:(integer)$total_page + 1;
            
            $sliced_data = array_slice($result, $start, $limit);
            
            $q = "SELECT 
                zip_code,  
                (SELECT latitude FROM zipcodes WHERE zipcode = zip_code limit 1) AS latitude,
                (SELECT longitude FROM zipcodes WHERE zipcode = zip_code limit 1) AS longitude
              FROM member WHERE id = {$_SESSION['userId']}";
            $user_result = $this->conn->fetchAll($q);
        }catch(Exception $e){
            die($e->getMessage());
        }
      
        $postings = array();
	$postings_nonzero_dist = array();
        $postings_zero_dist    = array();
	foreach($sliced_data as $val)
	{           
            $distance = $this->calculateDistance($user_result[0]['latitude'], $user_result[0]['longitude'], $val['latitude'], $val['longitude'], 'M');
            if(isset($_REQUEST['miles']) && is_numeric($_REQUEST['miles']) && ($distance > $_REQUEST['miles']))
            {
                continue;
            }
            
            
            if($distance == 0)
            {
                $postings_zero_dist[$val['posting_id']] = $distance;
            }
            else
            {
                $postings_nonzero_dist[$val['posting_id']] = $distance;
            }
            
            $postings[$val['posting_id']] = $distance;
	}	
          
        
            
        if($sortBy == 1 || (isset($_REQUEST['miles']) && !empty($_REQUEST['miles'])))
        {
            asort($postings_nonzero_dist);//sort starting from nearest distance in miles
            $postings = array();
            $tmpArray = array();
            $tmpArray[] = $postings_zero_dist;
            $tmpArray[] = $postings_nonzero_dist;
            
            foreach($tmpArray as $postings_arr){
                foreach($postings_arr as $i => $val){
                    $postings[$i] = $val;
                }
            }
        }
        
        if(empty($postings))  
        {
            $element = "<h5> No results found.</h5>";
            sleep(3);
            die($element);
        }
        
        foreach($sliced_data as $x => $val)
	{ 
            if(!array_key_exists($val['posting_id'], $postings)) continue;
            
            $val['distance'] = $postings[$val['posting_id']];
            $postings[$val['posting_id']] = $val;
        }        
        
        if($sortBy == 1 || (isset($_REQUEST['miles']) && !empty($_REQUEST['miles'])))
        {
            $tmpArray = array();
            foreach($postings as $posting_id => $val)
            {
                $tmpArray[$val['distance']][$val['posting_enddt']][] = $val;
                ksort($tmpArray[$val['distance']]);
            }
            
            $postings = array();
            foreach($tmpArray as $distance => $val)
            {
                foreach($val as $posting_enddt => $v)
                {
                    foreach($v as $x)
                    {
                        $postings[$x['posting_id']] = $x;
                    }
                }
            }
        }
        
//        $element = '<ul id="portfolio">';
//        foreach($postings as $val)
//        {
//            $date = strtotime($val['posting_enddt']);
//            $remaining = CustomHangout::calculateRemainingDays($date, 'left');
//
//            $element .= '<li class="cms integration portfolio_one_column grid_12 alpha tabProfileBox" >';	
//            $element .= '<div class="featured-image image-fade grid_5 alpha" style="width:200px!important;">							
//                            <a class="portfolio" href="/'.$val['path'].'">
//                            <img height=155 width = "211" alt="'.$val['username'].'" src="/'.$val['path'].'" />
//                            </a>
//                        </div>';
//            $element .= '<div class="portfolio-page-meta grid_4" style="width:435px!important;height:152px;border:0px solid;">';
//            $element .= '<h5 class="portfolio-title"><div id="post_'.$val['posting_id'].'" style="font-weight:bold;">'.$val['posting_title'].'</div></h5>'. '<span style="color:red;font-weight:bold;">*</span>'.$remaining;
//            $element .= '<div class="hr-pattern" ></div>';
//
//            $element .= '<div class="portfolio-excerpt" style="font-weight:bold;" id="post-blockquote">';
//            //$element .= '<blockquote>'.substr($val['posting_desc'],0,200).'<a class="read-more" href="/index.php/postings/post?id='.$val['posting_id'].'&sort_by='.$sortBy.'&page='.($start).'" >&nbsp; View Posting &rarr;</a> </blockquote>';
//            $element .= '<blockquote>'.substr($val['posting_desc'],0,200).'<a class="read-more" href="/index.php/postings/post/id/'.$val['posting_id'].'/sort_by/'.$sortBy.'/page/'.($start).'" >&nbsp; View Posting &rarr;</a> </blockquote>';
//            $element .= '</div>';
//            $element .= '</div>';		
//
//            $element .= '<div class="grid_3 omega" style="float:right;width:265px!important;">';            
//            $element .= '<div style="margin-top:29px;font-weight:bold;"> More Details </div>';
//            $element .= '<div class="hr-pattern" ></div>';
//
//            $element .= '<div class=""> <b> HangOut Date: </b> '.date('l, F j, Y', strtotime($val['date_to_hangout'])).' </div>';
//            $element .= '<div class=""> <b> Start & End Time: </b> '.$val['starttime'].' - '.$val['endtime'].' </div>';
//            $element .= '<div class=""> <b> Posting End Date: </b> '.date('l, F j, Y',  strtotime($val['posting_enddt'])).'</div>';	
//            $element .= '<div class=""> <b> Posting End Time: </b> '.date('h:i A',  strtotime($val['posting_enddt'])).' </div>';
//            $element .= '<div class=""> <b> Distance in Miles: </b> '.number_format($val['distance'],2).' Miles</div>';
//            $element .= '<div class=""> <b> Address: </b> '.$val['city'].', '.$val['state'].'</div>';
//            $element .= '</div>';
//
//            $element .= '<div class="clear"></div>';
//            $element .= '</li>';
//        }               
//        
//        $element .= '</ul>';    
        
        $element = "";
        foreach($postings as $val)
        {
            $date = strtotime($val['posting_enddt']);
            $remaining = CustomHangout::calculateRemainingDays($date, '');

            $element .= '<div class="well" style="background-color:#FFF;">';
            $element .= '<div class="media">';            
            $element .= '<div class="media-body">';
            
            #post title
            $element .= '<h4 class="media-heading">'.$val['posting_title'].'</h4>';
            
            #picture of the owner's post
            $element .= '<a class="pull-left" href="#">';
            $element .= '<img class="img-thumbnail" style="height: 100px; width: 100px; margin-right: 5px;" src="/'.$val['path'].'">';
            $element .= '</a>';
            
            #owner's username
            $element .= '<p class="text-right">By: '.$val['username'].'</p>'; 
            
            #post description
            $element .= '<p>'.$val['posting_desc'].'</p>';
            
            #other details
            $element .= '<ul class="list-inline list-unstyled" style="font-size:11px;">';
            
            
            $element .= '<li><span style="font-weight: bold;">Expires in: </span>'.$remaining.'</li>';
            $element .= '<li>|</li>';
            $element .= '<li><span style="font-weight: bold;">Slots Left: </span>'.($val['num_ppl'] - $val['total_requesters']).'</li>';
            $element .= '<li>|</li>';
            $element .= '<li><span style="font-weight: bold;">When: </span>'.date('l, F j, Y', strtotime($val['date_to_hangout']))." ".$val['starttime'].' - '.$val['endtime'].'</li>';
            $element .= '<li>|</li>';
            $element .= '<li><span style="font-weight: bold;">Where: </span>'.$val['city'].', '.$val['state'].'</li>';
            $element .= '<li>|</li>';
            $element .= '<li><span style="font-weight: bold;">Distance in Miles: </span>'.number_format($val['distance'],2).' Miles</li>';
            $element .= '<li>|</li>';
            $element .= '<li><a href="#" style="font-weight: bold;">View Post</a></li>';
            
            $element .= '</ul>';
            #end of other details
            
            $element .='</div></div></div>';
            
        }
        
        $data = array('data'=>$element, 'total_count'=>$total_count,'total_page'=> $total_page, 'post_id'=>$post_id);
        die(json_encode($data));
  }
  
  public function calculateDistance($lat1, $long1, $lat2, $long2, $unit)
  {
      $theta = $long1 - $long2;
      $dist  = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + 
               cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
               cos(deg2rad($theta));
      
      $dist  = acos($dist);
      $dist  = rad2deg($dist);
      $miles = $dist * 60 * 1.1515;
      $unit  = strtoupper($unit);
      
      if($unit == 'K')
      {
          return $miles * 1.609344;
      }
      else if($unit == 'N')
      {
          return $miles * 0.8684;
      }
      else
      {
          return $miles;
      }
  }
  
  public function calculatePostingEndDate($posting_enddt, $starttime, $date_to_hangout)
  {
        $hours = explode($posting_enddt, ' ');
        $hours = str_replace('Hours', '', $posting_enddt);
        $hours = str_replace('hours', '', $hours);
        $hours = str_replace('Day', '', $hours);
        $hours = trim($hours);
        $hours = $hours == 1? 24:$hours;

        $meridiem = 'AM';
        if(stristr($_REQUEST['starttime'], 'AM') === FALSE) {
        $meridiem = 'PM';
        }

        $starttime        = str_replace('AM', '', $starttime);
        $starttime        = str_replace('PM', '', $starttime);
        $dateHangout      = date('Y-m-d', strtotime($date_to_hangout));

        return date('Y-m-d H:i', strtotime($dateHangout.' '.$starttime.' '.$meridiem) + 3600 * (-$hours));
  }
          
  public function executeCreatePosting(sfWebRequest $request)
  {
                
	  $memberId         = $_SESSION['userId'];
	  $genderType       = $request->getParameter('gender');
	  $startdt_hangout  = date("Y-m-d",strtotime($request->getParameter('hngtStartDtTm')));
          $enddt_hangout    = date("Y-m-d",strtotime($request->getParameter('hngtEndDtTm')));
	  $numOfPpl         = $request->getParameter('numPpl');
	  $ageRange_1       = $request->getParameter('ageRange1');;
	  $ageRange_2       = $request->getParameter('ageRange2');;
	  $startTime        = date("h:i A",strtotime($request->getParameter('hngtStartDtTm')));
	  $endTime          = date("h:i A",strtotime($request->getParameter('hngtEndDtTm')));
	  $postingTitle     = mysql_escape_string($request->getParameter('postTitle'));
	  $postingDesc      = mysql_escape_string($request->getParameter('postDesc'));
          $postingEnddt     = $request->getParameter('postingEnddt');
          
	  $sql = "INSERT INTO postings(
                    member_id, 
                    gender_type, 
                    date_to_hangout, 
                    num_ppl, 
                    posting_enddt, 
                    age_range_1,
                    age_range_2, 
                    starttime, 
                    endtime, 
                    posting_title, 
                    posting_desc, 
                    date_created,
                    enddate_hangout
                  )
                  VALUES (
                     $memberId, 
                    '$genderType', 
                    '$startdt_hangout', 
                     $numOfPpl, 
                    '$postingEnddt', 
                     $ageRange_1, 
                     $ageRange_2, 
                    '$startTime', 
                    '$endTime', 
                    '$postingTitle', 
                    '$postingDesc', 
                     now(),
                     '$enddt_hangout'
                  )";
          
          try{
              
 	  	$this->conn->execute($sql);
                $result = $this->conn->execute('SELECT distinct LAST_INSERT_ID() as posting_id FROM postings;')->fetchAll();
                
//              CustomHangout::alert002($memberId, $result[0]['posting_id']);
// 	  	$this->redirect('/index.php/postings/index');
                die(json_encode(array('success' => true, 'posting_id' => $result[0]['posting_id'])));
	  }catch(Exception $e){
		die(json_encode(array('success' => false, 'error' => $e->getMessage())));
	  }
  }
  
  public function executePreview(sfWebRequest $request) 
  {
	  if($_REQUEST['gender_type'] == 'f')
		  $gender = "Female";
	  else if($_REQUEST['gender_type'] == 'm')		 
		  $gender = "Male";
	  else
		  $gender = "Any";	  

	  $this->gender = $gender;
	  $this->ageRange = $_REQUEST['age_range_1']."-".$_REQUEST['age_range_2'];
	  
          $hours = explode($_REQUEST['posting-enddt'], ' ');
          $hours = str_replace('Hours', '', $_REQUEST['posting-enddt']);
          $hours = str_replace('hours', '', $hours);
          $hours = str_replace('Day', '', $hours);
          $hours = trim($hours);
          $hours = $hours == 1? 24:$hours;
         
          $this->startdtHangout = date('l. F d, Y h:i A', strtotime($_REQUEST['hngtStartDtTm_']));
          $this->enddtHangout = date('l. F d, Y h:i A', strtotime($_REQUEST['hngtEndDtTm_']));
          $this->postingEnddt = date('l. F d, Y h:i A', strtotime($_REQUEST['hngtEndDtTm_']) + 3600 * (-$hours));
          $this->postEnddt = date('m/d/Y h:i A', strtotime($_REQUEST['hngtEndDtTm_']) + 3600 * (-$hours));
          
//	  $memberId = $_SESSION['userId'];
// 	  $sql = "SELECT member.*, photo.path FROM `member` join photo on member.profile_picture_id = photo.id where member.id=$memberId";
//	  $st = $this->conn->execute($sql);
//	  $result = $st->fetchAll(); 	  
//	  
//	  $this->picPath = $result[0]['path'];
          
          $this->setLayout('new_layout');
  }
  
  public function executeCreate(sfWebRequest $request) { 
      
       if(!isset($_SESSION['username'])){
        $this->redirect("http://hangout.com");
       }
       
       $this->setLayout('new_layout');
  }  
  
  public function executePost(sfWebRequest $request) { 
          
        $postingId = $request->getParameter('id');
        
        $this->post_id = $request->getParameter('id');
        $this->page = $request->getParameter('page');
        $this->sortby = $request->getParameter('sort_by');
        
        $sql = "SELECT 
                    m.username, m.id as member_id, p.id as posting_id,
                    case
                        when p.gender_type = 'm' then 'Male'
                        when p.gender_type = 'f' then 'Female'
                        else 'Any'
                    end as gender, date_to_hangout, enddate_hangout, num_ppl,
                    age_range_1, age_range_2, concat(age_range_1,' - ',age_range_2) as age_range,
                    starttime, p.id as posting_id,m.email,m.profile_id,
                    endtime, posting_title, posting_desc, ph.path as path,p.posting_enddt
            FROM `postings` p
            join member m on p.member_id = m.id
            left join photo ph on m.profile_picture_id = ph.id where p.id = $postingId";
        $st = $this->conn->execute($sql);
	$this->result = $st->fetchAll(); 	  
                
        $this->session_id = session_id();        
  }
  
  public function executeSetHangout(sfWebRequest $request) {
      
      $memberId     = $_REQUEST['member_id'];
      $postingId    = $_REQUEST['posting_id'];
      $gender       = $_REQUEST['gender'];
      $ageRange_1   = $_REQUEST['age_range_1'];
      $ageRange_2   = $_REQUEST['age_range_2'];
      $email        = $_REQUEST['email'];      
      
      if(!isset($_SESSION['userId']) OR !isset($_REQUEST['posting_id'])){
         $response = "Only Members are able to Respond to Posts.  Join HangOut Today Now! <a href='/login/signUp'> <b> JOIN NOW </b> </a>";
         sleep(2);
         die($response);
      }
      
      if($_SESSION['userId'] == $memberId)
      {
         $response = "You are not allowed to respond to your own posting.";
         sleep(2);
         die($response);
      }
            
      try{
          
        $sql = "SELECT st.id, st.status_code FROM `requester` rq join request_status as st on rq.`request_status_id` = st.id
                where rq.member_id = {$_SESSION['userId']} and rq.posting_id = $postingId";        
        $st = $this->conn->execute($sql);
        $result = $st->fetchAll();  
        
        if(in_array($result[0]['id'],array(1,3,4))){
            $response = "A request has already been sent. <b> STATUS: ".$result[0]['status_code']."</b>";
            sleep(2);
            die($response);
        }
        
        $genderDef = array("f"=>"Female","m"=>"Male","a"=>"Any");
          
        $sql = "select m.gender,m.age,m.username,p.path from member m
                left join photo p on m.profile_picture_id = p.id where m.id = {$_SESSION['userId']}";
        $st = $this->conn->execute($sql);
        $result = $st->fetchAll();
        
        $memberGender = $result[0]['gender'];
        $memberAge = $result[0]['age'];
        $username = $result[0]['username'];
        
        $path = "/".$result[0]['path'];
        if(empty($path)){
            $pictureName = (strtolower($gender) == 'f')? 'female.jpg':'male.png';
            $path = "/images/$pictureName";
        }
        
        
        if(($memberAge < $ageRange_1 OR $memberAge > $ageRange_2) && (strtolower($genderDef[$memberGender]) == strtolower($gender) OR $memberGender == 'a' OR strtolower($gender) == 'any')){            
            $response = "Only Members within the desired age range are able to Respond to this Posting.";            
        }else if(strtolower($genderDef[$memberGender]) <> strtolower($gender) && ( $memberGender <> 'a' && strtolower($gender) <> 'any')){
            $response = "Only Members with the desired gender are able to Respond to this Posting.";
        }else{                   
            $confirmationKey = uniqid();
            $mail = new CustomHangout();
            $msg = "<p>
                        <div> Click on the picture to view her profile</div>
                        <a href='#' alt='$username' title='$username'> <img src='cid:memberimg' style='width:80px;height:80px;'/> </a>

                        <ul style='list-style:none;'>
                            <li> If you want to <b>HangOut</b> with this person Click Here : <a href='http://hangout/postings/UpdateHangout?confirmation_key=$confirmationKey&status=4'> ACCEPT </a> </li>
                            <li> If you do not want to <b>HangOut</b> with this person Click Here : <a href='http://hangout/postings/UpdateHangout?confirmation_key=$confirmationKey&status=3'> DECLINE </a> </li>
                        </ul>

                        <blockqoute>
                            <b> *Disclaimer: </b> By clicking accept you are aware that this member will be added to your email contact lists and be able 
                            to send you emails up until the date and time of your hangout in order to coordinate the specifics.  You are not under any 
                            obligation to HangOut with this member if you decide to change your mind. Safety first, fun second.  Always.
                        </blockqoute>                
                    </p>";
           
            $subject = "$username replied to your post and wants to HangOut with you";
            $r = $mail->email($email, $msg, $username, $subject,$path);
          
            $response = "";
            if(!$r){
               $response = "Unable to send request. Please try again.";                
            }else{                
               $response = "HangOut Request has been Sent.  Be sure to check your HangOut Today e-mail for a response.";
               $sql = "insert into requester(member_id,posting_id,confirmation_key) values({$_SESSION['userId']},$postingId,'$confirmationKey');";
               $st = $this->conn->execute($sql);
            }
            
        }
      }catch(Exception $e){
          $response = "Unable to process request. Please try again.";
          
      }
      
      sleep(2);
      die($response);
  }
  
  public function executeUpdateHangout(sfWebRequest $request){
  
      if(empty($_GET['confirmation_key']) OR !isset($_GET['confirmation_key'])){
          die('No confirmation key found.');
      }
      
      if(empty($_GET['status']) OR !isset($_GET['status'])){
          die('No status found.');
      }else if(!in_array($_GET['status'],array(3,4))){
          die('Invalid status found.');
      }
      
      $Requester = new Requester();
      $q = $Requester->updateHangoutRequest($_GET['status'], $_GET['confirmation_key']);
      
      try{
      if($q){
        list($total,$postingId) = $Requester->getTotalHangoutRequest($_GET['confirmation_key']);
        
        if(!is_null($postingId)){
            $Postings = new Postings();
            $totalNumPpl = $Postings->getPostingDetails($postingId);
            if($total == $totalNumPpl){
                //update posting to complete
                //$Postings->setPostingToComplete($postingId);
                
                //next
                //send email alerts to requesters with status awaiting that the postings is now complete
            }
        }
        
        die('Hangout request is now accepted');    
      }else{
        die("Can't update hangout request.");      
      }
      }catch(Exception $e){
          die($e->getMessage());
      }
  }
  
  public function executeAddToHotList(sfWebRequest $request)
  {
      if(!isset($_SESSION['userId'])){
          
          $return = "<span style='text-align:center;'><p>Only Members are able add Postings to their HOT List. <br/>";
          $return .= "Join HangOut Today Now! <br/>";
          $return .= "JOIN NOW! </p> </span>";          
          die($return);
          
      } else {
          
          $params = array();
          $params[0] = $request->getParameter('posting_id');
          $params[1] = $_SESSION['userId'];
          
          $result = Postings::getPostingInfo($params[0]);
          $member_id = $result->member_id;
            
          if($_SESSION['userId'] == $member_id)
          {
            $response = "You are not allowed to add yourself to hotlist.";
            sleep(2);
            die($response);
          }
            
          list($returnMessage, $response) = HotList::addToHotList($params);
          
          if($response)
          {
            
            $Member = new Member();
            $Member->setId($member_id);
            $to = $Member->getMemberInfo('nick_name');
            $recipient = $Member->getMemberInfo('email');          

            $Member->setId($_SESSION['userId']);
            $from   = $Member->getMemberInfo('nick_name');
            $gender = $Member->getMemberInfo('gender');
            $gender = ($gender == 'f')? 'her':'his';

            $posting_title = $result->posting_title;

            $body = '
                    <div style="font-family:tahoma;font-size:12px;">
                        Hi <b>'.$to.'</b>,
                        <br/>
                        <p>
                            <b> '.$from.' </b> has added your posting "<b>'.$posting_title.'</b>" on '.$gender.' hot list. From now on, '.$from.' will receive
                                any updates and changes you made on the posting.
                        </p>
                        <br/>
                        Thank you
                        <br/>                    
                    </div>';
            CustomHangout::email($recipient, $body, 'HangOutToday', 'HangOutToday Notification');
          }
          
          die($returnMessage);
          
      }
  }
  
  public function executeEdit(sfWebRequest $request)
  {
      if(!isset($_GET['id']) || empty($_GET['id'])){
          $this->redirect('/home/index');
      }
      
      $posting_id = $_GET['id'];      
      $this->post = Postings::getPostingInfo($posting_id);    
      
      $this->hangout_startdt = date('m/d/Y h:i A', strtotime($this->post->date_to_hangout." ".$this->post->starttime));
      $this->hangout_enddt = date('m/d/Y h:i A', strtotime($this->post->enddate_hangout." ".$this->post->endtime));
      
      $this->setLayout('new_layout');
  }
  
  public function executeSaveChanges(sfWebRequest $request)
  {

      try{
          
         $q = Postings::getPostingInfo($_REQUEST['posting_id']);
         
         $q->gender_type        = $_REQUEST['gender_type'];
         $q->date_to_hangout    = date("Y-m-d", strtotime($_REQUEST['startdt_hangout']));
         $q->num_ppl            = $_REQUEST['num_ppl'];
         $q->posting_enddt      = $this->calculatePostingEndDate($_REQUEST['posting_enddt'], $_REQUEST['starttime'], $_REQUEST['startdt_hangout']);
         $q->age_range_1        = $_REQUEST['age_range_1'];
         $q->age_range_2        = $_REQUEST['age_range_2'];
         $q->starttime          = $_REQUEST['starttime'];
         $q->endtime            = $_REQUEST['endtime'];
         $q->posting_title      = $_REQUEST['posting_title'];
         $q->posting_desc       = $_REQUEST['posting_desc'];         
         $q->enddate_hangout    = date("Y-m-d", strtotime($_REQUEST['enddt_hangout']));        
         $q->save();
         
         $hotlistMembers = HotList::getHotListMembers($_REQUEST['posting_id'], $_SESSION['userId']);    
         $Member = new Member();
         $Member->setId($_SESSION['userId']);
         $nick_name = $Member->getMemberInfo('nick_name');
         
         foreach ($hotlistMembers as $v)
         {             
             $body = '
                    <div style="font-family:tahoma;font-size:12px;">
                        Hi <b>'.$v->getMember()->getNickName().'</b>,
                        <br/><br/>
                        <p>
                            <b> '.$nick_name.' </b> has made some changes on a post with title "<b>'.$v->getPostings()->getPostingTitle().'</b>".
                        </p>
                        <br/>
                        Thank you
                        <br/>                    
                    </div>';
            CustomHangout::email($v->getMember()->getEmail(), $body, 'HangOutToday', 'HangOutToday Notification');
         }
         
         die(true);
      } catch(Exception $e) {
         die(false);
      }
      
  }
  
  public function executePostPosting(sfWebRequest $request)
  {
      $this->redirect("/postings/index");
  }
  
  public function executeDeletePost(sfWebRequest $request)
  {
      $posting_id = $request->getParameter('posting_id');
     
      if(Requester::deleteRequester($posting_id))
      {
          die(Postings::deletePosting($posting_id));
      }
      else
      {
          die('Error in deleting a post. Please try again later!');
      }
  }
  
  public function executeGetListOfPostings(sfWebRequest $request)
  {
      $postings = new Postings();
      $posts = $postings->getAllPostings($_SESSION['userId']);
      
      $html = "<ul>";
      foreach($posts as $v)
      {
        $html .= '<li>
                    <span style="font-size:12px;">
                        '.$v->getPostingTitle().'
                        <blockquote>'.$v->getPostingDesc().'</blockqoute>
                    </span>
                    <br/>
                    <span style="font-weight:bold;">
                        <a href="/index.php/postings/edit?id='.$v->getId().'">Edit</a> | <a id="del-post" name="'.$v->getId().'" href="#">Delete</a>
                        <span style="color:#FB9601;display:none;" id="del-post-conf-'.$v->getId().'">Are you sure want to delete the selected post? ( <a id="opt-yes" name="opt-yes-'.$v->getId().'" href="#">Yes</a> | <a id="opt-no" name="opt-no-'.$v->getId().'" href="#">No</a> )</span>
                        <br/><span style="color:#FB9601;display:block;" id="resp-msg-'.$v->getId().'"></span>
                    </span>
                    </li>';
      }
      $html .= "</ul>";
      die($html);
  }
}


