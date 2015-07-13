<?php

require_once('C:/wamp/www/hangout2/config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'prod', false);
sfContext::createInstance($configuration)->dispatch();

CustomHangout::alert001();
