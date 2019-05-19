<?php require 'includes/header.php'; ?>

<div class="card-body">
	<h1 class="text-center font-weight-bold">COMPLAIN BOX</h1><hr>

	<?php 
		if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['submit'])) {
			$msg = $school->complain($_POST);
		}
	 ?>

	<div class="row mt-5">
        <div class="col-md-8 offset-md-2 font-weight-bold font-italic">

            <?php echo (isset($msg)) ? $msg : '' ?>

            <form method="post">
                <div class="row form-group">
                    <div class="col-md-4"><h5>Complain Subject</h5></div>
                    <div class="col-md-8">
                        <input type="text" name="subject" class="form-control" required onfocus="responsiveVoice.speak('Enter your complain subject.')">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4"><h5>Your Mobile no.</h5></div>
                    <div class="col-md-8">
                        <input type="text" name="mobile" class="form-control" required onfocus="responsiveVoice.speak('Enter your mobile number.')">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4"><h5>Your Complain</h5></div>
                    <div class="col-md-8">
                        <textarea name="complain" rows="7" class="form-control" required onfocus="responsiveVoice.speak('Enter your complain.')"></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4 offset-md-4">
                        <input type="reset" value="RESET" class="btn btn-dark">
                        <input type="submit" name="submit" value="SEND" class="btn btn-success">
                    </div>
                </div>
            </form>

            <h5 class="text-center font-italic bg-dark p-2 rounded text-warning mt-5 font-weight-normal">
				You can inform school authorities about any complain about our school
			</h5>
        </div>
    </div>

</div>

<?php require 'includes/footer.php'; ?>