<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    
    <title>Welcome to HangoutToday</title>
    <meta name="description" content="A social networking site that finds a buddy to hangout.">
	<meta name="author" content="Clay">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
            
	<!-- Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--	<script src="/js/jquery-1.6.2.min.js"></script>        -->
<!--	<script src="/js/jquery-ui-1.8.16.custom.min.js"></script>
	<script src="/js/slides.min.jquery.js"></script>
	<script src="/js/jquery.validate.js"></script>
	<script src="/js/jquery.maskedinput-1.3.min.js"></script>
	<script src="/js/jquery.tooltip.min.js"></script>
        <script src="/js/hoverIntent.js"></script>
	<script src="/js/superfish.js"></script>
	<script src="/js/colorbox/jquery.colorbox.js"></script>	
	<script src="/js/jquery.tools.min-2.js"></script>	
        <script src="/js/scripts.js"></script>-->
	<script type="text/javascript" src="/js/md5.js"></script>
        <script type="text/javascript" src="/js/login-signup.js"></script>
<!--	<script type="text/javascript" src="/js/jquery.timeentry.min.js"></script>
	<script type="text/javascript" src="/js/date.format.js"></script>
	<script type="text/javascript" src="/js/jquery.rating.js"></script>
        <script type="text/javascript" src="/js/jquery.validationEngine.js"></script>	
	<script type="text/javascript" src="/js/jquery.validationEngine-en.js"></script>        
        <script type="text/javascript" src="/js/navgoco/jquery.cookie.js"></script>
        <script type="text/javascript" src="/js/navgoco/jquery.navgoco.js"></script>-->
        <script type="text/javascript" src="/js/bootstrap/bootstrap.min.js"></script>
        
<!--        <link rel="stylesheet" href="/css/front.css"/>
        <link rel="stylesheet" href="/css/tabs.css" media="screen" type="text/css"/>
        <link rel="stylesheet" href="/css/reset.css" />
        <link rel="stylesheet" href="/css/typography.css" />
        <link rel="stylesheet" href="/css/960.css" />
        <link rel="stylesheet" href="/tuw-inc/style.css" type="text/css" media="screen" />
-->        <link rel="stylesheet" href="/css/style.css"><!--
        <link rel="stylesheet" href="/css/colorbox.css">
        <link rel="stylesheet" href="/css/base.css" media="all">
        <link rel="stylesheet" href="/css/jquery.timeentry.css">
        <link rel="stylesheet" href="/css/overlay-apple.css"/>
        <link rel="stylesheet" href="/css/jquery.rating.css"/>
        <link rel="stylesheet" media="screen" href="/css/ui-lightness/jquery-ui-1.8.16.custom.css"/>
        <link rel="stylesheet" href="/css/navgoco/jquery.navgoco.css"/>        -->
        <link rel="stylesheet" href="/css/bootstrap/bootstrap.min.css"/>   
        <link rel="stylesheet" href="/css/bootstrap/custom_bootstrap.css"/> 
<!--        <link rel="stylesheet" href="/css/bootstrap/bootstrsap2.min.css"/>    -->
  </head>
  <body>
 
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container" id="cb-container-navbar">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <h2><span style="font-family: 'Helvetica Neue';font-weight: bold;"> Welcome to HangoutToday! </span> </h2>
    </div>     
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
        <form class="form-inline navbar-right navbar-form" role="form">        
            <p class="help-block lbl-incorrect-login"></p>    
            <div class="form-group form-group-login">                
                <input type="text" class="form-control input-small" id="username" placeholder="Username">    
                 <a href="/index.php/login/forgotUsername"><h6>Forgot your Username?</h6></a>
            </div>
            <div class="form-group form-group-login">
                <label class="sr-only" for="password">Password</label>
                <input type="password" class="form-control input-small" id="password" placeholder="Password">
                <a href="/index.php/login/forgotPassword"><h6>Forgot your Password?</h6></a>
            </div>  
            <div class="form-group form-group-login-btn">
                <button type="button" id="btn-login-hngt" name="btn-login-hngt" class="btn btn-primary">Login</button>      
<!--                <a id="fb_login" title="Login using your Facebook account."><div id="fblogo"></div></a>
                <div id="fb-root"></div>
                <div id="fb-load"></div>-->
            </div>              
        </form>
    </div>
  </div><!-- /.container -->
</nav><!-- /.navbar-collapse -->

<?php  echo $sf_content ?>

<footer class="footer">
    <nav class="navbar">
    <div class="container center">
        <ul class="nav">
            <li class="navbar-text">About Us</li>
            <li class="navbar-text">Terms of Use</li>
            <li class="navbar-text">Press</li>
            <li class="navbar-text">Privacy Policy</li>
            <li class="navbar-text">Mobile</li>
            <li class="navbar-text">Advertising</li>
        </ul>
    </div>

    <div class="container center">
        <p>Company 2013. All Rights Reserved.</p>
    </div>
    </nav>
</footer>

  </body>
</html>
