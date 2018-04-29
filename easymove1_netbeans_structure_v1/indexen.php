<?php
session_start();
require_once 'includes/init.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
     <link rel="icon" href="images/logo_new.ico" >
    
     <title>Easy Move - Déménagement à Montréal et Alentours</title>
    
     <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
    <?php foreach (loadHeaderContent('content','home') as $file ) include_once($file) ?>

</head>

<body onload="setActiveMenu(<?php echo '\''.getCurrentPage('content').'\'';?>)">

    <div id="top-container" class="container"> 
        <div  class="c_slogan navbar-left">
            With a competitive price offered, you also have a peace of mind!
        </div>
        <div class="social navbar-right">
            <a href="https://www.facebook.com/easymovemontreal/" target="_blank">
                <img src="images/facebook_tr.png" alt="Easy Move on Facebook" title="Easy Move on Facebook"/>
            </a>
            <a href="https://www.google.ca/maps/place/Easy+Move/@45.3548661,-73.7655385,16.54z/data=!4m5!3m4!1s0x4cc91533dcd62b2d:0xc7710da215f41e53!8m2!3d45.355219!4d-73.763646?hl=fr" target="_blank">
                <img src="images/google_tr.png" alt="Easy Move on Google+" title="Easy Move on Google+"/>
            </a>
        </div>
        <a id="lang_mobile" href="index.php" class="navbar-toggle collapsed navbar-right language-mobile">
            <button type="button">
                FR </button> 
        </a>
    </div>
    
    <nav class="navbar navbar-inverse o_navbar">
        <div class="container" >
            <div class="navbar-header">

                <button id="toggle" type="button" class="navbar-toggle collapsed btn-toggle" data-toggle="collapse" data-target="#main_menu" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="logo-small navbar-brand o_brand" href="index.php?content=home"><img id="nav_img" src="images/logo_new_b.jpg" alt="Easy Move" height="130" /></a>
                <a class="logo-full navbar-brand o_brand" href="index.php?content=home"><img id="nav_img" src="images/logo_new.jpg" alt="Easy Move" height="130" /></a>
            </div>
            <div class="header-breaks">
                <br/><br/>
            </div>

            <div class="collapse navbar-collapse" id="main_menu">

                <ul class="nav navbar-nav main_list">
                    <li id="homeM"><a href="indexen.php?content=home">Home</a></li>
                    <li id="moveM"><a href="indexen.php?content=move">Move</a></li>
                    <li id="ratesM"><a href="indexen.php?content=rates">Rates</a></li>
                    <li id="servicesM"><a href="indexen.php?content=services">Services</a></li>
                    <li id="aboutM"><a href="indexen.php?content=about">About</a></li>
                    <li id="contactM"><a href="indexen.php?content=contact">Contact</a></li>
                </ul>
                <a href="index.php" class="navbar-right language">
                    <button type="button">
                        FR </button> 
                </a>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
    
    <hr style="margin:10px 0; border-color:rgb(245, 121, 33); border-width:3px" />
     
    
    <!--MAIN-->
    <div class="container" style="min-width: 350px">
        <?php loadContentEnglish('content', 'home'); ?>
    </div><!-- /.container -->

    <!--FOOTER-->
    <footer>    
        <div class="container-fluid o_navbar_bottom" >
            <h4 style="text-align: center"><span><a style="color: white" href="tel:+1-514-578-6903">
                        <span class="glyphicon glyphicon-phone"></span> Call us! (514) 578-6903 </a></span>
            </h4>
            <h4 style="text-align: center" >
                <a href="indexen.php?content=estimation">
                    <button type="button" class="btn btn-primary btn-estimation" style="min-width: 220px;" >
                        Get a free quote!
                    </button>
                </a>
            </h4>

            <h4 style="text-align: center" class="social-bottom">

                <a href="https://www.facebook.com/easymovemontreal/" target="_blank">
                    <img src="images/facebook_tr.png" alt="Easy Move sur Facebook" title="Easy Move sur Facebook"/>
                </a>
                <a href="https://www.google.ca/maps/place/Easy+Move/@45.3548661,-73.7655385,16.54z/data=!4m5!3m4!1s0x4cc91533dcd62b2d:0xc7710da215f41e53!8m2!3d45.355219!4d-73.763646?hl=fr" target="_blank">
                    <img src="images/google_tr.png" alt="Easy Move sur Google+" title="Easy Move sur Google+"/>
                </a>
            </h4>

        </div>
        
        <div class="container-fluid o_navbar_bottom" style="border-top: 1px solid #000; padding: 8px 0" >
            <h4 id="nav-bottom-desktop" style="text-align: center; color: #bbb; width: auto">
                <a href="indexen.php?content=home">Home</a>&nbsp;|
                <a href="indexen.php?content=move">Moving</a>&nbsp;|
                <a href="indexen.php?content=rates">Rates</a>&nbsp;|
                <a href="indexen.php?content=services">Services</a>&nbsp;|
                <a href="indexen.php?content=about">About</a>&nbsp;|
                <a href="indexen.php?content=contact">Contact</a>
            </h4>
        </div>
    </footer>
        
    <div id="copyrights" class="container ">
        <p>
            2018<?php if (date('Y') > 2018) {echo '-' . date('Y');}?> 
            All rights reserved. Easy Move&nbsp;&nbsp;
            <br />Developed & Designed by Roman Shaiko, Qian Gao, Dongfan Zhang &nbsp;&nbsp;
        </p>
    </div>
    
</body>
</html>