<?php
    require_once '../lib/database.php';
    require_once 'classes/session.php';
    session::init();
    require_once '../lib/validation.php';
    /* attendance add file*/
    require_once 'classes/Attendance.php';
    $attendance = new Attendance();
    session::checkSession();

    require_once 'classes/teacherLogin.php';
    $teacherLogin = new teacherLogin();

?>
    <?php
        if (isset($_GET['action']) && $_GET['action']=='logout'){
            session::destroy();
        }
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Attendance App</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!---font Link----->

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../assets/assets/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">


    <!-- Font Awesome JS -->

    <link rel="stylesheet" href="style3.css">
    <script src="../assets/assets/js/jquery.js"></script>


    <script>
        $(document).ready(function () {
            $('#datePicker').datepicker({
                dateFormat: "yy-mm-dd",
                changeYear:true,
                changeMonth:true,
                autoSize: true,
                yearRange: "1990:2030"
                // beforeShowDay: DisableDays
            });
        });
    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <style>
        .head-bar{
            border: 1px solid gray;
            box-shadow: 0px 2px 6px -1px gray;
            border-radius: 5px;
        }
    </style>
    <style>
        .login{
            margin-bottom: 15px;
        }
        .login-panel{
            border-radius: 5px;
            border: 1px solid gray;
            box-shadow: 2px 4px 7px 1px gray;
        }
    </style>
    <style>
        /* Paste this css to your style sheet file or under head tag */
        /* This only works with JavaScript,
        if it's not present, don't show loader */
        .no-js #loader { display: none;  }
        .js #loader { display: block; position: absolute; left: 100px; top: 0; }
        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(../assets/image/app.gif) center no-repeat #fff;
        }
    </style>
</head>

<body >
<div class="se-pre-con"></div>
<div class="overlay"></div>
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar" class="bg-light">
        <div id="dismiss">
            <i class="fa fa-close"></i>
        </div>

        <div class="sidebar-header bg-dark">
            <h6 style="font-size: 20px" class="text-center font-italic">Attendance<br> System</h6>
        </div>

        <ul class="list-unstyled components" style='overflow:scroll'>
            <li>><a href="index.php"><img width="35px" src="img/hime.png"><span style="margin-left: 10px">Home</span></a></li>
            <li>><a href="profile.php"><img width="35px" src="img/profile.png"><span style="margin-left: 10px">Profile</span></a></li>
            <li>><a href="attendance_list.php"><img width="35px" src="img/att1.png"><span style="margin-left: 10px">Attendance List</span></a></li>
            <li>><a href="receive3.php?attend_details=Six"><img width="35px" src="img/att1.png"><span style="margin-left: 10px">Class Six</span></a></li>
            <li>><a href="receive3.php?attend_details=Seven"><img width="35px" src="img/att2.png"><span style="margin-left: 10px">Class Seven</span></a></li>
            <li>><a href="receive3.php?attend_details=Eight"><img width="35px" src="img/att3.png"><span style="margin-left: 10px">Class Eight</span></a></li>
            <li>><a href="receive3.php?attend_details=Nine_Science"><img width="35px" src="img/att4.png"><span style="margin-left: 10px">Class Nine(Science)</span></a></li>
            <li>><a href="receive3.php?attend_details=Nine_Commerce"><img width="35px" src="img/att2.png"><span style="margin-left: 10px">Class Nine(Commerce)</span></a></li>
            <li>><a href="receive3.php?attend_details=Nine_Arts"><img width="35px" src="img/att3.png"><span style="margin-left: 10px"></span>Class Nine(Arts)</a></li>
            <li>><a href="receive3.php?attend_details=Ten_Science"><img width="35px" src="img/att4.png"><span style="margin-left: 10px">Class Ten(Science)</span></a></li>
            <li>><a href="receive3.php?attend_details=Ten_Commerce"><img width="35px" src="img/att2.png"><span style="margin-left: 10px">Class Ten(Commerce)</span></a></li>
            <li>><a href="receive3.php?attend_details=Ten_Arts"><img width="35px" src="img/att1.png"><span style="margin-left: 10px">Class Ten(Arts)</span></a></li>
            <li>><a href="?action=logout"><img width="35px" src="img/logout.png"><span style="margin-left: 10px">Logout</span></a></li>
        </ul>
    </nav>