
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<?php
if(isset($del_message)){
    echo "<script>window.location=iindex.phppt>";
}
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
        <li class="">Fees Mange</li>
        <li class="active">Monthly Fees</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Student Monthly Fees List </h3>
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
                        <tr class="bg-light">
                            <th>SL NO</th>
                            <th>Class</th>
                            <th>Fees</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query="SELECT * FROM student_monthly_fees";
                        $select_result=database::connect()->query($query);
                        if($select_result){
                            $i=0;
                            while ($row=$select_result->fetch_assoc()){
                                $i++;
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $row['class'] ?></td>
                                    <td><?php echo $row['fees'] ?></td>
                                    <td>
                                        <a href="edit_monthly_fees.php?edit_id=<?php echo $row['id']; ?>" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a>
                                    </td>
                                </tr>
                            <?php }} ?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
<?php
require_once 'inc/footer.php';
?>
