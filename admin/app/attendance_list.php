<?php
require_once 'inc/header.php';
?>

    <!-- Page Content  -->
    <div id="content">
        <nav  class= "bg-light head-bar">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="">
                        <div class="container-fluid">
                            <a href="#" id="sidebarCollapse"  class="text-dark"><span style="margin-top: 10px" class="fa fa-align-justify float-left"></span></a>
                        </div>
                        <a href="index.php"><img style="padding: 2px;margin-right: 20px" width="35px" src="img/logo.png"></a>
                    </div>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <br>
                    <h6 class="font-italic">Kurigram Govt High school</h6>
                    <span style="font-size: 14px;border-bottom: 1px solid gray; " class="font-italic border-bottom-1">Total Class</span>
                </div>
                <div class="container-fluid">
                    <div class="card  bg-transparent mt-4 login-panel">
                        <div class="card-body bg-transparent">
                            <h6 class="text-center font-italic login">Attendance List</h6>
                            <div class="table-responsive">
                                <table id="example1" class="table  text-center table-bordered">
                                    <thead>
                                    <tr class="">
                                        <th>SL</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php

                                    if(isset($_GET['del_id'])){
                                        $del_id=mysqli_real_escape_string(database::connect(),$_GET['del_id']);
                                        $msg=$attendance->deleteAttendance($del_id);
                                        if(isset($msg)){
                                            $script = "<script> $(function(){ $('#myModal').modal('show'); }); </script>";
                                            echo $script;
                                        }
                                    }

                                    $teacher_id=session::get('teacherId');
                                    $select_result=$attendance->selectAttendanceByTeacherId($teacher_id);
                                    if($select_result){
                                        $i=0;
                                        while ($row=$select_result->fetch_assoc()){
                                            $i++;
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo date('d-m',strtotime($row['attendance_date'])) ?></td>
                                                <td>
                                                    <a href="update_attendance.php?update_id=<?php echo $row['id']; ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                                                    <a onclick="return confirm('Are you sure to delete?')" href="?del_id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                                                </td>
                                            </tr>
                                        <?php }} ?>
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
                </div>
    </div>
<?php
require_once 'modal.php';
require_once 'inc/footer.php';
?>