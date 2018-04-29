<style>
    body {
        min-width: 345px;
        background-color: #fbfbfb;
    }
    #top-container{
        padding:  6px 0;
    }

    .language{
        margin-top: 10px;
    }
    #lang_mobile{
        margin: 0 15px 0 0;
        padding-right: 3px;
        font-size: 14px;
    }
    
    .social{
        margin-right: 10px;
    }
    .social img{
        height: 45px;
    }
    .o_navbar {
        margin: 0;
        border: 2;
        height: 132px;
        background-color:rgb(57, 51, 91);
            border-radius: 0;
    }
      .o_navbar_bottom {
        margin: 0;
        border: 1;
        background-color:rgb(57, 51, 91)
    }
    
    .o_brand {
        padding: 0 15px 0 0;

    }
    .logo-small{
        padding-right: 0;
    }
    .main_list li {
        margin-right: 3px;
    }
    .main_list li a {
        color: white;
    }
    .main_list li:not([class="activeButton"]) {
        border: 1px solid #bbb;
        color:white;
        background: rgb(57, 52, 91);
    }
    
    

    .main_list .activeButton {
        color: darkblue;
        background: linear-gradient(#bfdaf7, wheat,#F1B36C);
        border: 1px solid white;
    }
    .active>a {
        color: darkblue;
        background: linear-gradient(rgb(111, 109, 131), rgb(111, 109, 131), rgb(111, 109, 131), rgb(111, 109, 131), rgb(111, 109, 131));
    }
    .active {
        color: darkblue;
        background: #bbb;
        border-bottom-color: #ffffff;
        border-bottom: 2px;
    }



    #main_list li:hover {
        color: darkblue;
        border: 1px solid darkblue;
        background: #bbb;
        text-decoration: underline;
    }

    #main_list li a:active {

        text-decoration: none;
    }


    @media (min-width: 768px) {
        .c_slogan {
            margin-top: 8px;
            text-align: left;
            font-family: myLogoFont;
            font-size: 23px;
            font-weight: 600;
            color: #08077C;
        }
        .logo-small{
            display: none;
        }
        .language-mobile{
            display: none;
            
        }

    }
    @media (max-width: 767px) {
        .c_slogan {
            display:none;
        }
        .social{
            width: 200px;
            float: left;
        }
        .logo-full {
            display: none;
        }
        .language{
            display: none;
        }
        .logo-small img {
            height: 55px;
        }
        .o_navbar {
            height: 57px;
        }
        .header-breaks{
            display: none;
        }
        .move-at-the-bottom{
            display: none;
        }
        
    }

    .btn-estimation{
        font-size: large;
        text-align: center; 
        color: white;
        margin: 8px 0;
    }
    #copyrights {
        height: 40px;
        color: black;
        font-size: 11px;
        text-align: center;
        margin: auto;
        padding-top: 5px;
    }
    @font-face {
        font-family: myLogoFont;
        src: url('fonts/handlee-regular.ttf');
    }
    
    #footer-menu{
        width:600px;
        margin: auto;
        
    }
    #nav-bottom-desktop a{
        color: #bbb;
        font-size: small;
    }
    
    #toggle{
        border: 2px solid rgb(214, 80, 28);
    }
    #toggle-bottom{
        border: 2px solid rgb(214, 80, 28);
    }
    .social-bottom img{
        height: 45px;
    }

</style>
<?php ?>

