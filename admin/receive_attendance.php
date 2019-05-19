
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<!-- Right side Threme color setting -->
<?php
    if ($_GET['class']){
        $exp=explode('_',$_GET['class']);
        $class=$exp['0'];
        $attend_date=$exp['1'];
        if($class == 'Nine(Science)' || $class =='Nine(Commerce)' || $class =='Nine(Arts)' || $class == 'Ten(Science)' || $class =='Ten(Commerce)' || $class =='Ten(Arts)'){
            $exp=explode('(',$class);
            $only_class=$exp['0'];
            $group =rtrim($exp['1'],')');
        }

    }
?>
<section class="content-header">
    <h1> Dashboard <small>Attendance</small></h1>
    <ol class="breadcrumb">
        <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Attendance</li>
        <li class="active">Receive</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="box">
                <br>
                <h3 class="text-center">Receive Class <?php echo $class; ?> Students Attendance</h3>
                <p class="text-center">(For receive attendance check checkbox now)</p>
                <br>
                <div class="box-body">
                    <!------ attendance form submit here --------->

                    <?php

                    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['fees_btn'])){
                        $add_attendance=$attendance->addAttendance($_POST,$class,$attend_date);
                    }
                    if(isset($add_attendance)){
                        echo $add_attendance;
                    }
                    ?>
                    <form action="" method="post">
                        <div class="row">
                            <?php
                           if(!isset($group)){
                               $group='';
                           }
                            $total_student=$attendance->selectStudentForAttendance($class,$group);
                            if($total_student){

                                foreach ($total_student as $value){
                                    ?>
                                    <div class="col-sm-6 col-md-6 col-lg-2 text-center">
                                        <div style="padding: 15px; border: 1px solid gray;" class="form-group ">
                                        <span  class="float-left">
                                            <?php
                                            if($value['roll']<=9){
                                                echo 0;
                                            }
                                            echo  $value['roll'];
                                            ?></span>
                                            <input  style="margin-left: 38px" name="roll_<?php echo $value['roll']; ?>" value="<?php echo $value['roll']; ?>" class="" type="checkbox">
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <input type="submit" name="fees_btn" value="Submit" class="btn btn-primary btn-block">
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</section>

<?php
require_once 'inc/footer.php';
?>
