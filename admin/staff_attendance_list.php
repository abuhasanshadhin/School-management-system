
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>

<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>Staff Info</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Attendance</li>
        <li class="active">Attendance History</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <?php
            if (isset($del_message)){
                echo $del_message;
            }
            ?>
            <div class="box">
                <div class="container-fluid">
                    <div class="box-header">
                        <h3 class="box-title"> Staff Attendance History </h3>
                    </div><!-- /.box-header -->

                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-responsive-sm table-responsive-md text-center table-bordered">

                            <thead>
                            <tr class="">
                                <th>SL NO</th>
                                <th>Attendance Date</th>
                                <th>Total Staff Id</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $select_result=$staff->selectAttendance();
                            if($select_result){
                                $i=0;
                                while ($row=$select_result->fetch_assoc()){
                                    $i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo date('d F Y',strtotime($row['attendance_date'])) ?></td>
                                        <td><?php echo $row['staff_id'] ?></td>
                                        <td>
                                            <a href="update_staff_attendance.php?update_id=<?php echo $row['id']; ?>" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a>
                                            <a onclick="return confirm('Are you sure to delete?')" href="?del_result=<?php echo $row['id'].'-staff_attendance'; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                        </td>
                                    </tr>
                                <?php }} ?>
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->
<?php
require_once 'inc/footer.php';
?>
