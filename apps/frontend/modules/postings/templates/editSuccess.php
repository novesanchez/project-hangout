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
    <div style='width:100%;'>
        <h2> Edit Post 
            <span style="font-size:14px;display:none;" id="progressBarMsg">
                <img id="progressBar" src="/images/loading.gif" style="display:none;"/> 
                Saving Changes...
            </span>     
        </h2>
    </div>
<div id='createPosting' style="display:block;">
	<form method="post" action="/index.php/postings/preview" id="formAll" class="slabel_1 sform_1" name="frmCrtPostings"> 
		<table>
			<tr>
				<td>
					<fieldset>
						<label for='gender_type'>Gender to Hangout with:</label>
						<?php
							$genderType = array('f'=>'Female','m'=>'Male','a'=>'Any');
							$select = "<select style='width:150px!important;' id='gender_type' name='gender_type' class='required'>";
							foreach($genderType as $k => $g)
							{
                                                            $txtselect = ($post->gender_type == $k)? "selected":"";
                                                            $select .= "<option value='$k' $txtselect >$g</option>";
							}
							$select .= "</select>";	
							echo $select;
						?>
					</fieldset>
				</td>
                                <td>
				   <fieldset>
						<label for='date_to_hangout'>Hangout Start Date:</label>
						<input name="startdt_hangout" type="text" id="startdt_hangout" size="35" class='required' value="<?php echo date('l. F j, Y', strtotime($post->date_to_hangout)); ?>" />	
				   </fieldset>
				</td>
			</tr>
			<tr>
				<td>
					<fieldset>
						<label for='num_ppl'>Number of People to Hangout with:</label>
						<?php 
							$select = "<select style='width:150px!important;' id='num_ppl' name='num_ppl' class='required'>";
							for($i=1;$i<6;$i++)
							{
								$txtselect = ($post->num_ppl == $i)? "selected":"";
								$select .= "<option value='$i' $txtselect>$i person</option>";		
							}
							$select .= "</select>";
							echo $select;
						?>
					</fieldset>
				</td>
                                <td>
				   <fieldset>
                                        <label for='date_to_hangout'>Hangout End Date:</label>
                                        <input name="enddt_hangout" type="text" id="enddt_hangout" size="35" class='required' value="<?php echo date('l. F j, Y', strtotime($post->enddate_hangout)); ?>" />	
				   </fieldset>
				</td>       
			</tr>
			<tr>
				<td>
                                    <fieldset>
                                        <label for='age_range' id='lblAgeRange' name='lblAgeRange'>Age Range:</label>
                                        <?php						
                                            $select = "<select style='width:60px!important;' id='age_range_1' name='age_range_1' class='required'>";
                                            for($i=18;$i<100;$i++)
                                            {
                                                $txtselect = ($post->age_range_1 == $i)? "selected":"";
                                                $select .= "<option value='$i' $txtselect >$i</option>";	
                                            }
                                            $select .= "</select> &nbsp; to &nbsp; ";

                                            $select .= "<select style='width:60px!important;' id='age_range_2' name='age_range_2' class='required'>";
                                            for($i=18;$i<100;$i++)
                                            {
                                                $txtselect = ($post->age_range_2 == $i)? "selected":"";
                                                $select .= "<option value='$i' $txtselect >$i</option>";	
                                            }
                                            $select .= "</select>";						
                                            echo $select;	
                                        ?>
                                    </fieldset>												
				</td>
                                <td>
                                    <fieldset>
                                        <label for='start_end_time' id='start_end_time'> Start & End time: </label>									
                                        <input style="width:80px!important;" id="starttime" name="starttime" type="text" class="spinners required" value="<?php echo isset($post->starttime)? $post->starttime:""; ?>"> &nbsp; to &nbsp;
                                        <input style="width:80px!important;" id="endtime" name="endtime" type="text" class="spinners required" value="<?php echo isset($post->endtime)? $post->endtime:""; ?>">
                                    </fieldset>
				</td>                                			                             
			</tr>
                        <tr>
                            <td></td>
                                <td>
                                <fieldset>
                                        <label for='posting_enddt' >Posting End Date:</label>
<!--						<input name="posting_enddt" type="text" id="posting_enddt" size="35" class='required' value="<?php echo isset($_REQUEST['posting_enddt'])? $_REQUEST['posting_enddt']:""; ?>"/>	-->

                                        <select style="width:115px!important;" class="required" id="posting_enddt" name="posting_enddt">   

                                            <?php                                                     
                                                $hours_before = array('6 Hours', '12 Hours', '1 Day');
                                                $option = '';

                                                $dateToHangout     = date('Y-m-d H:i:s', strtotime($post->date_to_hangout.' '.$post->starttime));
                                                $postingEnddt      = date('Y-m-d H:i:s', strtotime($post->posting_enddt));
                                                $hours             = strtotime($dateToHangout) - strtotime($postingEnddt);
                                                $hours_remaining   = floor(($hours - ($days * 86400)) / 3600);
                                                $hours_remaining   = ($hours_remaining == 24)? 1:$hours_remaining;

                                                foreach($hours_before as $v){
                                                    $selected_option = ($hours_remaining == $v)? 'selected':'';
                                                    $option .= '<option value="'.$v.'" '.$selected_option.'>'.$v.'</option>';
                                                }
                                                echo $option;
                                            ?>

                                        </select>
                                        <span style="font-size:10px;color:red;width:175px;text-align: center;"> Before the start time of Date to Hangout. </span>
                                </fieldset>
				</td>     
                        </tr>
			<tr>
                            <td colspan=2>
                                <fieldset>
                                    <label for='posting_title' class="slabel_2" style="300px!important;">Posting Title: </label>
                                    <input name="posting_title" size="100" maxlength="50" type="text" id="posting_title" class='required inpt_posting_title' value="<?php echo $post->posting_title; ?>"/>	                                  
                                </fieldset>							
                            </td>
			</tr>                        
			<tr>
                            <td colspan=2>
                                <fieldset>
                                    <label for='posting_desc'>Posting Description:</label>
                                    <textarea id='posting_desc' name='posting_desc' maxlength="300" cols='100' rows='4'class='required'><?php echo $post->posting_desc; ?></textarea>
                                </fieldset>
                            </td>
			</tr>	
			<tr>
                            <td colspan=2>
                                <fieldset>
                                    <input type='button' class='back_to_myacct' id='back_to_myacct' name='back_to_myacct' value='Back' />
                                    <input type='button' class='submit' id='save_changes' name='save_changes' value='Save Changes' />
                                    <input type='reset'  class='submit' id='reset' name='reset' value='Reset' style='margin-right:4px;' />
                                </fieldset>						
                            </td>
			</tr>
		</table>
            
                <input type="hidden" id="posting_id" value="<?php echo $_GET['id']; ?>" />
                
	</form>
</div>
</div>

<div class="clear"></div>
<!--<div id="posttitle_info" style="background-color: red;">Maximum characters allowed to inpit: 50</div>-->

<div id="dialog-msg-hangoutst" style="display:none;" title="Empty Fields Required">
  <p>Please select a Hangout Start Date!</p>
</div>

<div id="dialog-msg-hangoutendt" style="display:none;" title="Empty Fields Required">
  <p>Please select a Hangout End Date!</p>
</div>

<div id="dialog-msg-hangoutsttm" style="display:none;" title="Empty Fields Required">
  <p>Please select a Hangout Start Time!</p>
</div>

<div id="dialog-msg-hangoutendttm" style="display:none;" title="Empty Fields Required">
  <p>Please select a Hangout End Time!</p>
</div>

<div id="dialog-msg-posttitle" style="display:none;" title="Empty Fields Required">
  <p>Please enter a Posting Title!</p>
</div>

<div id="dialog-msg-postdesc" style="display:none;" title="Empty Fields Required">
  <p>Please enter a Posting Description!</p>
</div>

<div id="dialog-msg-invalidatedt" style="display:none;" title="Invalid Start and End Hangout Date!">
  <p>Please select an end date hangout greater than start date.</p>
</div>
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
		
	</div>
</div>  end .cta-wrap -->