

<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>Other Info</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Routine Management</li>
        <li class="active">Add Routine</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <br>
                <h3 class="text-center">Add Routine  Here</h3>
                <br>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="box-body">
                            <div class="box-body">
                            <div class="row">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!------ admission form submit here --------->
                                            <?php

                                            $selectTeacher=$teacher->selectTotalTeacher();

                                            if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit_btn'])){
                                                $add_routine=$routine->create($_POST);
                                            }
                                            ?>
                                            <?php
                                            if(isset($add_routine)){
                                                echo $add_routine;
                                            }
                                            ?>
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="sn">Class</label>
                                                        <select onchange="validate('class', this.value)" class="form-control" name="class">
                                                            <option value="">-----Select One-----</option>
                                                            <option value="Six">SIX</option>
                                                            <option value="Seven">SEVEN</option>
                                                            <option value="Eight">EIGHT</option>
                                                            <option value="Nine">NINE</option>
                                                            <option value="Ten">TEN</option>
                                                        </select>
                                                    </div>
                                                    <div id="class"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="sn">Day</label>
                                                        <select class="form-control" name="day">
                                                            <option value="">-----Select One-----</option>
                                                            <option value="Sat">Saturday</option>Monday
                                                            <option value="Sun">Sunday</option>
                                                            <option value="Mon">Monday</option>
                                                            <option value="Tue">Tuesday</option>
                                                            <option value="Wed">Wednesday</option>
                                                             <option value="Thu">Thursday</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="sf">First Period</label>
                                                <input type="text" id="sf" class="form-control" name="1st_period">
                                            </div>
                                            <div class="form-group">
                                                <label for="sf">Second Period</label>
                                                <input type="text" id="sf" class="form-control" name="2nd_period">
                                            </div>
                                            <div class="form-group">
                                                <label for="sf">Third Period</label>
                                                <input type="text" id="sf" class="form-control" name="3rd_period">
                                            </div>
                                            <div class="form-group">
                                                <label for="sf">Fourth Period</label>
                                                <input type="text" id="sf" class="form-control" name="4th_period">
                                            </div>
                                        </div>
                                        <div class="col-md-3">

                                            <div id="class"></div>
                                            <div class="form-group">
                                                <label for="sf">Teacher</label>
                                                <select class="form-control" name="1st_teacher">
                                                    <option value="">-----Select One-----</option>
                                                    <?php
                                                        if($selectTeacher){
                                                            foreach ($selectTeacher as $value){
                                                                ?>
                                                            <option value="<?php echo $value['teacher_name']; ?>"><?php echo $value['teacher_name']; ?></option>
                                                    <?php }} ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="sf">Teacher</label>
                                                <select class="form-control" name="2nd_teacher">
                                                    <option value="">-----Select One-----</option>
                                                    <?php
                                                    if($selectTeacher){
                                                        foreach ($selectTeacher as $value){
                                                            ?>
                                                            <option value="<?php echo $value['teacher_name']; ?>"><?php echo $value['teacher_name']; ?></option>
                                                        <?php }} ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="sf">Teacher</label>
                                                <select class="form-control" name="3rd_teacher">
                                                    <option value="">-----Select One-----</option>
                                                    <?php
                                                    if($selectTeacher){
                                                        foreach ($selectTeacher as $value){
                                                            ?>
                                                            <option value="<?php echo $value['teacher_name']; ?>"><?php echo $value['teacher_name']; ?></option>
                                                        <?php }} ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="sf">Teacher</label>
                                                <select class="form-control" name="4th_teacher">
                                                    <option value="">-----Select One-----</option>
                                                    <?php
                                                    if($selectTeacher){
                                                        foreach ($selectTeacher as $value){
                                                            ?>
                                                            <option value="<?php echo $value['teacher_name']; ?>"><?php echo $value['teacher_name']; ?></option>
                                                        <?php }} ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="sf">Fifth Period</label>
                                                <input type="text" id="sf" class="form-control" name="5th_period">
                                            </div>
                                            <div class="form-group">
                                                <label for="sf">Sixth Period</label>
                                                <input type="text" id="sf" class="form-control" name="6th_period">
                                            </div>
                                            <div class="form-group">
                                                <label for="sf">Seventh Period</label>
                                                <input type="text" id="sf" class="form-control" name="7th_period">
                                            </div>
                                            <div class="form-group">
                                                <label for="sf">Eighth Period</label>
                                                <input type="text" id="sf" class="form-control" name="8th_period">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="sf">Teacher</label>
                                                <select class="form-control" name="5th_teacher">
                                                    <option value="">-----Select One-----</option>
                                                    <?php
                                                    if($selectTeacher){
                                                        foreach ($selectTeacher as $value){
                                                            ?>
                                                            <option value="<?php echo $value['teacher_name']; ?>"><?php echo $value['teacher_name']; ?></option>
                                                        <?php }} ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="sf">Teacher</label>
                                                <select class="form-control" name="6th_teacher">
                                                    <option value="">-----Select One-----</option>
                                                    <?php
                                                    if($selectTeacher){
                                                        foreach ($selectTeacher as $value){
                                                            ?>
                                                            <option value="<?php echo $value['teacher_name']; ?>"><?php echo $value['teacher_name']; ?></option>
                                                        <?php }} ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="sf">Teacher</label>
                                                <select class="form-control" name="7th_teacher">
                                                    <option value="">-----Select One-----</option>
                                                    <?php
                                                    if($selectTeacher){
                                                        foreach ($selectTeacher as $value){
                                                            ?>
                                                            <option value="<?php echo $value['teacher_name']; ?>"><?php echo $value['teacher_name']; ?></option>
                                                        <?php }} ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="sf">Teacher</label>
                                                <select class="form-control" name="8th_teacher">
                                                    <option value="">-----Select One-----</option>
                                                    <?php
                                                    if($selectTeacher){
                                                        foreach ($selectTeacher as $value){
                                                            ?>
                                                            <option value="<?php echo $value['teacher_name']; ?>"><?php echo $value['teacher_name']; ?></option>
                                                        <?php }} ?>
                                                </select>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once 'inc/footer.php';
?>






