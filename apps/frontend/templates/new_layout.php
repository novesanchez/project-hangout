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
<!--	<script src="/js/jquery-1.6.2.min.js"></script>
        <script src="/js/jquery-ui-1.8.16.custom.min.js"></script>
	<script src="/js/jquery.tooltip.min.js"></script>
	<script src="/js/hoverIntent.js"></script>
	<script src="/js/superfish.js"></script>
	<script src="/js/colorbox/jquery.colorbox.js"></script>		-->
        
	
<!--	<script type="text/javascript" src="/js/md5.js"></script>
	<script type="text/javascript" src="/js/jquery.timeentry.min.js"></script>
	<script type="text/javascript" src="/js/date.format.js"></script>
	<script type="text/javascript" src="/js/jquery.rating.js"></script>
        <script type="text/javascript" src="/js/jquery.validationEngine.js"></script>	
	<script type="text/javascript" src="/js/jquery.validationEngine-en.js"></script>-->
        
<!--        <link rel="stylesheet" href="/css/front.css"/>
        <link rel="stylesheet" href="/css/tabs.css" media="screen" type="text/css"/>
        <link rel="stylesheet" href="/css/reset.css" />
        <link rel="stylesheet" href="/css/typography.css" />
        <link rel="stylesheet" href="/css/960.css" />
        <link rel="stylesheet" href="/tuw-inc/style.css" type="text/css" media="screen" />-->
<!--        <link rel="stylesheet" href="/css/style.css">-->
<!--        <link rel="stylesheet" href="/css/colorbox.css">
        <link rel="stylesheet" href="/css/base.css" media="all">
        <link rel="stylesheet" media="screen" href="/css/ui-lightness/jquery-ui-1.8.16.custom.css">	
        <link rel="stylesheet" href="/css/jquery.timeentry.css">
        <link rel="stylesheet" href="/css/overlay-apple.css"/>
        <link rel="stylesheet" href="/css/jquery.rating.css"/>-->
    
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script type="text/javascript" src="/js/custom.js"></script>
        <script type="text/javascript" src="/js/home_index.js"></script>
        <script type="text/javascript" src="/js/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/md5.js"></script>
<!--        <script src="/js/jquery.tools.min.js"></script>-->
        <link rel="stylesheet" href="/css/bootstrap/bootstrap.css"/>
        
        <!-- Include Bootstrap Datepicker -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />

        <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

  </head>
  <body>

      <nav class="navbar navbar-default navbar-static-top x-nav" role="navigation">
        <div class="container" id="cb-container-navbar">            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <h4><span class="x-nav-text"><span class="fa fa-fw fa-users"></span>&nbsp;HangoutToday</span> </h4>
            </div>     
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/index.php/home/index" style="color:#DFF0D8!important;">Home</a></li>
                <li><a href="/index.php/home/edit" style="color:#DFF0D8!important;">My Account</a></li>
                <li><a href="/index.php/postings/index" style="color:#DFF0D8!important;">Postings</a></li>
<!--                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" style="color:#DFF0D8!important;" data-toggle="dropdown" role="button" aria-expanded="false">Postings <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/index.php/postings/create" style="color:#000!important;">Create Posting</a></li>
                        <li><a href="/index.php/postings/index" style="color:#000!important;">Search Posting</a></li>                    
                    </ul>
                </li>-->
                <li><a href="/index.php/hotlist/index" style="color:#DFF0D8!important;">Hot List</a></li>
                <li><a href="/index.php/messenger/index" style="color:#DFF0D8!important;">Messages</a></li>
                <li><a href="/index.php/home/signOut" style="color:#DFF0D8!important;">Logout</a></li>
            </ul>
        </div><!-- /.container -->
      </nav><!-- /.navbar-collapse -->

    <?php echo $sf_content ?>

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
