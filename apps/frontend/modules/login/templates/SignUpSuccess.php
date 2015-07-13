
<?php
//	$captchaUrl = $_SERVER['SERVER_NAME'].'/login/GetSecurityCode';
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
				<a href="/index.php/login/index" class="active">Home</a> 
			</li> 
			<li title="My Account"> 
				<a href="#">My Account</a> 
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

	<?php if($signUp) { ?>

		<div class="joinbox2" id='signup2'>
			<h2> Step 1: Sign-up </h2>
			<div class='secCodeErr'>
				<label> <?php echo $errLabel; ?> </label>
			</div>
			<form action="/login/SignUp" name="loginForm" id="Popup" method="post">	
				<div class='details2'>
					<table width='100%'>
						<tr width='50%'> 
						<td>
							<fieldset>
								<label for="su_username">Choose a Username:</label>
								<input
									type="text"
									id="su_username"
									name="su_username"
									class="required"
									value="<?php echo @$username; ?>"
									onkeyup="" />
							</fieldset>
							
							<fieldset>
								<label for="password">Enter a password:</label>
								<input
									type="password"
									id="su_password"
									name="su_password"
									class="required password"
									value="<?php echo @$password; ?>"
									onkeyup="" />
							</fieldset>	
							
							<fieldset>
								<label for="password">Re-enter the password:</label>
								<input
									type="password"
									id="su_retype_password"
									name="su_retype_password"
									class="required pwcheck"
									value="<?php echo @$retype_password; ?>"
									onkeyup="" />
							</fieldset>	
						
							<fieldset>
								<label for="email">Enter your email address:</label>
								<input
									type="text"
									id="su_email"
									name="su_email"
									class="required email"
									value="<?php echo @$email; ?>"
									onkeyup="" />
							</fieldset>
						</td>
						<td>	
							<fieldset>
								<label for="birthdate">Enter your date of birth:</label>
								<input 
									type="text" 
									id="mydate" 
									name="su_mydate" 
									class="required" 
									value="<?php echo @$birthdate; ?>"
								/>
							</fieldset>
							
							<fieldset>
<!--								<img src="http://localhost/frontend_dev.php/login/GetSecurityCode" /><br/>-->
								<label for="captcha">Enter security code above:</label>
								<input id="security_code" name="security_code" type="text" class="required"/><br />
							</fieldset>
						</td>	
						<tr>
							<fieldset>
								<td colspan=2>
										<span class='agreement'>
										<input id="agreement" name="agreement" type="checkbox"/>
										I agree to HangOut Today's terms of use and privacy policy and certify that I am at least 18 years old.
										</span>
								</td>
							</fieldset>
						</tr>
						<tr width='50%'>  
						<td colspan=2>
							<fieldset>
								<center> <input class="submitSecCodeErr" type="submit" name="submit" value="Sign-Up" /> </center>
							</fieldset>	
						</td>
						</tr>
					</table>
				</div>
			</form>	
		 </div>
		 
	<?php } else { ?>
	
		<div style='padding:10px'>
			<center>
				<p>
					<h2> Thank you for joining HangOutToday! </h2>
					<span>
						A confirmation email has been sent to your email account.
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


