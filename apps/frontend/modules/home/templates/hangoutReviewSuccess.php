<script src="/js/dummy.js"></script>

<!--<div class="container_12" id="header" >
	<header>
		 Logo Here 
		<a href="#">
			<div id="logo" class="grid_4"></div> end #logo .grid_4 
		</a>
		 Main Navigation Here 
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
                        <li title="Messages"> 
                                <a href="/index.php/messenger/index">Messages</a> 
                        </li>                         
                        <li title="Sign-Out"> 
                                <a href="/index.php/home/signOut">Sign-Out</a> 
                        </li> 
                    </ul> 		
		</nav>
	</header>
</div>  end #container_12 #header -->

<div class="clear"></div>
		
<div class="container_12" id="body-wrap" role="main">

	<!-- BEGIN SIDEBAR -->
	<div id="sidebar" class="grid_4 suffix_1">
		<div class="tabContainer left widget" >
		    <div class="tabDesc "> 
			    <img src="<?php echo '/'.$myAccount['path']; ?>" />
		    </div>
                    <div class="bottom_links">
                        <ul>
                            <li> <a href="<?php echo '/index.php/home/profile?id='.$myAccount['profile_id']; ?>" title="Click to view your public profile."> Public Profile </a> </li>
<!--                            <li> <a href="#"> Postings </a> <a href="#" title="New HangOut Request"> &nbsp;&nbsp; <img src="/images/my_posting_icon_1.png"/> </a> 
                                 <div  style="margin-left: 15px;font-size: 11px;">
                                    <ul>
                                        <li><a href="#">New HangOut Request</a></li>                                       
                                    </ul>
                                </div>
                            </li>-->
                            <li> HangOuts &nbsp;&nbsp;
<!--                                <a href="#" title="HangOut Request"><img src="/images/my_hangout_icon_4.png" /></a> &nbsp;
                                <a href="#" title="Upcoming HangOuts"><img src="/images/my_hangout_icon_1.png" /></a> &nbsp;-->
                                <a href="/index.php/home/rateHangout" title="Pending HangOut Review"><img src="/images/my_hangout_icon_2.png" /></a> &nbsp;                                
                                <a href="/index.php/home/hangoutReview" title="Pending HangOut Request"><img src="/images/my_hangout_icon_3.png" /></a> &nbsp;                                
                                <div  style="margin-left: 15px;font-size: 11px;">
                                    <ul>
                                        <li><a href="/index.php/home/rateHangout">Rate HangOut</a></li>
                                        <li style='font-weight:bold;'><a href="#">HangOut Reviews</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li> Friends &nbsp;
                                 <a href="#" title="New Friend Request"><img src="/images/my_friends_icon_1.png" /></a>
                                 <div  style="margin-left: 15px;font-size: 11px;">
                                    <ul>
                                        <li><a href="/index.php/home/friendRequest">New Friend Request</a></li>                                        
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
		</div> 
	</div>
	
	  <div id="post-content-wrap" class="grid_7">
	
            <div class="blog-page-post">
                <h3 class="blog-page-title"><a href="#">HangOut Reviews</a> </h3>

                <div class="clear"></div>
                <div id="ajax">
                    <img src='/images/loading.gif'/>                     
                    <strong>Please wait...</strong>                        
                </div>
                <div class="blog-excerpt" id="hangoutReviews"></div> 
                [ <a href="#" id="myHangoutReviews" > Refresh </a> ]    
                <div class="hr-pattern"></div>
            </div>  
                		 
	
         </div> 
  
</div> <!-- end #body-wrap .container_12 -->

<div class="clear"></div>

<!-- BEGIN CALL TO ACTION -->
<!--<div class="cta-wrap">
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
		
	</div>  end .container_12 #call-to-action 
</div> end .cta-wrap -->

