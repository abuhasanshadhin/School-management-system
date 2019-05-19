<?php
require 'includes/header.php';
session_start();
?>

<div class="card-body">
    <h1 class="text-center font-weight-bold">RESULT</h1>
	<div class="row font-weight-bold text-center">
		<div class="col-md-6 offset-md-3 border card-body">

            <?php
                $a = array_rand(range(10, 20));
                $b = array_rand(range(15, 25));
                $captcha_sum = $a + $b;
                $captcha = $a.'+'.$b;
            ?>

            <?php
                if (isset($_POST['btn-result'])){
                    $msg = $student->checkStudentInfo($_POST);
                    echo "<div class='alert alert-warning font-weight-normal'>".$msg."</div>";
                }
            ?>

            <form method="post">
                <div class="form-group row">
                    <div class="col-3">EXAM</div>
                    <div class="col-9">
                        <select name="exam-type" class="form-control" required>
                            <option value="">--SELECT EXAM--</option>
                            <option value="HALF YEARLY EXAM">HALF YEARLY EXAM</option>
                            <option value="ANNUAL EXAM">ANNUAL EXAM</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-3">ROLL</div>
                    <div class="col-9">
                        <input type="number" name="roll" class="form-control" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-3">CLASS</div>
                    <div class="col-9">
                        <select name="class" id="class-name" onchange="getGroups()" class="form-control" required>
                            <option value="">--SELECT CLASS--</option>
                            <option value="Six">SIX</option>
                            <option value="Seven">SEVEN</option>
                            <option value="Eight">EIGHT</option>
                            <option value="Nine">NINE</option>
                            <option value="Ten">TEN</option>
                        </select>
                    </div>
                </div>

                <div id="groups">
                    <div class="form-group row">
                        <div class="col-3">GROUP</div>
                        <div class="col-9">
                            <select name="group" class="form-control">
                                <option value="">--SELECT GROUP--</option>
                                <option value="Science">SCIENCE</option>
                                <option value="Arts">ARTS</option>
                                <option value="Commerce">COMMERCE</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-3"><?php echo $captcha; ?></div>
                    <div class="col-9">
                        <input type="hidden" name="captcha-sum" value="<?php echo $captcha_sum; ?>">
                        <input type="number" name="captcha" class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <input type="reset" value="RESET" class="btn btn-secondary">
                    <input type="submit" name="btn-result" value="SUBMIT" class="btn btn-primary">
                </div>
            </form>

		</div>
	</div>
</div>

    <script>
        var className = document.getElementById('class-name');
        var groups = document.getElementById('groups');
        groups.style.display = "none";
        function getGroups() {
            if (className.value == 'Nine' || className.value == 'Ten'){
                groups.style.display = "block";
            }else{
                groups.style.display = "none";
            }
        }
    </script>

<?php require 'includes/footer.php'; ?>