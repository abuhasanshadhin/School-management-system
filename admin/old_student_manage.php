<?php
    require_once 'inc/header.php';
    require_once 'inc/sidebar.php';
?>

    <!-- Right side Threme color setting -->

    <section class="content-header">
        <h1> Dashboard <small>Students Info</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Old Student Manage</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="container-fluid">
                        <div class="box-header">
                            <h3 class="box-title">Total Teacher </h3>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <?php
                            if(isset($del_message)){
                                echo $del_message;
                            }
                            ?>
                            <table id="example1" class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Name</th>
                                    <th>Father Name</th>
                                    <th>Mobile</th>
                                    <th>Picture</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $select_result=$old_student->selectOldStudents();

                                $i=1;
                                if($select_result){
                                    foreach ($select_result as $value){

                                        ?>
                                        <tr>
                                            <td style="padding-top: 35px"><?php echo  $value['roll']; ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['student_name'] ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['father_name'] ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['mobile'] ?></td>
                                            <td><img width="70px" height="70px" src="<?php echo $value['image'] ?>"></td>
                                            <td style="padding-top: 25px">
                                                <a href="old_student_profile.php?stu_details=<?php echo $value['id'] ?>" class="btn btn-success"><i class="glyphicon glyphicon-eye-open"></i> </a>
                                                <a onclick="return confirm('Are you sure to delete this field?')" href="?del_result=<?php echo $value['id'].'-old_students' ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> </a>
                                            </td>
                                        </tr>

                                    <?php }} ?>
                                </tbody>

                            </table>
                        </div><!-- /.box-body -->
                    </div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
<?php
require_once 'inc/footer.php';
?>