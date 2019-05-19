<?php
spl_autoload_register(function ($class) {
    require "classes/" . $class . ".php";
});

$manpower = new Manpower();
$student = new Student();
$school = new School();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/custom.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">

    <!--Java script-->
    <script src='assets/jquery.min.js'></script>
    <script src='assets/bootstrap/bootstrap.min.js'></script>
    <script src="assets/navbar.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="assets/responsivevoice.js"></script>
    <!-- Page Loader -->
    <style type="text/css">
        #loader {position: fixed;left: 0px;top: 0px;width: 100%;height: 100%;z-index: 9999;
            background: url('img/Loading_icon.gif') 50% 50% no-repeat rgb(249, 249, 249);
            background-color: #ffffff;}
    </style>
</head>
<body>

<div id="loader"></div>

<script>
    /*Loading Icon*/
    $(window).on('load', function(){
        $("#loader").fadeOut("slow");
    });
    // ------
</script>
<!--  -->

<div id="main-wrapper">
    <div class="container wrapper" id="container">
        <?php
            function activePage($pageName)
            {
                $path = $_SERVER['SCRIPT_FILENAME']; //File path
                $cp = basename($path, '.php'); //Current page (cp)
                echo($cp == "$pageName" ? "active" : "");
            }
        ?>
        <!--Header-->
        <header class="row py-3">
            <div class="col-md-2">
                <a href="home">
                    <img src="img/Dinajpur-education-Board.png" class="rounded-circle" height="100">
                </a>
            </div>
            <div class="col-md-8 text-center">
                <h1>Ulipur MS School & College <br> Ulipur, Kurigram</h1>
            </div>
            <div class="col-md-2">
                <a href=""><img src="img/facebook-icon.png" height="30" width="30"></a>
                <a href=""><img src="img/youtube-icon.png" height="30" width="40"></a>
                <a href=""><img src="img/email-icon.png" height="30" width="30"></a>
            </div>
        </header>

        <!--Navbar-->
        <div id='cssmenu'>
            <div id="head-mobile"></div>
            <div class="button"></div>
            <ul>
                <li class='<?php activePage('home') ?>'><a href='home'>HOME</a></li>
                <li class='<?php activePage('about') ?>'><a href='about'>ABOUT</a></li>
                <li><a href="#">MANPOWER</a>
                    <ul>
                        <li><a href='teacher-list'>Teachers</a></li>
                        <li><a href='staff-list'>Staff</a></li>
                    </ul>
                </li>
                <li><a href="#">STUDENT INFO</a>
                    <ul>
                        <li><a href="#">Class Ten</a>
                            <ul>
                                <li><a href='students-class-ten-science'>Science</a></li>
                                <li><a href='students-class-ten-commerce'>Commerce</a></li>
                                <li><a href='students-class-ten-arts'>Arts</a></li>
                            </ul>
                        </li>
                        <li><a href='students-class-nine'>Class Nine</a></li>
                        <li><a href='students-class-eight'>Class Eight</a></li>
                        <li><a href='students-class-seven'>Class Seven</a></li>
                        <li><a href='students-class-six'>Class Six</a>
                        </li>
                    </ul>
                </li>
                <li class='<?php activePage('online-apply-for-addmission') ?>'><a href='online-apply-for-addmission' class="text-warning">ONLINE APPLY</a></li>
                <li class='<?php activePage('gallery') ?>'><a href='gallery'>GALLERY</a></li>
                <li class='<?php activePage('contact') ?>'><a href='contact'>CONTACT</a></li>
            </ul>
        </div>