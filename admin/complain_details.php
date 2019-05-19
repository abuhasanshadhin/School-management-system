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
            <li class="active">Complain Details</li>
        </ol>
    </section>
<?php
    if ($_GET['com_id']){
        $com_id=mysqli_real_escape_string(database::connect(),$_GET['com_id']);
        $communication->updateStatus($com_id);
    }
    $result=$communication->selectSingleComplain($com_id)->fetch_assoc();
?>
    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-xs-12">
                <div class="box" >
                    <div class="container-fluid">
                        <br>
                        <h3 class="text-center ">Complain Details Here </h3>
                        <br>
                        <div class="box-body" >
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="subject">Complain Subject</label>
                                        <input type="text" class="form-control" value="<?php echo $result['subject']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="subject">Complain Details</label><br>
                                        <textarea class="form-control" rows="7" cols="55"><?php  echo $result['description']; ?></textarea>
                                    </div>
                                    <div class="form-group text-center">
                                        <a class="btn btn-primary" href="unseen_complain.php">Back To Unseen Message</a>
                                    </div>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div><!-- /.box-body -->
                    </div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
<?php
require_once 'inc/footer.php';
?>