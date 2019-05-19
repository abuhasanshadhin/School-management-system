

<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';



if(isset($_SESSION['val'])){
    $val=$_SESSION['val'];
    ?>
    <script>
        window.onload=function () { groupselect() ; resultClass('class', '<?php echo $val; ?>');  };
    </script>
    <?php
}


?>
<!-- Right side Threme color setting -->

<section class="content-header">
    <h1> Dashboard <small>Result Management</small></h1>
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
                <h3 class="text-center">Add Student Result</h3>
                <br>
                <div class="box-body">
                    <!------ admission form submit here --------->
                    <?php

                        if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['btn_submit'])){
                            $add_result=$result->addResult($_POST);
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
                                            <label for="se">Exam</label>
                                            <select name="exam" id="se" class="form-control">
                                                <option value="">Select One</option>
                                                <option <?php if( isset($_POST['exam']) && $_POST['exam']=='Half'){ echo "selected"; } ?> value="Half">Half yearly exam</option>
                                                <option <?php if( isset($_POST['exam']) && $_POST['exam']=='Final'){ echo "selected"; } ?> value="Final">Final exam</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="sr">Student Roll</label>
                                            <input type="text" value="<?php if (isset($_POST['roll'])){ echo $_POST['roll']; } ?>" name="roll" id="sr" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="sc">Class</label>
                                            <select onchange=" resultClass('class',this.value);groupselect()" name="class" id="cl" class="form-control">
                                                <option value="">Select One</option>
                                                <option <?php if( isset($_POST['class']) && $_POST['class']=='class_six_results'){ echo "selected"; } ?> value="class_six_results">SIX</option>
                                                <option <?php if( isset($_POST['class']) && $_POST['class']=='class_seven_results'){ echo "selected"; } ?> value="class_seven_results">SEVEN</option>
                                                <option <?php if( isset($_POST['class']) && $_POST['class']=='class_eight_results'){ echo "selected"; } ?> value="class_eight_results">EIGHT</option>
                                                <option <?php if( isset($_POST['class']) && $_POST['class']=='class_nine_results'){ echo "selected"; } ?> value="class_nine_results">NINE</option>
                                                <option <?php if( isset($_POST['class']) && $_POST['class']=='class_ten_results'){ echo "selected"; } ?> value="class_ten_results">TEN</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div id="gr" class="form-group">
                                            <label for="cs">Group(If class 9 or 10)</label>
                                            <select  onmouseup="resultGroup('group', this.value)"  name="stu_group" class="form-control">
                                                <option  value="">Select One</option>
                                                <option <?php if( isset($_POST['stu_group']) && $_POST['stu_group']=='Science'){ echo "selected"; } ?> value="Science">Science</option>
                                                <option <?php if( isset($_POST['stu_group']) && $_POST['stu_group']=='Commerce'){ echo "selected"; } ?> value="Commerce">Commerce</option>
                                                <option <?php if( isset($_POST['stu_group']) && $_POST['stu_group']=='Arts'){ echo "selected"; } ?> value="Arts">Arts</option>
                                            </select>
                                        </div>
                                        <div id="group"></div>
                                        <div class="form-group">
                                            <label for="sn">Subject Name</label>
                                            <select id="class" name="sub_name" class="form-control">
                                                <option value="">-----Select One-----</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tm">Total Marks</label>
                                            <input type="text" name="sub_mark" id="tm" class="form-control">
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
<script>

    document.getElementById('gr').style.display='none';
    function groupselect() {
        var val=document.getElementById('cl').value;

        if(val =='class_nine_results' || val =='class_ten_results'){
            document.getElementById('gr').style.display='block';
        }else {
            document.getElementById('gr').style.display='none';
        }
    }

</script>
<script>

    // AJAX code to check input field values when onblur event triggerd.
    function resultClass(field, query) {
        var xmlhttp;
        if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(field).innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "lib/result_ajax.php?field=" + field + "&query=" + query, false);
        xmlhttp.send();
    }
</script>

<script>

    // AJAX code to check input field values when onblur event triggerd.
    function resultGroup(field, query) {
        var xmlhttp;
        if (window.XMLHttpRequest) { // for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else { // for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById('class').innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "lib/result_ajax.php?field=" + field + "&subject=" + query, false);
        xmlhttp.send();
    }
</script>



