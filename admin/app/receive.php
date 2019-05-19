    <?php
        require_once 'inc/header.php';
    ?>

    <?php
    if(isset($_GET['attend_details'])){
        $value=mysqli_real_escape_string(database::connect(),$_GET['attend_details']);
        $exp=explode('_',$value);
        if (count($exp)==3){
            $class=$exp['0'];
            $attend_date=$exp['1'];
            $group=$exp['2'];
            $add_class=$class.'('.$group.')';
        }else{
            $class=$exp['0'];
            $add_class=$exp['0'];
            $attend_date=$exp['1'];
            $group='';
        }
    }else {
        echo "<script>window.location='index.php';</script>";
    }
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
                    <span style="font-size: 15px;border-bottom: 1px solid gray; " class="font-italic border-bottom-1">Class <?php echo $add_class; ?></span>

                </div>
                <div class="card  bg-transparent mt-2 login-panel">
                    <div class="card-body bg-transparent">
                        <div class="container">
                            <?php

                            if ($_SERVER['REQUEST_METHOD']=='POST' && $_POST['btn_submit']){
                                $msg=$attendance->addAttendanceApp($_POST,$add_class,$attend_date);
                            }
                            if(isset($msg)){
                                $script = "<script> $(function(){ $('#myModal').modal('show'); }); </script>";
                                echo $script;
                            }
                            ?>
                            <form action="" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span style="margin-left: 15px ;font-size: 14px;border-bottom: 1px solid gray">Roll</span>
                                        <span style="margin-left: 38px;font-size: 13px; border-bottom: 1px solid gray" class="float-right">Check</span>
                                    </div>
                                    <?php

                                    $total_student=$attendance->selectStudentForAttendance($class,$group);
                                    if($total_student){

                                        foreach ($total_student as $value){
                                            ?>
                                            <div style="border: 1px solid gray; margin-top: 5px; border-radius: 5px" class="col-sm-12 col-md-12 col-lg-12 text-center">
                                                <div style="padding: 15px; " class="form-group ">
                                        <span  class="float-left">
                                            <?php
                                            if($value['roll']<=9){
                                                echo 0;
                                            }
                                            echo  $value['roll'];
                                            ?></span>
                                                    <input  style="float: right;font-size: 13px" name="roll_<?php echo $value['roll']; ?>" value="<?php echo $value['roll']; ?>" class="" type="checkbox">
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }

                                    ?>
                                </div>
                                <div class="form-group">
                                    <input name="btn_submit" style="font-size: 13px; margin-top: 10px"  type="submit" class="btn btn-primary btn-block float-right" value="Receive Now">
                                </div>
                            </form>
                            <?php
                            include_once 'modal.php';
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <?php
    require_once 'inc/footer.php';
    ?>