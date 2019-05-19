<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>

    <!-- Right side Threme color setting -->

    <section class="content-header">
        <h1> Dashboard <small>Other Info</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Complain Management</li>
            <li class="active">Complain Manage</li>
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
                <div class="box" >
                    <div class="container-fluid">
                        <div class="box-header text-center">
                            <h3 class="box-title ">Total Unseen Complain List </h3>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive" >
                            <table id="example1" class="table table-bordered table-hover text-center">
                                <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Mobile</th>
                                    <th>Subject</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $select_result=$communication->selectUnseenComplain();
                                $i=1;
                                if($select_result){
                                    foreach ($select_result as $value){
                                        ?>
                                        <tr>
                                            <td ><?php echo  $i++;; ?></td>
                                            <td ><?php echo $value['mobile'] ?></td>
                                            <td ><?php echo $value['subject'] ?></td>
                                            <td ><?php echo substr($value['description'],0,80);  ?></td>
                                            <td>
                                                <a href="complain_details.php?com_id=<?php echo $value['id']; ?>" class="btn btn-success"><i class="glyphicon glyphicon-eye-open"></i> </a>
                                                <a onclick="return confirm('Are you sure to delete this field?')" href="?del_result=<?php echo $value['id'].'-total_complain' ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> </a>
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