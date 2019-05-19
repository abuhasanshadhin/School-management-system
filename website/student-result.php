<?php
require 'includes/header.php';
session_start();
?>

<?php
if (!isset($_SESSION['roll'])) {
    echo "<script>window.location = 'student-info-for-result'</script>";
}

$result_info = $student->getStudentResult();
$student = $result_info['student_info'];

if (is_null($result_info['student_result']) || is_null($result_info['student_info'])) {
    echo "<script>window.location = 'student-info-for-result'</script>";
}

?>

<h1 class="text-center mt-3 font-weight-bold">MARKSHEET</h1><hr>

<div class="card-body mt-3" id="marksheet">
    <div class="text-center">
        <h2 class="font-weight-bold text-uppercase">Ulipur M S School & College, Kurigram</h2>
        <h5>Ulipur, Kurigram - 5620</h5><br>
        <h4><strong><?php echo $result_info['exam_type'] . " - " . date('Y'); ?></strong></h4>
        <h4>RESULT</h4>

        <h5 class="date mt-3">Date of result declaration : <?php echo date("D-d-m-Y"); ?></h5>
    </div>

    <div class="mt-5">
        <div class="table-responsive" style="width: 70%; float: left">
            <table class="student-info-table">
                <tr>
                    <th>Roll No :</th>
                    <td><?php echo $student['roll']; ?></td>
                </tr>
                <tr>
                    <th>Class :</th>
                    <td><?php echo strtoupper($result_info['student-class']); ?></td>
                </tr>
                <tr>
                    <?php
                    if (!empty($student['stu_group'])) {
                        echo "<th>Group :</th><td>" . strtoupper($student['stu_group']) . "</td>";
                    }
                    ?>
                </tr>
                <tr>
                    <th>Name :</th>
                    <th><?php echo $student['student_name']; ?></th>
                </tr>
                <tr>
                    <th>Father's Name :</th>
                    <td><?php echo $student['father_name']; ?></td>
                </tr>
                <tr>
                    <th>Mother's Name :</th>
                    <td><?php echo $student['mother_name']; ?></td>
                </tr>
            </table>
        </div>
        <div class="table-responsive" style="width: 30%; float: right">
            <table class="table-bordered text-center">
                <tr>
                    <th class="p-2">Class interval</th>
                    <th class="p-2">Letter grade</th>
                    <th class="p-2">Grade point</th>
                </tr>
                <tr>
                    <td>80-100</td>
                    <td>A+</td>
                    <td>5</td>
                </tr>
                <tr>
                    <td>70–79</td>
                    <td>A</td>
                    <td>4</td>
                </tr>
                <tr>
                    <td>60-69</td>
                    <td>A-</td>
                    <td>3.5</td>
                </tr>
                <tr>
                    <td>50–59</td>
                    <td>B</td>
                    <td>3</td>
                </tr>
                <tr>
                    <td>40–49</td>
                    <td>C</td>
                    <td>2</td>
                </tr>
                <tr>
                    <td>33–39</td>
                    <td>D</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>0–32</td>
                    <td>F</td>
                    <td>0</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered text-center mt-3">
            <tr>
                <th>SL</th>
                <th>SUBJECT</th>
                <th>MARKS</th>
                <th>GRADE POINT</th>
                <th>GRADE</th>
                <th>GPA</th>
            </tr>
            <?php
            $i = 1;
            $stu_result = $result_info['student_result'];
            $result_rows = $stu_result->num_rows;

            foreach ($stu_result as $item) {
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $item['sub_name']; ?></td>
                    <td><?php echo $item['sub_mark']; ?></td>
                    <td><?php echo $item['point']; ?></td>
                    <td><?php echo $item['grade']; ?></td>
                    <?php
                    if ($i == 2) {
                        echo "<td style='vertical-align: middle;' rowspan='" . $result_rows . "'>" . number_format($result_info['gpa'], 2) . "</td>";
                    }
                    ?>
                </tr>
            <?php } ?>
        </table>
    </div>

    <div class="card-body text-center">
        <div style="width: 30%; float: left; margin-right: 2%">
            <img src="img/studentSign.png" class="border-bottom" height="50" width="100"><br>
            <span><?php echo date('d/m/y'); ?></span>
            <p style="border-top: 1px dotted black"></p>
            Student signature
        </div>
        <div style="width: 32%; float: left; margin-right: 2%">
            <img src="img/podarSign.png" class="border-bottom" height="50" width="100"><br>
            <span><?php echo date('d/m/y'); ?></span>
            <p style="border-top: 1px dotted black"></p>
            Register signature
        </div>
        <div style="width: 32%; float: left; margin-right: 2%">
            <img src="img/studentSign.png" class="border-bottom" height="50" width="100"><br>
            <span><?php echo date('d/m/y'); ?></span>
            <p style="border-top: 1px dotted black"></p>
            Headmaster signature
        </div>
    </div>
</div>

<!--Print Button-->
<p class="text-center">
    <button onclick="printdiv('marksheet')" class="btn mt-4"><i class="fa fa-print"></i> PRINT</button>
</p>

<?php require 'includes/footer.php'; ?>