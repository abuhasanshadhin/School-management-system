<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
    <!-- Right side Threme color setting -->

    <section class="content-header">
        <h1> Dashboard <small>Staff Info</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Staff Add</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="box">
                    <br>
                    <h3 class="text-center">Staff Add Here</h3>
                    <br>
                    <div class="box-body">
                        <!------ admission form submit here --------->
                        <?php
                        if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['btn_submit'])){
                            $add_result=$staff->create($_POST,$_FILES);
                        }
                        ?>

                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-lg-10">
                                    <?php
                                    if (isset($add_result)){

                                        echo $add_result;
                                    }
                                    ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="studentName"> Staff Name *</label>
                                                <input name="staff_name" type="text" class="form-control"  placeholder="Enter teacher name">
                                            </div>
                                            <div class="form-group">
                                                <label for="fatherName">Father Name *</label>
                                                <input name="father_name" type="text" class="form-control"  placeholder="Father name">
                                            </div>
                                            <div class="form-group">
                                                <label for="motherName"> Mother Name *</label>
                                                <input name="mother_name" type="text" class="form-control"  placeholder="Mother name">
                                            </div>
                                            <div class="form-group">
                                                <label for="dateOfBirth">Date OF Birth *</label>
                                                <input id="datePicker" name="birth_date" type="text" readonly class="form-control" placeholder="yyyy-mm-dd">
                                            </div>
                                            <div class="form-group">
                                                <label for="gender">Gender *</label>
                                                <select class="form-control" name="gender">
                                                    <option value="">Select One</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="mobile">Mobile *</label>
                                                <input name="mobile" type="text" class="form-control"  placeholder="Mobile number">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email </label>
                                                <input name="email" type="text" class="form-control"  placeholder="Email address">
                                            </div>
                                            <div class="form-group">
                                                <label for="national_id">National Id *</label>
                                                <input name="national_id" type="text" class="form-control"  placeholder="National id">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="village">Village *</label>
                                                <input name="village" type="text" class="form-control"  placeholder="Village name">
                                            </div>
                                            <div class="form-group">
                                                <label for="union">Union *</label>
                                                <input name="union" type="text" class="form-control"  placeholder="Union name">
                                            </div>
                                            <div class="form-group">
                                                <label for="subDistrict">Sub District *</label>
                                                <input name="sub_district" type="text" class="form-control" placeholder="Sub district name">
                                            </div>
                                            <div class="form-group">
                                                <label for="district">District *</label>
                                                <input name="district" type="text" class="form-control"  placeholder="District name">
                                            </div>
                                            <div class="form-group">
                                                <label for="education">Education *</label>
                                                <input name="education" type="text" class="form-control"  placeholder="Education status">
                                            </div>
                                            <div class="form-group">
                                                <label for="designation">Designation *</label>
                                                <input name="designation" type="text" class="form-control"  placeholder="Staff designation">
                                            </div>
                                            <div class="form-group">
                                                <label for="image">Image *</label>
                                                <input name="image" type="file" >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-1"></div>
                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <div class="row">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-4">
                                            <button name="btn_submit" type="submit" class="btn btn-primary btn-block">Submit</button>
                                        </div>
                                        <div class="col-lg-4"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </section>


<?php
require_once 'inc/footer.php';
?>