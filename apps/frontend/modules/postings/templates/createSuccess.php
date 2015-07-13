<style>

    .form-create{
        font-size: 12px!important;
    }
    
    
</style>

<div class="container">
    <div class="panel panel-success">
    <div class="panel-heading">Create Post</div>
    <div class="panel-body">
        <form role="form" class="form-create">      
            <div class="row">
                <div class="col-md-6">
                    <table>
                        <tr>
                            <td style="padding-right: 5px;">
                                <div class="form-group">
                                    <label for="btn-gender">Gender to Hangout w/</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">                        
                                    <div class="btn-group">                                                     
                                        <button id="btn-gender" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Select <span class="caret"></span>
                                        </button>
                                        <ul id="ul-gender" class="dropdown-menu scrollable-menu" role="menu">
                                            <li><a href="#">Female</a></li>
                                            <li><a href="#">Male</a></li>
                                            <li><a href="#">Any</a></li>
                                        </ul>                               
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-right: 5px;">
                                <div class="form-group">      
                                    <label class="control-label" for="">Hangout Start Date</label>                                    
                                </div>
                            </td> 
                            <td>
                                <div class="form-group">                                          
                                    <input class="form-control input-append date" type="text" name="date" id="datePicker"/>
                                    <span class="glyphicon glyphicon-calendar"></span>                                         
                                </div>
                            </td> 
                        </tr>
                    </table>
                    
<!--                    <div class="form-group">      
                        <label class="control-label" for="">Hangout Start Date:</label>
                        <input class="form-control date" type="text" name="date" id="datePicker"/>
                        <span class=" add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>-->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
<!--                        <label for="btn-gender">Gender to Hangout w/:</label>-->
                        <div class="btn-group">                                                     
                            <button id="btn-gender" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                               Select <span class="caret"></span>
                            </button>
                            <ul id="ul-gender" class="dropdown-menu scrollable-menu" role="menu">
                                <li><a href="#">Female</a></li>
                                <li><a href="#">Male</a></li>
                                <li><a href="#">Any</a></li>
                            </ul>                               
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="btn-group">                                                     
                            <button id="btn-gender" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                               Select <span class="caret"></span>
                            </button>
                            <ul id="ul-gender" class="dropdown-menu scrollable-menu" role="menu">
                                <li><a href="#">Female</a></li>
                                <li><a href="#">Male</a></li>
                                <li><a href="#">Any</a></li>
                            </ul>                               
                        </div>
                    </div>                  
                </div>
              </div>
        </form>
    </div>    
    </div>
</div>        

<div class="clear"></div>

<div class="container_12" id="body-wrap" role="main">
<h2> Create Post </h2>
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
								$txtselect = (isset($_REQUEST['gender']) && $_REQUEST['gender'] == $k)? "selected":"";
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
						<input name="startdt_hangout" type="text" id="startdt_hangout" size="35" class='required' readonly="readonly" value="<?php echo isset($_REQUEST['startdt_hangout'])? $_REQUEST['startdt_hangout']:""; ?>" />	
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
								$txtselect = (isset($_REQUEST['num_ppl']) && $_REQUEST['num_ppl'] == $i)? "selected":"";
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
                                                        <input name="enddt_hangout" type="text" id="enddt_hangout" size="35" class='required' readonly="readonly" value="<?php echo isset($_REQUEST['enddt_hangout'])? $_REQUEST['enddt_hangout']:""; ?>" />	
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
								$txtselect = (isset($_REQUEST['age_range_1']) && $_REQUEST['age_range_1'] == $i)? "selected":"";
								$select .= "<option value='$i' $txtselect >$i</option>";	
							}
							$select .= "</select> &nbsp; to &nbsp; ";
							
                                                        $select .= "<select style='width:60px!important;' id='age_range_2' name='age_range_2' class='required'>";
							for($i=18;$i<100;$i++)
							{
								$txtselect = (isset($_REQUEST['age_range_2']) && $_REQUEST['age_range_2'] == $i)? "selected":"";
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
						<input style="width:80px!important;" id="starttime" name="starttime" type="text" class="spinners required" value="<?php echo isset($_REQUEST['starttime'])? $_REQUEST['starttime']:""; ?>"> &nbsp; to &nbsp;
						<input style="width:80px!important;" id="endtime" name="endtime" type="text" class="spinners required" value="<?php echo isset($_REQUEST['endtime'])? $_REQUEST['endtime']:""; ?>">
					</fieldset>
				</td>
				                              
			</tr>
                        <tr>
                            <td></td>
                            <td>
                                    <fieldset>
                                            <label for='posting_enddt' >Posting End Date:</label>

                                            <select style="width:115px!important;" class="required" id="posting_enddt" name="posting_enddt">   

                                                <?php                                                     
                                                    $hours_before = array('6 Hours', '12 Hours', '1 Day');
                                                    $option = '';
                                                    foreach($hours_before as $v){
                                                        $selected_option = ($_REQUEST['posting_enddt'] == $v)? 'selected':'';
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
						<label for='posting_title' class="slabel_2">Posting Title:</label>
                                                <textarea id='posting_title' name='posting_title' maxlength="50" cols='100' rows='1' class='required inpt_posting_title'><?php echo isset($_REQUEST['posting_title'])? $_REQUEST['posting_title']:""; ?></textarea>
					</fieldset>							
				</td>
			</tr>
			<tr>
				<td colspan=2>
					<fieldset>
						<label for='posting_desc'>Posting Description:</label>
						<textarea id='posting_desc' name='posting_desc' maxlength="300" cols='100' rows='4' class='required'><?php echo isset($_REQUEST['posting_desc'])? $_REQUEST['posting_desc']:""; ?></textarea>
					</fieldset>
				</td>
			</tr>	
			<tr>
				<td colspan=2>
					<fieldset>
						<input type='button' class='submit' id='continue_preview' name='continue_preview' value='Continue >>' />
						<input type='reset' class='submit' id='reset' name='reset' value='Reset' style='margin-right:4px;' />
					</fieldset>	
					
				</td>
			</tr>
		</table>					
	</form>
</div>
</div>

<div class="clear"></div>

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


<div style="font-size:14px;display:none;" id="progressBarMsg" >
    <img id="progressBar" src="/images/loading.gif" /> 
    Saving Changes...
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