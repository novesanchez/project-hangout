<style>

    .form-create{
        font-size: 12px!important;
    }
    
    
</style>

<div class="container-fluid">
    
    <section class="container">
        
                <h3 class="dark-grey">Create Post</h3>

                <div class="div-success alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span id="alertMsgSuccess"></span>
                </div>
                <div class="div-error alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span id="alertMsgError"></span>
                </div>
                
                <form id="formAll" method="post" action="/index.php/postings/preview" name="frmCrtPostings">
                    <div class="container-page">	
                                        
                        <div class="col-md-6">                            
                                <div class="form-group" style="font-size:12px!important;">
					<label>Posting Title:</label>
					<input type="text" maxlength="50" name="posting_title" class="form-control" id="posting_title" placeholder="Maximum of 50 characters only." value="<?php echo isset($_REQUEST['posting_title'])? $_REQUEST['posting_title']:""; ?>">
				</div>
                                <div class="form-group" style="font-size:12px!important;">
					<label>Posting Description:</label>
					<textarea class="form-control" id='posting_desc' name='posting_desc' maxlength="300" cols='100' rows='4' placeholder="Maximum of 300 characters only."><?php echo isset($_REQUEST['posting_desc'])? $_REQUEST['posting_desc']:""; ?></textarea>
				</div>
                            
                                <button id="btnContinue" class="btn btn-success" type="button">Continue</button> 
                                <button id="btnReset" class="btn btn-success" type="button">Reset</button> 
                        </div>
                    
			<div class="col-md-6">

				<div class="form-group col-lg-6" style="font-size:12px!important;">
					<label>Gender to Hangout with:</label>
                                        <?php
                                            $genderType = array('f'=>'Female','m'=>'Male','a'=>'Any');
                                            $select = "<select id='gender_type' name='gender_type' class='form-control'>";
                                            foreach($genderType as $k => $g)
                                            {
                                                    $txtselect = (isset($_REQUEST['gender']) && $_REQUEST['gender'] == $k)? "selected":"";
                                                    $select .= "<option value='$k' $txtselect >$g</option>";
                                            }
                                            $select .= "</select>";	
                                            echo $select;
                                        ?>
				</div>
				
                                <div class="form-group col-lg-6" style="font-size:12px!important;">
					<label>Hangout Start Date & Time:</label>
					<div class="input-group date" id="hangout-startdt">
                                        <input type="text" class="form-control" value="<?php echo isset($_REQUEST['startdt_hangout'])? $_REQUEST['startdt_hangout']:""; ?>"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span> 
                                            </span>
                                        </div>
				</div>

				<div class="form-group col-lg-6" style="font-size:12px!important;">
					<label>Number of People to Hangout with:</label>
					<?php 
                                            $select = "<select id='num_ppl' name='num_ppl' class='form-control'>";
                                            for($i=1;$i<6;$i++)
                                            {
                                                    $txtselect = (isset($_REQUEST['num_ppl']) && $_REQUEST['num_ppl'] == $i)? "selected":"";
                                                    $select .= "<option value='$i' $txtselect>$i person</option>";		
                                            }
                                            $select .= "</select>";
                                            echo $select;
                                        ?>
				</div>
				
				<div class="form-group col-lg-6" style="font-size:12px!important;">					
                                        <label>Hangout End Date & Time:</label>
                                        <div class="input-group date" id="hangout-enddt">
                                        <input type="text" class="form-control" value="<?php echo isset($_REQUEST['enddt_hangout'])? $_REQUEST['enddt_hangout']:""; ?>"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span> 
                                            </span>
                                        </div>
				</div>
						
                                <div class="dropdown">
                                    <div class="button-group col-lg-3" style="font-size:12px!important;">
                                            <label>Age Range: To</label>
                                            <?php 
                                            $select = "<select style='width:105px!important;' id='age_range_1' name='age_range_1' class='form-control'>";
                                                for($i=18;$i<100;$i++)
                                                {
                                                        $txtselect = (isset($_REQUEST['age_range_1']) && $_REQUEST['age_range_1'] == $i)? "selected":"";
                                                        $select .= "<option value='$i' $txtselect >$i</option>";	
                                                }
                                                $select .= "</select>";                                                                                        					
                                                echo $select;	
                                            ?>
                                    </div>

                                    <div class="button-group col-lg-3" style="font-size:12px!important;">
                                            <label>From</label>
                                            <?php 
                                                $select = "<select style='width:105px!important;' id='age_range_2' name='age_range_2' class='form-control'>";
                                                for($i=18;$i<100;$i++)
                                                {
                                                        $txtselect = (isset($_REQUEST['age_range_2']) && $_REQUEST['age_range_2'] == $i)? "selected":"";
                                                        $select .= "<option value='$i' $txtselect >$i</option>";	
                                                }
                                                $select .= "</select>";						
                                                echo $select;	
                                            ?>
                                    </div>			
				</div>

				<div class="form-group col-lg-6" style="font-size:12px!important;">
                                        <label>Expires in:</label>
                                        <select class="form-control" id="posting-enddt" name="posting-enddt">   
                                            <?php                                                     
                                                $hours_before = array('6 Hours', '12 Hours', '1 Day');
                                                $option = '';
                                                foreach($hours_before as $v){
                                                    $selected_option = ($_REQUEST['post-enddt'] == $v)? 'selected':'';
                                                    $option .= '<option value="'.$v.'" '.$selected_option.'>'.$v.'</option>';
                                                }
                                                echo $option;
                                            ?>
                                        </select>
                                        <p class="help-block">Before the start time of hangout date.</p>
				</div>		
			
                        </div>
                        	
		</div>
            </form>
    </section>
    
</div>
