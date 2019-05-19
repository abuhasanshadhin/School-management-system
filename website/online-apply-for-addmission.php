<?php 
require 'includes/header.php';
session_start();
?>

<div class="card-body">
    <h2 class="text-center">ONLINE ADMISSION APPLY</h2>
    <hr>

    <?php
        if ($_SERVER['REQUEST_METHOD']=='POST' AND isset($_POST['submit'])){
            $msg = $student->onlineAdmissionApply($_POST, $_FILES);
        }
    ?>

    <div class="row mt-5">
        <div class="col-md-8 offset-md-2 font-weight-bold font-italic">

            <?php echo (isset($msg)) ? $msg : '' ?>

            <form method="post" enctype="multipart/form-data">
                <div class="row form-group">
                    <div class="col-md-4"><h5>First name</h5></div>
                    <div class="col-md-8">
                        <input type="text" name="first_name" class="form-control" required onfocus="responsiveVoice.speak('Write applicant first name.')">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4"><h5>Last name</h5></div>
                    <div class="col-md-8">
                        <input type="text" name="last_name" class="form-control" required onfocus="responsiveVoice.speak('Write applicant last name.')">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4"><h5>Father's name</h5></div>
                    <div class="col-md-8">
                        <input type="text" name="father_name" class="form-control" required onfocus="responsiveVoice.speak('Write applicant fathers name.')">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4"><h5>Mother's name</h5></div>
                    <div class="col-md-8">
                        <input type="text" name="mother_name" class="form-control" required  onfocus="responsiveVoice.speak('Write applicant mothers name.')">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4"><h5>Gender</h5></div>
                    <div class="col-md-8">
                        <input type="radio" name="gender" value="male" checked id="male"> <label for="male"><h5>Male</h5></label> &nbsp;
                        <input type="radio" name="gender" value="female" id="female"> <label for="female"><h5>Female</h5></label>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4"><h5>Image</h5></div>
                    <div class="col-md-8"><input type="file" name="image" required></div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4"><h5>Date OF Birth</h5></div>
                    <div class="col-md-8">
                        <input type="text" name="birth_date" id="birth_date" placeholder="mm/dd/yyyy" class="form-control" required onfocus="responsiveVoice.speak('Select or write applicant date of birth.')">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4"><h5>Phone</h5></div>
                    <div class="col-md-8">
                        <input type="tel" name="mobile" class="form-control" required onfocus="responsiveVoice.speak('Write applicant guardian phone number.')">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4"><h5>Village</h5></div>
                    <div class="col-md-8">
                        <input type="text" name="village" class="form-control" required onfocus="responsiveVoice.speak('Write applicant village name.')">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4"><h5>Union</h5></div>
                    <div class="col-md-8">
                        <input type="text" name="union" class="form-control" required  onfocus="responsiveVoice.speak('Write applicant union name.')">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4"><h5>Sub-district</h5></div>
                    <div class="col-md-8">
                        <input type="text" name="sub-district" class="form-control" required onfocus="responsiveVoice.speak('Write applicant sub district name.')">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4"><h5>District</h5></div>
                    <div class="col-md-8">
                        <input type="text" name="district" class="form-control" required onfocus="responsiveVoice.speak('Write applicant district name.')">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4 offset-md-4">
                        <input type="reset" value="RESET" class="btn btn-dark">
                        <input type="submit" name="submit" value="SUBMIT" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

  <script>
      $( function() {
        $( "#birth_date" ).datepicker();
      } );
  </script>

<?php require 'includes/footer.php' ?>