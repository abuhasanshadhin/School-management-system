<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>

<?php
    if(isset($_GET['value'])){
        $value=mysqli_real_escape_string(database::connect(),$_GET['value']);
        $_SESSION['value']=$value;
        $exp=explode('_',$value);
        $class=$exp['0'];
        if($class=='Nine' || $class=='Ten'){
            $group=$exp['1'];
        }else{
            $group='';
        }
    }
?>

    <!-- Right side Threme color setting -->

    <section class="content-header">
        <h1> Dashboard <small>Other Info</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Book Manage</li>
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
                        echo "<script>window.location='?value=$session_value';</script>";
                    }
                }
                ?>
                <div class="box" >
                    <div class="container-fluid">
                        <div class="box-header text-center">
                            <h3 class="box-title ">Total books List </h3>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive" >
                            <table id="example1" class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Class</th>
                                    <th>Group</th>
                                    <th>Subject Code</th>
                                    <th>Subject Name</th>
                                    <th>Theory Marks</th>
                                    <th>Objective Marks</th>
                                    <th>Practical Marks</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $select_result=$book->select($class,$group);
                                $i=1;
                                if($select_result){
                                    foreach ($select_result as $value){

                                        ?>
                                        <tr>
                                            <td ><?php echo  $i++;; ?></td>
                                            <td><?php echo $value['class_name'] ?></td>
                                            <td><?php echo $value['class_group'] ?></td>
                                            <td ><?php echo $value['subject_code'] ?></td>
                                            <td ><?php echo $value['subject_name'] ?></td>
                                            <td><?php echo $value['theory_marks'] ?></td>
                                            <td><?php echo $value['objective_marks'] ?></td>
                                            <td><?php echo $value['practical_marks'] ?></td>
                                            <td><a onclick="return confirm('Are you sure to delete this field?')" href="?del_result=<?php echo $value['id'].'-books' ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> </a></td>
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