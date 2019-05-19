

<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>Other Info</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Books Management</li>
        <li class="active">Add Book</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="box">
                <div class="container-fluid">
                    <br>
                    <h3 class="text-center">Add Student Book  Here</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <!------ admission form submit here --------->
                            <?php
                            if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit_btn'])){
                                $add_book=$book->create($_POST);
                            }
                            ?>
                            <?php
                            if(isset($add_book)){
                                echo $add_book;
                            }
                            ?>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-lg-10">
                                <div class="row">
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sn">Class</label>
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
                                                    <label for="class">Subject Code </label>
                                                    <input type="text" id="sn" class="form-control" name="subject_code">
                                                </div>
                                                <div id="class"></div>
                                                <div class="form-group">
                                                    <label for="sf">Subject Name</label>
                                                    <input type="text" id="sf" class="form-control" name="subject_name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="sf">Theory Marks</label>
                                                    <input type="text" id="sf" class="form-control" name="theory_marks">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sf">Objective Marks</label>
                                                    <input type="text" id="sf" class="form-control" name="objective_marks">
                                                </div>
                                                <div class="form-group">
                                                    <label for="sf">Practical Marks</label>
                                                    <input type="text" id="sf" class="form-control" name="practical_marks">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <input type="submit" name="submit_btn" value="Submit" class="btn btn-primary btn-block">
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
        </div>
        <div class="col-md-1"></div>
    </div>
</section>

<?php
require_once 'inc/footer.php';
?>






