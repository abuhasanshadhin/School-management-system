<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>

    <!-- Right side Threme color setting -->

    <section class="content-header">
        <h1> Dashboard <small>Staff Info</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Staff Manage</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="container-fluid">
                        <div class="box-header">
                            <h3 class="box-title">Total Staff </h3>
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
                                    <th>Designation</th>
                                    <th>Picture</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $select_result=$staff->selectTotalStaff();

                                $i=1;
                                if($select_result){
                                    foreach ($select_result as $value){

                                        ?>
                                        <tr>
                                            <td style="padding-top: 35px"><?php echo  $i++;; ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['staff_name'] ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['father_name'] ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['designation'] ?></td>
                                            <td><img width="70px" height="70px" src="<?php echo $value['image'] ?>"></td>
                                            <td style="padding-top: 25px">
                                                <a href="staff_profile.php?staff_id=<?php echo $value['id'] ?>" class="btn btn-success"><i class="glyphicon glyphicon-eye-open"></i> </a>
                                                <a onclick="return confirm('Are you sure to delete this field?')" href="?del_result=<?php echo $value['id'].'-total_staff' ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> </a>
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