
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>

<!-- Right side Threme color setting -->
<section class="content-header">
    <h1> Dashboard <small>Admin</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Manage Profile</li>

    </ol>
</section>
<!------ student update form submit here --------->
<?php
    if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['btn_update'])){
        $update_result= '';
    }
?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div id="div_print" class="box">
                <br>
                <h3 class="text-center">Admin Profile Here</h3><br>
                <br>
                <div class="box-body">
                    <!----- student profile --------->
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['btn_update'])){
                                            $update_profile=$login->updateProfile($_POST);
                                            if ($update_profile){
                                                echo $update_profile;
                                            }
                                        }
                                        ?>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <table class="table table-bordered ">
                                                <tr>
                                                    <td>Admin Name</td>
                                                    <td>
                                                        <?php if(isset($_SESSION['addName'])) echo $_SESSION['addName']; ?>
                                                        <input name="name" type="text" class="form-control" value="<?php if(isset($_SESSION['addName'])) echo $_SESSION['addName']; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Admin Email</td>
                                                    <td>
                                                        <?php if(isset($_SESSION['addEmail'])) echo $_SESSION['addEmail']; ?>
                                                        <input name="email" type="text" class="form-control" value="<?php if(isset($_SESSION['addEmail'])) echo $_SESSION['addEmail']; ?>">
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="box-footer">
                                                <div class="row">
                                                    <div class="row">
                                                        <div class="col-lg-4"></div>
                                                        <div class="col-lg-4">
                                                            <input name="btn_update" type="submit" class="btn btn-info btn-block" value="Update Now" />
                                                        </div>
                                                        <div class="col-lg-4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div id="div_print" class="box">
                <br>
                <h3 class="text-center">Change Password Here</h3><br>
                <br>
                <div class="box-body">
                    <!----- student profile --------->
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-lg-10">
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                            if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['btn_change'])){
                                                $change_password=$login->changePassword($_POST);
                                                if ($change_password){
                                                    echo $change_password;
                                                }
                                            }
                                        ?>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <table class="table table-bordered ">
                                                <tr>
                                                    <td>Old Password</td>
                                                    <td>
                                                        <input name="old_password" type="password" class="form-control" value="" placeholder="Your old password">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>New Password</td>
                                                    <td>
                                                        <input name="password" type="password" class="form-control" value="" placeholder="New password">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Confirm New Password</td>
                                                    <td>
                                                        <input name="confirm_password" type="password" class="form-control" value="" placeholder="Confirm new password">
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="box-footer">
                                                <div class="row">
                                                    <div class="row">
                                                        <div class="col-lg-4"></div>
                                                        <div class="col-lg-4">
                                                            <input name="btn_change" type="submit" class="btn btn-info btn-block" value="Change Now" />
                                                        </div>
                                                        <div class="col-lg-4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</section>


<?php
require_once 'inc/footer.php';
?>