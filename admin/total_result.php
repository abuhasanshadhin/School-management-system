<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
    <!-- Right side Threme color setting -->
    <section class="content-header">
        <h1> Dashboard <small>Result Management</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Result</li>
            <li class="active">Total Result</li>
        </ol>
    </section>
<?php
    if ($_GET['print_details']){
        $print_details=$_GET['print_details'];
        $exp=explode('_',$_GET['print_details']);

        $class=$exp['0'];
        $group=$exp['1'];

    }
?>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php
                if(isset($del_message)){
                    echo $del_message;
                }
                ?>
               <p>For print result sheet click this print button <a href="" class="btn btn-primary" onClick="printdiv('div_print')"><i class= "glyphicon glyphicon-print"></i></a>
               </p>
                <div class="box" id="div_print">
                    <div class="container-fluid">
                        <div class="box-header">
                            <h3 class="text-center">Class <?php if($group!='0'){
                                    echo $class.'('.$group.')';
                                }else{
                                    echo $class;
                                } ?> Student Result </h3>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table  class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Roll</th>
                                    <th>Student Name</th>
                                    <th>Father Name</th>
                                    <th>Result</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $table="class_".strtolower($class)."_students";
                                if($group =='Science'|| $group =='Commerce'|| $group =='Arts'){
                                    $select_result=$student->selectWithGroup($table,$group);
                                }else{
                                    $select_result=$student->select($table);
                                }
                                if($select_result){
                                    $i=1;
                                    foreach ($select_result as $value){
                                        ?>
                                        <tr>
                                            <td><?php echo  $i++;; ?></td>
                                            <td><?php echo $value['roll'] ?></td>
                                            <td><?php echo $value['student_name'] ?></td>
                                            <td><?php echo $value['father_name'] ?></td>
                                            <td><?php echo $value['result'] ?></td>
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