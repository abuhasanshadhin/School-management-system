
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<?php
if (isset($_GET['stu_details'])){
    $stu_id=mysqli_real_escape_string(database::connect(),$_GET['stu_details']);


}
?>

<?php
//Select student by id
$single_student=$old_student->selectSingleStudents($stu_id);
if($single_student){
    $student_value=$single_student->fetch_assoc();
}

?>
<!-- Right side Threme color setting -->
<section class="content-header">
    <h1> Dashboard <small>Student Info</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Student Manage</li>
        <li class="">Profile</li>
        <li class='active'><?php  ?></li>

    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div id="div_print" class="box">
                <div class="container-fluid">
                    <div class="text-center">
                        <br>
                        <a class="" style="font-size: 20px" onClick="printdiv('div_print')"><i class="glyphicon glyphicon-print"></i> </a>
                    </div>
                    <br>
                    <h3 class="text-center">Information of <?php echo $student_value['student_name']; ?></h3><br>
                    <br>
                    <div class="box-body">
                        <!----- student profile --------->
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <img src="<?php echo $student_value['image']; ?>" width="160px" height="170px">
                                        </div>
                                        <br>
                                        <br>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-responsive table-responsive-sm ">
                                                <tr>
                                                    <td>Student Name</td>
                                                    <td><?php echo $student_value['student_name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Father Name</td>
                                                    <td><?php echo $student_value['father_name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Mother Name</td>
                                                    <td> <?php echo $student_value['mother_name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Gender</td>
                                                    <td><?php echo $student_value['gender']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Date of Birth</td>
                                                    <td><?php echo $student_value['birth_date']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Mobile</td>
                                                    <td><?php echo $student_value['mobile']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Name of School</td>
                                                    <td>Kurigram Govt School</td>
                                                </tr>
                                                <tr>
                                                    <td>Roll</td>
                                                    <td><?php echo $student_value['roll']; ?></td>
                                                    <td>Class</td>
                                                    <td>Old Student</td>
                                                </tr>
                                                <tr>
                                                    <td>Group</td>
                                                    <td><?php if (isset($student_value['stu_group'])){ echo $student_value['stu_group']; }else{ echo "------"; }  ?></td>
                                                    <td>Result</td>
                                                    <td><?php echo $student_value['result']; ?></td>
                                                </tr>

                                                <?php
                                                $address=$student_value['address'];
                                                $exp=explode(',',$address);
                                                $village=$exp['0'];
                                                $union=$exp['1'];
                                                $sub_district=$exp['2'];
                                                $district=$exp['3'];
                                                ?>
                                                <tr>
                                                    <th>Address</th>
                                                </tr>
                                                <tr>
                                                    <td>Village</td>
                                                    <td><?php echo $village; ?></td>
                                                    <td>Union</td>
                                                    <td><?php echo $union; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Sub District</td>
                                                    <td><?php echo $sub_district; ?></td>
                                                    <td>District</td>
                                                    <td><?php echo $district; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="row">
                    <div class="col-lg-4col-sm-3 col-md-4"></div>
                    <div class="col-lg-4 col-sm-6 col-md-4 ">
                        <a href="update_profile.php?stu_details=<?php echo $_GET['stu_details']; ?>" type="submit" class="btn btn-info btn-block">Update Profile</a>
                    </div>
                    <div class="col-lg-4 col-sm-3 col-md-4"></div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</section>


<?php
require_once 'inc/footer.php';
?>