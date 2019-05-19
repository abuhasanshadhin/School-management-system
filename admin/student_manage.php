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
            <li class="">Student Manage</li>
            <li class=""><?php echo ucfirst($class); ?></li>
            <?php
            if(isset($group)){
                ?>
                <li class='active'><?php echo ucfirst($group); ?></li>
                <?php
            }
            ?>
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
                    <div class="container-fluid">
                        <div class="box-header">
                            <h3 class="box-title">Total Class
                                <?php

                                if(isset($group)){
                                    echo $class.'('.$group.')';
                                }else{
                                    echo $class;
                                }

                                ?>
                                Student </h3>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th>Roll No</th>
                                    <th>Name</th>
                                    <th>Father Name</th>
                                    <th>Result</th>
                                    <th>Picture</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $table="class_".strtolower($class)."_students";
                                if(isset($group)){
                                    $select_result=$student->selectWithGroup($table,$group);
                                }else{
                                    $select_result=$student->select($table);
                                }



                                $i=1;
                                if($select_result){
                                    foreach ($select_result as $value){

                                        ?>
                                        <tr>
                                            <td style="padding-top: 35px"><?php echo $value['roll']; ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['student_name'] ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['father_name'] ?></td>
                                            <td style="padding-top: 35px"><?php echo $value['result'] ?></td>
                                            <td><img width="70px" height="70px" src="<?php echo $value['image'] ?>"></td>
                                            <td style="padding-top: 25px">
                                                <a href="student_profile.php?stu_details=<?php echo $value['id'].'_'.$class; ?>" class="btn btn-success"><i class="glyphicon glyphicon-eye-open"></i> </a>
                                                <a onclick="return confirm('Are you sure to delete this field?')" href="?del_result=<?php echo $value['id'].'-class_'.strtolower($class).'_students' ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> </a>
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