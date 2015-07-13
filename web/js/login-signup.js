jQuery(function(){
    
    $(window).load(function(){
       
       $('button#btn-login-hngt').click(function(){           
           Login();
       });
       
    });
   
    function Login()
    {
        var username = $('#username').val();
        var password = $('#password').val();
        
        var responseToFailure = function()
        {
            $('.lbl-incorrect-login').text('Please enter a correct Username or Password.');
            $('.lbl-incorrect-login').css({display : 'block'});
            $('.lbl-incorrect-login').delay(3000).fadeOut();
        }
        
        if( (username == '' || username == null || username.length == 0) || 
            (password == '' || password == null || password.length == 0) )
        {
            responseToFailure();
            return;
        }
        
        $.ajax({  
            type: "POST", 
            url: '/index.php/login/AuthenticateLogin',      
            dataType: 'json',
            data: 'username='+username+'&password='+calcMD5(password),
            complete: function(data){  
                var response = $.parseJSON(data.responseText);
                if(!response.success){
                    responseToFailure();
                } else {
                   document.location.href = '/index.php/home/index'; 
                }
            }  
       });
    }
    
});