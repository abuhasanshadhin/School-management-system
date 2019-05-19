

<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<!-- Right side Threme color setting -->
<?php
if ($_GET['update_id']){
    $update_id=mysqli_real_escape_string(database::connect(),$_GET['update_id']);
}
?>
<section class="content-header">
    <h1> Dashboard <small>Attendance</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
                <h3 class="text-center">Update Students Attendance</h3>
                <p class="text-center">(For receive attendance check checkbox now)</p>
                <br>
                <div class="box-body">
                    <!------ attendance form submit here --------->

                    <?php
                        if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit_btn'])){
                            $update_attendance=$attendance->updateAttendance($_POST,$update_id);
                        }
                        if(isset($update_attendance)){
                            echo $update_attendance;
                        }

                        $select_attendance=$attendance->selectSingleAttendance($update_id)->fetch_assoc();
                        if ($select_attendance['class']){
                            $class=$select_attendance['class'];
                            if($class == 'Nine(Science)' || $class =='Nine(Commerce)' || $class =='Nine(Arts)' || $class == 'Ten(Science)' || $class =='Ten(Commerce)' || $class =='Ten(Arts)'){
                                $exp=explode('(',$class);
                                $only_class=$exp['0'];
                                $group =rtrim($exp['1'],')');
                            }else{
                                $only_class=$select_attendance['class'];
                            }

                        }

                    ?>
                    <form action="" method="post">
                        <div class="row">
                            <?php
                            $total_roll=$select_attendance['roll'];
                            $exp=explode(',',$total_roll);
                            $len=count($exp);
                            if(!isset($group)){
                                $group='';
                            }
                            $total_student=$attendance->selectStudentForAttendance($only_class,$group);
                            if($total_student){
                                    $i=-1;
                                foreach ($total_student as $value){
                                    $i++;
                                    ?>
                                    <div class="col-sm-6 col-md-6 col-lg-2 text-center">
                                        <div style="padding: 15px; border: 1px solid gray;" class="form-group ">
                                        <span  class="float-left">
                                            <?php
                                            if($value['roll']<=9){
                                                echo 0;
                                            }
                                            $roll=$value['roll'];
                                            echo $roll;
                                            ?></span>
                                            <input  style="margin-left: 38px" name="roll_<?php echo $value['roll']; ?>" value="<?php echo $value['roll']; ?>"
                                            <?php
                                                for ($j=0;$j<=$len-1;$j++){
                                                    if ($value['roll']==$exp[$j]){
                                                        echo "checked";
                                                    }
                                                } ?> class="" type="checkbox">
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
                                <input type="submit" name="submit_btn" value="Submit" class="btn btn-primary btn-block">
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
