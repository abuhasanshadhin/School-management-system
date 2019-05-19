<?php 
require 'includes/header.php';
session_start();
echo (!isset($_SESSION['online-apply-id'])) ? "<script>window.location='online-apply-for-addmission'</script>" : '' ;
?>

    <h1 class="text-center mt-3 font-weight-bold">APPLICATION FEEDBACK</h1><hr>

    <div class="card-body mt-3" id="application-feedback">
        <div class="text-center">
            <h2 class="font-weight-bold text-uppercase">Ulipur M S School & College, Kurigram</h2>
            <h5>Ulipur, Kurigram - 5620</h5><br><br>
            <h3>ONLINE APPLICATION SUCCESS FEEDBACK</h3>
        </div>

        <?php 
            $applicant_id = (isset($_SESSION['online-apply-id'])) ? $_SESSION['online-apply-id'] : '' ;
            $applicantData = $student->onlineAdmissionApplicantId($_SESSION['online-apply-id']);
            unset($_SESSION['online-apply-id']);
        ?>

        <div class="mt-5 online-apply-feedback">
            <div style="width: 60%; float: left;">
                <table class="online-apply-feedback-table">
                    <tr>
                        <th>Applicant ID</th>
                        <td>:</td>
                        <td><?php echo $applicantData['id']; ?></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>:</td>
                        <td><?php echo $applicantData['student_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Father's name</th>
                        <td>:</td>
                        <td><?php echo $applicantData['father_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Mother's name</th>
                        <td>:</td>
                        <td><?php echo $applicantData['mother_name']; ?></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>:</td>
                        <td><?php echo $applicantData['gender']; ?></td>
                    </tr>
                    <tr>
                        <th>Date Of Birth</th>
                        <td>:</td>
                        <td><?php echo $applicantData['birth_date']; ?></td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>:</td>
                        <td><?php echo $applicantData['mobile']; ?></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>:</td>
                        <td>
                            <?php 
                                $address = explode(',', $applicantData['address']);
                                $address = "<strong>Village -</strong> ".$address[0]."<strong>, Union -</strong> ".$address[1]."<br> <strong>Sub district -</strong> ".$address[2]."<strong>, District -</strong> ".$address[3];
                                echo $address;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Apply Date</th>
                        <td>:</td>
                        <td><?php echo date('D, d M Y h:i:s a', strtotime($applicantData['apply_date'])); ?></td>
                    </tr>
                </table>
            </div>
            <div style="float: right; width: 40%">
                <p class="text-center">
                    <img class="img-thumbnail" src="<?php echo $applicantData['image']; ?>" height="200" width="200">
                </p>
            </div>
        </div>

        <div class="online-apply-feedback card-body border mt-5 font-italic">
            <h5>
                Your application has been successful. You will be informed next time through mobile SMS. According to the decision of the authorities, admission test will be held in time. Admission test schedule can be found on our school's official website.
            </h5>
        </div>

        <div class="card-body online-apply-feedback">
            <p class="float-right mt-3 text-center">
                <img src="img/podarSign.png" height="50" width="150" style="border-bottom: 1px solid gray"><br>
                <span><?php echo date('d/m/y'); ?></span><br>
                <span style="border-top: 2px dotted black">Signature Of Authority</span>
            </p>
        </div>

    </div>

    <!--Print Button-->
    <p class="text-center">
        <button onclick="printdiv('application-feedback')" class="btn mt-4"><i class="fa fa-print"></i> PRINT</button>
    </p>

<?php require 'includes/footer.php'; ?>