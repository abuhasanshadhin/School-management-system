
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<?php
if (isset($_GET['class'])){
    $value=mysqli_real_escape_string(database::connect(),$_GET['class']);
    $exp=explode('_',$value);
    if(count($exp)==2){
        $class= $exp['0'];
        $group=$exp['1'];
    }else{
        $class= $exp['0'];
    }

}
?>
<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>Student Info</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Student Fees</li>
        <li class="active">Fees History</li>
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
            <?php
                if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['btn_option_result'])){
                    $date_result=$fees->selectByOptionDate($_POST);
                    var_dump($select_result->num_rows);
                }
                ?>
                <?php
                if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['btn_select_result'])){
                    $date_result=$fees->selectByDate($_POST);
                }
            ?>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Student Fees History List </h3>
                </div><!-- /.box-header -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-body">
                            <?php
                                if(isset($date_result) && $date_result=='msg'){
                                    echo "<p class='alert alert-danger'><strong>Error!</strong> Field must not be empty.</p>";
                                }
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <select title="Select Your Option" name="option_value" id="ct" class="form-control">
                                                        <option value="">Select One</option>
                                                        <option value="1">Daily Fees</option>
                                                        <option value="7">Weakly Fees</option>
                                                        <option value="30">Monthly Fees</option>
                                                        <option value="365">Total Fees</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="submit" name="btn_option_result" value="Show Now" class="btn btn-primary btn-block">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-6">

                                    <form method="post" action="">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input readonly  placeholder="yyyy-mm-dd" title="Start Date" class="form-control" name="start_date"  id="datePicker" >
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input readonly  id="datePicker2" placeholder="yyyy-mm-dd" title="End Date" class="form-control" name="end_date">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="submit" name="btn_select_result" value="Submit" class="btn btn-primary btn-block">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <div
                    </div>
                </div>
                <div class="box-body table-responsive">

                    <?php
                    if(isset($_GET['msg'])){
                        if ($_GET['msg']=='1'){
                            echo "<p class='alert alert-success'><strong>Success!</strong> Fees updated successfully.</p>";
                        }
                    }
                    ?>
                    <table id="example1" class="table table-responsive-sm table-responsive-md text-center table-bordered">

                        <thead>
                        <tr class="">
                            <th>SL NO</th>
                            <th>Student Name</th>
                            <th>Roll</th>
                            <th>Class</th>
                            <th>Group</th>
                            <th>Fees</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            if(isset($date_result) && $date_result!='msg'){
                                $select_result=$date_result;
                            }else{
                                $select_result=$fees->selectFeesForFeesHistory();
                            }


                        if($select_result){
                            $i=0;
                            $total_fees='';
                            while ($row=$select_result->fetch_assoc()){
                                $i++;
                                $total_fees +=$row['fees'];
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['roll'] ?></td>
                                    <td><?php echo $row['class'] ?></td>
                                    <td>
                                        <?php
                                        if ($row['stu_group']==''){
                                            echo  "------";
                                        }else{
                                            echo $row['stu_group'];
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $row['fees'] ?></td>
                                    <td><?php echo date('d F Y',strtotime($row['fees_date']));  ?></td>
                                    <td>
                                        <a href="edit_fees.php?edit_id=<?php echo $row['id']; ?>" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a>
                                        <a onclick="return confirm('Are you sure to delete?')" href="fees_history.php?del_result=<?php echo $row['id'].'-students_fees'; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                                    </td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
                <div class="box-body">
                    <?php
                    if(isset($total_fees) && $total_fees>0){
                        ?>
                        <h4 class="text-danger">Total Fees <?php  echo $total_fees; ?> Tk.</h4>
                    <?php } ?>
                </div>
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<?php
require_once 'inc/footer.php';
?>
