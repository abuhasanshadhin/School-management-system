<?php
require_once 'inc/header.php';

if(isset($_SESSION['teacherId'])){
    $teacher_id=$_SESSION['teacherId'];
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
        <?php
            if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['btn_update'])){
                $msg=$teacherLogin->updateProfile($_POST,$_FILES,$teacher_id);
            }
            if (isset($msg)){
                $script = "<script> $(function(){ $('#myModal').modal('show'); }); </script>";
                echo $script;
            }
        $teacher=$teacherLogin->selectTeacher($teacher_id)->fetch_assoc();

        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <br>
                    <h6 class="font-italic"><?php echo $teacher['teacher_name']; ?></h6>
                    <span style="font-size: 14px;border-bottom: 1px solid gray; " class="font-italic border-bottom-1">Id(<?php echo $teacher['id']; ?>)</span>

                </div>
                <div class="card mt-4 login-panel">
                    <div class="card-body bg-transparent table-responsive">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="text-center">
                                <img class="img-thumbnail" width="90px" height="90px" src="../<?php echo $teacher['image']; ?>">
                            </div>
                                <table class="table  table-bordered mt-2">
                                    <tr>
                                        <td>Image</td>
                                        <td><input type="file" name="image"></td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td><input type="text" name="teacher_name" class="form-control" value="<?php echo $teacher['teacher_name']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Father Name</td>
                                        <td><input type="text" name="father_name" class="form-control" value="<?php echo $teacher['father_name']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile</td>
                                        <td><input type="text" name="mobile" class="form-control" value="<?php echo $teacher['mobile']; ?>"></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><input type="text" name="email" class="form-control" value="<?php echo $teacher['email']; ?>"></td>
                                    </tr>
                                </table>
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="submit" name="btn_update" class="btn btn-success btn-block" value="Update" >
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