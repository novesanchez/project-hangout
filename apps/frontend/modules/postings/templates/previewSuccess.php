<style>

    .form-create{
        font-size: 12px!important;
    }
    
    
</style>

<div class="container-fluid">
    
    <section class="container">
        
                <h3 class="dark-grey" id="lblPrvwPost">Review Your Post!</h3>

                <div class="div-success alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span id="alertMsgSuccess"></span>
                </div>
                <div class="div-error alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <span id="alertMsgError"></span>
                </div>
                
                <div class="container-page">	
                    
                    <div class="panel panel-success">
                        <div class="panel-body">

                            <div class="form-group" style="font-size:12px!important;">
                                    <label>Posting Title:</label>
                                    <p><?php echo $_REQUEST['posting_title']; ?></p>
                            </div>
                            <div class="form-group" style="font-size:12px!important;">
                                    <label>Posting Description:</label>
                                    <p><?php echo $_REQUEST['posting_desc']; ?></p>
                            </div>                            

                            <div class="form-group" style="font-size:12px!important;">
                                    <label>Gender to Hangout with:</label>
                                    <?php echo $gender; ?>
                            </div>

                            <div class="form-group" style="font-size:12px!important;">
                                    <label>Hangout Start Date & Time:</label>
                                    <?php echo $startdtHangout; ?>
                            </div>

                            <div class="form-group" style="font-size:12px!important;">					
                                    <label>Hangout End Date & Time:</label>
                                    <?php echo $enddtHangout; ?>
                            </div>
                        
                            <div class="form-group" style="font-size:12px!important;">
                                    <label>Number of People to Hangout with:</label>
                                    <?php echo $_REQUEST['num_ppl']; ?> 
                            </div>

                            <div class="form-group" style="font-size:12px!important;">
                                <label>Age Range:</label>
                                 <?php echo $ageRange; ?>
                            </div>

                            <div class="form-group" style="font-size:12px!important;">
                                    <label>Expires in:</label>
                                    <?php echo $postingEnddt; ?>
                                    <p class="help-block">Before the start time of hangout date.</p>
                            </div>		

                        </div>
                    </div>
                    
                </div>
                
                <form name="posting" method="post">
                    
                    <input type="hidden" id="posting_title" name="posting_title" value="<?php echo $_REQUEST['posting_title']; ?>" />
                    <input type="hidden" id="posting_desc"  name="posting_desc" value="<?php echo $_REQUEST['posting_desc']; ?>" />
                    <input type="hidden" id="startdt_hangout" name="startdt_hangout" value="<?php echo $_REQUEST['hngtStartDtTm_']; ?>" />
                    <input type="hidden" id="enddt_hangout" name="enddt_hangout" value="<?php echo $_REQUEST['hngtEndDtTm_']; ?>" />                
                    <input type="hidden" id="posting_enddt" name="posting_enddt" value="<?php echo date("Y-m-d h:i:s", strtotime($postingEnddt)); ?>" />
                    <input type="hidden" id="num_ppl" name="num_ppl" value="<?php echo $_REQUEST['num_ppl']; ?>" />
                    <input type="hidden" id="gender" name="gender" value="<?php echo $_REQUEST['gender_type']; ?>" />
                    <input type="hidden" id="age_range_1" name="age_range_1" value="<?php echo $_REQUEST['age_range_1']; ?>" />
                    <input type="hidden" id="age_range_2" name="age_range_2" value="<?php echo $_REQUEST['age_range_2']; ?>" />
                    <input type="hidden" id="post-enddt" name="post-enddt" value="<?php echo $_REQUEST['posting-enddt']; ?>" />   
                    <input type="hidden" id="posting_id" name="posting_id" value="" />
                    
                    <button id="btnSubmit" class="btn btn-success" type="button">Submit Post</button> 
                    <button id="btnBack" class="btn btn-success" type="button">Go Back</button> 

                    
                </form>
                
    </section>
    
</div>



<!--
<div class="clear"></div>

<div class="container_12" id="body-wrap" role="main">
		<div class="blog-page-post">
        <h2>&nbsp;&nbsp;Preview Post </h2>
			
        <form id="formAll" name="posting" method="post">
                <div id="post-content-wrap" class="grid_7 suffix_1 sform_1" style="width:96%;padding-right:0px!important;background-color: #FFFFFF;">
                        <div style="background-color: '#000'!important;height:200px;margin-bottom: 10px;">
                            <h3 class="blog-page-title"><a href="#"><?php echo $_REQUEST['posting_title']; ?></a> </h3>

                            <div class="featured-image grid_5 omega" >
                                    <img height=182 width=182 src="<?php echo '/'.$picPath; ?>" alt="featured image" />
                            </div> end .featured-image 

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
                            </div>  end .meta 
                            <div class="clear"></div>
                            <br/>
                            
                            <div style="word-break:break-all!important;width:910px!important;display:block;">
                                <blockquote> <?php echo $_REQUEST['posting_desc']; ?> </blockquote>
                            </div>  
                        </div>
                    
                        <input type="button" class="submit" id="submtPost" value="Submit Post" />
                        <input type="button" class="submit" id="backToEdit" value="Back" style='margin-right:4px;' />

                         hidden fields 
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
                         end #hidden fields 
                        
                </div>  end #content 
        </form>			
        </div> 
</div>-->

