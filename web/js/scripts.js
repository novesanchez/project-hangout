jQuery(function(){

/*-----------------------------------------------------------------------------------*/
/*	Slider - http://slidesjs.com/
/*-----------------------------------------------------------------------------------*/
//	if (jQuery().slides) {
//
//		jQuery('#slider').css({display : 'block'});
//		jQuery('#slider2').css({display : 'block'});
//			
//		jQuery("#slider").slides({
//			preload: true,
//			preloadImage: 'images/slider/loading.gif',
//			play: 0, //Auto play time. Set to 0 to stop auto rotate. 6000
//			width: 960,
//			pause: 4500,
//			slideSpeed: 1000, //Slide rotation speed.
//			generatePagination: true,
//			hoverPause: true,
//			autoHeight: true
//		});	
//		
//	}
				
/*-----------------------------------------------------------------------------------*/
/*	Fading Buttons - http://greg-j.com/2008/07/21/hover-fading-transition-with-jquery/
/*-----------------------------------------------------------------------------------*/		

//	jQuery('.fadeThis').append('<span class="hover"></span>').each(function () {
//	  var $span = $('> span.hover', this).css('opacity', 0);
//	  jQuery(this).hover(function () {
//	    $span.stop().fadeTo(500, 1);
//	  }, function () {
//	    $span.stop().fadeTo(500, 0);
//	  });
//	});
	
	
/*-----------------------------------------------------------------------------------*/
/*	Show/Hide Content - http://rpardz.com/blog/show-hide-content-jquery-tutorial/
/*-----------------------------------------------------------------------------------*/	
	
//    jQuery('.open-content').hide().before('<div class="container_12"><a href="#" id="toggle-content" class="button"><div id="expand-button" ></div></a></div><div id="toggle-top" style="width:100%"></div>');
//	jQuery('a#toggle-content').click(function() {
//		jQuery('.open-content').slideToggle(1000);
//		return false;
//	});
	
	
/*-----------------------------------------------------------------------------------*/
/*	FancyBox  - http://fancybox.net/
/*-----------------------------------------------------------------------------------*/	
//			jQuery("#various1").fancybox({
//				'titlePosition'		: 'inside',
//				'transitionIn'	: 'elastic',
//				'transitionOut'	: 'elastic'
//			});
//			
//			jQuery("a.portfolio").fancybox();
//			
			
/*-----------------------------------------------------------------------------------*/
/*	Mosaic Image Hover   - http://buildinternet.com/project/mosaic/1.0/
/*-----------------------------------------------------------------------------------*/	
//				jQuery('.circle').mosaic({
//					opacity : 0.8	//Opacity for overlay (0-1)
//				});
//				
//				jQuery('.fade').mosaic();
				
/*-----------------------------------------------------------------------------------*/
/*	Add Class to Tag Cloud (WP prep work) - http://www.simplethemes.com/blog/entry/style-wordpress-tags/
/*-----------------------------------------------------------------------------------*/					
		jQuery('p.tags a').wrap('<span class="jg-tags" />');
		
		
/*-----------------------------------------------------------------------------------*/
/*	Navigation -  http://users.tpg.com.au/j_birch/plugins/superfish/
/*-----------------------------------------------------------------------------------*/		
//		jQuery("ul.sf-menu").superfish(); 
   
/*-----------------------------------------------------------------------------------*/
/*	MagicLine Navigation Effect  - http://css-tricks.com/jquery-magicline-navigation/
/*-----------------------------------------------------------------------------------*/	
	
//    var $el, leftPos, newWidth;
//        $mainNav = jQuery("#main-nav");
// 	$mainNav.append('<li id="magic-line" style="z-index:10;"></li>');
//    
//    var $magicLine = jQuery("#magic-line");
//    
//    $magicLine
//        .width(jQuery(".current").width())
//        .height($mainNav.height())
//        .css("left", jQuery(".current a").position().left)
//        .data("origLeft", jQuery(".current").position().left)
//        .data("origWidth", $magicLine.width())
//        .data("origColor", jQuery(".current").attr("title"));
            
//    jQuery("#main-nav>li").hover(function() {
//        $el = jQuery(this);
//        leftPos = $el.position().left;
//        newWidth = $el./*parent()*/width();
//        $magicLine.stop().animate({
//            left: leftPos,
//            width: newWidth,
//            backgroundColor: '#F9CD48' // $el.attr("title")
//        })
//    }, function() {
//        $magicLine.stop().animate({
//            left: $magicLine.data("origLeft"),
//            width: $magicLine.data("origWidth"),
//            backgroundColor: $magicLine.data("origColor")
//        });    
//    });
    
    /* Kick IE into gear */
//    jQuery(".current a").mouseenter();


	
/*-----------------------------------------------------------------------------------*/
/*	Tooltip  - http://craigsworks.com/projects/qtip/
/*-----------------------------------------------------------------------------------*/	
//   jQuery('a.slider-qtip').qtip({
//      position: {
//         corner: {
//            target: 'bottomMiddle',
//            tooltip: 'topMiddle'
//         }
//      },
//      style: {
//         name: 'cream',
//         padding: '7px 13px',
//         width: {
//            max: 220,
//            min: 0
//         },
//         tip: true
//      }
//   });
   
/*-----------------------------------------------------------------------------------*/
/*	Twitter - http://codecanyon.net/item/twitter-updates-widget/120228
/*-----------------------------------------------------------------------------------*/	
//			settings = {
//				'username' : ['jamigibbs'],
//				'updates' : 5, 				
//				'loadingText' : "Loading tweets..."
//			}
//			jQuery('#tuw_div').tuw(settings);
			
/*-----------------------------------------------------------------------------------*/
/*	Testimonial  - http://coryschires.com/jquery-quote-rotator-plugin/
/*-----------------------------------------------------------------------------------*/	
//	jQuery('ul#quotes').quote_rotator({
//		rotation_speed: 7000,           // defaults to 5000
//		pause_on_hover: true,         // defaults to true
//		randomize_first_quote: true    // defaults to false
//	});
	
/*-----------------------------------------------------------------------------------*/
/*	Nivo Slider - http://nivo.dev7studios.com/
/*-----------------------------------------------------------------------------------*/	
//    jQuery('#nivo-slider').nivoSlider({
//        effect:'fade', // Specify sets like: 'fold,fade,sliceDown'
//        animSpeed:500, // Slide transition speed
//        pauseTime:3000, // How long each slide will show
//        startSlide:0, // Set starting Slide (0 index)
//        directionNav:false, // Next & Prev navigation
//        directionNavHide:false // Only show on hover
//    });
	
/*-----------------------------------------------------------------------------------*/
/*	Pricing Plan Tooltip  - http://craigsworks.com/projects/qtip/
/*-----------------------------------------------------------------------------------*/	
//   jQuery('.pricing a.qtip').qtip({
//      position: {
//         corner: {
//            target: 'topRight',
//            tooltip: 'bottomLeft'
//         }
//      },
//      style: {
//         name: 'green',
//         padding: '7px 13px',
//         width: {
//            max: 210,
//            min: 0
//         },
//         tip: true
//      }
//   });
   
//   $(".sign-up").colorbox({href:"#div-signup", inline:true, width:"50%", opacity:0.6});
//   $(".send_msg").colorbox({href:"#sendmsg", inline:true, width:"50%", opacity:0.6});
//   $("img[rel]").overlay({effect:'apple'});
//    
//   $(".forgot_username").colorbox({href:"#div-forgotusername", inline:true, width:"50%", opacity:0.6});
//   $(".forgot_password").colorbox({href:"#div-forgotpassword", inline:true, width:"50%", opacity:0.6});
  
   
   var posting_member_id = null;
   var is_new;
   
   $(window).load(function () 
   {	 
      
       $("#mydate").mask("99/99/9999");
	$("#mydate").datepicker({
            dateFormat:'mm/dd/yy',
            changeMonth:true,
            changeYear:true
	});
		   
	$("#hangoutdt").datepicker({
            dateFormat:'DD. MM d, yy',
            changeMonth:true,
            changeYear:true,
            minDate:new Date()
	});

        $("#startdt_hangout").datepicker({
            dateFormat:'DD. MM d, yy',
            changeMonth:true,
            changeYear:true,
            minDate:new Date()
	});
        
        $("#enddt_hangout").datepicker({
            dateFormat:'DD. MM d, yy',
            changeMonth:true,
            changeYear:true,
            minDate:new Date()
	});     
        
        $("#startdt_hangout").change(function(e){
           var selectedDt = $("#startdt_hangout").datepicker( "getDate" );
           $("#enddt_hangout").datepicker('option', 'minDate',  selectedDt);
	});
		   
//	$("#posting_enddt").datepicker({
//            dateFormat:'DD. d MM, yy',
//            changeMonth:true,
//            changeYear:true
//        });
		   
        var now = new Date();
        $('#starttime').timeEntry({spinnerImage: '/images/timeEntry/spinnerUpDown.png', 
            spinnerSize: [15, 16, 0], spinnerBigSize: [30, 32, 0], spinnerIncDecOnly: true});
        
    	$('#starttime').change(function(e){
            
            if($('#endtime').val() != ''  && $('#starttime').val() != $('#endtime').val())
                return false;
            
            var starttime = $('#starttime').val().split(':');
            var datehangout = new Date(); //$('#hangoutdt').val().split(' ');
            
            var hour = starttime[0];
            var meridiem = 'AM';
            if(starttime[1].indexOf('AM') == -1){ //if PM
                hour = (Number(hour) == 12)? 12:Number(12) + Number(hour);
                meridiem = 'PM';
            } else if(starttime[1].indexOf('PM') == -1 && Number(hour) == 12){ //if AM
                hour = '00';
            }
            
            var minute = starttime[1].replace(meridiem, '');
            var dt = new Date(datehangout.getFullYear(), datehangout.getMonth(), datehangout.getDay(), hour, minute, '00');
            dt.setTime(dt.getTime() + (1*60*60*1000)); 
                        
            //convert starttime to 24 hour format
            if(starttime[1].indexOf('AM') == -1){ //if PM
                hour = (Number(dt.getHours()) == 0)? 12:Number(dt.getHours()) - Number(12);                
            } else if(starttime[1].indexOf('PM') == -1){ //if AM
                hour = Number(dt.getHours());
            }
                                    
            hour = Number(hour) < 10 && Number(hour) > 0? '0' + hour : hour;
            minute = Number(dt.getMinutes()) < 10 ? (minute.length == 1? '0'+minute:minute):dt.getMinutes();
            
            //convert endtime to 12 hour format
            if(Number(starttime[0]) == 11 && meridiem == 'AM'){
                meridiem = 'PM'
            } else if(Number(starttime[0]) == 11 && meridiem == 'PM'){
               meridiem = 'AM'
            }
            
            var endtime = hour + ':' + minute + meridiem;            
            $('#endtime').val(endtime);
        });
        
        $('#endtime').change(function(e){
            
            if($('#starttime').val() != ''  && $('#starttime').val() != $('#endtime').val())
                return false;
            
            var endtime = $('#endtime').val().split(':');
            var datehangout = new Date(); //$('#hangoutdt').val().split(' ');
            
            var hour = endtime[0];
            var meridiem = 'AM';
            if(endtime[1].indexOf('AM') == -1){ //if PM
                hour = (Number(hour) == 12)? 12:Number(12) + Number(hour);
                meridiem = 'PM';
            } else if(endtime[1].indexOf('PM') == -1 && Number(hour) == 12){ //if AM
                hour = '00';
            }
            
            var minute = endtime[1].replace(meridiem, '');
            var dt = new Date(datehangout.getFullYear(), datehangout.getMonth(), datehangout.getDay(), hour, minute, '00');
            dt.setTime(dt.getTime() - (1*60*60*1000)); 
                        
            //convert endtime to 24 hour format
            if(endtime[1].indexOf('AM') == -1){ //if PM
                hour = (Number(dt.getHours()) == 0)? 12:Number(dt.getHours());
                hour = (Number(dt.getHours()) >= 13)? Number(dt.getHours()) - 12 : hour;
            } else if(endtime[1].indexOf('PM') == -1){ //if AM  
                hour = (Number(dt.getHours()) == 0)? 12:Number(dt.getHours());
                hour = (Number(dt.getHours()) >= 23)? Number(dt.getHours()) - 12 : hour;
            }
            
            hour = Number(hour) < 10 && Number(hour) > 0? '0' + hour : hour;
            //minute = Number(dt.getMinutes()) < 10 ? '0'+minute:dt.getMinutes();
            minute = Number(dt.getMinutes()) < 10 ? (minute.length == 1? '0'+minute:minute):dt.getMinutes();
            
            //convert endtime to 12 hour format
            if(Number(endtime[0]) == 12 && meridiem == 'AM'){
                meridiem = 'PM'
            } else if(Number(endtime[0]) == 12 && meridiem == 'PM'){
               meridiem = 'AM'
            }
            
            var starttime = hour + ':' + minute + meridiem;            
            $('#starttime').val(starttime);
            
        });
        
    	$('#endtime').timeEntry({spinnerImage: '/images/timeEntry/spinnerUpDown.png', 
            spinnerSize: [15, 16, 0], spinnerBigSize: [30, 32, 0], spinnerIncDecOnly: true});
    		 
	$("#sign-up input[type='text']").val(''); 
	$("#sign-up input[type='password']").val(''); 
		
	$("#Popup").validate();
	$("#sign-up").validate();
	$("#survey-form").validate();
	
        //change password
        $("#old_password").val(''); 
        $("#new_password").val(''); 
        $("#new_password2").val(''); 
        $("#frmChangePwd").validate();
        $("#frmCrtPostings").validate();

//        $("ul.tabs").tabs("> .pane", {initialIndex: 2});

        //friends tab for sending msg
        $("#SendMsg").validate();

        if(document.getElementById('search_post')){
            $("#search_post").trigger('click');
        }
        
        if(isExist('myUpcomingHangout')) {loadMyUpcomingHangout(true, 0);}    
        if(isExist('myHangoutToday')) {loadMyHangoutToday(true, 0);} 
        if(isExist('myPostings')) {loadMyPostings(true, 0);} 
        
        $("a#myPostingLoadMore").live('click',function(e){            
            loadMyPostings(false, $("#myPostingStart").val());
        });
        
        $("a#myHangoutLoadMore").live('click',function(e){            
            loadMyHangoutToday(false, $("#myHangoutStart").val());
        });
        
        $("a#myUpcomingLoadMore").live('click',function(e){            
            loadMyUpcomingHangout(false, $("#myUpcomingHangoutStart").val());
        });
        
        $('#myRateToHangout').trigger('click');
        $('#myHangoutReviews').trigger('click');
        $('#myPublicHangoutReviews').trigger('click');
        
        $('#GetFriendRequests').trigger('click');
        $('#myHotList').trigger('click');
        
        //search postings
        $(".signin").click(function(e) {          
            e.preventDefault();
            $("fieldset#signin_menu").toggle();
            $(".signin").toggleClass("menu-open");
        });

        $("fieldset#signin_menu").mouseup(function() {
                return false
        });

        $(document).mouseup(function(e) {
            if($(e.target).parent("a.signin").length==0) {
                $(".signin").removeClass("menu-open");
                $("fieldset#signin_menu").hide();
            }
        });	                
        
       $('#done_hangout').live('click',function(e){           
           done_hangout($(this).attr('name'));
       });
       
       $('#canc_hangout').live('click',function(e){           
           canc_hangout($(this).attr('name'));
       });
              
       $('#btnReply').live('click',function(e){           
            var btnName = this.name;
            var btnNameSplit = btnName.split('_');
            
            var msg_id = 'msg_' + btnNameSplit[1] + '_' + btnNameSplit[2];
            var msg = $('#'+msg_id).val();
            sendFinalReply(btnNameSplit[1], btnNameSplit[2], msg);
       });
       
       //show and hide for comments
       $('#view_comment').live('click',function(e){   
            var view_comment = this.name.split('_');
            var comment_div_id = view_comment[2];
            $('#comment-div_'+comment_div_id).toggle('slow');            
       });
       
       //trigger upon adding as a friend is clicked
       $('#addfriend').live('click',function(e){   
            var addfriend = this.name.split('_');
            var rater_group_id = addfriend[1];
            $('a[name='+this.name+']').text('Please wait...');
            sendFriendRequest(rater_group_id);                        
       });
       
       //trigger upon adding as a friend is clicked
       $('#request_stat').live('click',function(e){   
            var request_stat = this.name.split('_');
            var stat = request_stat[0];
            var friendship_id = request_stat[1];
            $('#request_stat').text('Please wait...');
            updateRequestStatus(stat, friendship_id);                        
       });
       
       //trigger upon deleting a hotlist
       $('#deleteHotList').live('click',function(e){   
            var hotlist = this.name.split('_');
            var hotlist_id = hotlist[1];   
            $('#div_'+hotlist_id).css('width', 300);
            $('#div_'+hotlist_id).text('Please wait...');
            deleteHotList(hotlist_id);                    
       });
       
       //pop-up on view ratings
        var moveLeft = -320;
        var moveDown = 10;
                
        $('a#trigger').live('hover',function(e){                  
            var trigger_name = this.name.split('_');
            var popup_id = trigger_name[1];
            $('div#pop-up_' + popup_id).toggle();
        });

        $('a#trigger').live('mousemove',function(e){ 
            var trigger_name = this.name.split('_');
            var popup_id = trigger_name[1];
            $("div#pop-up_"+popup_id).css('top', e.pageY + moveDown).css('left', e.pageX + moveLeft);
        });
        //end of pop-up view ratings        
        
        $('#save_changes').click(function(){
            
           var ret = postValidation();   
            if(!ret)
                return false;
            
           var params = '';
           params += "gender_type="+$("#gender_type").val()+'&';
           params += "hangoutdt="+$("#hangoutdt").val()+'&';
           params += "num_ppl="+$("#num_ppl").val()+'&';
           params += "posting_enddt="+$("#posting_enddt").val()+'&';
           params += "age_range_1="+$("#age_range_1").val()+'&';
           params += "age_range_2="+$("#age_range_2").val()+'&';
           params += "starttime="+$("#starttime").val()+'&';
           params += "endtime="+$("#endtime").val()+'&';
           params += "posting_id="+$("#posting_id").val()+'&';
           params += "posting_title="+$("#posting_title").val()+'&';
           params += "posting_desc="+$("#posting_desc").val()+'&';
           params += "startdt_hangout="+$("#startdt_hangout").val()+'&';
           params += "enddt_hangout="+$("#enddt_hangout").val();
           
           $.ajax({  
             type: "POST", url: '/index.php/postings/saveChanges',  
             data:params,
             beforeSend:function(){
               $('#progressBar').css('display', 'block');  
               $('#progressBarMsg').css('display', 'block');
             },
             complete: function(data){  
                 $('#progressBar').css('display', 'none');                     
                 if(data.responseText){
                     $('#progressBarMsg').text('Post changes saved.');
                 } else {
                     $('#progressBarMsg').text('Failed to update changes');                     
                 }
                setTimeout(function(){
                    $('#progressBarMsg').text('Saving changes...');
                    $('#progressBarMsg').css('display', 'none');
                },3000);
             }  
           });
           
        });
        
        $('#continue_preview').click(function(){            
            var ret = postValidation();            
            if(!ret)
                return false;
            
            $('form[name=frmCrtPostings]').attr({action: "/index.php/postings/preview"});
            $('form[name=frmCrtPostings]').submit();            
        });
        
        $('select#sel-bdate').live('change',function(e){                
            if(this.name == 'select-month' || this.name == 'select-year')
            {                
                var lastDay = calcDaysInMonthYear($('select[name=select-month]').val(), $('select[name=select-year]').val());
                //empty the select box if Day
                var pre_selected = $('select[name=select-day]').val();
                $('select[name=select-day]').empty();
                
                //loop using the lastDay as max value
                //append to select box options
                $('select[name=select-day]').append($("<option>",{value: '-',text: '-'}));   
                for(var day=1;day<(lastDay + 1);day++)        
                {                                
                    $('select[name=select-day]').append($("<option>",{value: day,text: day}));   
                }            
                
                $("select[name=select-day] option").filter(function() {
                    return $(this).text() == pre_selected; 
                }).attr('selected', true);
            }
        });
        
        if(isExist('state')) {fips_regions();}        

//        $('li[name=ulmsg]').live('click', function(e){
//            var left = (screen.width/2)-(700/2);
//            var top  = (screen.height/2)-(650/2);
//                        
//            window.open('http://hangout.com/indexSuccess.php', 'winMsngr', "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, height=650,width=700", 'top='+top+', left='+left); 
//        });
        
        $('li[name=ulmsg] a').live('click', function(e){
            var tmp = is_new; //passed to other value to identify the first value of is_new
            is_new = $(this).attr('id') != posting_member_id? true:false;
            posting_member_id = $(this).attr('id');
            
            //$('li[name=ulmsg]').css('font-weight','normal');
            
            if(tmp == undefined){
                loadChatMessages( posting_member_id.split('_')[0] );
                //this would prevent from multiple ajax calls when clicking other hangout postings
            }
        });
        
        $('select[name=state]').live('change',function(e){  
           $('select[name=city]').val('');
           $('select[name=zipcode]').val('');
           get_cities();
        });
        
        $('select[name=city]').live('change',function(e){      
           $('select[name=zipcode]').val('');
           get_zipcodes();
        });
        
        $('select[name=age_range_1]').live('change',function(e){     
           change_age_range();
        });
        
        
        if(isExist('search_country')){get_countries();}
        if(isExist('search_state')){fips_regions_in_search();}
        //if(isExist('search_zipcode')){ get_zipcodes_in_search(); }
        if(isExist('messenger')){loadHangouts();}
        if(isExist('edit-posting')){loadEditPostings();}
        
        $('select[name=search_state]').live('change',function(e){      
           get_cities_in_search();
        });                 
         
        setActiveTab();
         
        $('#send_message').click(function() {
            
            var member_arr = posting_member_id.split('_');
            var member_ids = {};
            
            $(member_arr).each(function(i, val){
                if(i > 0)
                    member_ids[i] = val;
            });
            
            var posting_id = member_arr[0];
            var message = $('#message').val();
            
            sendChatMessage(member_ids, posting_id, message);
            
        });  
        
        $('a#del-post').live('click',function() {          
           $('span#del-post-conf-'+this.name).css('display','block');
	});
        
        $("a#opt-yes").live('click',function() {       
            
            var posting_id = this.name.split("-");
            $.ajax({  
                type: "POST", url: '/index.php/postings/deletePost',      
                dataType: 'json',
                data:'posting_id='+posting_id[2],
                complete: function(data){                   
                    $('span#del-post-conf-'+posting_id[2]).css('display','none');
                    $('span#resp-msg-'+posting_id[2]).text(data.responseText);
                    loadEditPostings();
                }  
            });
    
	});
        
        $("a#next_page").live('click',function() {                   
            searchPost(this.title, true);         
	});
        
        $('#back_to_myacct').click(function(){
           document.location.href = '/index.php/home/edit?update=tab6'; 
        });
      
    });
    
    setActiveMenu();

    function setTo24HourFormat(dt,tm)
    {
        var split_stdt = dt.split(' ');
        var split_tm = tm.split(':');
        var hour = split_tm[0];
        var minute = '00';
        var meridiem = 'AM';
        if(split_tm[1].indexOf('AM') == -1){//PM
            meridiem = 'PM';                
        }

        minute = split_tm[1].replace(meridiem, '');
        if(meridiem == 'AM'){
            hour = (Number(hour) == 12)? 0:Number(hour);       
        } else if(meridiem == 'PM'){
            hour = (Number(hour) == 12)? Number(hour):Number(hour);       
            hour = (Number(hour) < 12)? Number(hour) + 12:Number(hour);    
        }

        return new Date(split_stdt[3], getMonthNum(split_stdt[1]), parseInt(split_stdt[2]), hour, minute, '00');
    }
    
    function postValidation()
    {
        var startdt_hangout = $('#startdt_hangout').val();
        var enddt_hangout = $('#enddt_hangout').val();
        var starttime = $('#starttime').val();
        var endtime = $('#endtime').val();
        var posting_title = $('#posting_title').val();
        var posting_desc = $('#posting_desc').val();
            
        if(!startdt_hangout){
            $("#dialog-msg-hangoutst").dialog({
                modal: true,                    
                resizable: false,
                buttons: {
                    OK: function() {
                        $(this).dialog("close");
                    }
                }
            });
            return false;
        } 

        if(!enddt_hangout){
            $("#dialog-msg-hangoutendt").dialog({
                modal: true,             
                resizable: false,
                buttons: {
                    OK: function() {
                        $(this).dialog("close");
                    }
                }
            });
            return false;
        } 

        if(!starttime){
            $("#dialog-msg-hangoutsttm").dialog({
                modal: true,             
                resizable: false,
                buttons: {
                    OK: function() {
                        $(this).dialog("close");
                    }
                }
            });
            return false;
        } 

        if(!endtime){
            $("#dialog-msg-hangoutendttm").dialog({
                modal: true,            
                resizable: false,
                buttons: {
                    OK: function() {
                        $(this).dialog("close");
                    }
                }
            });
            return false;
        } 

        if(!posting_title){
            $("#dialog-msg-posttitle").dialog({
                modal: true,              
                resizable: false,
                buttons: {
                    OK: function() {
                        $(this).dialog("close");
                    }
                }
            });
            return false;
        } 

        if(!posting_desc){
            $("#dialog-msg-postdesc").dialog({
                modal: true,              
                resizable: false,
                buttons: {
                    OK: function() {
                        $(this).dialog("close");
                    }
                }
            });
            return false;
        } 
        
        var stdt = setTo24HourFormat(startdt_hangout, starttime);
        var endt = setTo24HourFormat(enddt_hangout, endtime);
            
        if(endt.getTime() < stdt.getTime()) {
            $("#dialog-msg-invalidatedt").dialog({
                modal: true,                    
                resizable: false,
                buttons: {
                    OK: function() {
                        $(this).dialog("close");
                    }
                }
            });
            return false;
        }
        
        return true;
    }
    function setActiveMenu()
    {
        var currentURL = location.protocol + '//' + location.host;
        var listItems  = $("#main-nav li");
        listItems.each(function(idx, li) {
            var menu = $(li).find('a:first');
            $(li).removeClass();
//            $('ul li.current').removeClass('current');
//            $(this).closest('li').addClass('current');
            if($(li).context.baseURI == currentURL + menu.attr('href')){
//                console.log('1')
                $(li).find('a:first').addClass('active');
//                $(li).addClass('current');
//                $(li).attr('title','#F9CD4B');
            } else {
//                console.log('2')
                $(li).find('a:first').removeClass();
                $('ul li.current').removeClass('current');
//                $(li).removeClass('current');
//                $(li).attr('title','');
            }
            
        });
    }
   
    function loadChatMessages(posting_id)
    {
       var top_msg_id = is_new? 0:$('#top_msg_id').val();
       
       $.ajax({  
            type: "POST", url: '/index.php/messenger/loadChatMessages',      
            dataType: 'json',
            data: 'posting_id='+posting_id+'&top_msg_id='+top_msg_id,
            complete: function(data){  
                
                var tr = ''; 
                $($.parseJSON(data.responseText)).each(function(i,val){
                    var tr_id = new Date('YmdHis');                    
                    
                    var dt  = val.date_created.split(/\-|\s/);
                    var today = new Date();
                                        
                    if(new Date(dt.slice(0,3)) < new Date(today.getFullYear(), today.getMonth(), today.getDate())){
                        dt = new Date(dt.slice(0,3)+' '+dt[3]);
                        dt = dt.format('mm/dd/yy hh:MM:ss TT');
                    } else {
                        dt = new Date(dt.slice(0,3)+' '+dt[3]);
                        dt = dt.format('hh:MM:ss TT');
                    }

                    tr += '<tr id="'+tr_id+'" style="background-color: #FFFFFF; width:100%; padding: 5px; border-radius:3px;">';
//                    tr += '<td style="border: 0px solid!important;color:#008000; width:146px;">[ ' + dt + ' ]</td>';
                    if(val.is_owner == 'TRUE'){
                        tr += '<td style="border: 0px solid!important; font-weight: bold; color: #FB9601;width:91px!important;">' + val.nick_name + '<br/>' + 
                        '<span style="font-weight:normal!important; font-size:9px; color:#787878!important;width:100px!important;">' + dt + '</span> </td>';
                    }else{
                        tr += '<td style="border: 0px solid!important; font-weight: bold; color: #0000FF;">' + val.nick_name + '<br/>' + 
                        '<span style="font-weight:normal!important; font-size:9px; color:#787878!important;">' + dt + '</span> </td>';
                    }
                    
                    tr += '<td style="border: 0px solid!important;font-weight:bold!important;width:1px!important;">:</td>';
                    tr += '<td style="border: 0px solid!important;"> <span style="font-size:11px!important;width:200px">' + val.message + '</span></td>';
                    tr += '</tr>';
                    
                    top_msg_id = val.id; //append the top_msg_id
                });
                
                if(is_new){
                    $('#chatbox table').empty();    
                    is_new = false;
                }
                
                $('#chatbox table').append(tr);
                $('#top_msg_id').val(top_msg_id);
               
                window.setTimeout(function(){
                  loadChatMessages(posting_member_id.split('_')[0]);
                }, 1000);
                 
            }  
       });
      
    }
    
    function sendChatMessage(member_ids, posting_id, message)
    {
        $.ajax({  
            type: "POST", url: '/index.php/messenger/sendChatMessage',      
            dataType: 'json',
            data:'member_ids='+JSON.stringify(member_ids)+'&posting_id='+posting_id+'&message='+encodeURIComponent(message),
            complete: function(data){
                $('#message').val('');
            }  
       });
    }
    
    function loadHangouts()
    {
       $.ajax({  
            type: "POST", url: '/index.php/messenger/GetRequesters',      
            dataType: 'json',
            complete: function(data){  
                
                var menus = arrayToUl($.parseJSON(data.responseText));
                $("#messenger").append(menus);
                $('#messenger li').first().addClass('active');

                $("#messenger").navgoco({
                        caret: '<span class="caret"></span>',
                        accordion: false,
                        openClass: 'open',
                        save: true,
                        cookie: {
                                name: 'navgoco',
                                expires: false,
                                path: '/'
                        },
                        slide: {
                                duration: 400,
                                easing: 'swing'
                        }
                });               
            }  
       });
        
    }
    
    function arrayToUl(data) {
        var html = '';  
        for (var key in data) {
            html += '<li name="ulmsg">';
            var tmp  = key.split('_');
            var isInt = (parseInt(tmp[0]) == tmp[0]);            
            var label = isInt ? data[key] : tmp[0];
            //html += '<a href="#">' + label + '</a>';
            html += '<a href="#" id="' + key + '">' + label + '</a>'; //modified to insert the posting_id
            if (!isInt) {
                html += '<ul>';
                html += arrayToUl(data[key]);
                html += '</ul>';
            }
            html += '<li>';
        }
        return html;
    }

    function isExist(el)
    {
        return $('#'+el).length > 0 ? true : false;
    }
    
    function setActiveTab()
    {
        var tab_index = 0;
        if(document.location.search.length > 0)
        {
            var search = document.location.search.split('&');
            search = search[0];
            tab_index = search.charAt(search.length - 1);

            tab_index  = ((tab_index == '')? 1:tab_index) - 1;
            tab_index  = (tab_index < 0 || tab_index > 5)? 0:tab_index;

            //max # of tabs is 5 starting from 0 index
            //change the max tabs if adding a new tab
        }
        
        $("ul.tabs").tabs("> .pane", {initialIndex: tab_index});
    }
    
    function calcDaysInMonthYear(month, year)
    {
        var lastDay = 31; 
        if(month != '-' && year != '-')
        {
            lastDay = new Date(year, month, 0).getDate();
        }
        
        return lastDay;
    }

    function sendFriendRequest(rater_group_id)
    {       
       $.ajax({  
            type: "POST", url: '/index.php/home/SendFriendRequest',  
            data:"rater_group_id="+rater_group_id,
            complete: function(data){  
                loadHangoutReviews();
            }  
       });
    }
    
    function updateRequestStatus(stat, friendship_id)
    {
        $.ajax({  
            type: "POST", url: '/index.php/home/UpdateRequestStatus',  
            data:"stat="+stat+"&friendship_id="+friendship_id,
            complete: function(data){  
                loadFriendRequests();
            }  
       });
    }
    
   function deleteHotList(hotlist_id)
   {
       $.ajax({  
        type: "POST", url: '/index.php/hotlist/deleteHotList',    
        data:'id='+hotlist_id,
        beforeSend: function(xhr){
            $("#div_"+hotlist_id).empty();            
        },
        complete: function(data){  
            //append response to div #response           
            $("#div_"+hotlist_id).append(data.responseText);
            setTimeout(loadHotList,2000);
        }  
       });  
   }
   
    function sendFinalReply(rater_group_id, member_id, comments)
    {
        $.ajax({  
            type: "POST", url: '/index.php/home/SendFinalReply',  
            data:"rater_group_id="+rater_group_id+"&member_id="+member_id+"&comments="+comments,
            complete: function(data){  
                loadHangoutReviews();
            }  
       });
    }

    $("#survey-form").submit(function(){
        var ans = confirm ( 'Are you sure you want to post your experience now?' );
        if(ans){
            $('form[name=survey-form]').attr({action: "/index.php/home/PostExperience"});
            $('form[name=survey-form]').submit();
        }else{ 
            return;
        }       
    });
    
    
   /********Load Hot List**********/
   $('#myHotList').click(function(){
       loadHotList();
   });
   
   function loadHotList()
   {
       $.ajax({  
        type: "POST", url: '/index.php/hotlist/loadHotList',  
        beforeSend: function(xhr){
            $("#hotlist-div").empty();
            $('#ajax').show();
        },
        complete: function(data){  
            //append response to div #response           
            $("#hotlist-div").append(data.responseText);
            $('#ajax').hide();
        }  
       });  
   } 
    	 
   /********Friend Requests**********/
   $('#GetFriendRequests').click(function(){
       loadFriendRequests();
   });
   
   function loadFriendRequests(){
       $.ajax({  
        type: "POST", url: '/index.php/home/GetFriendRequests',  
        beforeSend: function(xhr){
            $("#request-div").empty();
            $('#ajax').show();
        },
        complete: function(data){  
            //append response to div #response           
            $("#request-div").append(data.responseText);
            $('#ajax').hide();
        }  
       });  
   }
   
    /********Hangout Reviews**********/
   $('#myHangoutReviews').click(function(){
       loadHangoutReviews();
   });
   
   function loadHangoutReviews(){
       $.ajax({  
        type: "POST", url: '/index.php/home/loadHangoutReviews',  
        beforeSend: function(xhr){
            $("#hangoutReviews").empty();
            $('#ajax').show();
        },
        complete: function(data){  
            //append response to div #response           
            $("#hangoutReviews").append(data.responseText);
            $('#ajax').hide();
        }  
       });  
   }
   
   /********Public Hangout Reviews**********/
   $('#myPublicHangoutReviews').click(function(){
       loadPublicHangoutReviews();
   });
   
   function loadPublicHangoutReviews(){
       $.ajax({  
        type: "POST", url: '/index.php/home/loadPublicHangoutReviews',  
        data: {userId:$('#userId').val()},
        beforeSend: function(xhr){
            $("#publicHangoutReviews").empty();
            $('#ajax').show();
        },
        complete: function(data){  
            //append response to div #response           
            $("#publicHangoutReviews").append(data.responseText);
            $('#ajax').hide();
        }  
       });  
   }
   
   /********Rate to Hangout**********/
   $('#myRateToHangout').click(function(){
       loadRateToHangout();
   });
   
   function loadRateToHangout(){
       $.ajax({  
        type: "POST", url: '/index.php/home/RateToHangout',  
        beforeSend: function(xhr){
            $("#myRates").empty();
            $('#ajax').show();
        },
        complete: function(data){  
            //append response to div #response           
            $("#myRates").append(data.responseText);
             $('#ajax').hide();
        }  
       });  
   }
   
   /********My Postings**********/
   $('#myPostingRefresh').click(function(){
       var txt = $('#myPostingRefresh').text();
       if(txt == 'EXPAND'){
           $('#myPostingRefresh').text('COLLAPSE');
       } else {
           $('#myPostingRefresh').text('EXPAND');
       }
       
       $('#myPostings').toggle('slow');
   });
   
   function loadMyPostings(EmptyMainDiv, start){
       $.ajax({  
        type: "POST", url: '/index.php/home/GetPostings',  
        data: "start="+start,
        beforeSend: function(xhr){
            if(EmptyMainDiv == true){
                $("#myPostings").empty();
            }
            $('#ajax').show();
        },
        complete: function(data){  
            //append response to div #response           
             var parseData = $.parseJSON(data.responseText);
             $("#myPostings").append(parseData.data);
             $('#ajax').hide();
             $('#myPostingStart').val(parseData.start);
            if(parseData.hideLoadMorePostDiv == true){
                $('#myPostingLoadMore').css('display', 'none');
            } else {
                $('#myPostingLoadMore').css('display', 'block');
            }
        }  
       });  
   }
   
   /********My Hangout Today**********/
   $('#myHangoutTodayRefresh').click(function(){
       var txt = $('#myHangoutTodayRefresh').text();
       if(txt == 'EXPAND'){
           $('#myHangoutTodayRefresh').text('COLLAPSE');
       } else {
           $('#myHangoutTodayRefresh').text('EXPAND');
       }
       
       $('#myHangoutToday').toggle('slow');
   });
   
   function loadMyHangoutToday(EmptyMainDiv, start){
       $.ajax({  
        type: "POST", url: '/index.php/home/GetTodaysPostings',  
        data: "start="+start,
        beforeSend: function(xhr){
            if(EmptyMainDiv == true){
                $("#myHangoutToday").empty();
            }
            $('#myHangoutToday_ajax').show();
        },
        complete: function(data){  
            //append response to div #response           
            var parseData = $.parseJSON(data.responseText);
            $("#myHangoutToday").append(parseData.data);
            $('#myHangoutToday_ajax').hide();
            $('#myHangoutStart').val(parseData.start);
            
            if(parseData.hideLoadMorePostDiv == true){
                $('#myHangoutLoadMore').css('display', 'none');
            } else {
                $('#myHangoutLoadMore').css('display', 'block');
            }
        }  
       });  
   }
   
   /********My Upcoming Hangout**********/
   
   $('#myUpcomingHangoutRefresh').click(function(){
       var txt = $('#myUpcomingHangoutRefresh').text();
       if(txt == 'EXPAND'){
           $('#myUpcomingHangoutRefresh').text('COLLAPSE');
       } else {
           $('#myUpcomingHangoutRefresh').text('EXPAND');
       }
       
       $('#myUpcomingHangout').toggle('slow');
   });
   
   function loadMyUpcomingHangout(EmptyMainDiv, start){
       $.ajax({  
        type: "POST", 
        url: '/index.php/home/GetUpcomingPostings',  
        data: "start="+start,
        beforeSend: function(xhr){
            if(EmptyMainDiv == true){
                $("#myUpcomingHangout").empty();
            }
            $('#myUpcomingHangout_ajax').show();
        },
        complete: function(data){  
            //append response to div #response           
            var parseData = $.parseJSON(data.responseText);
            $("#myUpcomingHangout").append(parseData.data);
            $('#myUpcomingHangout_ajax').hide();
            $('#myUpcomingHangoutStart').val(parseData.start);
            
            if(parseData.hideLoadMorePostDiv == true){
                $('#myUpcomingLoadMore').css('display', 'none');
            } else {
                $('#myUpcomingLoadMore').css('display', 'block');
            }
            
        }  
       });  
   }   
   
   function loadEditPostings(){
       $.ajax({  
        type: "POST", url: '/index.php/postings/GetListOfPostings',  
        beforeSend: function(xhr){
            $("#edit-posting").empty();
        },
        complete: function(data){  
            //append response to div #response           
            $("#edit-posting").append(data.responseText);
//            $('#myUpcomingHangout_ajax').hide();
        }  
       });  
   }  
   
   $('#search_post').click(function(){       
       searchPost(0, false);        
   });
   
   function searchPost(start, isNextPage)
   {
       var limit = 5;
       var max_box_page = 5;
       var sortBy = $('#sort_by').val();
       var last_post_id = $('#last_post_id').val();
       var page = $('#page').val();
       
       if(isNextPage && page){
           var params = start == 0? '' : '/page/' + start;
           document.location.href = 'http://hangout.com/index.php/postings/index' + params;
       }
       
       if(page && !isNextPage){
           start = page;
       }
       
       $.ajax({  
            type: "POST", url: '/index.php/postings/search',  
            data: 'sortBy='+sortBy+'&start='+start+'&limit='+limit,
            dataType: 'json',
            complete: function(data){  
                var parseData = $.parseJSON(data.responseText);
                
                //append response to div #response         
                $('#postings').empty();
                $('#postings').append(parseData.data);
                $('#pagination-div').empty();
                
                var page_start           = start;
                var pagination_div       = '';
                var max_page             = parseData.total_page > max_box_page? (max_box_page)*(limit):(parseData.total_page-1)*(limit);                
                var addtl_pagination_div = '';
                var i                    = 0;
                var page                 = 1;
                while(i <= max_page)
                {
                    if(page_start == i)
                    {                        
                        pagination_div += '<span class="current">'+ page +'</span>';                              
                        
                        $('#total_page').empty();
                        $('#total_page').append('Page ' + page + ' of ' + parseData.total_page);
                    }
                    else if(page < (max_box_page + 1))//4 is the max page different from the variable max_page
                    {
                        pagination_div += '<a id="next_page" class="page" title="'+ i +'" href="#">' + page + '</a>';
                    }
                    else
                    {
                        pagination_div += '<a id="next_page" title="'+ i +'" href="#">&#187;</a>';
                    }
                    i = i + limit;
                    page++;
                }
                $('#pagination-div').append(addtl_pagination_div + pagination_div);
                
                /* scroll to the div where the last post is cliked */                
                if(last_post_id != null){
                    goToIt('post_'+last_post_id);
                }
                
            }  
        });
   }
   
    $("#loading").bind("ajaxSend", function(){
        $("#postings").append("");
        $(this).show();
    }).bind("ajaxComplete", function(){
        $(this).hide();
    });
        
    $('#postOpt1').click(function(){
        if($(".hangoutNow_pr").is(":visible")){
            $(".hangoutNow_pr").slideToggle('slow'); //hide the span for processing
        }
        if($(".response").is(":visible")){
            $(".response").css({display:'none'});
        }else{
            $(".hangoutNow").slideToggle('slow');
        }
    });
    
    $('#postOpt1_no').click(function(){        
        $(".hangoutNow").slideToggle('slow');
    });
    
    $('#postOpt1_yes').click(function(){
        $(".hangoutNow").slideToggle('slow',startProcessing());        
    });
    
    $('#postOpt2').click(function(){
        if($(".addToHotList").is(":visible")){
            $(".addToHotList").slideToggle('slow'); //hide the span for processing
        }
        if($("#responseHotList").is(":visible")){
            $('#responseHotList').empty();
            $("#responseHotList").css({display:'none'});
        }else{
            $(".addToHotList").slideToggle('slow',addToHotList());       
        }
    });
    
    function goToIt(targetId)
    {
//        $('#'+targetId).css({opacity: 0 }).animate({opacity: 1 }, 1000, function(){
//            $('#'+targetId).css('font-weight','bold');
//            $('#'+targetId).css('background-color','#FF9801');
//        });
        if($('#'+targetId).offset() == null){
            return;
        }
        $('html, body').animate({
            scrollTop: $('#'+targetId).offset().top
        }, 2000);
        
        $('#'+targetId).animate( {backgroundColor: "#FFF"}, 1 ).animate( {backgroundColor: "#FF9801"});
    }
    
    function addToHotList()
    {
        var params = 'posting_id='+$("#posting_id").val()+'&member_id='+$("#member_id").val();
        $.ajax({  
            type: "POST", url: '/index.php/postings/addToHotList',  
            data: params,
            complete: function(data){  
                //append response to div #response         
                $(".addToHotList").slideToggle('slow', function(){
                    $(".responseHotList").css({display:'block'});
                    $('#responseHotList').empty();
                    $('#responseHotList').append(data.responseText);                
                });  
            }  
        });  
    }
    
    function startProcessing()
    {        
        $(".hangoutNow_pr").slideToggle('slow');       
        var params = 'posting_id='+$("#posting_id").val()+'&member_id='+$("#member_id").val();
        params = params + '&gender='+$("#gender").val()+'&age_range_1='+$("#age_range_1").val();
        params = params + '&age_range_2='+$("#age_range_2").val()+'&email='+$("#email").val();        
        
        $.ajax({  
            type: "POST", url: '/index.php/postings/setHangout',  
            data: params,
            complete: function(data){  
                //append response to div #response         
                $(".hangoutNow_pr").slideToggle('slow', function(){
                    $(".response").css({display:'block'});
                    $('#response').empty();
                    $('#response').append(data.responseText);                
                });                  
            }  
        });  
    }
    
//    $(".hangoutNow_pr").bind("ajaxComplete", function(){
//        $(".hangoutNow_pr").slideToggle('slow');  
//        $(".response").css({display:'block'});
//    });
                    
//   $(".others").live('click',function(e){
//       if($(e.target).is('a')){
//           switch($(e.target).attr('id'))
//           {
//               case 'postOpt1':
//                    
//                     break;
//               case 'postOpt2':
//                        console.log('2');
//                     break;
//           }           
//       }
//   });
   
   $('input[type=button]#signin_submit').click(function(){       
       var sortBy   = $('#sort_by').val();
       var country  = $('#search_country').val();
       var state    = $('#search_state').val();
       var city     = $('#search_city').val();
       var zipcode  = $('#search_zipcode').val();
       //var age      = $('#search_age').val();
       var miles    = $('#miles').val();
       
       var params = (country.length > 0  && country != '-')? "&country="+escape(country):"'";
       params += (city.length > 0  && city != '-')? "&city="+escape(city):"";       
       params += (zipcode.length > 0 && zipcode != '-')? "&zipcode="+zipcode:"";
       params += (miles.length > 0  && miles != '-')? "&miles="+miles:"";
       //params += (age.length > 0)? "&age="+age:"";
       params += (state.length > 0  && state != '-')? "&state="+escape(state):"";
       $("#postings").load('/index.php/postings/search?sortBy='+sortBy+params);
   });
   
   $('.del_friend').live('click',function(){
	   
	   var ans = confirm ( 'Are you sure you want to delete the selected friend?' );
	   if(ans)
	   {
	    	var id = $(this).attr('name');
	    	document.location.href = '/index.php/home/deleteFriend?id='+id;
   	   }
	   else
	   { 
   	    	return;
           }
   });
   
   $('#backToEdit').click(function() {
	$('form[name=posting]').attr({action: "/index.php/postings/create"});
	$('form[name=posting]').submit();
   });   

   $('#submtPost').click(function() {
	$('form[name=posting]').attr({action: "/index.php/postings/CreatePosting"});
	$('form[name=posting]').submit();
        $('#submtPost').attr('disabled','disabled');    
   });  
      
    $('#showSearch').click(function() {
	$('#searchPost:visible').hide('slow');    
	$('#searchPost:hidden').show('slow');    
    });
    
    $('.friends_maindiv li a').live('click', function() {
        var email = $(this).attr("name")
	$('#sendmsg_to').val(email);
    });

    $('#btnSendMsg').click(function(){
	    
        var answer = confirm ( 'Send Message now?' );
        if(answer)
        {
            $('#SendMsg').submit();   
        }
        else
        {
            return;   
        }
	    
    });
    
    $("#signup").click(function()
    {       
        var month = $('select[name=select-month]').val();
        var day   = $('select[name=select-day]').val();
        var year  = $('select[name=select-year]').val();
        var bdate = day + '-' + month + '-' + year;
        
        //username validation
        if($("#su_username").val() == '')
        {
            alert('Please enter a username.');
            $("#su_username").focus();
            return;
        }
        else
        {
            var return_msg = $.ajax({
                                type: "POST",
                                url: '/index.php/login/validateUsername',  
                                async: false,
                                data: 'username=' + $('#su_username').val()
                             }).responseText;   
                                
            if(return_msg != 'true'){
                alert(return_msg);
                return;
            }                    
        }
            
        //password validation
        if($("#su_password").val() == '')
        {
            alert('Please enter a password.');
            $("#su_retype_password").focus();
            return;
        }
        
        if($("#su_retype_password").val() == '')
        {
            alert('Please re-enter a password.');
            $("#su_retype_password").focus();
            return;
        }
        
        var pwdLength = checkPasswordLength($("#su_password").val());
        if(pwdLength)
        {
            var result = verifyPassword();		
            if(!result)
            {
                alert('Password does not match!');
                return;
            }			
        }
        else
        {
            alert('Password length must be atleast 6 characters!');
            return;
        }

        //email validation
        if($("#su_email").val() == '')
        {
            alert('Please enter a valid email address.');
            $("#su_email").focus();
            return;
        }
        
        result = verifyEmail();
        if(!result)
        {
            alert('Email address does not match!');
            return;	
        }
        else
        {
            return_msg = $.ajax({
                                type: "POST",
                                url: '/index.php/login/validateEmail',  
                                async: false,
                                data: 'email=' + $('#su_email').val()
                             }).responseText;   
                                
            if(return_msg != 'true'){
                alert(return_msg);
                return;
            } 
        }
        
        //birthdate validate
        if(!isValidDate(bdate))
        {
            alert('Please enter a valid birth date.');
            var el;
            if(year == '-')  el = $('select[name=select-year]');
            if(day == '-')   el = $('select[name=select-day]');
            if(month == '-') el = $('select[name=select-month]');
            
            el.focus();
            return;
        }

        //gender validation
        result = isValidGender();
        if(!result)
        {
            alert('Please select a valid gender!');
            return;	
        }
        
        //captcha validation
        if($("#security_code").val() == '')
        {
            alert('Please enter the security code as seen on the image.');
            $("#security_code").focus();
            return;
        }
        
        if(!isValidCaptchaCode($('#security_code').val()))
        {
            alert('Security code does not match. Please enter the correct security code to proceed on sign-up process!');
            return;	
        }

        //agreement validation
        var agreement = $("#agreement").is(':checked');
        if(agreement == false)
        {
            alert('You need to agree to terms and conditions of HangOut Today to continue the Sign-up process.');	
            return;
        }

        //submit the passed values once confirmation is valid
        $("#Popup").submit();	
        
        

    });
	
    $("form[name=nmfrmChangePwd]").submit(function()
    {
            var oldPassword  = $("#old_password").val();  
            var newPassword  = $("#new_password").val();  
            var newPassword2 = $("#new_password2").val();  
            var origPassword = $("#origPassword").val();  

            if(oldPassword.length != 0 && newPassword.length != 0 && newPassword2.length != 0)
            {

                    var md5_ = calcMD5(oldPassword);                    
                    if(md5_ != origPassword)
                    {
                            alert('Old Password entered does not match with the original password!');
                            return false;	
                    }

                    var passwordStat = checkPasswordLength(newPassword);
                    if(!passwordStat)
                    {
                            alert('Password length must be atleast 6 characters!');
                            return false;
                    }

                    if(oldPassword == newPassword)
                    {
                            alert('Old and new password cannot be the same.');
                            return false;
                    }
                    else if(newPassword != newPassword2)
                    {
                            alert('New Passowrd must be the same with the confirmed password.');
                            return false;	
                    }

            }
            else
            {
                    return false;	
            }
    });

    $("#fp_button").click(function()
    {  
        if($('#emaill_add').val() == '')
        {
            alert('Please enter an email address!');            
            return false;
        }
        else
        {
            $('.wait_msg').css('display', 'block');
            var is_valid_msg = $.ajax({
                            type: "POST",
                            url: '/index.php/login/forgotPassword',  
                            async: false,
                            data: 'email = ' + $('#emaill_add').val()
                        }).responseText;        	

            alert(is_valid_msg);            
            parent.jQuery.fn.colorbox.close();
            $('#emaill_add').empty();
            $('.wait_msg').css('display', 'none');
            return false;
        }
    });
    
    $("#fu_button").click(function()
    {  
        if($('#emaill_add').val() == '')
        {
            alert('Please enter an email address!');
            return false;
        }
        else
        {
            $('.wait_msg').css('display', 'block');
            var is_valid_msg = $.ajax({
                            type: "POST",
                            url: '/index.php/login/forgotUsername',  
                            async: false,
                            data: 'email = ' + $('#emaill_add').val()
                        }).responseText;        	

            alert(is_valid_msg);
            parent.jQuery.fn.colorbox.close();
            $('#emaill_add').empty();
            $('.wait_msg').css('display', 'none');
            return false;
        }
    });
    
    function isValidCaptchaCode(code)
    {

        var _code = $.ajax({
                        type: "POST",
                        url: '/index.php/login/getCaptchaCode',  
                        async: false
                        }).responseText;
        
        if(_code != '' && _code.toLowerCase() == code.toLowerCase())
        {
            return true;
        }
        else
            return false;

    }

    function isValidDate(s) {
        var bits = s.split('-');
        var d = new Date(bits[2], bits[1] - 1, bits[0]);
        return d && (d.getMonth() + 1) == Number(bits[1]) && d.getDate() == Number(bits[0]) && d.getFullYear() == Number(bits[2]);
    } 
    
    function verifyPassword()
    {
            var password_1 = $("#su_password").val(); 
            var password_2 = $("#su_retype_password").val(); 

            if(password_1 != password_2)
            {
                    return false;
            }

            return true;
    }

    function verifyEmail()
    {
            var email_1 = $("#su_email").val(); 
            var email_2 = $("#su_retype_email").val(); 

            if(email_1 != email_2)
            {
                    return false;
            }

            return true;
    }	

    function isValidGender()
    {
        return $('#sel-gender').val() == '-'? false:true;
    }
    
    function checkPasswordLength(password)
    {
            //var password_1 = $("#su_password").val(); 

            if(password.length < 6)
            {
                    return false;	
            }
            else
            {
                    return true;	
            }
    }

    function clearFormElements(ele) 
    {
        $(ele).find(':input').each(function() {
            switch(this.type) {
                case 'password':
                case 'select-multiple':
                case 'select-one':
                case 'text':
                case 'textarea':
                    $(this).val('');
                    break;
                case 'checkbox':
                case 'radio':
                    this.checked = false;
            }
        });
    }
    
    function done_hangout(vName)
    {
       var id = vName.split("_");
       
       $.ajax({  
        type: "POST", url: '/index.php/home/DoneHangout',data:'id = '+id[2],
        beforeSend: function(xhr){
            $("#msg-box-" + id[2]).empty();
            $("#msg-box-" + id[2]).append("<img src='/images/loading.gif'/> Processing request");
        },
        complete: function(data){  
            if(data){
                $("#msg-box-" + id[2]).empty();
                $("#msg-box-" + id[2]).append('HangOut is now completed. An email has been sent to your email. Thank you!');
                $("#msg-box-" + id[2]).delay(3000).fadeOut();
                $("#myHangoutTodayRefresh").trigger('click');
            } else {
                $("#msg-box-" + id[2]).empty();
                $("#msg-box-" + id[2]).append('Unable to process request. Please try again later. Thank you!');
                $("#msg-box-" + id[2]).delay(3000).fadeOut();
            }
            
        }  
       });  
       
    }

    function canc_hangout(vName)
    {
       var id = vName.split("_");
       
       $.ajax({  
        type: "POST", url: '/index.php/home/CancelledHangout',data:'id = '+id[2],
        beforeSend: function(xhr){
            $("#msg-box-" + id[2]).empty();
            $("#msg-box-" + id[2]).append("<img src='/images/loading.gif'/> Processing request");
        },
        complete: function(data){  
            if(data){
                $("#msg-box-" + id[2]).empty();
                $("#msg-box-" + id[2]).append('HangOut is now cancelled. An email has been sent to your email. Thank you!');
                $("#msg-box-" + id[2]).delay(3000).fadeOut();
                $("#myHangoutTodayRefresh").trigger('click');
            } else {
                $("#msg-box-" + id[2]).empty();
                $("#msg-box-" + id[2]).append('Unable to process request. Please try again later. Thank you!');
                $("#msg-box-" + id[2]).delay(3000).fadeOut();
            }
            
        }  
       });  
    }

    function change_age_range()
    {
        var age_range_1 = $('select[name=age_range_1]').val();
        $('select[name=age_range_2]').empty();
        $('select[name=age_range_2]').append($("<option>",{value: age_range_1,text: age_range_1})); 
        var start = parseInt(age_range_1);
        for(var i = start;i < 100;i++)
        {
            $('select[name=age_range_2]').append($("<option>",{value: i,text: i}));   
        }
    }
    
    function get_countries()
    {
        
       var selected = '';
       $.ajax({  
        type: "POST", 
        url: '/index.php/home/GetCountry',
        dataType: 'json',
        complete: function(data){  
            $('select[name=search_country]').empty();
            $($.parseJSON(data.responseText)).each(function(i,val){
                $('select[name=search_country]').append($("<option>",{value: val.code,text: val.name}));   
                selected = val.code;
            });
        }  
       });
       
    }
    
//    function get_zipcodes()
//    {
//       var selected = $('select[name=zipcode]').val();
//       
//       $.ajax({  
//        type: "POST", 
//        url: '/index.php/home/GetZipcodesByCity',
//        data:'city = ' + $('select[name=city]').val(),
//        dataType: 'json',
//        complete: function(data){  
//            $('select[name=zipcode]').empty();
//            $('select[name=zipcode]').append($("<option>",{value: '-',text: '-'})); 
//            $($.parseJSON(data.responseText)).each(function(i,val){
//                $('select[name=zipcode]').append($("<option>",{value: val.code,text: val.name}));   
//            });
//            
//            if(selected != '-')
//            {
//                $('select[name=zipcode]').val(selected);
//            }
//        }  
//       });  
//    }
    
    function fips_regions_in_search()
    {
       $.ajax({  
        type: "POST", 
        url: '/index.php/home/GetFipRegions',        
        dataType: 'json',
        complete: function(data){  
            $('select[name=search_state]').empty();
            $('select[name=search_state]').append($("<option>",{value: '-',text: '-'}));   
            $($.parseJSON(data.responseText)).each(function(i,val){
                $('select[name=search_state]').append($("<option>",{value: val.code,text: val.name}));   
            });
        }  
       });  
       
       if($('select[name=search_state]').val() != ''){
           get_cities_in_search();
       }
    }
    
    function get_cities_in_search()
    {
       var selected = $('select[name=search_city]').val();
       
       $.ajax({  
        type: "POST", 
        url: '/index.php/home/GetCitiesByState',
        data:'state_id = ' + $('select[name=search_state]').val(),
        dataType: 'json',
        complete: function(data){  
            $('select[name=search_city]').empty();
            $('select[name=search_city]').append($("<option>",{value: '-',text: '-'})); 
            $($.parseJSON(data.responseText)).each(function(i,val){
                $('select[name=search_city]').append($("<option>",{value: val.code,text: val.name}));   
            });
            
            if(selected != '-')
            {
                $('select[name=city]').val(selected);
            }
        }  
       });  
    }

    function get_zipcodes_in_search()
    {
       var selected = $('select[name=search_zipcode]').val();
       
       $.ajax({  
        type: "POST", 
        url: '/index.php/home/GetZipcodesByCity',
        data:'city = ' + $('select[name=search_city]').val(),
        dataType: 'json',
        complete: function(data){  
            $('select[name=search_zipcode]').empty();
            $('select[name=search_zipcode]').append($("<option>",{value: '-',text: '-'})); 
            $($.parseJSON(data.responseText)).each(function(i,val){
                $('select[name=search_zipcode]').append($("<option>",{value: val.code,text: val.name}));   
            });
            
            if(selected != '-')
            {
                $('select[name=search_zipcode]').val(selected);
            }
        }  
       });  
    }


    function fips_regions()
    {
       var selected = $('select[name=state]').val();
       $.ajax({  
        type: "POST", 
        url: '/index.php/home/GetFipRegions',
        dataType: 'json',
        complete: function(data){  
            $('select[name=state]').empty();
            $('select[name=state]').append($("<option>",{value: '-',text: '-'})); 
            $($.parseJSON(data.responseText)).each(function(i,val){
                $('select[name=state]').append($("<option>",{value: val.code,text: val.name}));   
            });
            
            if(selected != '-')
            {
                $('select[name=state]').val(selected);
                get_cities();
            }
        }  
       });  
    }
    
    function get_cities()
    {
       var selected = $('select[name=city]').val();
       
       $.ajax({  
        type: "POST", 
        url: '/index.php/home/GetCitiesByState',
        data:'state_id = ' + $('select[name=state]').val(),
        dataType: 'json',
        complete: function(data){  
            $('select[name=city]').empty();
            $('select[name=city]').append($("<option>",{value: '-',text: '-'})); 
            $($.parseJSON(data.responseText)).each(function(i,val){
                $('select[name=city]').append($("<option>",{value: val.code,text: val.name}));   
            });
            
            if(selected != '-')
            {
                $('select[name=city]').val(selected);
                get_zipcodes();
            }
        }  
       });  
    }
    
    function get_zipcodes()
    {
       var selected = $('select[name=zipcode]').val();
       
       $.ajax({  
        type: "POST", 
        url: '/index.php/home/GetZipcodesByCity',
        data:'city = ' + $('select[name=city]').val(),
        dataType: 'json',
        complete: function(data){  
            $('select[name=zipcode]').empty();
            $('select[name=zipcode]').append($("<option>",{value: '-',text: '-'})); 
            $($.parseJSON(data.responseText)).each(function(i,val){
                $('select[name=zipcode]').append($("<option>",{value: val.code,text: val.name}));   
            });
            
            if(selected != '-')
            {
                $('select[name=zipcode]').val(selected);
            }
        }  
       });  
    }
    
    $("#fb_login").click(function()
    {  
        facebookLogin();
    });
    
    function checkHangoutFacebookAccount(fb_email)
    {
        return $.ajax({
                        type: "POST",
                        url: '/index.php/login/checkHangoutFacebookAccount',  
                        async: false,
                        data: 'fb_email = ' + fb_email
                        }).responseText;
    }
    
    function fbLogin(fb_email)
    {
        return $.ajax({
                        type: "POST",
                        url: '/index.php/login/login',  
                        async: false,
                        data: 'fb_email = ' + fb_email + '&fb=true'
                        }).responseText;
    }
    
    
    
    function facebookLogin()
    {
        // Additional JS functions here
        function callAPI() {
            FB.api('/me', function(response) {                   
                var fb_hngt = checkHangoutFacebookAccount(response.email);
		
		if(fb_hngt == 'true')
                {
                    document.location.href = fbLogin(response.email);
                    FB.logout(); //logout the user after validating his fb account
                }                 
                else
                {
                  alert("Facebook account does not matched any users of Hangout Today.");
                  FB.logout(); //logout the user after validating his fb account
                  return;
                }                                 
            });
        }
        
        function fbLoginPage()
        {
            FB.getLoginStatus(function(response) {
	            if (response.status === 'connected') {
	                // connected
	                callAPI();
	            } else if (response.status === 'not_authorized') {
	                // not_authorized
	                login();
	            } else {
	                // not_logged_in
	                login();
	            }
            });       
        }

        window.fbAsyncInit = function() {
            
            FB.init({
                appId      : '146990625475282', // App ID
                channelUrl : 'http://novarsoft.comuf.com/index.php/login/channel', // Channel File
                status     : true, // check login status
                cookie     : true, // enable cookies to allow the server to access the session
                xfbml      : true  // parse XFBML
            });

            // Additional init code here
            fbLoginPage();     
       
        };

        // Load the SDK Asynchronously
        (function(d){
            var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement('script');js.id = id;js.async = true;
            js.src = "//connect.facebook.net/en_US/all.js";
            ref.parentNode.insertBefore(js, ref);
        }(document));
        
        function login() {
            FB.login(function(response) {
                if (response.authResponse) {
                    // connected
                    callAPI();
                } else {
                    
                }
            },{
	      scope:'email'
            });
        }
        
        if (typeof FB !== 'undefined') {
            //2nd click 
            //window.fbAsyncInit only works on first load of the page
            fbLoginPage();         
        }
    }
    
    function imposeMaxLength(Event, Object, MaxLen)
    {
        return (Object.value.length <= MaxLen)||(Event.keyCode == 8 ||Event.keyCode==46||(Event.keyCode>=35&&Event.keyCode<=40))
    }

    function getMonthNum(month)
    {
        var MonthsInString = ['January', 'February', 'March', 'April', 'May',
                                'June', 'July', 'August', 'September', 'October',
                                'November', 'December'];
        return MonthsInString.indexOf(month);                    
    }
    
});

