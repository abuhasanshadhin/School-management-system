<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>


    <!-- Right side Threme color setting -->

    <section class="content-header">
        <h1> Dashboard <small>Student Info</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="">Apply Manage</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <p>For print total apply sheet click this print button <a href="" class="btn btn-primary" onClick="printdiv('div_print')"><i class= "glyphicon glyphicon-print"></i></a>
        </p>
        <div class="row">
            <div class="col-xs-12">
                <div class="box" id="div_print">
                    <div class="container-fluid">
                        <div class="container-fluid">
                            <div class="box-header text-center">
                                <h3 class="box-title ">Total Online Apply Student </h3>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive" >
                                <table class="table table-bordered table-hover text-center">
                                    <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Apply Id</th>
                                        <th>Name</th>
                                        <th>Father Name</th>
                                        <th>Mother Name</th>
                                        <th>Mobile</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $select_result=$apply->select();
                                    $i=1;
                                    if($select_result){
                                        foreach ($select_result as $value){

                                            ?>
                                            <tr>
                                                <td ><?php echo  $i++;; ?></td>
                                                <td><?php echo $value['id'] ?></td>
                                                <td><?php echo $value['student_name'] ?></td>
                                                <td ><?php echo $value['father_name'] ?></td>
                                                <td ><?php echo $value['mother_name'] ?></td>
                                                <td><?php echo $value['mobile'] ?></td>
                                            </tr>

                                        <?php }} ?>
                                    </tbody>

                                </table>
                            </div><!-- /.box-body -->
                        </div>
                    </div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
<?php
require_once 'inc/footer.php';
?>