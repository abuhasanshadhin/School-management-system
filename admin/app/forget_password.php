<?php
    require_once '../lib/database.php';
    require_once 'classes/session.php';
    session::init();
    require_once '../lib/validation.php';
    /* attendance add file*/
    require_once 'classes/Attendance.php';
    $attendance = new Attendance();

    require_once 'classes/teacherLogin.php';
    $teacherLogin = new teacherLogin();


    session::checkLogin();



?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Attendance App</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="../assets/assets/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <!-- Scrollbar Custom CSS -->


        <!-- Font Awesome JS -->
        <link rel="stylesheet" href="style3.css">
        <script src="../assets/assets/js/jquery.js"></script>

        <style>
            .head-bar{
                border: 1px solid gray;
                box-shadow: 0px 2px 6px -1px gray;
                border-radius: 5px;
            }
        </style>
        <style>
            .body-bg{
                background-image: url('img/bg4.png');
                background-attachment: fixed;
            }
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
        <script>
            $('#myModal').modal(options);
        </script>
    </head>

<body  class="body-bg">
<div class="se-pre-con"></div>
<div class="overlay"></div>
<div class="wrapper">

    <!-- Page Content  -->
    <div id="content" style='position:fixed'>
        <nav  class= "bg-light head-bar">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="">
                        <a href="index.php"><img style="padding: 2px" width="35px" src="img/logo.png"></a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="card   mt-5 login-panel">
                    <div class="card-body bg-transparent">
                        <h5 class="text-center font-italic login">Attendamce System</h5>
                        <h6 class="text-center font-italic login">Forget Password</h6>
                        <?php

                        if ($_SERVER['REQUEST_METHOD']=='POST' && $_POST['forget_btn']){
                            $msg=$teacherLogin->forgetPassword($_POST);
                        }
                        if (isset($msg)){
                            $script = "<script> $(function(){ $('#myModal').modal('show'); }); </script>";
                            echo $script;
                        }
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <input style="font-size: 13px" type="text" name="email" class="form-control font-italic" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <input style="font-size: 13px"  type="submit" name="forget_btn" class="btn btn-primary btn-block float-right" value="Send Now">
                            </div>
                        </form>
                        <?php
                        include_once 'modal.php';
                        ?>
                    </div>
                    <p class="text-center text-info font-italic"><a  style="text-decoration: none; font-size: 14px" href="login.php">Back To Login</a></p>
                </div>
            </div>
        </div>

    </div>
</div>
<?php
require_once 'inc/footer.php';
?>