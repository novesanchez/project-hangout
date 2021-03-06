jQuery(function(){

    $(window).load(function(){
               
        if(isExist('myHangoutToday')) {loadMyHangoutToday(true, 0);} 
        if(isExist('myUpcomingHangout')) {loadMyUpcomingHangout(true, 0);}  
        if(isExist('myPostings')) {loadMyPostings(true, 0);} 
       
        $("a#myPostingLoadMore").click(function(e){            
            loadMyPostings(false, $("#myPostingStart").val());
        });
        
        $("a#myHangoutLoadMore").click(function(e){            
            loadMyHangoutToday(false, $("#myHangoutStart").val());
        });
        
        $("a#myUpcomingLoadMore").click(function(e){            
            loadMyUpcomingHangout(false, $("#myUpcomingHangoutStart").val());
        });
        
        if(isExist('ul-country')) {
            loadCountries();            
        }
        
        $("button#btnSaveProfile").click(function(e){            
            saveProfile();
        });
                
        if(isExist('ul-abtyrslf_19')) {
            getDropdownFields();
        }        
        
        $(document.body).on('click', '.form-abtyourself ul li a', function(){                
                $("#btn-"+$(this).attr('id')+":first-child").html($(this).text() + ' ' + '<span class="caret"></span>');
                $("#btn-"+$(this).attr('id')+":first-child").val($(this).text());
                $("#val-"+$(this).attr('id')+":first-child").val($(this).attr('name'));
        });
        
        $("button#btnSavePersonalInfo").click(function(e){           
            var btnName = 'btnSavePersonalInfo';
            var divMsgSucName = 'personalInfoMsgSuccess';
            var divMsgErrName = 'personalInfoMsgError';
            var formName = 'form-personalInfo';
            saveAboutYourself(btnName, divMsgSucName, divMsgErrName, formName);
        });        

        $("button#btnSaveFavAndInterests").click(function(e){           
            var btnName = 'btnSaveFavAndInterests';
            var divMsgSucName = 'favInterestsMsgSuccess';
            var divMsgErrName = 'favInterestsMsgError';
            var formName = 'form-favInterests';
            saveAboutYourself(btnName, divMsgSucName, divMsgErrName, formName);
        });
        
        $("button#btnSavePassword").click(function(e){           
            changePassword();
        });
        
        $("button#btnMsg").click(function(e){           
            var profileId = (this.name).split("_")[1];
            var email = $('#hd_'+profileId).val();
            $('#msgEmail').val(email);
        });
        
        $("button#btnSend").click(function(e){           
            sendMessage();
        });
        
        $("button#btnRmvFriend").click(function(e){               
            removeFriend();
        });
               
        $("#photoDiv").on('click', '#mkProPic', function(e){
            setProfilePicture(this);
        });
        
        $('#frmUploadPhoto').on('submit', function(e){     
            e.preventDefault();
            uploadPhotos(this);
        });
        
        $("#photoDiv").on('click', '#rmPic', function(e){
            removePicture(this);
        });
        
        $("button#btnPrevPost").click(function(e){                   
            pageMyPosts('prev', $('#page-value').val());
        });
        
        $("button#btnNextPost").click(function(e){    
            pageMyPosts('next', $('#page-value').val());
        });
        
        $("#page-value").keyup(function(e){
            if(e.keyCode == 13){
               pageMyPosts('na', $("#page-value").val());
            }
        });
        
        $("[rel='tooltip']").tooltip(); 
        $("#div-postlist").on('mouseenter', '#postItem', function(e){
           
            $(this).find('.caption').slideDown(250);
        });

        $("#div-postlist").on('mouseleave', '#postItem', function(e){         
            $(this).find('.caption').slideUp(250);
        });

       $('#hangout-startdt').datetimepicker({
           sideBySide: true,
           useCurrent: false,
           minDate: new Date()//disable previous dates
       });
            
       $('#hangout-startdt').on('dp.change', function(e){           
           $('#hangout-enddt').data("DateTimePicker").minDate(e.date);
           highlight('hangout-startdt', false);  
       });
       
       $('#hangout-enddt').datetimepicker({
           sideBySide: true          
       });
         
       $('#posting_title').change(function(e){
            highlight('posting_title', false);   
        });

        $('#posting_desc').change(function(e){
            highlight('posting_desc', false);   
        });
        
        $('#hangout-enddt').on('dp.change', function(e){           
            highlight('hangout-enddt', false);   
        });
            
       $("button#btnContinue").click(function(e){           
           
            var postTitle = $("#posting_title").val();
            var postDesc = $("#posting_desc").val();
            var hngtStartDtTm = $('#hangout-startdt').data('date');
            var hngtEndDtTm = $('#hangout-enddt').data('date');
           
            var success = function(msg){
                $('#alertMessageSuccess').html('<strong>' + msg + '</strong>');
                $('.div-success').css({display : 'block'});
                $('.div-success').delay(3000).fadeOut();
            }
            
            var error = function(msg){
                $('#alertMsgError').html('<strong>' + msg + '</strong>');
                $('.div-error').css({display : 'block'});
                $('.div-error').delay(3000).fadeOut();
            }
            
            var highlight = function(el, isErr){
                var rgbColor = isErr? "#FF0000" : "#CCCCCC";
                $('#' + el).css({"border": rgbColor + ' 1px solid'});   
            }
            
            if(!postTitle.trim()){
                error("Please enter a Posting Title!");
                highlight('posting_title', true);
                return false;
            } else if(!postDesc.trim()){
                error("Please enter a Posting Description!");
                highlight('posting_desc', true);
                return false;
            } else if(!hngtStartDtTm.trim()){
                error("Please enter a Hangout Start Date and Time!");
                highlight('hangout-startdt', true);
                return false;
            } else if(!hngtStartDtTm.trim()){
                error("Please enter a Hangout Start Date and Time!");
                highlight('hangout-startdt', true);
                return false;
            } else if(!hngtEndDtTm.trim()){
                error("Please enter a Hangout End Date and Time!");
                highlight('hangout-enddt', true);
                return false;
            }                       
            
            $('form[name=frmCrtPostings]').attr({action: "/index.php/postings/preview"});
            $('form[name=frmCrtPostings]').append('<input type="hidden" name="hngtStartDtTm " value="' + hngtStartDtTm + '" />');
            $('form[name=frmCrtPostings]').append('<input type="hidden" name="hngtEndDtTm " value="' + hngtEndDtTm + '" />');
            $('form[name=frmCrtPostings]').submit();   
        
        });
        
        $('select[name=age_range_1]').change(function(e){ 
           changeAgeRange();
        });                
        
        $("button#btnSubmit").click(function(e){   
            
            var posting_id = $("#posting_id").val();            
            if(!posting_id.trim()){
                submitPost();
            } else {
                window.location.href = "/index.php/postings/create";
            }
            
        });
        
        $("button#btnBack").click(function(e){   
            
            var posting_id = $("#posting_id").val();            
            if(!posting_id.trim()){
                $('form[name=posting]').attr({action: "/index.php/postings/create"});
                $('form[name=posting]').submit();
            } else {
                window.location.replace("/index.php/postings/index");
            }
            
        });
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
             if(parseData.data == ''){
                $("#myPostings").append('No results found.');
             } else {
                $("#myPostings").append(parseData.data);
             }
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
            if(parseData.data == ''){
                $("#myHangoutToday").append('No results found.');
            } else {
                $("#myHangoutToday").append(parseData.data);
            }
            
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
            
            if(parseData.data == ''){
                $("#myUpcomingHangout").append('No results found.');
            } else {
                $("#myUpcomingHangout").append(parseData.data);
            }
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
   
//-----------------Account Tab------------------//   
    function loadCountries(){
       $.ajax({  
        type: "POST", 
        url: '/index.php/home/GetCountry',  
        beforeSend: function(xhr){},
        complete: function(data){                      
            var rs = $.parseJSON(data.responseText);            
            $(rs).each(function(i, val){                
                $("ul#ul-country").append('<li><a href="#">' + val.name + '</a></li>');
                if(val.is_country == true){
                    $("button#btn-country").html(val.name + ' ' + '<span class="caret"></span>');
                }
            });            
        }  
       });  
    }   
    
    function saveProfile(){
       
       var success = function(){
            $('#profileMsgSuccess').html('<strong>Changes has been successfully saved.</strong>');
            $('.div-success').css({display : 'block'});
            $('.div-success').delay(3000).fadeOut();
        }
        
        var error = function(){
            $('#profileMsgError').html('<strong>An error occurred. Please try again later.</strong>');
            $('.div-error').css({display : 'block'});
            $('.div-error').delay(3000).fadeOut();
        }
        
       $.ajax({  
        type: "POST", 
        url: '/index.php/home/saveMyAccount',                  
        data: 'email=' + $('#email').val(),
        beforeSend: function(){
          $('button#btnSaveProfile').text('Saving...');
        },
        complete: function(data){                             
            var rs = $.parseJSON(data.responseText);            
            if(rs.success){
                success();                
            } else {
                error();
            }     
            $('button#btnSaveProfile').text('Save Changes');
        }  
       });  
       
    } 
    
    function loadProfileChoices(profileId){
       $.ajax({  
        type: "POST", 
        url: '/index.php/home/LoadProfileChoices',  
        data: 'id=' + profileId,
        beforeSend: function(xhr){},
        complete: function(data){                      
            var rs = $.parseJSON(data.responseText);            
            $(rs).each(function(i, val){                
                $("ul#ul-abtyrslf_" + profileId).append('<li><a href="#" id="abtyrslf_' + profileId + '" name="' + val.code + '">' + val.name + '</a></li>');                
                if($('#val-abtyrslf_' + profileId).val() == val.code){
                    $("button#btn-abtyrslf_" + profileId).html(val.name + ' ' + '<span class="caret"></span>');
                }
            });            
        }  
       });  
    }
    
    function getDropdownFields(){
       $.ajax({  
        type: "POST", 
        url: '/index.php/home/GetDropdownFields',  
        complete: function(data){                      
            var rs = $.parseJSON(data.responseText);            
            $(rs).each(function(i, val){                
                if(isExist('ul-abtyrslf_' + val.code)) {
                    loadProfileChoices(val.code);                    
                }                
            });            
        }  
       });  
    }    
    
//-----------------About Yourself Tab------------------//    
    function saveAboutYourself(btnName, divMsgSucName, divMsgErrName, formName){
        
        var success = function(){
            $('#'+divMsgSucName).html('<strong>Changes has been successfully saved.</strong>');
            $('.div-success').css({display : 'block'});
            $('.div-success').delay(3000).fadeOut();
        }
        
        var error = function(){
            $('#'+divMsgErrName).html('<strong>An error occurred. Please try again later.</strong>');
            $('.div-error').css({display : 'block'});
            $('.div-error').delay(3000).fadeOut();
        }
        
        //get all input type hidden under div 
        var elHidden = $('.'+formName+' :input[type="hidden"]');
        
        //get all input type hidden under div 
        var elTextBox = $('.'+formName+' :input[type="text"]');
       
        //get all input type textarea under div 
        var elTextarea = $('.'+formName+' textarea');
      
        var tmpData = [];
        $.each(elHidden, function(key, childEl){
           var inputId = (childEl.id).split("_");
           tmpData.push({profile_id: inputId[1], profile_choice_id: childEl.value, value: childEl.value});
        });
        
        $.each(elTextBox, function(key, childEl){
           var inputId = (childEl.id).split("_");
           tmpData.push({profile_id: inputId[1], profile_choice_id: 'null', value: childEl.value});
        });
        
        $.each(elTextarea, function(key, childEl){
           var inputId = (childEl.id).split("_");
           tmpData.push({profile_id: inputId[1], profile_choice_id: 'null', value: childEl.value});
        });
        
        var encData = JSON.stringify(tmpData);
        
       $.ajax({  
        type: "POST", 
        data: "data=" + encData,
        url: '/index.php/home/SaveAboutYourself',  
        beforeSend: function(xhr){
          $('button#'+btnName).text('Saving...');  
        },
        complete: function(data){                      
            var rs = $.parseJSON(data.responseText);            
            if(rs.success){
                success();                
            } else {
                error();
            }           
            $('button#'+btnName).text('Save Changes');
        }  
       });  
    }
   
//-----------------Change Password Tab------------------//    
    function changePassword(){
        
        var divMsgSucName = 'chPwdMsgSuccess';
        var divMsgErrName = 'chPwdMsgError';
        
        var success = function(){
            $('#'+divMsgSucName).html('<strong>Changes has been successfully saved.</strong>');
            $('.div-success').css({display : 'block'});
            $('.div-success').delay(3000).fadeOut();
        }
        
        var error = function(msg){
            $('#'+divMsgErrName).html('<strong>'+msg+'</strong>');
            $('.div-error').css({display : 'block'});
            $('.div-error').delay(3000).fadeOut();
        }

        var oldPassword = calcMD5($('#oldPassword').val());
        var newPassword = calcMD5($('#newPassword').val());
        var conPassword = calcMD5($('#conPassword').val());
        var corPassword = $('#origPassword').val();
//        return;
        if(oldPassword != corPassword){
            error('Incorrect old password.');
            return;
        } else if(newPassword != conPassword){
            error('New Password does not match.');
            return;
        } else if(oldPassword == newPassword){
            error('Please enter a different new password from old password.');
            return;
        }
        
        $.ajax({  
            type: "POST", 
            data: "pwd=" + newPassword,
            url: '/index.php/home/ChangePassword',  
            beforeSend: function(xhr){
            $('button#btnSavePassword').text('Saving...');  
            },
            complete: function(data){                      
                var rs = $.parseJSON(data.responseText);            
                if(rs.success){
                    success();                
                } else {
                    error('An error occurred. Please try again later.');
                }           
                $('button#btnSavePassword').text('Save Changes');
            }  
       });  
    }
    
//-----------------Picture Tab------------------//    

    function setProfilePicture(el){
        
        var photoId = (el.name).split("_")[1];
        
        var success = function(){
            $('#PicMsgSuccess').html('<strong>Changes has been successfully saved.</strong>');
            $('.div-success').css({display : 'block'});
            $('.div-success').delay(3000).fadeOut();
        }
        
        var error = function(){            
            $('#PicMsgError').html('<strong>An error occurred. Please try again later.</strong>');
            $('.div-error').css({display : 'block'});
            $('.div-error').delay(3000).fadeOut();
        }
        
        $.ajax({  
            type: "POST", 
            data: "photoId="+photoId,
            url: '/index.php/home/MakeProfilePicture',  
            complete: function(data){                      
                
                var rs = $.parseJSON(data.responseText);            
                if(rs.success){
                    success();                    
                } else {
                    error();
                }   
            }  
       }); 
       
    }
    
    function uploadPhotos(el){       
        
        var success = function(){
            $('#PicMsgSuccess').html('<strong>Changes has been successfully saved.</strong>');
            $('.div-success').css({display : 'block'});
            $('.div-success').delay(3000).fadeOut();
        }
        
        var error = function(){            
            $('#PicMsgError').html('<strong>An error occurred. Please try again later.</strong>');
            $('.div-error').css({display : 'block'});
            $('.div-error').delay(3000).fadeOut();
        }
        
        $.ajax({  
            type: "POST", 
            data: new FormData(el),
            url: '/index.php/home/UploadPhotos', 
            contentType: false,
            cache: false, 
            processData: false,
            beforeSend: function(xhr){
                $("button#btnSavePicture").text('Uploading...');
            },
            complete: function(data){                      
                
                var rs = $.parseJSON(data.responseText);            
                if(rs.success){
                    getPhotos();
                } else {
                    error();
                }   
                
                $("button#btnSavePicture").text('Upload');
            }  
       }); 
       
    }
    
    function removePicture(el){
        
        var photoId = (el.name).split("_")[1];
        
        var error = function(){            
            $('#PicMsgError').html('<strong>An error occurred. Please try again later.</strong>');
            $('.div-error').css({display : 'block'});
            $('.div-error').delay(3000).fadeOut();
        }
        
        $.ajax({  
            type: "POST", 
            data: "photoId="+photoId,
            url: '/index.php/home/RemovePhoto',  
            complete: function(data){                      
                
                var rs = $.parseJSON(data.responseText);            
                if(rs.success){
                    getPhotos();                 
                } else {
                    error();
                }   
            }  
       }); 
       
    }
    
    function getPhotos(){
        
        $.ajax({  
            type: "POST",            
            url: '/index.php/home/GetPhotos',             
            complete: function(data){                      
                var rs = $.parseJSON(data.responseText);                  
                $('#photoDiv').fadeOut('slow', function() {
                    $('#photoDiv').html(rs.body);
                    $('#photoDiv').fadeIn('slow');
                });
            }  
       });         
       
    }
    
//-----------------Friends Tab------------------//        
    function sendMessage(){
       
       var msgEmail = $('#msgEmail').val();
       var msgSubject = $('#msgSubject').val();
       var msgContent = $('#msgContent').val();
       var msgSender = $('#msgSender').val();
       
//        var divMsgSucName = 'chPwdMsgSuccess';
//        var divMsgErrName = 'chPwdMsgError';
//        
//        var success = function(){
//            $('#'+divMsgSucName).html('<strong>Changes has been successfully saved.</strong>');
//            $('.div-success').css({display : 'block'});
//            $('.div-success').delay(3000).fadeOut();
//        }
//        
//        var error = function(msg){
//            $('#'+divMsgErrName).html('<strong>'+msg+'</strong>');
//            $('.div-error').css({display : 'block'});
//            $('.div-error').delay(3000).fadeOut();
//        }
        
        var params = "msgEmail=" + msgEmail + "&msgSubject=" + msgSubject + "&msgContent=" + msgContent + "&msgSender=" + msgSender;
        $.ajax({  
            type: "POST", 
            data: params,
            url: '/index.php/home/SendMessage',  
            beforeSend: function(xhr){
                $('#btnSend').text('Sending...');  
            },
            complete: function(data){                      
                var rs = $.parseJSON(data.responseText);            
                if(rs.success){
                   $('#btnSend').text('Message Sent!');     
                   $('#message').modal('toggle');
                } else {
                    alert('Please try again, later.')
                }           
                $('#btnSend').text('Send');
            }  
       });  
    }
    
    function removeFriend(){
        
        var profileId = ($("button#btnRmvFriend").attr('name')).split("_")[1];
        var friendshipId = $("#fid_"+profileId).val();
            
        $.ajax({  
            type: "POST", 
            data: "friendshipId="+friendshipId,
            url: '/index.php/home/Unfriend',  
            complete: function(data){                      
                var rs = $.parseJSON(data.responseText);            
                getFriends();                         
            }  
       }); 

    }
    
    function getFriends(){
        
        $.ajax({  
            type: "POST",            
            url: '/index.php/home/GetFriends',             
            complete: function(data){                      
                var rs = $.parseJSON(data.responseText);                  
                $('#div-friends').fadeOut('slow', function() {
                    $('#div-friends').html(rs.body);
                    $('#div-friends').fadeIn('slow');
                });
            }  
       }); 
       
    }
    
    function pageMyPosts(btn, pageValue){
        
        var pageSize = 5;
        var pageNum = $("#page-num").val();
        var newPageNum = (pageValue - 1) * pageSize;
        if(btn == 'next'){
            newPageNum = parseInt(pageNum) + pageSize;
        }else if(btn == 'prev') {
            newPageNum = parseInt(pageNum) - pageSize;
        } 
        
        $.ajax({  
            type: "POST",            
            url: '/index.php/home/PageMyPosts', 
            data: 'pageNum=' + newPageNum,
            complete: function(data){                      
                var rs = $.parseJSON(data.responseText);                  
                $('#div-postlist').fadeOut('slow', function() {
                    $('#div-postlist').html(rs.body);
                    $('#div-postlist').fadeIn('slow');
                });
                
                if(newPageNum > 0){
                    $('#btnPrevPost').removeClass('disabled');  
                } else {
                    $('#btnPrevPost').addClass('disabled'); 
                }
                
                if(rs.total == pageSize){
                    $('#btnNextPost').removeClass('disabled');   
                } else {
                    $('#btnNextPost').addClass('disabled');  
                } 
                
                if(btn != 'na'){
                    if(newPageNum == rs.totalPostings){
                    $("#page-value").val(newPageNum);
                    } else {
                        $("#page-value").val( (newPageNum/pageSize) + 1 );
                    }
                }
                
                $("#page-num").val(newPageNum);
            }  
       }); 
       
    }
    
    function changeAgeRange()
    {
        var age_range_1 = $('select[name=age_range_1]').val();
        var age_range_2 = $('select[name=age_range_2]').val();
        
        //if(age_range_1 > age_range_2){
            $('select[name=age_range_2]').empty();
            $('select[name=age_range_2]').append($("<option>",{value: age_range_1,text: age_range_1})); 
        //}
        
        var start = parseInt(age_range_1);
        for(var i = start;i < 100;i++)
        {
            $('select[name=age_range_2]').append($("<option>",{value: i,text: i}));   
        }
    }
    
    function highlight(el, isErr)
    {
        var rgbColor = isErr? "#FF0000" : "#CCCCCC";
        $('#' + el).css({"border": rgbColor + ' 1px solid'});   
    }
    
    function submitPost()
    {
        var postTitle = $("#posting_title").val();
        var postDesc = $("#posting_desc").val();
        var hngtStartDtTm = $('#startdt_hangout').val();
        var hngtEndDtTm = $('#enddt_hangout').val();
        var postingEnddt = $('#posting_enddt').val();
        var numPpl = $('#num_ppl').val();
        var gender = $('#gender').val();
        var ageRange1 = $('#age_range_1').val();
        var ageRange2 = $('#age_range_2').val();
        
        var params = "postTitle=" + postTitle + "&postDesc=" + postDesc + "&hngtStartDtTm=" + hngtStartDtTm + "&hngtEndDtTm=" + hngtEndDtTm;
        params = params + "&postingEnddt=" + postingEnddt + "&numPpl=" + numPpl + "&gender=" + gender + "&ageRange1=" + ageRange1 + "&ageRange2=" + ageRange2;
        
        var success = function(msg){
            $('#alertMsgSuccess').html('<strong>' + msg + '</strong>');
            $('.div-success').css({display : 'block'});
            $('.div-success').delay(3000).fadeOut();
        }

        var error = function(msg){
            $('#alertMsgError').html('<strong>' + msg + '</strong>');
            $('.div-error').css({display : 'block'});
            $('.div-error').delay(3000).fadeOut();
        }
            
        $.ajax({  
            type: "POST",            
            url: '/index.php/postings/CreatePosting',     
            data: params,
            complete: function(data){                      
                var rs = $.parseJSON(data.responseText);                              
                if(rs.success){
                    success("Posted!");
                    $("#lblPrvwPost").text("View Post");
                    $("#btnSubmit").text("New Post");
                    $("#posting_id").val(rs.posting_id);
                } else {
                    error("An error occurred while processing your request. Please try again later!");
                }
            }  
       }); 
    }
    
});