
    <?php
        /* database file*/
        require_once 'lib/database.php';

        /* Session file*/
        require_once 'lib/session.php';
        session::init();

        /* validation file*/
        require_once 'lib/validation.php';

        /* helper file*/
        require_once 'lib/helper.php';

        /* admission file*/
        require_once 'classes/adminLogin.php';
        $login = new adminLogin();

        /* admission file*/
        require_once 'classes/Admission.php';
        $admission = new Admission();

        /* student add file*/
        require_once 'classes/Student.php';
        $student = new Student();

        /* result add file*/
        require_once 'classes/Result.php';
        $result = new Result();

        /* fees add file*/
        require_once 'classes/Fees.php';
        $fees = new Fees();

        /* attendance add file*/
        require_once 'classes/Attendance.php';
        $attendance = new Attendance();
        /* attendance add file*/
        require_once 'classes/Teacher.php';
        $teacher = new Teacher();

        /* attendance add file*/
        require_once 'classes/Staff.php';
        $staff= new Staff();

        /* shifted add file*/
        require_once 'classes/Shifted.php';
        $shifted= new Shifted();

        /* shifted add file*/
        require_once 'classes/Apply.php';
        $apply= new Apply();

        /* shifted add file*/
        require_once 'classes/Book.php';
        $book= new Book();

        /* shifted add file*/
        require_once 'classes/Routine.php';
        $routine= new Routine();

    /* shifted add file*/
        require_once 'classes/Notice.php';
        $notice= new Notice();

    /* shifted add file*/
        require_once 'classes/Calender.php';
        $calender= new Calender();

        /* Communication add file*/
        require_once 'classes/Communication.php';
        $communication= new Communication();
        
        /* old students add file*/
        require_once 'classes/oldStudent.php';
        $old_student= new oldStudent();

        session::checkSession();

        if(isset($_GET['action']) && $_GET['action']=='logout'){
            session::destroy();
        }
        
        require "classes/setting.php";

    ?>
    <?php
        if(isset($_GET['del_result'])){
            $del_result=mysqli_real_escape_string(database::connect(),$_GET['del_result']);
            $exp= explode('-',$del_result);
            $id=$exp['0'];
            $table=$exp['1'];
            $del_message=helper::delete($table,$id);
        }
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <!--- title---->
    <title>High School || Soft</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/image/icon.png" />

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!--- bootstrap---->
    <link href="assets/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!---font Link----->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />

    <!--- admin css here---->
    <link href="assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="assets/style.css" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
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
            $('#datePicker2').datepicker({
                dateFormat: "yy-mm-dd",
                changeYear:true,
                changeMonth:true,
                autoSize: true,
                yearRange: "1990:2030"
                // beforeShowDay: DisableDays
            });
        });
    </script>
    <script language="javascript">
        function printdiv(printpage)
        {
            var headstr = "<html><head><title></title></head><body>";
            var footstr = "</body>";
            var newstr = document.all.item(printpage).innerHTML;
            var oldstr = document.body.innerHTML;
            document.body.innerHTML = headstr+newstr+footstr;
            window.print();
            document.body.innerHTML = oldstr;
            return false;
        }
    </script>
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
            background: url(assets/image/Preloader_2.gif) center no-repeat #fff;
        }
        .content{
            min-height: 900px;
        }
    </style>


</head>
<!-- Header Side Menu Start Here-->
<body class="skin-blue">
<div class="se-pre-con"></div>
<div class="wrapper">
    <!--Only Header Here-->
    <header class="main-header">
        <a target="_blank" href="http://kpisms.com" class="logo"><b>KPISMS</b></a>
        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"><span class="sr-only">Toggle navigation</span></a>
            <span style="margin-top: 10px;font-size: 28px;color: white"><a href="index.php" style='color: #fff;border-bottom: 0 solid transparent;font-family: "Arial Black"'>Polytechnic Institute 
            Secondery School</a></span>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li><a href="admin_profile.php" ><i class="fa fa-user"></i>  Profile</a></li>

                    <li> <a href="?action=logout" ><i class="fa fa-sign-out"></i>  Logout(<?php echo session::get('addName') ?>)</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Header close -->