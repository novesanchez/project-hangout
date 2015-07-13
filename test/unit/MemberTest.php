<?php

    require_once dirname(__FILE__).'/../bootstrap/unit.php';
    
    $lime = new lime_test(1);
    $lime->pass('This test always passes!');
        
?>
