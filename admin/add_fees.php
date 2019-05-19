

<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>Student Info</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Fees</li>
        <li class="active">Add</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="box">
               <div class="container-fluid">
                   <br>
                   <h3 class="text-center">Add Student Fees</h3>
                   <br>
                   <div class="box-body">
                       <!------ admission form submit here --------->
                       <?php
                       if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['fees_btn'])){
                           $add_fees=$fees->addFees($_POST);
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
                                               if(isset($add_fees)){
                                                   echo $add_fees;
                                               }
                                               ?>
                                               <div class="form-group">
                                                   <label for="sn">Student Name</label>
                                                   <input type="text" id="sn" class="form-control" name="name">
                                               </div>
                                               <div class="form-group">
                                                   <label for="sr">Student Roll</label>
                                                   <input type="text" id="sr" class="form-control" name="roll">
                                               </div>
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
                                                   <label for="sf">Student Fees</label>
                                                   <input type="text" id="sf" class="form-control" name="fees">
                                               </div>
                                           </div>
                                           <div class="col-md-3">

                                           </div>
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






