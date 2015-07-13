<script src="/js/dummy.js"></script>
<script type="text/javascript">
    jQuery(function(){
        $(".rating-cancel").hide();
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
    
    <div class="body-miniwrap">
	<!-- BEGIN SIDEBAR -->
        <div class="tabContainer left widget" >            
                <div class="tabDesc tabDesc_pub">                         
                    <img src="<?php echo '/'.$path; ?>" />
                </div>
                <div class="bottom_links myPhotoThumbNail">
                    <ul>                            
                        <li> My Photos </li>
                        <?php
                            $li = "";
                            foreach($photos as $x => $p){
                            $li .= "<li> <img class='thumb_ph' src='/".$p['path']."' rel='#photo".($x + 1)."'/> </li>";
                            }
                            echo $li;
                        ?>

                    </ul>
                </div>
        </div> 
        
        <div id="post-content-wrap" class="grid_7 profile_boxhdr tabProfileBoxHdr">
            <table style="font-size: 14px!important; width: 650px; border: 0px; margin: 5px;">
                <tr>
                    <td style="font-weight:bold;"><?php echo strtoupper($username); ?></td>
                    <td style="font-weight:bold;"><?php echo $location; ?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td style="font-weight:bold;">RATINGS</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
            </table>
        </div>
        
        <div id="post-content-wrap" class="grid_7 profile_box tabProfileBox">
            
            <?php
                //Basic details pf profile
                $basicProfileHtml = "";
                foreach($basicProfile as $i => $val)
                {
                    $cssProfileSubbox = ($i & 1)? 'label_5':'label_3';
                    $basicProfileHtml .= '<div class="blog-page-post profile_subbox '.$cssProfileSubbox.'">';
                    $basicProfileHtml .= '<ul>';
                    foreach($val as $subval)
                    {
                        $semiColon = ($i & 1)? '':':';
                        $basicProfileHtml .= '<li>'.$subval.$semiColon.'</li>';
                    }
                    $basicProfileHtml .= '</ul>';
                    $basicProfileHtml .= '</div>';

                }

                echo $basicProfileHtml;
            ?>
            
             <div class="blog-page-post profile_subbox">
                    
                <?php  
                
                        $p = array();
                        if(isset($_GET['post_id'])) $p[] = 'id='.$_GET['post_id'];
                        if(isset($_GET['sort_by'])) $p[] = 'sort_by='.$_GET['sort_by'];
                        
                        $params = count($p) > 0? '?'.implode("&", $p) : '';
                        $url = '';
                        if(isset($_GET['mod_id']) && $_GET['mod_id'] == 1){
                            $url = '/index.php/postings/post';
                        } else if(isset($_GET['mod_id']) && $_GET['mod_id'] == 2){
                            $url = '/index.php/home/index';
                        }
                        
                        $ratingHtml  = '';// '<h3 class="blog-page-title">Ratings'.(isset($_GET['mod'])? '<a title = "Click to go back to previous page" href="'.$url.$params.'"><span style="margin-left:5px;margin-bottom:5px;font-size:15px;font-style:italic;color:blue;">'.  base64_decode($_GET['mod']).'</span></a>' : '') . '</h3>' ;
                        
                        $ratingHtml .= '<table style="border:0px;">';
                        $ratingHtml .= '<thead> 
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td style="font-size:12px;text-align:center;color:#000; font-weight:bold;">Members Leaving Feedback</td> 
                                       </thead>';
                        foreach ($ratings as $i => $v){
                            
                            $numberOfMembersLeavingFeedback = (empty($membersLeavingFeedback[$v['id']]))? 0:$membersLeavingFeedback[$v['id']];
                            
                            $ave = empty($v['average'])? 0:$v['average'];
                            $checked = array(); $computed_ave = $ave/2;
                            $checked[0]=''; $checked[1]=''; $checked[2]=''; $checked[3]=''; $checked[4]='';
                            if($computed_ave == 50){
                                $checked[4] = 'checked';
                            }else if($computed_ave > 0 && $computed_ave < 20){
                                $checked[0] = 'checked';
                            }else if($computed_ave >= 20 && $computed_ave < 30){
                                $checked[1] = 'checked';
                            }else if($computed_ave >= 30 && $computed_ave < 40){
                                $checked[2] = 'checked';
                            }else if($computed_ave >= 40 && $computed_ave < 50){
                                $checked[3] = 'checked';
                            }
                            
                            $ratingHtml .= "<tr>";
                            $ratingHtml .= "<td>";
                                $ratingHtml .= "{$v['questions']}";
                            $ratingHtml .= "</td>";
                            $ratingHtml .= "<td>";
                                $ratingHtml .= "<input id='question$i-1' name='question$i' type='radio' class='star' disabled='disabled' {$checked[0]}/>";                                
                                $ratingHtml .= "<input id='question$i-2' name='question$i' type='radio' class='star' disabled='disabled' {$checked[1]}/>";
                                $ratingHtml .= "<input id='question$i-3' name='question$i' type='radio' class='star' disabled='disabled' {$checked[2]}/>";
                                $ratingHtml .= "<input id='question$i-4' name='question$i' type='radio' class='star' disabled='disabled' {$checked[3]}/>";
                                $ratingHtml .= "<input id='question$i-5' name='question$i' type='radio' class='star' disabled='disabled' {$checked[4]}/>";
                            $ratingHtml .= "</td>";
                            $ratingHtml .= "<td style='text-align:center;'>";
                                $ratingHtml .= "<b> $numberOfMembersLeavingFeedback </b>";
                            $ratingHtml .= "</td>";    
                            $ratingHtml .= "<td style='text-align:right;'>";
                                $ratingHtml .= "<b>$ave%</b>";
                            $ratingHtml .= "</td>";                            
                        }
                        $ratingHtml .= "<tr> <td colspan=4></td> </tr>";
                        $ratingHtml .= '<tr> 
                                            <td style="font-weight:bold;"> Number of Hangouts: &nbsp;&nbsp; '.$number_of_hangouts.'<br/> <a href="/index.php/home/publicHangoutReview?id='.$_GET['id'].'" style="font-weight:normal;"> View Hangout Reviews </a> </td>';
                        $ratingHtml .= '<td style="text-align:left;"><b></b></td><td>&nbsp;</td>  </tr>';
                        $ratingHtml .= '</table>';
                        echo $ratingHtml;
                     
                ?>
            </div>
        </div>
        
        <div id="post-content-wrap" class="grid_7 profile_box profile_details tabProfileBox">
            <?php
                //Basic details pf profile
                $basicProfileHtml = "";
                foreach($basicProfile2 as $i => $val)
                {
                    $cssProfileSubbox = ($i & 1)? 'label_4':'label_3';
                    $basicProfileHtml .= '<div class="blog-page-post profile_subbox '.$cssProfileSubbox.'">';
                    $basicProfileHtml .= '<ul>';
                    foreach($val as $subval)
                    {
                        $semiColon = ($i & 1 || $i == 2)? '': ':';
                        $basicProfileHtml .= '<li>'.$subval.$semiColon.'</li>';
                    }
                    $basicProfileHtml .= '</ul>';
                    $basicProfileHtml .= '</div>';
                    
                }
            
                echo $basicProfileHtml;
            ?>
        </div>       
        
        <?php
            
            $otherProfileHtml = "";
            foreach($otherProfile as $val)
            {
                $otherProfileHtml .= '<div id="post-content-wrap" class="grid_7 profile_box profile_box_q tabProfileBox" >';
                foreach($val as $i => $innerVal)
                {
                    $cssProfileSubbox = ($i & 1)? 'label_2_q':'label_1_q';
                    $otherProfileHtml .= '<div class="blog-page-post profile_subbox_q '.$cssProfileSubbox.'">';
                    $otherProfileHtml .= '<ul>';
                    foreach($innerVal as $subval)
                    {
                        $semiColon = ($i & 1)? '': ':';
                        $otherProfileHtml .= '<li>'.$subval.$semiColon.'</li>';
                    }
                    $otherProfileHtml .= '</ul>';
                    $otherProfileHtml .= '</div>';
                }
                $otherProfileHtml .= "</div>";
            }
            
            echo $otherProfileHtml;
        ?>
        
    </div>
    
</div> <!-- end #body-wrap .container_12 -->

<?php
    $img = "";
    foreach($photos as $x => $p){
        $img .= "<div class='apple_overlay' id='photo".($x + 1)."' >";
        $img .= "   <img src='/".$p['path']."'  height=365 width=470/>";
        $img .= "</div>";
    }
    echo $img;
?>

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
        