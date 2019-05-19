
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<!-- Right side Threme color setting -->
<section class="content-header">
    <h1> Dashboard <small>Staff Attendance</small></h1>
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
                <h3 class="text-center">Receive Staff Attendance</h3>
                <p class="text-center">(For receive attendance check checkbox now)</p>
                <br>
                <div class="box-body">
                    <!------ attendance form submit here --------->

                    <?php

                    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit_btn'])){
                        $add_attendance=$staff->addAttendance($_POST);
                    }
                    if(isset($add_attendance)){
                        echo $add_attendance;
                    }
                    ?>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select Date</label>
                                    <input readonly class="form-control" placeholder="yyyy-mm-dd" type="text" id="datePicker" name="attendance_date">
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                        </div>                        <br>
                        <div class="row">
                            <?php
                            $total_staff=$staff->selectTotalStaff();
                            if($total_staff){

                                foreach ($total_staff as $value){
                                    ?>
                                    <div class="col-sm-6 col-md-6 col-lg-2">
                                        <div style="padding: 15px; border: 1px solid gray;" class="form-group ">
                                        <span  class="float-left">
                                            <?php
                                            echo  $value['id'];
                                            ?></span>
                                            <input  style="margin-left: 15px; float:right" name="id_<?php echo $value['id']; ?>" value="<?php echo $value['id']; ?>" class="" type="checkbox">
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
