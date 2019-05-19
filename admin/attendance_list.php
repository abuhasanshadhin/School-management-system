
<?php
    require_once 'inc/header.php';
    require_once 'inc/sidebar.php';
?>
<?php
if (isset($_GET['class'])){
    $value=mysqli_real_escape_string(database::connect(),$_GET['class']);
    $_SESSION['value']=$value;
    $exp=explode('_',$value);
    if(count($exp)==2){
        $class=$exp['0'].'('.$exp['1'].')';
    }else{
        $class=$exp['0'];
    }

}
?>
<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>Student Info</small></h1>
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

            if (isset($_SESSION['message']) && $_SESSION['message']==1){
                echo "<p class='alert alert-success'><strong>Success ! </strong>Your data delete successful.</p>";
                unset($_SESSION['message']);
                unset($_SESSION['value']);
            }
            if(isset($_SESSION['value'])){

                $session_value=$_SESSION['value'];
                if(isset($del_message)){
                    $_SESSION['message']=1;
                    echo "<script>window.location='?class=$session_value';</script>";
                }
            }
            ?>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> Class <?php echo $class; ?> Student Fees History </h3>
                </div><!-- /.box-header -->

                <div class="box-body table-responsive">
                    <table id="example1" class="table table-responsive-sm table-responsive-md text-center table-bordered">

                        <thead>
                        <tr class="">
                            <th>SL NO</th>
                            <th>Attendance Date</th>
                            <th>Total Roll</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $select_result=$attendance->selectAttendanceByClass($class);
                        if($select_result){
                            $i=0;
                            while ($row=$select_result->fetch_assoc()){
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo date('d F Y',strtotime($row['attendance_date'])) ?></td>
                                    <td><?php echo $row['roll'] ?></td>
                                    <td>
                                        <a href="update_attendance.php?update_id=<?php echo $row['id']; ?>" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a>
                                        <a onclick="return confirm('Are you sure to delete?')" href="?del_result=<?php echo $row['id'].'-students_attendances'; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                    </td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->
<?php
require_once 'inc/footer.php';
?>
