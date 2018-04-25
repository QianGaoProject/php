<?php
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
    <link rel="icon" href="../../favicon.ico">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="css/easymove-md.css" />
    
    <?php foreach (loadHeaderContent('content','home') as $file ) include_once($file) ?>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>


</head>

<body>

    <nav class="navbar navbar-inverse o_navbar">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand o_brand" href="#"><img id="nav_img" src="images/logo.jpg" alt="Easy Logo" height="130" /></a>
            </div>
            <div id="slogan" class="c_slogan">
                Pour un déménagement tranquille, efficace et pas cher!
            </div>
            <br />
            <div class="collapse navbar-collapse">

                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php?content=home">Accueil</a></li>
                    <li><a href="index.php?content=move">Déménagement</a></li>
                    <li><a href="index.php?content=rates">Tarifs</a></li>
                    <li><a href="index.php?content=services">Services</a></li>
                    <li><a href="index.php?content=about">À propos</a></li>
                    <li><a href="index.php?content=contact">Contact</a></li>
                    <li><a href="indexen.php">English</a></li>
                </ul>
            </div><!--/.nav-collapse -->


        </div>
    </nav>
    
    <hr style="margin:10px 0; border-color:rgb(245, 121, 33); border-width:3px" />
    
    <div class="container jumbotron">
        <?php loadContent('content','home'); ?>
     </div><!-- /.container -->
    
     <hr style="margin:10px 0; border-color:rgb(245, 121, 33); border-width:3px" />
    
     <footer class="nav navbar o_navbar navbar-bottom navbar-inverse">
        <div class="container container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#footer-menu">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div id="footer-menu" class="navbar-collapse collapse">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="index.php?content=home">Accueil</a></li>
                    <li><a href="index.php?content=move">Déménagement</a></li>
                    <li><a href="index.php?content=rates">Tarifs</a></li>
                    <li><a href="index.php?content=services">Services</a></li>
                    <li><a href="index.php?content=about">À propos</a></li>
                    <li><a href="index.php?content=contact">Contact</a></li>
                </ul>
            </div>
            <div id="footer-others">
                <p class="footer_info navbar-text">
                    <a href="mailto:easymovemontreal@gmail.com" target="_top">easymovemontreal@gmail.com</a>
                </p>
                
            </div>
        </div>
    </footer>
    <div id="copyrights" class="container ">
        <p>
            2018 Tous droits réservés. Easy Move&nbsp;&nbsp;
            <br />Développé par Roman Shaiko, Qian Gao, Dongfan Zhang &nbsp;&nbsp;
        </p>
    </div>
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


</body>
</html>