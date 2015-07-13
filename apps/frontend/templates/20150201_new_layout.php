<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    
    <title>HangOutToday</title>
    <meta name="description" content="A social networking site that finds a buddy to hangout.">
	<meta name="author" content="Clay">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Libraries -->
	<script src="/js/jquery-1.6.2.min.js"></script>
        
	<script src="/js/jquery-ui-1.8.16.custom.min.js"></script>
	
	<!-- Content Slider -->
<!--	<script src="/js/slides.min.jquery.js"></script>-->
	
	<!-- Validation -->
<!--	<script src="/js/jquery.validate.js"></script>
	<script src="/js/jquery.maskedinput-1.3.min.js"></script>-->
		
	<!-- Tooltips -->
	<script src="/js/jquery.tooltip.min.js"></script>
	
	<!-- Navigation Dropdown Menu -->
	<script src="/js/hoverIntent.js"></script>
	<script src="/js/superfish.js"></script>
	
	<!-- Twitter Rotator -->
<!--	<script src="/tuw-inc/jquery.tuw.js"></script>-->
	
	<!-- colorbox -->
	<script src="/js/colorbox/jquery.colorbox.js"></script>	
		
        <script src="/js/jquery.tools.min.js"></script>	
                	
	<script src="/js/scripts.js"></script>
	<script type="text/javascript" src="/js/md5.js"></script>
	<script type="text/javascript" src="/js/jquery.timeentry.min.js"></script>
	<script type="text/javascript" src="/js/date.format.js"></script>
	<script type="text/javascript" src="/js/jquery.rating.js"></script>
        <script type="text/javascript" src="/js/jquery.validationEngine.js"></script>	
	<script type="text/javascript" src="/js/jquery.validationEngine-en.js"></script>
        
        <link rel="stylesheet" href="/css/front.css"/>
        <link rel="stylesheet" href="/css/tabs.css" media="screen" type="text/css"/>
        <link rel="stylesheet" href="/css/reset.css" />
        <link rel="stylesheet" href="/css/typography.css" />
        <link rel="stylesheet" href="/css/960.css" />
        <link rel="stylesheet" href="/tuw-inc/style.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/colorbox.css">
        <link rel="stylesheet" href="/css/base.css" media="all">
        <link rel="stylesheet" media="screen" href="/css/ui-lightness/jquery-ui-1.8.16.custom.css">	
        <link rel="stylesheet" href="/css/jquery.timeentry.css">
        <link rel="stylesheet" href="/css/overlay-apple.css"/>
        <link rel="stylesheet" href="/css/jquery.rating.css"/>
    
  </head>
  <body>
      
        <div class="container_12" id="header">
            <div class="site-header">    
            <header>
                <!-- Logo Here -->
                <a href="#">
                    <div id="logo" class="grid_4" style="margin-top:-12px!important;"></div><!-- end #logo .grid_4 -->
                </a>
                <!-- Main Navigation Here -->
                <nav id="top_nav" class="grid_8" style="margin-top:8px!important;">
                    <ul id="main-nav" class="sf-menu">
                        <li class="current" title="#F9CD4B">
                            <a href="/index.php/home/index" class="active">Home</a> 
                        </li> 
                        <li title="My Account"> 
                            <a href="/index.php/home/edit">My Account</a> 
                        </li> 
                        <li title="Postings">
                            <a href="#">Postings</a>
                            <ul>
                                <li> 
                                    <a href="/index.php/postings/create">Create Postings</a> 
                                </li>
                                <li> 
                                    <a href="/index.php/postings/index">Search Postings</a> 
                                </li>			
                            </ul>
                        </li>
                        <li title="Hot List"> 
                            <a href="/index.php/hotlist/index">Hot List</a> 
                        </li> 
                        <li title="Messages"> 
                            <a href="/index.php/messenger/index">Messages</a> 
                        </li> 
                        <li title="Sign-Out"> 
                            <a href="/index.php/home/signOut">Sign-Out</a> 
                        </li> 
                    </ul> 		
                </nav>
            </header>
            </div>
        </div> <!-- end #container_12 #header -->

        <div class="clear"></div>
        

	<?php echo $sf_content ?>
        
	<div class="clear"></div>
	<div class="clear"></div>
	
<!--	<div id="copyright-wrap">
            <div class="container_12">
                <div id="copyright" class="grid_12 omega">
                    <p>Copyright &#169; 2011 All rights reserved</p>
                    <ul class="footer-nav">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Privacy Statement</a></li>
                    </ul>  
                </div>
            </div> 
	</div>   -->
		
  </body>
</html>
