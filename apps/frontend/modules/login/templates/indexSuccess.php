<?php $captchaUrl = $_SERVER['SERVER_NAME'].'/index.php/login/GetSecurityCode'; ?>

<script type="text/javascript">
    $(window).load(
        function(){   
            $('img.bgfade').hide();
            var dg_H = $(window).height();
            var dg_W = $(window).width();
            $('#wrap').css({'height':dg_H,'width':dg_W});
            function anim() {
                $("#wrap img.bgfade").first().appendTo('#wrap').fadeOut(1500);
                $("#wrap img").first().fadeIn(1500);
                setTimeout(anim, 5000);
            }
            anim();
            
            $("#ul-month li a").click(function(){
                 $("#btn-month:first-child").text($(this).text());
                 $("#btn-month:first-child").val($(this).text());
            });
            
            $("#ul-year li a").click(function(){
                 $("#btn-year:first-child").text($(this).text());
                 $("#btn-year:first-child").val($(this).text());
            });
            
            $("#ul-day li a").click(function(){
                 $("#btn-day:first-child").text($(this).text());
                 $("#btn-day:first-child").val($(this).text());
            });
        }        
    )
</script>
<link rel="stylesheet" href="/css/signin.css" />

<div class="container" id="cb-container">
    <div class="row">
        <div class="col-md-8" style="position: relative;height: 30em;">      
                <p>
                Is a place where people can go to make new friends and participate in new activities and experiences. Whether you are looking for
                someone to go to the movies, the park, a casual dinner, theater, workout partner, bar buddy, a game of tennis, a golf outing,
                hiking, dancing, or whatever activity you would like to do but need anothet individual or a group in order to do it. 
                Hangout is for you. (Click here to Learn More)
                </p>
        </div>
        <div class="col-md-4">

            <form class="form-signin" role="form">
                <div class="panel panel-success">
                    <div class="panel-heading">
                            <h5 class="form-signin-heading">
                                <span style="font-family: 'Helvetica Neue';">Join Now to Respond to Postings and</span> 
                                <span style="font-family: 'Helvetica Neue';"><br/>Make New Friends Today.</span>
                            </h5>
                    </div>
                    <div class="panel-body">
                        <input type="text" class="form-control" placeholder="Choose a Username" required autofocus>
                        <input type="password" class="form-control" placeholder="Enter a password" required>
                        <input type="password" class="form-control" placeholder="Re-enter a password" required>
                        <input type="email" class="form-control" placeholder="Enter email address" required>
                        <input type="email" class="form-control" placeholder="Re-enter email address" required>

                        <div class="dropdown">
                            <div class="btn-group">
                                <button id="btn-month" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Month <span class="caret"></span>
                                </button>
                                <ul id="ul-month" class="dropdown-menu scrollable-menu" role="menu">
                                    <li><a href="#">January</a></li>
                                    <li><a href="#">February</a></li>
                                    <li><a href="#">March</a></li>
                                    <li><a href="#">April</a></li>
                                    <li><a href="#">May</a></li>
                                    <li><a href="#">June</a></li>
                                    <li><a href="#">July</a></li>
                                    <li><a href="#">August</a></li>
                                    <li><a href="#">September</a></li>
                                    <li><a href="#">October</a></li>
                                    <li><a href="#">November</a></li>
                                    <li><a href="#">December</a></li>
                                </ul>                
                            </div>

                            <div class="btn-group">
                                <button id="btn-year" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Year <span class="caret"></span>
                                </button>
                                <ul id="ul-year" class="dropdown-menu scrollable-menu" role="menu">
                                    <?php 
                                        $stYear = (int)date('Y') - 18;
                                        $enYear = $stYear - 60;
                                        for($year=$enYear;$year<($stYear+1);$year++){
                                            $option .= "<li><a href='#'>".$year."</a></li>";
                                        }
                                        echo $option;
                                    ?>
                                </ul>
                            </div>

                            <div class="btn-group">
                                <button id="btn-day" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    Day <span class="caret"></span>
                                </button>
                                <ul id="ul-day" class="dropdown-menu scrollable-menu" role="menu">                            
                                    <?php 
                                        $option = '';
                                        for($i=1;$i<32;$i++){
                                            $day = $i;
                                            $option .= "<li><a href='#'>".$day."</a></li>";
                                        }
                                        echo $option;
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <p class="help-block">*Date of birth cannot be changed once entered.</p>

                        <label class="radio-inline"><input type="radio" name="optradio">Female</label>
                        <label class="radio-inline"><input type="radio" name="optradio">Male</label>
                        <p class="help-block">*Gender cannot be changed once entered.</p>

                        <div class="captcha">
                            <img id="captcha-img" src="/images/captcha.jpg" />
                            <input type="text" id="security_code" name="security_code" placeholder="Enter security code above" class="form-control"/>
                        </div>

                        <button class="btn btn-lg btn-success btn-block" type="submit">Sign Up</button>    
                    </div>
                </div>
            </form>            
        </div>
    </div>    
</div>

<div id="wrap">
    <img class="bgfade" src="/images/ImageFader/1.jpg">
    <img class="bgfade" src="/images/ImageFader/2.jpg">
    <img class="bgfade" src="/images/ImageFader/3.jpg">
    <img class="bgfade" src="/images/ImageFader/4.jpg">
    <img class="bgfade" src="/images/ImageFader/5.jpg">
</div>

