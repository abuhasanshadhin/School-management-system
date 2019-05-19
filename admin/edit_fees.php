

<?php
    require_once 'inc/header.php';
    require_once 'inc/sidebar.php';
?>
<?php
    if (isset($_GET['edit_id'])){
        $edit_id=$_GET['edit_id'];
    }
?>
<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>Student Info</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Student Fees</li>
        <li class="active">Update</li>
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
                        if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['fees_btn'])){
                            $update_fees=$fees->updateSingleFees($_POST,$edit_id);
                        }
                    ?>

                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-lg-10">
                            <div class="row">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-3">

                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                                if(isset($update_fees)){
                                                    echo $update_fees;
                                                }
                                                $selectSingleFees=$fees->selectFeesForUpdateFees($edit_id)->fetch_assoc();
                                            ?>
                                            <div class="form-group">
                                                <label for="sn">Student Name</label>
                                                <input type="text" id="sn" class="form-control" value="<?php echo $selectSingleFees['name']; ?>" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="sr">Student Roll</label>
                                                <input type="text" id="sr" class="form-control" value="<?php echo $selectSingleFees['roll']; ?>" name="roll">
                                            </div>
                                            <div class="form-group">
                                                <label for="cs">Class</label>
                                                <select name="class" id="cs" class="form-control">
                                                    <option value="">Select One</option>
                                                    <option value="Six" <?php if ($selectSingleFees['class']=='Six' ) echo "selected" ?> >SIX</option>
                                                    <option value="Seven" <?php if ($selectSingleFees['class']=='Seven' ) echo "selected" ?> >SEVEN</option>
                                                    <option value="Eight" <?php if ($selectSingleFees['class']=='Eight' ) echo "selected" ?> >EIGHT</option>
                                                    <option value="Nine" <?php if ($selectSingleFees['class']=='Nine' ) echo "selected" ?> >NINE</option>
                                                    <option value="Ten" <?php if ($selectSingleFees['class']=='Ten' ) echo "selected" ?> >TEN</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="cs">Group(If class 9 or 10)</label>
                                                <select name="group" id="sg" class="form-control">
                                                    <option value="">Select One</option>
                                                    <option value="Science" <?php if ($selectSingleFees['stu_group']=='Science' ) echo "selected" ?>>Science</option>
                                                    <option value="Arts" <?php if ($selectSingleFees['stu_group']=='Arts' ) echo "selected" ?> >Arts</option>
                                                    <option value="Commerce" <?php if ($selectSingleFees['stu_group']=='Commerce' ) echo "selected" ?> >Commerce</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="sf">Student Fees</label>
                                                <input type="text" id="sf" class="form-control" value="<?php echo $selectSingleFees['fees']; ?>" name="fees">
                                            </div>
                                        </div>
                                        <div class="col-md-3">

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <input type="submit" name="fees_btn" value="Update Now" class="btn btn-primary btn-block">
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                </form>
                            </div>
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