<?php
header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header('Pragma: no-cache');
/**
 * messenger actions.
 *
 * @package    sf_sandbox
 * @subpackage messenger
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class messengerActions extends sfActions
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
      $result = Requester::getChatMessengerDetails($_SESSION['userId']);
  }

  public function executeGetRequesters(sfWebRequest $request)
  {
      $result = Requester::getChatMessengerDetails($_SESSION['userId']);

      $requester  = array();
      $member_ids = array();
      foreach($result as $v)
      {
          if($v['requester_id'] != $_SESSION['userId']){
            $member_ids[$v['posting_id']][] = $v['requester_id'];
          }
          
          if($v['member_id'] != $_SESSION['userId']){
            $member_ids[$v['posting_id']][] = $v['member_id'];
          }
	  	  
          $requester['Upcoming Hangouts'][$v['posting_id']] = $v['posting_title'];
      }


      
      $data = array();
      foreach($member_ids as $posting_id => $requester_ids)
      {
          $data['Upcoming Hangouts'][$posting_id.'_'.implode("_",  array_unique($requester_ids))] = $requester['Upcoming Hangouts'][$posting_id];
      }
      
      die(json_encode($data));
  }
  
  public function executeLoadChatMessages(sfWebRequest $request)
  {
      $posting_id = $request->getParameter('posting_id');
      $top_msg_id = $request->getParameter('top_msg_id'); #top_msg_id is used to limit only those messages that are new
      $result = Messages::getChatMessages($posting_id, $_SESSION['userId'], $top_msg_id);
      die(json_encode($result));
  }
  
  public function executeSendChatMessage(sfWebRequest $request)
  {
      $posting_id = $request->getParameter('posting_id');
      $sender_id  = $_SESSION['userId']; 
      $member_ids = $request->getParameter('member_ids');
      $message    = $request->getParameter('message');
      
      $member_ids = json_decode($member_ids);
      $member_ids = (array)$member_ids;
      $member_ids[] = $sender_id;
      
      $rs = CustomHangout::checkUserLogin($member_ids);
      
      $online_users = array();
      foreach($rs as $v){
          $online_users[] = $v['member_id'];
      }
      
      $results = array();
      foreach($member_ids as $member_id){
          $params = array();
          $params['member_id'] = $member_id;
          $params['sender_id'] = $sender_id;
          $params['message'] = $message;
          $params['is_read'] = in_array($member_id, $online_users)? 'TRUE':'FALSE';
          $params['posting_id'] = $posting_id;
          $params['is_friend'] = 'FALSE';
          
          $results[$member_id] = Messages::sendChatMessage($params);
      }
      
      die(print_r($results));
  }
}

