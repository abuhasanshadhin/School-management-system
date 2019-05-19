<?php
    require_once 'inc/header.php';
?>

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
                    <h6 class="font-italic">Kurigram Govt High school</h6>
                    <span style="font-size: 14px;border-bottom: 1px solid gray; " class="font-italic border-bottom-1"> Attendance System</span>

                </div>
                <div class="card  bg-transparent mt-4 login-panel">
                    <div class="card-body bg-transparent">
                        <h6 class="text-center font-italic login">Select Class</h6>
                        <?php
                            if ($_SERVER['REQUEST_METHOD']=='POST' && $_POST['btn_submit']){
                                $msg=$attendance->appAttendanceOption($_POST);
                            }
                            if (isset($msg)){
                                $script = "<script> $(function(){ $('#myModal').modal('show'); }); </script>";
                                echo $script;
                            }
                        ?>
                        <form action="" method="post" >
                            <div class="form-group">
                                <select onchange="validate('class', this.value)" style="font-size: 13px" name="class" class="form-control">
                                    <option value="">----SELECT CLASS----</option>
                                    <option value="Six">SIX</option>
                                    <option value="Seven">SEVEN</option>
                                    <option value="Eight">EIGHT</option>
                                    <option value="Nine">NINE</option>
                                    <option value="Ten">TEN</option>
                                </select>
                            </div>
                            <div id="class"></div>
                            <div class="form-group">
                                <input name="attend_date" style="font-size: 13px" type="text" readonly id="datePicker" class="form-control font-italic" placeholder="yyyy-mm-dd">
                            </div>
                            <div class="form-group">
                                <input style="font-size: 13px"  type="submit" name="btn_submit" class="btn btn-primary btn-block float-right" value="Submit">
                            </div>
                            <?php
                            include_once 'modal.php';
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require_once 'inc/footer.php';
?>