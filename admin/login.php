
    <?php
        /* database file*/
        require_once 'lib/database.php';

        /* Session file*/
        require_once 'lib/session.php';
        session::init();

        /* admission file*/
        require_once 'classes/adminLogin.php';
        $login = new adminLogin();

        session::checkLogin();


        ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>High School || Soft</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/image/icon.png" />

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="assets/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/assets/css/jquery-ui.min.css">
    <!-- Our Custom CSS -->
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <link rel="stylesheet" href="style3.css">

    <style>
        .head-bar{
            border: 1px solid gray;
            box-shadow: 0px 2px 6px -1px gray;
            border-radius: 5px;
        }
    </style>
    <style>
        .body-bg{
            background-image: url('assets/image/bg(2).jpg');
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
            background: url(assets/image/Preloader_2.gif) center no-repeat #fff;
        }
    </style>

</head>

<body  class="body-bg">
<div class="se-pre-con"></div>
<div class="overlay"></div>
    <div class="wrapper">

        <!-- Page Content  -->
        <div class="container-fluid">
            <div id="content" style="margin-top: 100px">
                <div class="row">
                    <div class="col-lg-4 col-md-3"></div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card   mt-5 login-panel">
                            <div class="card-body bg-transparent">
                                <h5 class="text-center font-italic login mt-2">High School Management System</h5>
                                <p style="margin-top: -10px;font-size: 18px" class="text-center font-italic">Login Here</p>
                                <div class="card-body" style="margin-top: -15px">
                                    <?php

                                    if ($_SERVER['REQUEST_METHOD']=='POST' && $_POST['login_btn']){
                                        $logon_result=$login->login($_POST);
                                        if(isset($logon_result)){
                                            echo $logon_result;
                                        }
                                    }
                                    ?>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <input style="font-size: 16px" type="text" name="email" class="form-control font-italic" placeholder="Your Email">
                                        </div>
                                        <div class="form-group">
                                            <input style="font-size: 16px" type="password" name="password" class="form-control font-italic" placeholder="Your Password">
                                        </div>
                                        <div class="form-group">
                                            <input style="font-size: 16px"  type="submit" name="login_btn" class="btn btn-primary btn-block float-right" value="Login">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <p class="text-center text-info font-italic" style="margin-top: -15px"><a  style="text-decoration: none;" href="forget_password.php">Forget Password?</a></p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-3"></div>
                </div>
            </div>
        </div>
    </div>

<script src="assets/assets/js/bootstrap.min.js"></script>
<script src="assets/assets/js/jquery.js"></script>
<script src="assets/assets/js/jquery-ui.min.js"></script>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<!-- Popper.JS -->
<!-- Bootstrap JS -->
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
    //paste this code under head tag or in a seperate js file.
    // Wait for window load
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#dismiss, .overlay').on('click', function () {
            $('#sidebar').removeClass('active');
            $('.overlay').removeClass('active');
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').addClass('active');
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>
</body>

</html>
















