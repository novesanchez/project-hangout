<script src="/js/dummy.js"></script>
<script type="text/javascript">
    jQuery(function(){
    
        $(".rating-cancel").hide();

        $('.star').mouseover(function(e){				
            var tip = $('#tip');	
            var title = $('input#' + this.id).attr('title');
            var elname = $('input#' + this.id).attr('name');
            $('#'+ elname +'-tip').text(title);					
            $('#'+ elname +'-tip-value').hide();	
            $(".rating-cancel").hide();				
        });

        $('.star').mouseout(function(e){				
            var tip = $('#tip');	
            var title = $('input#' + this.id).attr('title');
            var elname = $('input#' + this.id).attr('name');
            $('#'+ elname +'-tip').text('');
            $('#'+ elname +'-tip-value').show();					
            $(".rating-cancel").hide();
        });

        $('.star').click(function(e){				
            var tip = $('#tip');	
            var title = $('input#' + this.id).attr('title');
            var elname = $('input#' + this.id).attr('name');
            $('#'+ elname +'-tip-value').text(title);
            $(".rating-cancel").hide();					
        });	
    
    });
    
</script>
<!--<div class="container_12" id="header" >
	<header>
		 Logo Here 
		<a href="#">
			<div id="logo" class="grid_4"></div> end #logo .grid_4 
		</a>
		 Main Navigation Here 
		<nav id="top_nav" class="grid_8">
                    <ul id="main-nav" class="sf-menu">
                        <li class="current" title="#F9CD4B">
                                <a href="/index.php/home/index" class="active">Home</a> 
                        </li> 
                        <li title="My Account"> 
                                <a href="/index.php/home/edit">My Account</a> 
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
                                <a href="/index.php/hotlist">Hot List</a> 
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

	<h3>Tell us about your HangOut Today Experience with <?php echo $nickName; ?></h3>
        <div style='font-style: italic ;color:#E75C58;'>* Please make sure to update the pre-selected answers of the survey.</div>
	<br/>
        <?php
            		
            $Body = "<form id='survey-form' method='post' action='/index.php/home/PostExperience'> 
                        <input type='hidden' name='ratee' value='{$_GET['id']}' />
                        <input type='hidden' name='posting_id' value='{$_GET['posting']}' />
                        <table class='survey-form'>";
            foreach($questions as $val)
            {	            		
                    $i = $val->getId();

                    if($val->getAnswerType() == 2)
                    {
                        $Body .= "<tr>
                                    <td><li>".$val->getQuestions()."</li></td>";
                        $Body .=    "<td>
                                        Yes <input type='radio' id='yes_$i' name='question_$i' value='1' checked/> 
                                        &nbsp;&nbsp;&nbsp;
                                        <b>OR</b>
                                        &nbsp;&nbsp;&nbsp;
                                        No <input type='radio' id='no_$i' name='question_$i' value='0'/>
                                     </td>
                                  </tr>";
                    }
                    else if($val->getAnswerType() == 1)
                    {	
                        $Body .= "<tr><td><li>".$val['questions']."</li></td>";
                        $Body .= "<td>
                                    <input id='rating$i-1' name='question_$i' type='radio' class='star' value='1' title='Very Inaccurate'/>
                                    <input id='rating$i-2' name='question_$i' type='radio' class='star' value='2' title='Inaccurate'/>
                                    <input id='rating$i-3' name='question_$i' type='radio' class='star' value='3' title='Neither Inaccurate or Accurate' checked/>
                                    <input id='rating$i-4' name='question_$i' type='radio' class='star' value='4' title='Accurate'/>
                                    <input id='rating$i-5' name='question_$i' type='radio' class='star' value='5' title='Very Accurate'/>
                                    <td width='180px'>
                                        <span id='question_$i-tip' style='margin:0 0 0 0'></span>
                                        <span id='question_$i-tip-value' name='tip' style='margin:0 0 0 0'></span>
                                    </td>";
                    }
                    else
                    {								
                        $Body .= "<tr><td colspan=3><li>".$val->getQuestions()." <br/><br/> <textarea class='comment' name='question_$i'> </textarea> </li> </td>";
                    }

                    $Body .= "</tr>";
            }

            $Body .= "<tr>
                        <td colspan=3>
                            <center> 
                                <input class='submit' type='submit' name='submit' value='Post your Experience'/> <br/>	
                                <div style='padding:5px;font-weight:normal;'> <a href='/index.php/home/rateHangout' style='text-decoration:underline;'>Not Now</a> </div>
                            </center>
                        </td>
                      </tr>";
            $Body .= "</table> 
                    </form>";
            echo $Body;
        ?>
        
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
				HangOutToday is for you! (Click here to <a href="/index.php/information/learnMore">Learn More</a>)
			</p>
		</div> 
		
	</div> <!-- end .container_12 #call-to-action -->
</div><!-- end .cta-wrap -->

