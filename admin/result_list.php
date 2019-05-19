<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>

<?php
if ($_GET['print_details']){
    $print_details=mysqli_real_escape_string(database::connect(),$_GET['print_details']);
    $_SESSION['value']=$print_details;
    $exp=explode('_',$_GET['print_details']);

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
            <li class="active">Result</li>
            <li class="active">Result List</li>
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
                        echo "<script>window.location='?print_details=$session_value';</script>";
                    }
                }
                ?>
                <div class="box" >
                    <div class="container-fluid">
                        <div class="box-header text-center">
                            <h3 class="box-title ">Total Result List </h3>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive" >
                            <table id="example1" class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Roll</th>
                                    <th>Subject Name</th>
                                    <th>Subject Mark</th>
                                    <th>Great</th>
                                    <th>Point</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $table=$result->manageResultTable($class);
                                $select_result=$result->SelectTotalResultByStudent($roll,$class,$group);
                                $i=1;
                                if($select_result){
                                    foreach ($select_result as $value){

                                        ?>
                                        <tr>
                                            <td ><?php echo  $i++;; ?></td>
                                            <td><?php echo $value['roll'] ?></td>
                                            <td><?php echo $value['sub_name'] ?></td>
                                            <td><?php echo $value['sub_mark'] ?></td>
                                            <td ><?php echo $value['grade'] ?></td>
                                            <td ><?php echo $value['point'] ?></td>
                                            <td><a onclick="return confirm('Are you sure to delete this field?')" href="?del_result=<?php echo $value['id'].'-'.$table ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> </a></td>
                                        </tr>

                                    <?php }} ?>
                                </tbody>

                            </table>
                        </div><!-- /.box-body -->
                    </div>
                </div><!-- /.box -->
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <a href="manage_mark_sheet.php?print_details=<?php echo $print_details; ?>" class="btn btn-primary btn-block">Create Mark Sheet</a>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
<?php
require_once 'inc/footer.php';
?>