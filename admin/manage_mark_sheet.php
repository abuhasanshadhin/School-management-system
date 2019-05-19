
<?php
    require_once 'inc/header.php';
    require_once 'inc/sidebar.php';
?>
<!-- Right side Threme color setting -->

<?php
    if ($_GET['print_details']){
        $print_details=mysqli_real_escape_string(database::connect(),$_GET['print_details']);
        $exp=explode('_',$_GET['print_details']);

        $roll=$exp['0'];
        $class=$exp['1'];
        $group=$exp['2'];
    }
?>

<section class="content-header">
    <h1> Dashboard <small>Student Info</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Result</li>
        <li class="active">Mark Sheet</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="container">
        <div class="text-center">
            <p>For print mark sheet click this print button <a href="" class="btn btn-primary" onClick="printdiv('div_print')"><i class= "glyphicon glyphicon-print"></i></a>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="box">
                   <div class="container-fluid">
                       <?php
                       $student_details=$result->selectStudentForMarkSheet($roll,$class,$group);
                       $student_value=$student_details->fetch_assoc();
                       ?>
                       <div id="div_print" class="box-body">
                           <h3 class="text-center font-weight-bold">kurigram Govt Boys School</h3>
                           <h5 class="text-center font-italic">Half Yearly Exam-2018</h5>
                           <h6 class="text-center font-italic">(Mark Sheet)</h6>
                           <div class="row">
                               <div class="col-md-12">
                                   <br>
                                   <br>
                                   <br>
                                   <br>
                                   <table class="table border-bottom table-responsive-md">
                                       <tr>
                                           <td>Name</td>
                                           <td>:   <?php echo $student_value['student_name'] ?></td>
                                       </tr>
                                       <tr>
                                           <td>Father</td>
                                           <td>:   <?php echo $student_value['father_name'] ?></td>
                                       </tr>
                                       <tr>
                                           <td>Mother</td>
                                           <td>:   <?php echo $student_value['mother_name'] ?></td>
                                       </tr>
                                       <tr>
                                           <td>Bate Of</td>
                                           <td>:   <?php echo $student_value['birth_date'] ?></td>
                                       </tr>
                                       <tr>
                                           <td>Class</td>
                                           <td>:   <?php echo $class; ?></td>
                                       </tr>

                                       <tr>
                                           <td>Group</td>

                                           <td>:   <?php
                                               if($group==0){
                                                   echo '-----';
                                               }else{
                                                   echo $group;
                                               }

                                               ?></td>
                                       </tr>
                                       <tr>
                                           <td>Roll</td>
                                           <td>:   <?php echo $student_value['roll'] ?></td>
                                       </tr>
                                   </table>
                               </div>
                               <div class="col-md-12 table-responsive">
                                   <h5>Total Result</h5>
                                   <table class="table text-center table-bordered ">
                                       <thead>
                                       <tr>
                                           <th>SL NO</th>
                                           <th>Subject</th>
                                           <th>Mark</th>
                                           <th>Grade</th>
                                           <th>Point</th>
                                           <th>Total Point</th>
                                       </tr>
                                       </thead>
                                       <?php

                                       $avg_point=$result->avgPoint($roll,$class,$group);
                                       $result=$result->SelectTotalResultByStudent($roll,$class,$group);
                                       if($result){

                                       $i=0;
                                       while ($row=$result->fetch_assoc()){
                                       $i++;
                                       ?>
                                       <tr>
                                           <td><?php echo $i; ?></td>
                                           <td><?php echo $row['sub_name']; ?></td>
                                           <td><?php echo $row['sub_mark']; ?></td>
                                           <td><?php echo $row['grade']; ?></td>
                                           <td><?php echo $row['point']; ?></td>
                                           <td></td>
                                           <?php } } ?>
                                       </tr>
                                       <tr>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td></td>
                                           <td><?php echo $avg_point; ?></td>
                                       </tr>
                                   </table>
                               </div>
                           </div>
                       </div>
                   </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</section>
<?php
require_once 'inc/footer.php';
?>
