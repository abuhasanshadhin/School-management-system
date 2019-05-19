<?php require 'includes/header.php'; ?>

<div class="card-body">
	<h1 class="text-center font-weight-bold">CONTACT</h1><hr>

	<?php 
		if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_POST['submit'])) {
			$msg = $school->contact($_POST);
		}
	 ?>

	<div class="row mt-5">
        <div class="col-md-8 offset-md-2 font-weight-bold font-italic">

            <?php echo (isset($msg)) ? $msg : '' ?>

            <form method="post">
                <div class="row form-group">
                    <div class="col-md-4"><h5>Your Mobile no.</h5></div>
                    <div class="col-md-8">
                        <input type="text" name="mobile" class="form-control" required onfocus="responsiveVoice.speak('Enter your mobile number')">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4"><h5>Your Message</h5></div>
                    <div class="col-md-8">
                        <textarea name="message" rows="7" class="form-control" required onfocus="responsiveVoice.speak('Write your message')"></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4 offset-md-4">
                        <input type="reset" value="RESET" class="btn btn-dark">
                        <input type="submit" name="submit" value="SEND" class="btn btn-success">
                    </div>
                </div>
            </form>

        </div>
    </div>

</div>

<?php require 'includes/footer.php'; ?>