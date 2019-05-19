
<?php
    require_once 'inc/header.php';
    require_once 'inc/sidebar.php';
?>
    <!-- Right side Threme color setting -->

    <section class="content-header">
        <h1> Dashboard <small>Shifted Info</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Student Shifted</li>
        </ol>
    </section>
    <?php
        $shifted_status=$shifted->shiftedStatus();
    ?>

    <!-- Main content -->
    <section class="content">
        <?php
        if($shifted_status=='101'){
            ?>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="box">
                        <br>
                        <h3 class="text-center">Shifted Class Ten(Science) Student Here</h3>
                        <p class="text-center"><span style="border-bottom: 1px solid gray">(For Shifted Student click this shifted button)</span></p>
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="box-body text-center">
                                    <div class="row">
                                        <?php
                                        $total_student=$shifted->selectTotalStudentClassTenScience('class_ten_students','Science');
                                        if ($total_student){
                                            $total_student=ceil($total_student->num_rows/5);
                                            if(isset($_GET['shifted_id'])){
                                                $shifted->insertOldStudent('class_ten_students','old_students','Science');
                                            }
                                            $shifted->updateStatusWithGroup('102','class_ten_students','Science');
                                        }
                                        ?>
                                        <?php
                                        for($i=1;$i<=$total_student;$i++){
                                            ?>
                                            <div class="col-md-2">
                                                <div style="border-radius: 8px" class="text-center bg-danger">
                                                    <p style='padding: 8px' class="text-center"><a href="?shifted_id=<?php echo $i; ?>" onclick="return confirm('Are you sure to shifted button?')" >Level <?php echo $i; ?></a></p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>

            <?php
        }
        ?>

        <?php
        if($shifted_status=='102'){
            ?>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="box">
                        <br>
                        <h3 class="text-center">Shifted Class Ten(Commerce) Student Here</h3>
                        <p class="text-center"><span style="border-bottom: 1px solid gray">(For Shifted Student click this shifted button)</span></p>
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="box-body text-center">
                                    <div class="row">
                                        <?php
                                        $total_student=$shifted->selectTotalStudentClassTenScience('class_ten_students','Commerce');
                                        if ($total_student){
                                            $total_student=ceil($total_student->num_rows/5);
                                            if(isset($_GET['shifted_id'])){
                                                $shifted->insertOldStudent('class_ten_students','old_students','Commerce');
                                            }
                                            $shifted->updateStatusWithGroup('103','class_ten_students','Commerce');
                                        }
                                        ?>
                                        <?php
                                        for($i=1;$i<=$total_student;$i++){
                                            ?>
                                            <div class="col-md-2">
                                                <div style="border-radius: 8px" class="text-center bg-danger">
                                                    <p style='padding: 8px' class="text-center"><a href="?shifted_id=<?php echo $i; ?>" onclick="return confirm('Are you sure to shifted button?')" >Level <?php echo $i; ?></a></p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>

            <?php
        }
        ?>
    <?php
            if($shifted_status=='103'){
                ?>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="box">
                            <br>
                            <h3 class="text-center">Shifted Class Ten(Arts) Student Here</h3>
                            <p class="text-center"><span style="border-bottom: 1px solid gray">(For Shifted Student click this shifted button)</span></p>
                            <br>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="box-body text-center">
                                        <div class="row">
                                            <?php

                                            $total_student=$shifted->selectTotalStudentClassTenScience('class_ten_students','Arts');
                                            if ($total_student){
                                                $total_student=ceil($total_student->num_rows/5);
                                                if(isset($_GET['shifted_id'])){
                                                    $shifted->insertOldStudent('class_ten_students','old_students','Arts');
                                                }
                                                $shifted->updateStatusWithGroup('91','class_ten_students','Arts');
                                            }
                                            ?>
                                            <?php
                                            for($i=1;$i<=$total_student;$i++){
                                                ?>
                                                <div class="col-md-2">
                                                    <div style="border-radius: 8px" class="text-center bg-danger">
                                                        <p style='padding: 8px' class="text-center"><a href="?shifted_id=<?php echo $i; ?>" onclick="return confirm('Are you sure to shifted button?')" >Level <?php echo $i; ?></a></p>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>

                <?php
            }
            ?>
<?php
            if($shifted_status=='91'){
                ?>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="box">
                            <br>
                            <h3 class="text-center">Shifted Class Nine(Science) Student Here</h3>
                            <p class="text-center"><span style="border-bottom: 1px solid gray">(For Shifted Student click this shifted button)</span></p>
                            <br>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="box-body text-center">
                                        <div class="row">
                                            <?php

                                            $total_student=$shifted->selectTotalStudentClassTenScience('class_nine_students','Science');
                                            if ($total_student){
                                                $total_student=ceil($total_student->num_rows/5);
                                                if(isset($_GET['shifted_id'])){
                                                    $shifted->insertOldStudent('class_nine_students','class_ten_students','Science');
                                                }
                                                $shifted->updateStatusWithGroup('92','class_nine_students','Science');
                                            }
                                            ?>
                                            <?php
                                            for($i=1;$i<=$total_student;$i++){
                                                ?>
                                                <div class="col-md-2">
                                                    <div style="border-radius: 8px" class="text-center bg-danger">
                                                        <p style='padding: 8px' class="text-center"><a href="?shifted_id=<?php echo $i; ?>" onclick="return confirm('Are you sure to shifted button?')" >Level <?php echo $i; ?></a></p>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>

                <?php
            }
            ?>


<?php
            if($shifted_status=='92'){
                ?>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="box">
                            <br>
                            <h3 class="text-center">Shifted Class Nine(Commerce) Student Here</h3>
                            <p class="text-center"><span style="border-bottom: 1px solid gray">(For Shifted Student click this shifted button)</span></p>
                            <br>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="box-body text-center">
                                        <div class="row">
                                            <?php

                                            $total_student=$shifted->selectTotalStudentClassTenScience('class_nine_students','Commerce');
                                            if ($total_student){
                                                $total_student=ceil($total_student->num_rows/5);
                                                if(isset($_GET['shifted_id'])){
                                                    $shifted->insertOldStudent('class_nine_students','class_ten_students','Commerce');
                                                }
                                                $shifted->updateStatusWithGroup('93','class_nine_students','Commerce');
                                            }
                                            ?>
                                            <?php
                                            for($i=1;$i<=$total_student;$i++){
                                                ?>
                                                <div class="col-md-2">
                                                    <div style="border-radius: 8px" class="text-center bg-danger">
                                                        <p style='padding: 8px' class="text-center"><a href="?shifted_id=<?php echo $i; ?>" onclick="return confirm('Are you sure to shifted button?')" >Level <?php echo $i; ?></a></p>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>

                <?php
            }
            ?>


<?php
            if($shifted_status=='93'){
                ?>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="box">
                            <br>
                            <h3 class="text-center">Shifted Class Nine(Arts) Student Here</h3>
                            <p class="text-center"><span style="border-bottom: 1px solid gray">(For Shifted Student click this shifted button)</span></p>
                            <br>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <div class="box-body text-center">
                                        <div class="row">
                                            <?php

                                            $total_student=$shifted->selectTotalStudentClassTenScience('class_nine_students','Arts');
                                            if ($total_student){
                                                $total_student=ceil($total_student->num_rows/5);
                                                if(isset($_GET['shifted_id'])){
                                                    $shifted->insertOldStudent('class_nine_students','class_ten_students','Arts');
                                                }
                                                $shifted->updateStatusWithGroup('8','class_nine_students','Arts');
                                            }
                                            ?>
                                            <?php
                                            for($i=1;$i<=$total_student;$i++){
                                                ?>
                                                <div class="col-md-2">
                                                    <div style="border-radius: 8px" class="text-center bg-danger">
                                                        <p style='padding: 8px' class="text-center"><a href="?shifted_id=<?php echo $i; ?>" onclick="return confirm('Are you sure to shifted button?')" >Level <?php echo $i; ?></a></p>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>

                <?php
            }
            ?>



        <?php
        if($shifted_status=='09'){
            ?>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="box">
                        <br>
                        <h3 class="text-center">Shifted Class Nine Student Here</h3>
                        <p class="text-center"><span style="border-bottom: 1px solid gray">(For Shifted Student click this shifted button)</span></p>
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="box-body text-center">
                                    <div class="row">
                                        <?php
                                        $total_student=$shifted->selectTotalStudentClassNine();
                                        if ($total_student){
                                            $total_student=ceil($total_student->num_rows/5);
                                            if(isset($_GET['shifted_id'])){
                                                $shifted->insertClassTen();
                                            }
                                            $shifted->updateStatus('92','class_nine_students');
                                        }
                                        ?>
                                        <?php
                                        for($i=1;$i<=$total_student;$i++){
                                            ?>
                                            <div class="col-md-2">
                                                <div style="border-radius: 8px" class="text-center bg-danger">
                                                    <p style='padding: 8px' class="text-center"><a href="?shifted_id=<?php echo $i; ?>" onclick="return confirm('Are you sure to shifted button?')" >Level <?php echo $i; ?></a></p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>

            <?php
        }
        ?>

        <?php
        if($shifted_status=='8'){
            ?>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="box">
                        <br>
                        <h3 class="text-center">Shifted Class Eight Student Here</h3>
                        <p class="text-center"><span style="border-bottom: 1px solid gray">(For Shifted Student click this shifted button)</span></p>
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="box-body text-center">
                                    <div class="row">
                                        <?php
                                        $total_student=$shifted->selectTotalStudentClassEight();
                                        if ($total_student){
                                            $total_student=ceil($total_student->num_rows/5);
                                            if(isset($_GET['shifted_id'])){
                                                $shifted->insertClassNine();
                                            }
                                            $shifted->updateStatus('7','class_eight_students');
                                        }
                                        ?>
                                        <?php
                                        for($i=1;$i<=$total_student;$i++){
                                            ?>
                                            <div class="col-md-2">
                                                <div style="border-radius: 8px" class="text-center bg-danger">
                                                    <p style='padding: 8px' class="text-center"><a href="?shifted_id=<?php echo $i; ?>" onclick="return confirm('Are you sure to shifted button?')" >Level <?php echo $i; ?></a></p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>

            <?php
        }
        ?>

        <?php
        if($shifted_status=='7'){
            ?>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="box">
                        <br>
                        <h3 class="text-center">Shifted Class Seven Student Here</h3>
                        <p class="text-center"><span style="border-bottom: 1px solid gray">(For Shifted Student click this shifted button)</span></p>
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="box-body text-center">
                                    <div class="row">
                                        <?php
                                        $total_student=$shifted->selectTotalStudentClassSeven();
                                        if ($total_student){
                                            $total_student=ceil($total_student->num_rows/5);
                                            if(isset($_GET['shifted_id'])){
                                                $shifted->insertClassEight();
                                            }
                                            $shifted->updateStatus('6','class_seven_students');
                                        }
                                        ?>
                                        <?php
                                        for($i=1;$i<=$total_student;$i++){
                                            ?>
                                            <div class="col-md-2">
                                                <div style="border-radius: 8px" class="text-center bg-danger">
                                                    <p style='padding: 8px' class="text-center"><a href="?shifted_id=<?php echo $i; ?>" onclick="return confirm('Are you sure to shifted button?')" >Level <?php echo $i; ?></a></p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>

            <?php
        }
        ?>

        <?php
        if($shifted_status=='6'){
            ?>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="box">
                        <br>
                        <h3 class="text-center">Shifted Class Six Student Here</h3>
                        <p class="text-center"><span style="border-bottom: 1px solid gray">(For Shifted Student click this shifted button)</span></p>
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="box-body text-center">
                                    <div class="row">
                                        <?php
                                        $total_student=$shifted->selectTotalStudentClassSix();
                                        if ($total_student){
                                            $total_student=ceil($total_student->num_rows/5);
                                            if(isset($_GET['shifted_id'])){
                                                $shifted->insertClassSeven();
                                            }

                                            $shifted->updateStatus('5','class_six_students');
                                        }
                                        ?>
                                        <?php
                                        for($i=1;$i<=$total_student;$i++){
                                            ?>
                                            <div class="col-md-2">
                                                <div style="border-radius: 8px" class="text-center bg-danger">
                                                    <p style='padding: 8px' class="text-center"><a href="?shifted_id=<?php echo $i; ?>" onclick="return confirm('Are you sure to shifted button?')" >Level <?php echo $i; ?></a></p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>

            <?php
        }
        ?>


        <?php
        if($shifted_status=='5'){
            ?>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="box">
                        <br>
                        <h3 class="text-center">Shifted Admission Student Here</h3>
                        <p class="text-center"><span style="border-bottom: 1px solid gray">(For Shifted Student click this shifted button)</span></p>
                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <div class="box-body text-center">
                                    <div class="row">
                                        <?php
                                            $total_student=$shifted->selectTotalStudentAdmission();
                                            if ($total_student){
                                                $total_student=ceil($total_student->num_rows/5);
                                                if(isset($_GET['shifted_id'])){
                                                    $shifted->insertClassSix();
                                                }
                                                $shifted->updateStatus('101','admission_students');
                                            }
                                        ?>
                                        <?php
                                        for($i=1;$i<=$total_student;$i++){
                                            ?>
                                            <div class="col-md-2">
                                                <div style="border-radius: 8px" class="text-center bg-danger">
                                                    <p style='padding: 8px' class="text-center"><a href="?shifted_id=<?php echo $i; ?>" onclick="return confirm('Are you sure to shifted button?')" >Level <?php echo $i; ?></a></p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>

            <?php
        }
        ?>
    </section>
<?php
require_once 'inc/footer.php';
?>