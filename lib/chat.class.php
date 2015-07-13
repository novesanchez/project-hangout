<?php

    class chat{
        
        public $conn;
        public function __construct(){}
        
        public static function getConnection(){
            return Doctrine_Manager::getInstance()->connection();
        }
        
        public static function insertChatMessage($params = array()){
            
//            $q = "INSERT INTO messages 
//                  (
//                    member_id, 
//                    sender_id, 
//                    message, 
//                    is_read, 
//                    date_read, 
//                    posting_id, 
//                    is_friend, 
//                    date_created
//                  )
//                  VALUES 
//                  (
//                    {$params['member_id']},
//                    {$params['sender_id']},
//                    '{$params['message']}',
//                    '{$params['is_read']}',
//                    CURRENT_TIMESTAMP,
//                    {$params['posting_id']},
//                    '{$params['is_friend']}',
//                    CURRENT_TIMESTAMP
//                  );";
//               return 
           
        }
    }


?>  
