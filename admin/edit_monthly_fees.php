

<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>Student Info</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Result</li>
        <li class="active">Add</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="box">
                <br>
                    <h3 class="text-center">Update Student Fees</h3>
                <br>
                <div class="box-body">
                    <!------ admission form submit here --------->
                    <?php
                    if(isset($_GET['edit_id'])){
                        $edit_id=$_GET['edit_id'];
                    }
                    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['fees_btn'])){
                        $edit_result=$fees->updateMonthlyFees($_POST,$edit_id);
                    }
                    ?>

                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-lg-10">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                                <?php
                                                if(isset($edit_result)){
                                                    echo $edit_result;
                                                }
                                                ?>
                                                <?php
                                                $select_result=$fees->selectMonthlyFeesById($edit_id)->fetch_assoc();
                                                ?>
                                                <div class="form-group">
                                                    <label for="sc">Class </label>
                                                    <input readonly type="text" name="class" id="sc" class="form-control" value="<?php echo $select_result['class']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sf">Monthly Fees</label>
                                                    <input type="text" name="fees" id="sf" class="form-control" value="<?php echo $select_result['fees']; ?>">
                                                </div>
                                        </div>
                                        <div class="col-md-3"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <input type="submit" name="fees_btn" value="Submit" class="btn btn-primary btn-block">
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                </form>
                        </div>

                        <div class="col-md-1"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</section>

<?php
require_once 'inc/footer.php';
?>
