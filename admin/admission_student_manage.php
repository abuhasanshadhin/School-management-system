<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
    <!-- Right side Threme color setting -->
    <section class="content-header">
        <h1> Dashboard <small>Student Info</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Admission Manage</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php
                if(isset($del_message)){
                    echo $del_message;
                }
                ?>
                <div class="box">
                    <div class="container-fluid">
                        <div class="box-header">
                            <h3 class="box-title">Total Admission Student </h3>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Name</th>
                                    <th>Father Name</th>
                                    <th>Result</th>
                                    <th>Picture</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $select_result=$admission->select();
                                if($select_result){
                                    $i=1;
                                    foreach ($select_result as $value){
                                        ?>
                                        <tr>
                                            <td style="padding-top: 35px"><?php echo  $i++;; ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['student_name'] ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['father_name'] ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['result'] ?></td>
                                            <td><img width="70px" height="70px" src="<?php echo $value['image'] ?>"></td>
                                            <td style="padding-top: 25px">
                                                <a href="admission_student_profile.php?stu_id=<?php echo $value['id'] ?>" class="btn btn-success"><i class="glyphicon glyphicon-eye-open"></i> </a>
                                                <a onclick="return confirm('Are you sure to delete this field?')" href="?del_result=<?php echo $value['id'].'-'.'admission_students'?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> </a>
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