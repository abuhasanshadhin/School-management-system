
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<?php
    if (isset($_GET['fees_details'])){
        $value=mysqli_real_escape_string(database::connect(),$_GET['fees_details']);
        $exp=explode('_',$value);

        $roll=$exp['0'];
        $class=$exp['1'];
        $group=$exp['2'];


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
            <div class="box">
                <div class="container-fluid">
                    <div class="box-header">
                        <h3 class="box-title">Student Fees History </h3>
                    </div><!-- /.box-header -->

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

                            $select_result=$fees->selectIndividualFees($roll,$class,$group);

                            if($select_result){
                                $i=0;
                                $total_paid='';
                                while ($row=$select_result->fetch_assoc()){
                                    $i++;
                                    $total_paid +=$row['fees'];
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
                    <div class="box-body">
                        <?php
                        if(isset($total_paid) && $total_paid>0){
                            $total_fees=$fees->selectTotalFees($class,$group);
                            $unpaid=$total_fees - $total_paid;

                            if($unpaid<=0){
                                $paid= "Your total fees is paid.";
                            }else {
                                $paid=$unpaid;
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <table style="font-size: 18px" class="table text-danger font-weight-bold table-bordered table-responsive">
                                        <tr>
                                            <td>Total Fees</td>
                                            <td><?php echo $total_fees; ?> TK</td>
                                        </tr>
                                        <tr>
                                            <td>Total Paid</td>
                                            <td><?php echo $total_paid; ?> TK</td>
                                        </tr>
                                        <tr>
                                            <?php
                                            if (is_string($paid)){
                                                ?>
                                                <td colspan="2"><?php echo $paid; ?></td>
                                                <?php
                                            }else{
                                                ?>
                                                <td>Unpaid</td>
                                                <td><?php echo $paid; ?> TK</td>
                                                <?php
                                            }
                                            ?>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
</section><!-- /.content -->
<?php
require_once 'inc/footer.php';
?>
