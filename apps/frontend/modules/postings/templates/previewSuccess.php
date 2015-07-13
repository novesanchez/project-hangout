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
		<div class="blog-page-post">
        <h2>&nbsp;&nbsp;Preview Post </h2>
			
        <form id="formAll" name="posting" method="post">
                <div id="post-content-wrap" class="grid_7 suffix_1 sform_1" style="width:96%;padding-right:0px!important;background-color: #FFFFFF;">
<!--                        <div style="background-color: '#000'!important;height:200px;margin-bottom: 10px;">-->
                            <h3 class="blog-page-title"><a href="#"><?php echo $_REQUEST['posting_title']; ?></a> </h3>

                            <div class="featured-image grid_5 omega" >
                                    <img height=182 width=182 src="<?php echo '/'.$picPath; ?>" alt="featured image" />
                            </div><!-- end .featured-image -->

                            <div class="blog-page-meta grid_2 alpha">
                                    <ul>
                                            <li class="calendar"> <b> Date to HangOut: </b> <?php echo $startdtHangout; ?> </li>
                                            <li class="calendar"> <b> Start Time: </b> <?php echo $starttime; ?> </li>
                                            <li class="calendar"> <b> End Time: </b> <?php echo $endtime; ?> </li>
                                            <li class="calendar"> <b> Posting End Date: </b> <?php echo $postingEnddt; ?> </li>
                                            <li class="client"> <b> Number of People: </b> <?php echo $_REQUEST['num_ppl']; ?> </li>
                                            <li class="calendar"> <b> Gender Requested: </b> <?php echo $gender; ?> </li>
                                            <li class="calendar"> <b> Age Range: </b> <?php echo $ageRange; ?> </li>
                                    </ul>
                            </div> <!-- end .meta -->
                            <div class="clear"></div>
                            <br/>
                            
                            <div style="word-break:break-all!important;width:910px!important;display:block;">
                                <blockquote> <?php echo $_REQUEST['posting_desc']; ?> </blockquote>
                            </div>  
<!--                        </div>-->
                    
                        <input type="button" class="submit" id="submtPost" value="Submit Post" />
                        <input type="button" class="submit" id="backToEdit" value="Back" style='margin-right:4px;' />

                        <!-- hidden fields -->
                        <input type="hidden" name="posting_title" value="<?php echo $_REQUEST['posting_title']; ?>" />
                        <input type="hidden" name="posting_desc"  value="<?php echo $_REQUEST['posting_desc']; ?>" />
                        <input type="hidden" name="startdt_hangout" value="<?php echo $_REQUEST['startdt_hangout']; ?>" />
                        <input type="hidden" name="enddt_hangout" value="<?php echo $_REQUEST['enddt_hangout']; ?>" />
                        <input type="hidden" name="starttime" value="<?php echo $_REQUEST['starttime']; ?>" />
                        <input type="hidden" name="endtime" value="<?php echo $_REQUEST['endtime']; ?>" />
                        <input type="hidden" name="posting_enddt" value="<?php echo $_REQUEST['posting_enddt']; ?>" />
                        <input type="hidden" name="num_ppl" value="<?php echo $_REQUEST['num_ppl']; ?>" />
                        <input type="hidden" name="gender" value="<?php echo $_REQUEST['gender_type']; ?>" />
                        <input type="hidden" name="age_range_1" value="<?php echo $_REQUEST['age_range_1']; ?>" />
                        <input type="hidden" name="age_range_2" value="<?php echo $_REQUEST['age_range_2']; ?>" />
                        <!-- end #hidden fields -->
                        
                </div> <!-- end #content -->
        </form>			
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

