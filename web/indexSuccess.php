<?php

require_once(dirname(__FILE__).'/../lib/phpfreechat/src/phpfreechat.class.php');
require_once(dirname(__FILE__).'/../lib/phpfreechat/src/pfcinfo.class.php');

$params = array();
$params["serverid"] = md5('HangoutToday2'); // calculate a unique id for this chat
$params['nick'] = 'Nove';
$params['title'] = 'Hangout Party in LA!';

$params["display_pfc_logo"] = false;
$params["channels"] = array('Hangout Party in LA!');
$params["frozen_channels"] = array('Hangout Party in LA!','Hangout Party in Vegas!');

$params["container_type"] = "mysql";
$params["container_cfg_mysql_host"]     = "localhost";        // default value is "localhost"
$params["container_cfg_mysql_port"]     = 3306;               // default value is 3306
$params["container_cfg_mysql_database"] = "phpfreechat";      // default value is "phpfreechat"
$params["container_cfg_mysql_table"]    = "chat";             // default value is "phpfreechat"
$params["container_cfg_mysql_username"] = "root";      // default value is "root"
$params["container_cfg_mysql_password"] = ""; // default value is ""
$chat = new phpFreeChat($params);
$chat->printChat();
die();

?>
