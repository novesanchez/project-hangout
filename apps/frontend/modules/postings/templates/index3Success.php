<script src="/js/dummy.js"></script>

<div class="container_12" id="header" >
	<header>
		<!-- Logo Here -->
		<a href="#">
			<div id="logo" class="grid_4"></div><!-- end #logo .grid_4 -->
		</a>
		<!-- Main Navigation Here -->
		<nav id="top_nav" class="grid_8">
			<ul id="main-nav" class="sf-menu">
				<li>
					<a href="/home/index">Home</a> 
				</li> 
				<li>
					<a href="/home/edit" class="active">My Account</a> 
				</li>
				<li class="current" title="#B9B9E5">
					<a href="#">Postings</a>
					<ul>
						<li> 
							<a href="/postings/create">Create Postings</a> 
						</li>
						<li> 
							<a href="/postings/index">Search Postings</a> 
						</li>			
					</ul>
				</li>
				<li title="Hot List"> 
					<a href="#">Hot List</a> 
				</li> 
				<li title="Sign-Out"> 
					<a href="#">Sign-Out</a> 
				</li> 
			</ul> 		
		</nav>
	</header>
</div> <!-- end #container_12 #header -->

<div class="clear"></div>

<div class="container_12" id="body-wrap" role="main">
	<h3> Search Posts </h3>
	<!-- BEGIN SIDEBAR -->
	<div id="sidebar" class="grid_4 suffix_1">
		<div class="tabContainer left widget" >
		    <div class="tabDesc "> 
		    	<form method="post" action="#" id="formAll" name="searchPost" class="sinput_1 sselect_3">
		    	
					<?php
					 	$element = "";
					 	$element .= "<fieldset>";
						$element .= "<label for='country'>Country:</label>";
						$element .= "<select name='country'>";
			
						foreach($countries as $id => $v)
						{
							$element .= "<option value='$id' $ans>".$v."</option>";		
						}
						
						$element .= "</select>";
						$element .= "</fieldset>";
						echo $element;
					?>
					
					<fieldset>
						<label for="city">City:</label>
						<input type="text" id="city" name="city" class='required sinput_5' />
					</fieldset>
							
					<?php
					 	$element = "";
					 	$element .= "<fieldset>";
						$element .= "<label for='zipcode'>Zip Code:</label>";
						$element .= "<select name='zipcode'>";
			
						foreach($states as $id => $v)
						{
							$element .= "<option value='$id' $ans>".$v."</option>";		
						}
						
						$element .= "</select>";
						$element .= "</fieldset>";
					 
						echo $element;
						
						$miles = array(5,10,15,20,25,50,100);
						$element = "";
						$element .= "<fieldset>";
						$element .= "<label for='miles'>Miles:</label>";
						$element .= "<select name='miles' class='sselect_4'>";
						foreach($miles as $mile)
						{
							$element .= "<option value='$mile'>".$mile."</option>";		
						}
						
						$element .= "</select>";
						$element .= "</fieldset>";
					 
						echo $element;
				    ?>
					<br/>
					<fieldset>
						<input type='submit' class='submit' id='search' name='search' value='Search' />
						<input type='reset' class='submit' id='reset' name='reset' value='Reset' style='margin-right:4px;' />
					</fieldset>
					
				</form>
		    </div>
		</div> 
	</div>
	
	<div id="post-content-wrap" class="grid_7">
	
		 <div class="blog-page-post">
			<h3 class="blog-page-title">My Account</h3>
			
			<div class="clear"></div>
			
			<div class="blog-excerpt" >
				<form name="myprofile" id="myprofile"> 
					 <label for="name">Nick Name:</label>
					 <input name="name" type="text" id="name" size="53" value="<?php echo $myAccount['nickName']; ?>" /> 
					 <br/>
					 <label for="username">User Name:</label>
					 <input name="username" type="text" id="username" size="53" value="<?php echo $myAccount['username']; ?>" /> 
					 <br/>
					 <label for="email">Email Address:</label>
					 <input name="email" type="text" id="email" size="53" value="<?php echo $myAccount['email']; ?>" /> 
					 <br/>
				
					 <label for="location">Location:</label>
					 <input name="location" type="text" id="location" size="53" value="<?php echo $myAccount['location']; ?>" />					 
					 <br/>
					<!-- <label for="language">Language:</label>
					 <input name="language" type="text" id="language" size="53" value="English" />					 
					 <br/> -->
					 <label for="birthdate">Birth Date:</label>
					 <input name="birthdate" type="text" id="birthdate" size="53" value="<?php echo $myAccount['bday']; ?>" />		
					 <br/><br/>
					 [ <a href="/home/edit" > Edit My Account </a> ]
				</form>
			</div> 
	
			<div class="hr-pattern"></div>
		</div> <!-- end .my account -->
	
		 <div class="blog-page-post">
			<h3 class="blog-page-title"><a href="#">My Postings</a> </h3>
			
			<div class="clear"></div>
			
			<div class="blog-excerpt" >
				<p>My Postings here...</p>
			</div> 
	
			<div class="hr-pattern"></div>
		</div> <!-- end .my postings -->
	
		 <div class="blog-page-post">
			<h3 class="blog-page-title"><a href="#">My Hangouts</a> </h3>
			
			<div class="clear"></div>
			
			<div class="blog-excerpt" > 
				<p>My Hangouts here...</p>	
			</div>
			
			<div class="hr-pattern"></div>
		</div> <!-- end .my hangouts -->
	
  </div><!-- end #post-content-wrap .grid_12 -->
  
</div> <!-- end #body-wrap .container_12 -->

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
				HangOutToday is for you! (Click here to <a href="#">Learn More</a>)
			</p>
		</div> 
		
	</div> <!-- end .container_12 #call-to-action -->
</div><!-- end .cta-wrap -->