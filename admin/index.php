<?php
    require_once 'inc/header.php';
    require_once 'inc/sidebar.php';
?>

<!-- Right side Threme color setting -->

    <section class="content-header">
        <h1> Dashboard <small>Control panel</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <?php
                $tables=['class_six_students','class_seven_students','class_eight_students','class_nine_students','class_ten_students'];
                $total_students='';
                foreach ($tables as $value){
                    $query_student="SELECT * FROM $value";
                    $result_student=database::connect()->query($query_student);
                    if ($result_student){
                        if ($result_student->num_rows>0){
                            $val=$result_student->num_rows;

                            $total_students =$total_students+$val;

                        }
                    }

                }

                $query="SELECT * FROM total_teachers";
                $result=database::connect()->query($query);
                if ($result){
                    if ($result->num_rows>0){
                        $total_teachers =$result->num_rows;
                    }
                }else{
                    $total_teachers='0';
                }

                $query="SELECT * FROM total_staff";
                $result=database::connect()->query($query);
                if ($result){
                    if ($result->num_rows>0){
                        $total_staff =$result->num_rows;
                    }else{
                        $total_staff='0';
                    }
                }
                
                //$unsee_complain=$communication->selectUnseenComplain();

            ?>
            <div class="col-lg-3 col-xs-12 col-md-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3 class="text-center" style="font-size: 25px">Total Student</h3><h4  class="text-center"><?php if ($total_students){ echo $total_students; }else{ echo '0'; }  ?></h4>
                    </div>
                    <div class="">
                        <i class=""></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-12 col-md-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3 class="text-center" style="font-size: 25px">Total Teacher</h3><h4  class="text-center"><?php echo $total_teachers; ?></h4>
                    </div>
                    <div class="icon">
                        <i class=""></i>
                    </div>
                    <a href="manage_teacher.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-12 col-md-6">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3 class="text-center" style="font-size: 25px">Total Staff</h3><h4  class="text-center"><?php echo $total_staff; ?></h4>
                    </div>
                    <div class="icon">
                        <i class=""></i>
                    </div>
                    <a href="manage_stuff.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-12 col-md-6">
                <div class="small-box bg-aqua ">
                    <div class="inner ">
                        <h3 class="text-center" style="font-size: 25px">Complain</h3><h4  class="text-center"><?php   if ($unsee_complain){
                            echo $unsee_complain;

                            } else{ echo '0';}
                            ?></h4>
                    </div>
                    <div class="">
                        <i class=""></i>
                    </div>
                    <a href="unseen_complain.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

        </div>
    </section>

<?php
    require_once 'inc/footer.php';
?>