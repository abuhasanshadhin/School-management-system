<?php
require_once 'inc/header.php';

    if(isset($_SESSION['teacherId'])){
        $teacher_id=$_SESSION['teacherId'];
        $teacher=$teacherLogin->selectTeacher($teacher_id)->fetch_assoc();
    }
?>
<style>
    table tr td{
        font-size: 14px;
    }
</style>
    <!-- Page Content  -->
    <div id="content">
        <nav  class= "bg-light head-bar">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="">
                        <div class="container-fluid">
                            <a href="#" id="sidebarCollapse"  class="text-dark"><span style="margin-top: 10px" class="fa fa-align-justify float-left"></span></a>
                        </div>
                        <a href="index.php"><img style="padding: 2px;margin-right: 20px" width="35px" src="img/logo.png"></a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <br>
                    <h6 class="font-italic"><?php echo $teacher['teacher_name']; ?></h6>
                    <span style="font-size: 14px;border-bottom: 1px solid gray; " class="font-italic border-bottom-1">Id(<?php echo $teacher['id']; ?>)</span>

                </div>
                <div class="card mt-4 login-panel">
                    <div class="card-body bg-transparent table-responsive">
                        <div class="text-center">
                            <img class="img-thumbnail" width="80px" height="80px" src="../<?php echo $teacher['image']; ?>">
                        </div>
                        <table class="table  table-bordered mt-2">
                            <tr>
                                <td>Name</td>
                                <td><?php echo $teacher['teacher_name']; ?></td>
                            </tr>
                            <tr>
                                <td>Father Name</td>
                                <td><?php echo $teacher['father_name']; ?></td>
                            </tr>
                            <tr>
                                <td>Mobile</td>
                                <td><?php echo $teacher['mobile']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $teacher['email']; ?></td>
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <a href="update_profile.php?update_id=<?php echo $teacher['id']; ?>" class="btn btn-success btn-block">Update</a>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
                <div class="card mt-4 login-panel">
                    <div class="card-body bg-transparent table-responsive">
                        <div class="text-center">
                            <h6 class="font-italic">Change Password</h6>
                        </div>
                       <?php
                       if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['btn_change'])){
                           $msg=$teacherLogin->changePassword($_POST,$teacher_id);
                       }
                       if (isset($msg)){
                           $script = "<script> $(function(){ $('#myModal').modal('show'); }); </script>";
                           echo $script;
                           $teacher=$teacherLogin->selectTeacher($teacher_id)->fetch_assoc();
                       }
                       ?>
                        <form action="" method="post">
                            <table class="table  table-bordered mt-3">
                                <tr>
                                    <td>Old Pass</td>
                                    <td><input class="form-control" type="password" name="old_password" placeholder="Your old password"></td>
                                </tr>
                                <tr>
                                    <td>New Pass</td>
                                    <td><input class="form-control" type="password" name="password" placeholder="New password"></td>
                                </tr>
                                <tr>
                                    <td>Con Pass</td>
                                    <td><input class="form-control" type="password" name="confirm_password" placeholder="Confirm new password"></td>
                                </tr>
                            </table>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <input class="btn btn-success btn-block" type="submit" name='btn_change' value="Change Now">
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php
require_once 'modal.php';

require_once 'inc/footer.php';
?>