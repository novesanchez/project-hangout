<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="panel panel-success">
                <div class="panel-body">
                   <div class="profile "> 
                        <img src="<?php echo '/'.$myAccount['path']; ?>" />
                    </div>
                </div>
                <ul class="list-group list-group-home">
                    <li class="list-group-item">
                        <a href="<?php echo '/index.php/home/profile?id='.$myAccount['profile_id'].'&mod='.base64_encode('(Back to Home)').'&mod_id=2'; ?>" title="Click to view your public profile."> Public Profile </a>
                    </li>
                    <li class="list-group-item">
                        <a href="/index.php/home/rateHangout">Rate HangOut</a></li>
                    </li>
                    <li class="list-group-item">
                        <a href="/index.php/home/hangoutReview">HangOut Reviews</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/index.php/home/friendRequest">New Friend Request</a>
                    </li>                    
                </ul>
            </div>
        </div>
        <div class="col-sm-9">
            
            <div class="panel panel-success">
                <div class="panel-heading">My Hangouts Today</div>
                <div class="panel-body">
                    <div id="myHangoutToday"></div>
                    <div id="myHangoutToday_ajax">
                        <img src='/images/loading.gif'/>                     
                        <strong>Please wait...</strong>                        
                    </div>                        
                    <div style='font-weight:bold; width:100%;'> <a href='#myHangoutToday' target="_self" style="display: none;" id='myHangoutLoadMore'>Load More Posts...</a> </div>
                    <input type="hidden" id="myHangoutStart" name="myHangoutStart" value="0"/>  
                </div>
            </div>
            
            <div class="panel panel-success">
                <div class="panel-heading">My Upcoming Hangouts</div>
                <div class="panel-body">
                    <div id="myUpcomingHangout"></div>
                    <div id="myUpcomingHangout_ajax">
                        <img src='/images/loading.gif'/>                     
                        <strong>Please wait...</strong>                        
                    </div>			                        
                    <div style='font-weight:bold; width:100%;'> <a href='#myUpcomingHangout' target="_self" style="display: none;" id='myUpcomingLoadMore'>Load More Posts...</a> </div>
                    <input type="hidden" id="myUpcomingHangoutStart" name="myUpcomingHangoutStart" value="0"/>  
                </div>
            </div>
            
            <div class="panel panel-success">
                <div class="panel-heading">My Postings</div>
                <div class="panel-body">
                    <div id="myPostings"></div> 
                    <div id="ajax">
                        <img src='/images/loading.gif'/>                     
                        <strong>Please wait...</strong>                        
                    </div>                         
                    <div style='font-weight:bold; width:100%;'> <a href='#myPostings' target="_self" style="display: none;" id='myPostingLoadMore'>Load More Posts...</a> </div>
                    <input type="hidden" id="myPostingStart" name="myPostingStart" value="0"/>  
                </div>
            </div>
            
        </div>
    </div>
</div>
