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
	<img src="/images/search.png" style="margin-bottom:5px;" /> <a href="#" id="showSearch"> Search Criteria </a> <img src="/images/down.png" />
	<div id="searchPost" style="display:none;">
		<form method="post" action="#" id="formAll" name="searchPost" class="sform_1 sinput_1 sselect_3">
			<table style="border:0px;width:100%;">
				<tr>
					<td>
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
					</td>
					<td>
						<fieldset>
							<label for="city">City:</label>
							<input type="text" id="city" name="city" class='required' />
						</fieldset>
					</td>
				</tr>
				<tr>
					<?php
					 	$element = "<td>";
					 	$element .= "<fieldset>";
						$element .= "<label for='zipcode'>Zip Code:</label>";
						$element .= "<select name='zipcode'>";
			
						foreach($states as $id => $v)
						{
							$element .= "<option value='$id' $ans>".$v."</option>";		
						}
						
						$element .= "</select>";
						$element .= "</fieldset></td>";
					 
						echo $element;
						
						$miles = array(5,10,15,20,25,50,100);
						$element = "<td>";
						$element .= "<fieldset>";
						$element .= "<label for='miles'>Miles:</label>";
						$element .= "<select name='miles' class='sselect_4'>";
						foreach($miles as $mile)
						{
							$element .= "<option value='$mile'>".$mile."</option>";		
						}
						
						$element .= "</select>";
						$element .= "</fieldset></td>";
					 
						echo $element;
				    ?>
				</tr>
			</table>
			
			
			
			<fieldset>
				<input type='submit' class='submit' id='search' name='search' value='Search' />
				<input type='reset' class='submit' id='reset' name='reset' value='Reset' style='margin-right:4px;' />
			</fieldset>
		</form>
	</div>
</div>

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