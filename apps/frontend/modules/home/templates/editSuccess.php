<style>
    .form-profile{
        font-size: 12px;
        max-width: 404px;
        min-width: 404px;
    } 
</style>


<div class="container">
    <div class="panel with-nav-tabs panel-success">
        <div class="panel-heading">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tabProfile" data-toggle="tab">Account</a></li>
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown">About Yourself <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#tabPersonalInformation" data-toggle="tab">Personal Information</a></li>
                            <li><a href="#tabFavAndInterest" data-toggle="tab">Favorites & Interests</a></li>
                        </ul>
                    </li>
                    <li><a href="#tabChangePassword" data-toggle="tab">Change Password</a></li>
                    <li><a href="#tabPicture" data-toggle="tab">Picture</a></li>
                    <li><a href="#tabFriends" data-toggle="tab">Friends</a></li>
                    <li><a href="#tabEditPosting" data-toggle="tab">Edit Postings</a></li>
                </ul>
        </div>
        <div class="panel-body">
            <div class="tab-content">
                
                <div class="tab-pane fade in active" id="tabProfile">     
                    
                    <div class="div-success alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span id="profileMsgSuccess"></span>
                    </div>
                    <div class="div-error alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span id="profileMsgError"></span>
                    </div>
                    
                    <form class="form-profile" role="form">                                               
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control" disabled value="<?php echo $username; ?>">
                        </div>         
                        
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="text" id="email" name="email" class="form-control" value="<?php echo $email; ?>" />
                        </div>
                        
                        <div class="form-group">                            
                            <div class="dropdown">
                               
                                <div class="btn-group">                                                     
                                    <button id="btn-country" type="button" disabled class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        Loading... <span class="caret"></span>
                                    </button>
                                    <ul id="ul-country" class="dropdown-menu scrollable-menu" role="menu"></ul>                               
                                </div>
                                                                                         
                                <div class="btn-group">                 
                                    <button id="btn-state" type="button" disabled class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <?php echo ucwords($state); ?> <span class="caret"></span>
                                    </button>
                                    <ul id="ul-state" class="dropdown-menu scrollable-menu" role="menu">
                                        <li><a href="#"><?php echo ucwords($state); ?></a></li>
                                    </ul>                               
                                </div>
                                                                                
                                <div class="btn-group">                 
                                    <button id="btn-city" type="button" disabled class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <?php echo ucwords($city); ?> <span class="caret"></span>
                                    </button>
                                    <ul id="ul-city" class="dropdown-menu scrollable-menu" role="menu">
                                        <li><a href="#"><?php echo ucwords($city); ?></a></li>
                                    </ul>                               
                                </div>
                                                                                    
                                <div class="btn-group">                 
                                    <button id="btn-zip" type="button" disabled class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <?php echo $zipCode; ?> <span class="caret"></span>
                                    </button>
                                    <ul id="ul-zip" class="dropdown-menu scrollable-menu" role="menu">
                                        <li><a href="#"><?php echo $zipCode; ?></a></li>
                                    </ul>                               
                                </div>
                            </div>
                        </div>
                        <button id="btnSaveProfile" class="btn btn-md btn-success" type="button">Save Changes</button>          
                        <button id="btnSaveProfileCn" class="btn btn-md btn-success" type="button">Cancel</button>          
                    </form>                    
                </div>
                
                <div class="tab-pane fade" id="tabPersonalInformation">
                    
                    <div class="div-success alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span id="personalInfoMsgSuccess"></span>
                    </div>
                    <div class="div-error alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span id="personalInfoMsgError"></span>
                    </div>
                    
                    <form class="form-profile" role="form">       
                        <?php                        
                            $element = "";
                            foreach($aboutYourself as $key => $val)
                            {
                                if($val['placement_id'] != 1) continue;
                                $name = "abtyrslf_".$val['profile_id'];
                                $value = isset($memberProfile[$val['profile_id']])? $memberProfile[$val['profile_id']]:"";
                                switch($val['input_type'])
                                {
                                    case 'input_tag':
                                        $element .= "<div class='form-group form-personalInfo'>";
                                            $element .= "<label for='$name'>$key</label>";
                                            $element .= '<input type="text" id="'.$name.'" name="'.$name.'" class="form-control" value="'.$value.'" />';
                                        $element .= '</div>';                                                
                                    break;
                                    case 'select_tag':
                                        $element .= "<div class='form-group form-abtyourself form-personalInfo'>";
                                            $element .= "<input type='hidden' id='val-$name' name='val-$name' value='$value' />";
                                            $element .= '<div class="row">';
                                                $element .= '<div class="col-sm-6">';
                                                    $element .= "<label for='$name'>$key</label>";
                                                $element .= '</div>';
                                                $element .= '<div class="col-sm-6">';
                                                    $element .= '<div class="btn-group">';                                                     
                                                    $element .= '<button id="btn-'.$name.'" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
                                                    $element .= 'Loading... <span class="caret"></span>';
                                                    $element .= '</button>';
                                                    $element .= '<ul id="ul-'.$name.'" class="dropdown-menu scrollable-menu" role="menu"></ul>';                               
                                                    $element .= '</div>';
                                                $element .= '</div>';
                                            $element .= '</div>';                                            
                                        $element .= '</div>';
                                    break;	
                                    case 'textarea_tag':
                                        $element .= "<div class='form-group form-personalInfo'>";
                                            $element .= "<label for='$name'>$key</label>";
                                            $element .= '<textarea rows="3" id="'.$name.'" name="'.$name.'" class="form-control" value="'.$value.'"></textarea>';
                                        $element .= '</div>';                             
                                    break;
                                }	
                            }
                            echo $element;                        
                        ?>
                        <button id="btnSavePersonalInfo" class="btn btn-md btn-success" type="button">Save Changes</button>     
                        <button id="btnSavePersonalInfoCn" class="btn btn-md btn-success" type="button">Cancel</button>     
                    </form>
                </div>
                
                <div class="tab-pane fade" id="tabFavAndInterest">
                    
                    <div class="div-success alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span id="favInterestsMsgSuccess"></span>
                    </div>
                    <div class="div-error alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span id="favInterestsMsgError"></span>
                    </div>
                    
                    <form class="form-abtyourself" role="form">       
                        <?php                        
                            $element = '<div class="row">';
                            $element .= '<div class="col-sm-6">';
                            foreach($aboutYourself as $key => $val)
                            {
                                if($val['placement_id'] != 2) continue;
                                $name = "abtyrslf_".$val['profile_id'];
                                $value = isset($memberProfile[$val['profile_id']])? $memberProfile[$val['profile_id']]:"";
                                switch($val['input_type'])
                                {
                                    case 'input_tag':
                                        $element .= "<div class='form-group form-favInterests'>";
                                            $element .= "<label for='$name'>$key</label>";
                                            $element .= '<input type="text" id="'.$name.'" name="'.$name.'" class="form-control" value="'.$value.'" />';
                                        $element .= '</div>';                                                
                                    break;
                                    case 'select_tag':
                                        $element .= "<div class='form-group form-abtyourself form-favInterests'>";
                                            $element .= "<input type='hidden' id='val-$name' name='val-$name' value='$value' />";
                                            $element .= '<div class="row">';
                                                $element .= '<div class="col-sm-6">';
                                                    $element .= "<label for='$name'>$key</label>";
                                                $element .= '</div>';
                                                $element .= '<div class="col-sm-6">';
                                                    $element .= '<div class="btn-group">';                                                     
                                                    $element .= '<button id="btn-'.$name.'" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
                                                    $element .= 'Loading... <span class="caret"></span>';
                                                    $element .= '</button>';
                                                    $element .= '<ul id="ul-'.$name.'" class="dropdown-menu scrollable-menu" role="menu"></ul>';                               
                                                    $element .= '</div>';
                                                $element .= '</div>';
                                            $element .= '</div>';                                            
                                        $element .= '</div>';
                                    break;	
                                    case 'textarea_tag':
                                        $element .= "<div class='form-group form-favInterests'>";
                                            $element .= "<label for='$name'>$key</label>";                                            
                                            $element .= '<textarea rows="3" id="'.$name.'" name="'.$name.'" class="form-control" value="'.$value.'"></textarea>';
                                        $element .= '</div>';                             
                                    break;
                                }	
                            }
                            $element .= '</div>';
                            
                            $element .= '<div class="col-sm-6">';
                            foreach($aboutYourself as $key => $val)
                            {
                                if($val['placement_id'] != 3) continue;
                                $name = "abtyrslf_".$val['profile_id'];
                                $value = isset($memberProfile[$val['profile_id']])? $memberProfile[$val['profile_id']]:"";
                               
                                switch($val['input_type'])
                                {
                                    case 'input_tag':
                                        $element .= "<div class='form-group form-favInterests'>";
                                            $element .= "<label for='$name'>$key</label>";
                                            $element .= '<input type="text" id="'.$name.'" name="'.$name.'" class="form-control" value="'.$value.'" />';
                                        $element .= '</div>';                                                
                                    break;
                                    case 'select_tag':
                                        $element .= "<div class='form-group form-abtyourself form-favInterests'>";     
                                            $element .= "<input type='hidden' id='val-$name' name='val-$name' value='$value' />";
                                            $element .= '<div class="row">';
                                                $element .= '<div class="col-sm-6">';
                                                    $element .= "<label for='$name'>$key</label>";
                                                $element .= '</div>';
                                                $element .= '<div class="col-sm-6">';
                                                    $element .= '<div class="btn-group">';                                                     
                                                    $element .= '<button id="btn-'.$name.'" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
                                                    $element .= 'Loading... <span class="caret"></span>';
                                                    $element .= '</button>';
                                                    $element .= '<ul id="ul-'.$name.'" class="dropdown-menu scrollable-menu" role="menu"></ul>';                               
                                                    $element .= '</div>';
                                                $element .= '</div>';
                                            $element .= '</div>';                                            
                                        $element .= '</div>';
                                    break;	
                                    case 'textarea_tag':
                                        $element .= "<div class='form-group form-favInterests'>";
                                            $element .= "<label for='$name'>$key</label>";
                                            $element .= '<textarea rows="3" id="'.$name.'" name="'.$name.'" class="form-control" value="'.$value.'">'.$value.'</textarea>';
                                        $element .= '</div>';                             
                                    break;
                                }	
                            }
                            $element .= '</div>';
                            $element .= '</div>';
                            
                            echo $element;                        
                        ?>
                    </form>
                    <button id="btnSaveFavAndInterests" class="btn btn-md btn-success" type="button">Save Changes</button> 
                    <button id="btnSaveFavAndInterestsCn" class="btn btn-md btn-success" type="button">Cancel</button>  
                </div>
                
                <div class="tab-pane fade" id="tabChangePassword">
                    <div class="div-success alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span id="chPwdMsgSuccess"></span>
                    </div>
                    <div class="div-error alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span id="chPwdMsgError"></span>
                    </div>
                    <form class="form-profile" role="form"> 
			<div class="form-group">
                            <label for="old_password">Enter Old Password</label>
                            <input type="password" id="oldPassword" name="oldPassword" class="form-control" />                            
                        </div>   
			<div class="form-group">
                            <label for="new_password">Enter New Password</label>
                            <input type="password" id="newPassword" name="newPassword" class="form-control" />
                        </div>	
			<div class="form-group">
                            <label for="new_password2">Confirm New Password</label>
                            <input type="password" id="conPassword" name="conPassword" class="form-control" />
                            <input type="hidden" id="origPassword" name="origPassword" value="<?php echo $password; ?>"/>
                        </div>	
<!--                        <div class="form-group">
                            <label class="checkbox-inline">Show Characters<input type="checkbox" id="showPassword" name="showPassword" class="form-control" /></label>
                        </div>	-->
			<button id="btnSavePassword" class="btn btn-md btn-success" type="button">Save Changes</button> 
                        <button id="btnSavePasswordCn" class="btn btn-md btn-success" type="reset">Cancel</button>  
                    </form>
                </div>
                <div class="tab-pane fade" id="tabPicture">        
                    <div class="div-success alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span id="PicMsgSuccess"></span>
                    </div>
                    <div class="div-error alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <span id="PicMsgError"></span>
                    </div>
                    <div class="row">
                        <form method="post" id="frmUploadPhoto" action="/index.php/home/UploadPhoto" enctype="multipart/form-data">
                            <span id="photoLoader" style="display: none;">Loading...</span>
                            <div id="photoDiv">
                                <?php 
                                    $colMdBody = "";
                                    $tmpPhotoId = 'A';
                                    foreach($photo as $val)
                                    {
                                        $path = $val[1];
                                        $createdAt = (empty($val[0]))? "-":$val[0];
                                        $photo_id = isset($val[2])? $val[2]:$tmpPhotoId;
                                        $fileuploadName = "photo_$photo_id";

                                        $colMdBody .= '<div class="col-md-3">';
                                            $colMdBody .= '<div class="panel panel-success" >';
                                                $colMdBody .= '<div class="panel-body">';
                                                    $colMdBody .= "<img src='$path' class='photo'/>";
                                                $colMdBody .= '</div>';
                                                $colMdBody .= '<ul class="list-group list-group-home">';
                                                    $colMdBody .= '<li class="list-group-item">';
                                                        $colMdBody .= "<a href='#' id='mkProPic' name='mkProPic_$photo_id'> Set as Profile Picture </a>";
                                                    $colMdBody .= '</li>';
                                                    $colMdBody .= '<li class="list-group-item">';
                                                        $colMdBody .= "<input type='file' id='$fileuploadName' name='$fileuploadName' size='30px' /> ";
                                                    $colMdBody .= '</li>';
                                                    $colMdBody .= '<li class="list-group-item">';
                                                        $colMdBody .= "<a href='#' id='rmPic' name='rmPic_$photo_id'> Remove </a>";
                                                    $colMdBody .= '</li>';
                                                $colMdBody .= '</ul>';
                                            $colMdBody .= '</div>';
                                        $colMdBody .= '</div>';                                
                                    }
                                    echo $colMdBody;
                                ?>
                            </div>
                        <button id="btnSavePicture" class="btn btn-md btn-success" type="submit">Upload</button> 
                        <button id="btnSavePictureCn" class="btn btn-md btn-success" type="button">Cancel</button>  
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="tabFriends" >
                    <div id="div-friends" class="row x-rowcls-tbfr">
                       <?php                           
                            $colXsBodyOdd = '<div class="col-xs-6">';                            
                            $colXsBodyEven = '<div class="col-xs-6">';                            
                            $lstGrpOdd = '<ul class="list-group" id="list-grp-odd">';
                            $lstGrpEven = '<ul class="list-group" id="list-grp-even">';
                            $ctr = 1;
                            foreach($friends as $val)
                            {
                                $tmpLstItem  = '';
                                $tmpLstItem .= '<li class="list-group-item">';
                                $tmpLstItem .= "<input type='hidden' id='hd".$val[4]."' name='hd".$val[4]."' value='".$val[2]."' />";
                                $tmpLstItem .= "<input type='hidden' id='fid".$val[4]."' name='fid".$val[4]."' value='".$val[5]."' />";
                                $tmpLstItem .= '<div class="col-xs-12 col-sm-3">';
                                $tmpLstItem .= '<img src="'.$val[1].'" alt="'.$val[0].'" class="img-responsive img-circle" style="height: 98px; width: 98px;"/>';
                                $tmpLstItem .= '</div>';
                                
                                $tmpLstItem .= '<div class="col-xs-12 col-sm-9">';
                                
                                $tmpLstItem .= '<span class="name">'.$val[0].'</span><br/>';                                 
                                $tmpLstItem .= '<span class="pull-left buttons">';
                                $tmpLstItem .= '<button id="btnMsg" name="btn'.$val[4].'"  class="btn btn-sm btn-success" data-toggle="modal" data-target="#message"><i class="fa fa-fw fa-comments"></i> Message</button>';
                                $tmpLstItem .= '&nbsp;';
                                $tmpLstItem .= '<button id="btnRmvFriend" name="btnrm'.$val[4].'" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-times"></i>Unfriend</button>';
                                $tmpLstItem .= '</span>';
                                
                                $tmpLstItem .= '</div>';
                                
                                $tmpLstItem .= '<div class="clearfix"></div>';
                                
                                $tmpLstItem .= '</li>';            
                                
                                if($ctr % 2)
                                {
                                    $lstGrpOdd .= $tmpLstItem;   
                                }
                                else
                                {                                    
                                    $lstGrpEven .= $tmpLstItem;
                                }
                                $ctr++;
                            }    
                            
                            $colXsBodyOdd .= $lstGrpOdd . '</ul></div>';
                            $colXsBodyEven .= $lstGrpEven . '</ul></div>';
                            
                            echo $colXsBodyOdd.$colXsBodyEven;                            
                        ?>
                        
                    </div>
                    <span class="label label-success" >
                        *** By deleting a friend, you understand that you will no longer be able to contact them via your HangOutToday email and they will be removed from your contact list.
                    </span>
                </div>
                <div class="tab-pane fade" id="tabEditPosting">
                    <?php
                    
                        $listBody = '<div id="div-postlist" class="list-group">';
                        foreach($posts as $v)
                        {
//                            $listBody .= '<a href="#" id="postItem" class="list-group-item" style="position:relative;overflow:hidden;" title="Click to View Post" data-toggle="modal" data-target="#viewPost">';
                            $listBody .= '<div id="postItem" class="list-group-item" style="position:relative;overflow:hidden;">';
                            $listBody .= '<div class="caption">';
                            $listBody .= '<p><a href="/index.php/postings/edit?id='.$v->getId().'" class="label label-success" rel="tooltip">Edit</a>';
                            $listBody .= '&nbsp;<a href="" class="label label-success" rel="tooltip">Delete</a></p>';
                            $listBody .= '</div>';
                            $listBody .= '<h4 class="list-group-item-heading">'.$v->getPostingTitle().'<span class="text-muted" style="float:right;font-size:13px!important;">Created </span></h4>';
                            $listBody .= '<p class="list-group-item-text text-muted" style="font-size: 12px!important;">'.$v->getPostingDesc().'</p>';     
                            $listBody .= '</div>';
//                            $listBody .= '</a>';
                        }
                        $listBody .= "</div>";
                       
                        echo $listBody;                           
                    ?>
                    
                    <!--//Pagination//-->
                    <input type='hidden' id='page-num' value='0' />
                    <input type='hidden' id='total' value='<?php echo $total; ?>' />
                    <button id="btnPrevPost" class="btn btn-md btn-success disabled fa fa-backward" type="button">&nbsp;</button> 
                    <input type="text" id="page-value" value="1" class="form-control"/>
                    <span id="page-of"> of </span>
                    <input type="text" id="page-total" value="<?php echo $totalPostings; ?>" class="form-control disabled"/>
                    <button id="btnNextPost" class="btn btn-md btn-success fa fa-forward" type="button">&nbsp;</button> 
 
                </div>
            </div>
        </div>
    </div>
</div>

<input type='hidden' id="msgSender" name="msgSender" value="<?php echo $nickname; ?>" />
<div class="modal fade" id="message" tabindex="-1" role="dialog" aria-labelledby="messageLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="panel panel-success">
            <div class="panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="panel-title" id="messageLabel"><span class="fa fa-fw fa-envelope"></span> Send a Message</h4>                
            </div>
            <div class="modal-body" style="padding: 5px;">                
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                        <input class="form-control" id="msgEmail" name="msgEmail" placeholder="E-mail" type="text" disabled />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                        <input class="form-control" id="msgSubject" name="msgSubject" placeholder="Subject" type="text" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <textarea style="resize:vertical;" class="form-control" placeholder="Message..." rows="6" id="msgContent" name="msgContent" required></textarea>
                    </div>
                </div>
            </div>  
            <div class="panel-footer" style="margin-bottom:-14px;">
                <button type="button" id="btnSend" class="btn btn-success">Send</button>
                <button type="button" id="btnClear" class="btn btn-danger">Clear</button>
            </div>
        </div>
    </div>
</div>        

<div class="modal fade" id="viewPost" tabindex="-1" role="dialog" aria-labelledby="post-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="panel panel-success">
            <div class="panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="panel-title" id="post-label"><span class="fa fa-fw fa-comment"></span> Post Details</h4>                
            </div>
            <div class="modal-body" style="padding: 5px;">   
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 0px; padding-top: 10px;">
                        <label for="post-gender">Gender to Hangout with</label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                        <div class="btn-group">                              
                            <button id="btn-gender" type="button" disabled class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Female <span class="caret"></span>
                            </button>
                            <ul id="ul-city" class="dropdown-menu scrollable-menu" role="menu">
                                <li><a href="#">Any</a></li>
                                <li><a href="#">Female</a></li>
                                <li><a href="#">Male</a></li>
                            </ul>                               
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 0px; padding-top: 10px;">
                        <label for="post-numppl">Number of People to Hangout with</label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                        <div class="btn-group">                              
                            <button id="btn-numppl" type="button" disabled class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                1 <span class="caret"></span>
                            </button>
                            <ul id="ul-city" class="dropdown-menu scrollable-menu" role="menu">
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">6</a></li>
                            </ul>                               
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 0px; padding-top: 10px;">
                        <label for="post-numppl">Number of People to Hangout with</label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
                        <div class="btn-group">                              
                            <button id="btn-numppl" type="button" disabled class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                1 <span class="caret"></span>
                            </button>
                            <ul id="ul-city" class="dropdown-menu scrollable-menu" role="menu">
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">6</a></li>
                            </ul>                               
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                        <label for="post-title">Post Title</label>
                        <input class="form-control" id="post-title" name="post-title" type="text" disabled />
                    </div>
                </div>                
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label for="post-desc">Post Description</label>
                        <textarea style="resize:vertical;" class="form-control" rows="6" id="post-desc" name="post-desc" required></textarea>
                    </div>
                </div>
            </div>  
            <div class="panel-footer" style="margin-bottom:-14px;">
                <button type="button" id="btnEdit" class="btn btn-success">Edit</button>
                <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>  

<!--<div style='display:none'>
	<div id="sendmsg">
		<div class=''>
			<form action="/index.php/home/sendMessage" name="sendMsgForm" id="Popup" method="post">	
				
				<input type='hidden' name="sendmsg_from" value='<?php echo $myAccount["nickName"]; ?>' />
				
				<fieldset>
					<label for="sendmsg_to"> <b> To: </b> </label>
					<input type="text" id="sendmsg_to" name="sendmsg_to" class="required" onkeyup="" />
				</fieldset> 
				
				<fieldset>
					<label for="sendmsg_subj"> <b> Subject: </b> </label>
					<input type="text" id="sendmsg_subj" name="sendmsg_subj" class="required" onkeyup="" />
				</fieldset>
				
				<fieldset>
					<label for="message"> <b> Message: </b> </label>
					<textarea cols='71' rows='8' id="message" name="message"> </textarea>
				</fieldset>
				
				<fieldset>
					<input type="submit" id="btnSendMsg" name="btnSendMsg" class="submit" value="Send Message" />
				</fieldset>
				
			</form>
		</div>
	</div>
</div>-->
