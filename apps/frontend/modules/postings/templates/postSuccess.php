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
				<li>
					<a href="/index.php/home/index">Home</a> 
				</li> 
				<li>
					<a href="/index.php/home/edit" class="active">My Account</a> 
				</li>
				<li class="current" title="#F9CD4B">
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
    <div class="body-miniwrap">
	<div id="home-blog-post-wrap">
		<div class="blog-page-post"><br/>
			<h2>&nbsp;&nbsp;Preview Post </h2>
			
			<form id="formAll" name="posting" method="post">
				<div id="post-content-wrap" class="grid_7 suffix_1" style="width:100%;">
					<h3 class="blog-page-title"><a href="#"><?php echo $result[0]['posting_title']; ?></a> </h3>
					
					<div class="featured-image grid_5 omega" style="width:210px!important;">
                                            	<img height=200 width=200 src="<?php echo "/".$result[0]['path']; ?>" alt="featured image" />                                                
					</div><!-- end .featured-image -->
				                                        
					<div class="blog-page-meta grid_2 alpha">
						<ul>
<!--							<li class="calendar"> <b> Date to HangOut: </b> <?php echo date('M d, Y', strtotime($result[0]['date_to_hangout'])); ?> </li>-->
<!--							<li class="calendar"> <b> Start Time: </b> <?php echo $result[0]['starttime']; ?> </li>-->
                                                        <li class="calendar"> <b> Start Time: </b> <?php echo date('l, F j, Y h:i A', strtotime($result[0]['date_to_hangout'].' '.$result[0]['starttime'])); ?> </li>
<!--							<li class="calendar"> <b> End Time: </b> <?php echo $result[0]['endtime']; ?> </li>-->
                                                        <li class="calendar"> <b> End Time: </b> <?php echo date('l, F j, Y h:i A',strtotime($result[0]['enddate_hangout'].' '.$result[0]['endtime'])); ?> </li>
							<li class="calendar"> <b> Posting End Date: </b> <?php echo date('l, F j, Y',strtotime($result[0]['posting_enddt'])); ?> </li>
                                                        <li class="calendar"> <b> Posting End Time: </b> <?php echo date('h:i A',strtotime($result[0]['posting_enddt'])); ?> </li>
							<li class="client"> <b> Number of People: </b> <?php echo $result[0]['num_ppl']; ?> </li>
							<li class="client"> <b> Gender Requested: </b> <?php echo $result[0]['gender']; ?> </li>
							<li class="client"> <b> Age Range: </b> <?php echo $result[0]['age_range'];; ?> </li>
						</ul>
					</div> <!-- end .meta -->
                                        
                                        
                                        <div class="blog-page-meta grid_2 alpha postOpts">
                                            <ul>
                                                <li>                                                      
                                                    <p> <span style="font-family:'Lato',arial,sans serif;font-weight:100;font-size:26px;color:#fff;"> Want to <em><strong>HangOut</strong></em> with <?php echo $result[0]['username']; ?> ? </span> </p>
                                                </li>
                                                <li class="others"> 
                                                    <b> <a id="postOpt1" href="#"> Yes! I want to HangOut. </a> </b> 
                                                    <div class="clear"></div>
                                                    
                                                    <span class="hangoutNow">
                                                        Are you sure you want to HangOut? <a href="#" id="postOpt1_yes">Yes</a> or <a href="#" id="postOpt1_no">No</a>                                                        
                                                    </span>
                                                    
                                                    <div class="clear"></div>
                                                    
                                                    <span class='hangoutNow_pr'> Processing request...&nbsp;<img src="/images/process.gif" /> </span>
                                                    
                                                    <div class="clear"></div>
                                                    <div class="response" id="response"></div>
                                                </li>
                                                <li class="others"> 
                                                    <b> <a id="postOpt2" href="#"> Add to Hot List! </a> </b>
                                                    <div class="clear"></div>
                                                    
                                                    <span class='addToHotList'> Processing request...&nbsp;<img src="/images/process.gif" /> </span>
                                                    <div class="clear"></div>
                                                    <div class="responseHotList" id="responseHotList"></div>
                                                </li>
                                                <li class="others"> <b> <a id="postOpt3" href = "<?php echo '/index.php/home/profile?id='.$result[0]['profile_id'].'&sort_by='.$_GET['sort_by'].'&post_id='.$_GET['id'].'&mod='.base64_encode('(Back To Preview Post)').'&mod_id=1'; ?>" >View my Profile </a> </b></li>
                                                <li class="others"> <b> <a id="postOpt4" href="<?php echo '/index.php/postings/index/sort_by/'.$sortby.'/id/'.$post_id.'/page/'.$page; ?>"> Back to Search results </a> </b></li>                                                
                                            </ul><?php // echo '/index.php/postings/index?sort_by='.$_GET['sort_by'].'&id='.$_GET['id'].'&page='.$_GET['page']; ?>
					</div> <!-- end .meta -->
                                        
					<div class="clear"></div>
					<div class="blog-excerpt" >
                                            <br/>
					<blockquote> <?php echo $result[0]['posting_desc']; ?> </blockquote>
                                       										
                                        <input type="hidden" id="session_id" name="session_id" value="<?php echo $session_id; ?>" />
					<input type="hidden" id="posting_id" name="posting_id" value="<?php echo $result[0]['posting_id']; ?>" />
                                        <input type="hidden" id="member_id" name="member_id" value="<?php echo $result[0]['member_id']; ?>" />
                                        <input type="hidden" id="age_range_1" name="age_range_1" value="<?php echo $result[0]['age_range_1']; ?>" />
                                        <input type="hidden" id="age_range_2" name="age_range_2" value="<?php echo $result[0]['age_range_2']; ?>" />
                                        <input type="hidden" id="gender" name="gender" value="<?php echo $result[0]['gender']; ?>" />
                                        <input type="hidden" id="email" name="email" value="<?php echo $result[0]['email']; ?>" />
                                        
				</div> <!-- end #content -->
			</form>
			
		</div> <!-- end .blog-page-post -->
            </div>
        </div>
    </div>
</div>

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

