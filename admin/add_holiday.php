

<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>Other Info</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Holiday Management</li>
        <li class="active">Add Holiday</li>
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
                   <h3 class="text-center">Add Holiday Here</h3>
                   <br>
                   <div class="row">
                       <div class="col-md-1"></div>
                       <div class="col-md-10">
                           <!------ admission form submit here --------->
                           <?php
                           if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit_btn'])){
                               $add_holiday=$calender->create($_POST);
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
                                   <form action="" method="post" enctype="multipart/form-data">
                                       <div class="row">
                                           <div class="col-md-3"></div>
                                           <div class="col-md-6">
                                               <?php
                                               if(isset($add_holiday)){
                                                   echo $add_holiday;
                                               }
                                               ?>
                                               <div class="form-group">
                                                   <label for="sf">Day</label>
                                                   <input type="text" class="form-control" name="day">
                                               </div>
                                               <div class="form-group">
                                                   <label for="class">Month </label>
                                                   <input type="text" id="sn" class="form-control" name="month">
                                               </div>
                                               <div id="class"></div>
                                               <div class="form-group">
                                                   <label for="sf">Holiday Description</label><br>
                                                   <textarea class="form-control" name="holiday_description" cols="57" rows="7" ></textarea>
                                               </div>
                                           </div>
                                           <div class="col-md-3"></div>
                                       </div>
                                       <div class="row">
                                           <div class="col-md-4"></div>
                                           <div class="col-md-4">
                                               <input type="submit" name="submit_btn" value="Submit" class="btn btn-primary btn-block">
                                           </div>
                                           <div class="col-md-4"></div>
                                       </div>
                                   </form>
                                   <br>
                                   <br>
                                   <br>
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






