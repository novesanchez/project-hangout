<?php


	class CustomHangout {
		
		public $conn = null;
		static $Hangout = null;
		
		public function __construct(){            
			$this->conn = Doctrine_Manager::getInstance()->connection();	
		}
		
		public static function getInstance(){
			if(self::$Hangout == null){
				self::$Hangout = new Hangout();	
			}
			return self::$Hangout;
		}
			
		public static function email($recipient,$msg,$from,$subj,$embeddedImg = ''){
                    
                    try{
                        $mail = new PHPMailer(true);
                        $mail->From       = "nove.sanchez@gmail.com";
                        $mail->FromName   = "$from"; 
                        $mail->Subject    = "$subj";   
                        
                        $mail->IsSendmail();
                        
                        
                        $mail->IsSMTP();      
//                        $mail->SMTPAuth   = true;
//                        $mail->Host    = 'smtp.gmail.com';
//                        $mail->SMTPSecure = "ssl";  
//                        $mail->Port    = 465;  
//                        $mail->Username  = "nove.sanchez@gmail.com";
//                        $mail->Password = "s0ftwar319871129";
//                        $mail->SMTPDebug = 2;
                        
                        $mail->isHTML(true);
                        if(!empty($embeddedImg)){
                            $baseName = pathinfo($embeddedImg);
                            $mail->AddEmbeddedImage("$embeddedImg", 'memberimg', $baseName['basename']);                              
                        }
                        $mail->MsgHTML($msg);
                        $mail->AddAddress($recipient); 
//                        $mail->Send();
                        if($mail->Send()){
                            return true;
                        } else {
                            return $mail->ErrorInfo;
                        }                        
                    }catch(phpmailerException $e){
                        die($e->errorMessage());
                    }catch(Exception  $e){
                        die($e->getMessage());
                    }
                    
                }
                
//                public static function email($recipient,$msg,$from,$subj,$embeddedImg = ''){
//                    
//                    $mail = new PHPMailer();
//                    $mail->From       = "official_hangout@novarsoft.comuf.com";
//                    $mail->FromName   = "$from"; 
//                    $mail->Subject    = "$subj";   
//
//                    $mail->IsSMTP();      
//                    $mail->SMTPAuth   = true;
//
//                    $mail->Host    = 'localhost';
//                    $mail->SMTPSecure = "ssl";  
//                    $mail->Port    = 465;  
//                    $mail->Username  = "official_hangout@novarsoft.comuf.com";
//                    $mail->Password = "s0ftwar3";
//                    
//                    $mail->isHTML(true);
//                    if(!empty($embeddedImg)){
//                        $baseName = pathinfo($embeddedImg);
//                        $mail->AddEmbeddedImage("$embeddedImg", 'memberimg', $baseName['basename']);                              
//                    }
//                    $mail->MsgHTML($msg);
//                    $mail->AddAddress($recipient); 
//                    
//                    if($mail->Send())
//                        return true;
//                    else 
//                        return false;
//                    
//                }
                
                //alert the user who added a posting to their hotlist before the posting_enddt 6/12 hours or 1 day
                public static function alert001() 
                {
                    $conn = Doctrine_Manager::getInstance()->connection();	
                    $q = "SELECT
                            m1.nick_name,
                            p.gender_type,
                            p.date_to_hangout,
                            p.num_ppl,
                            p.age_range_1,
                            p.age_range_2,
                            p.starttime,
                            p.endtime,
                            p.posting_title,
                            p.posting_desc,
                            m2.nick_name as respondent,
                            m2.email
                          FROM postings p
                          JOIN hot_list h ON p.id = h.posting_id
                          JOIN member m1 ON p.member_id = m1.id
                          JOIN member m2 ON h.member_id = m2.id
                          WHERE p.status = 1 AND p.posting_enddt = '".date("Y-m-d H:i")."';";
                    $result = $conn->execute($q)->fetchAll();
                    
                    foreach($result as $v)
                    {
                        $Body = '
                                <div style="font-family:tahoma;font-size:12px;">
                                    Hi <b>'.$v['respondent'].'</b>,
                                    <br/>
                                    <p>
                                       Please be informed that the posting of '.$v['nick_name'].' with posting title '.$v['posting_title'].' is about to end. 
                                    </p>
                                    <br/>
                                    Thank you
                                    <br/>                    
                                </div>';
                        
                        $response = CustomHangout::email($v['email'], $Body, 'HangOutToday', 'HangOutToday Notification');
                    }
                }
		
                /*
                an email will be sent to members who added a posting to their hotlist 
                that the owner of the posting has created a new posting.
                */
                public static function alert002($member_id, $posting_id)
                {
                    $conn = Doctrine_Manager::getInstance()->connection();	
                    $q = "SELECT
                            m1.nick_name as recipient_nick_name, 
                            m1.email as recipient_email,
                            m2.nick_name
                          FROM postings p
                          JOIN hot_list h on p.id = h.posting_id
                          JOIN member m1 on h.member_id = m1.id 
                          JOIN member m2 on p.member_id = m2.id
                          WHERE
                            p.member_id = $member_id;";
                    $result = $conn->execute($q)->fetchAll();
                    
                    foreach($result as $v)
                    {
                        $Body = '
                                <div style="font-family:tahoma;font-size:12px;">
                                    Hi <b>'.$v['recipient_nick_name'].'</b>,
                                    <br/>
                                    <p>
                                       Please be informed that '.$v['nick_name'].' has created another posting. <a href="http://hangout.com/?viewposting='.$posting_id.'">View Posting</a>
                                       <br/><br/>    
                                       <span style="color:gray;font-size:11px;">*Note: You are receiving this email notification because you added '.$v['nick_name'].' in your hot list.</span>
                                    </p>                                    
                                    Thank you
                                    <br/>                    
                                </div>';
                        
                        $response = CustomHangout::email($v['recipient_email'], $Body, 'HangOutToday', 'HangOutToday Notification');
                    }
                }
                
                public static function checkUserLogin($member_id)
                {
                    $conn = Doctrine_Manager::getInstance()->connection();
                    $member_filter = is_array($member_id)? implode(',', $member_id) : $member_id;
                    $q = "SELECT 
                            member_id, max(last_login) 
                          FROM member_login_trail 
                          WHERE status = 1 AND member_id IN ($member_filter)
                          GROUP BY member_id;";
                    $result = $conn->execute($q)->fetchAll();
                    return $result;
                }
                
                public static function calculateRemainingDays($date, $appendText = '')
                {
                        $remaining = $date - time();

                        $days_remaining    = floor($remaining / 86400);
                        $hours_remaining   = floor(($remaining % 86400) / 3600);
                        $minutes_remaining = floor(($remaining % 3600) / 60);

                        $remaining = array();
                        if($days_remaining > 0){
                            $x = ($days_remaining > 1)? "days":"day";
                            $remaining[] =  "$days_remaining $x";
                        }

                        if($hours_remaining > 0){
                            $x = ($hours_remaining > 1)? "hours":"hour";
                            $remaining[] =  "$hours_remaining $x";
                        }

                        if($minutes_remaining > 0){
                            $x = ($minutes_remaining > 1)? "minutes":"minute";
                            $remaining[] =  "$minutes_remaining $x";
                        }

                        $remaining = implode(' and ', $remaining);
                        $remaining .= " $appendText";

                        return $remaining;
                }
	}

	
?>