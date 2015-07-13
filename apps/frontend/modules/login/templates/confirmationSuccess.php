
<?php
	$captchaUrl = $_SERVER['SERVER_NAME'].'/login/GetSecurityCode';
?>
<script src="/js/dummy.js"></script>

<div class="container_12" id="header" >

<!--<header>

	 Logo Here 
	<a href="#">
		<div id="logo" class="grid_4"></div> end #logo .grid_4 
	</a>
	
	 Main Navigation Here 
	<nav id="top_nav" class="grid_8">
		<ul id="main-nav" class="sf-menu">
			<li class="current" title="#F9CD4B">
				<a href="/login/index" class="active">Home</a> 
			</li> 
			<li title="My Account"> 
				<a href="#">My Account</a> 
			</li> 
			<li title="Postings">
				<a href="#">Postings</a>
			</li>
			<li title="Hot List"> 
				<a href="#">Hot List</a> 
			</li> 
			<li title="Help"> 
				<a href="#">Help</a> 
			</li> 
		</ul> 		
	</nav> end #top-nav .grid_8 
	
</header>-->

<div class="clear"></div>

<div id="slider2">
	<?php if(!$isConfirm) { ?>
		<form action=<?php echo "/login/confirmEmail?cf=$confirmation_code"; ?> name="loginForm" id="cf-form" method="post">	
			<div class='details'>
				<table>
					<tr> 
					<td>
						<fieldset>
							<label for="cf_email">Confirm Email Address:</label>
							<input
								type="text"
								id="cf_email"
								name="cf_email"
								class="required email"
								onkeyup="" />
						</fieldset>
						
						<fieldset>
							<label for="cf_password">Enter password:</label>
							<input
								type="password"
								id="cf_password"
								name="cf_password"
								class="required password"
								onkeyup="" />
						</fieldset>	
					</td>
					</tr>
					<tr>
					<td colspan=2>
						<fieldset>
							<input class="submit" type="submit" name="submit" value="Sign-Up" />
						</fieldset>	
					</td>
					</tr>
				</table>
				
			</div>
		</form>
		
	<?php } else { ?>
		<div style='padding:10px'>
			<center>
				<p>
					<h2> Thank you for joining HangOutToday! </h2>
					<span>
						Confirmation completed. Start to create your profile and make new friends now! Login <a href='/login/index' style='color:red'>HERE!</a> 
					</span>
				</p>
			</center>
		</div>
	<?php } ?>
	
</div>

</div> <!-- end #container_12 #header -->

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

