<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
    <!-- Right side Threme color setting -->

    <section class="content-header">
        <h1> Dashboard <small>Attendance</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="">Attendance</li>
            <li class="">Select Class</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="box">
                    <br>
                    <h3 class="text-center">Select Class Here</h3>
                    <br>
                    <div class="box-body">
                        <!------ admission form submit here --------->
                        <?php
                            if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['btn_submit'])){
                                $select_class=$attendance->selectClassForReceiceAttendance($_POST);
                            }
                        ?>

                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6">
                                            <?php
                                            if (isset($select_class)){

                                                echo $select_class;
                                            }
                                            ?>
                                            <div class="form-group">
                                                <label for="class">Class </label>
                                                <select onchange="validate('class', this.value)" class="form-control" name="class">
                                                    <option value="">Select One</option>
                                                    <option value="Six">SIX</option>
                                                    <option value="Seven">SEVEN</option>
                                                    <option value="Eight">EIGHT</option>
                                                    <option value="Nine">NINE</option>
                                                    <option value="Ten">TEN</option>
                                                </select>
                                            </div>
                                            <div id="class"></div>
                                            <div class="form-group">
                                                <label for="group">Attendance Date</label>
                                                <input id="datePicker" readonly type="text" name="attend_date" class="form-control" placeholder="yyyy-mm-dd">
                                            </div>
                                        </div>
                                        <div class="col-md-3"></div>
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
                            <br>
                            <br>
                            <br>
                            <br>
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