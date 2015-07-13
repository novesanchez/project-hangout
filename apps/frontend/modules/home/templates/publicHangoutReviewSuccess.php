<script src="/js/dummy.js"></script>
<script type="text/javascript">
    jQuery(function(){
        $(".rating-cancel").hide();
    });
    
</script>
<div class="container_12" id="header" >
	<header>
		<!-- Logo Here -->
		<a href="#">
			<div id="logo" class="grid_4"></div><!-- end #logo .grid_4 -->
		</a>
		<!-- Main Navigation Here -->
		<nav id="top_nav" class="grid_8">
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
                        <li title="Sign-Out"> 
                                <a href="/index.php/home/signOut">Sign-Out</a> 
                        </li> 
                    </ul> 		
		</nav>
	</header>
</div> <!-- end #container_12 #header -->

<div class="clear"></div>
		
<div class="container_12" id="body-wrap" role="main">

	<!-- BEGIN SIDEBAR -->
        <input type="hidden" value="<?php echo $userId; ?>" id="userId" />
        <div id="post-content-wrap" class="grid_7" style="width:98%!important;">

            <div class="blog-page-post">
                <h3 class="blog-page-title"><a href="#">HangOut Reviews</a> </h3>

                <div class="clear"></div>
                <div id="ajax">
                    <img src='/images/loading.gif'/>                     
                    <strong>Please wait...</strong>                        
                </div>
                <div class="blog-excerpt" id="publicHangoutReviews"></div> 
                [ <a href="#" id="myPublicHangoutReviews" > Refresh </a> ]    
                <div class="hr-pattern"></div>
            </div>  

        </div> 
        
</div> <!-- end #body-wrap .container_12 -->

<?php
    $img = "";
    foreach($photos as $x => $p){
        $img .= "<div class='apple_overlay' id='photo".($x + 1)."' >";
        $img .= "   <img src='/".$p['path']."'  height=365 width=470/>";
        $img .= "</div>";
    }
    echo $img;
?>

<div class="clear"></div>

<!-- BEGIN CALL TO ACTION -->
<div class="cta-wrap">
	<div id="call-to-action" class="container_12 clearfix">
		
		<div class="">
			<h2>HangOutToday.com<br/></h2>
			<p>
				Is a place where people can go to make new friends and participate in new activities and experiences.
					Whether you are looking for someone to go to the movies, the park,a casual dinner, theater, workout partner, a bar buddy, a game of tennis,
					a golf outing, hiking, dancing, or whatever activity you would like to do, but need another individual or group in order to do it, 
				HangOutToday is for you! (Click here to <a href="/index.php/information/learnMore">Learn More</a>)
			</p>
		</div> 
		
	</div> <!-- end .container_12 #call-to-action -->
</div><!-- end .cta-wrap -->
        