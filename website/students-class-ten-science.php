<?php require "includes/header.php"; ?>

    <div class="card-body">

        <h2 class="text-center">STUDENTS OF CLASS <strong>TEN</strong> (SCIENCE)</h2>
        <hr>

        <?php
        if (isset($_POST['key']) && ($_POST['key'] != "")) {
            $students = $student->getClassTenGroupStudentsBySearch($_POST['key'], 'Science', 'class_ten_students');
        } else {
            $students = $student->getClassTenStudentsByGroup('class_ten_students', 'Science');
        }
        ?>

        <div class="float-right">
            <form method="post">
                <div class="input-group mb-3">
                    <input type="text" name="key" class="form-control" placeholder="Search by Roll or Name" required>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-outline-info">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-striped text-center">
                <?php if (isset($students)) { ?>
                    <tr>
                        <th>ROLL</th>
                        <th>IMAGE</th>
                        <th>STUDENT NAME</th>
                        <th>PARENTS</th>
                    </tr>
                    <?php foreach ($students as $student) { ?>
                        <tr>
                            <td>
                                <?php
                                if (isset($_POST["key"])) {
                                    echo str_ireplace($_POST["key"], '<span style="background-color: yellow">' . $_POST["key"] . '</span>', $student['roll']);
                                } else {
                                    echo $student['roll'];
                                }
                                ?>
                            </td>
                            <td><img src="<?php echo $student['image'] ?>" height="80"></td>
                            <td>
                                <?php
                                if (isset($_POST["key"])) {
                                    echo str_ireplace($_POST["key"], '<span style="background-color: yellow">' . $_POST["key"] . '</span>', $student['student_name']);
                                } else {
                                    echo $student['student_name'];
                                }


                                ?>
                            </td>
                            <td>
                                <?php
                                $parents = "<strong>Father</strong> : " . $student['father_name'] . "<br>";
                                $parents .= "<strong>Mother</strong> : " . $student['mother_name'];
                                echo $parents;
                                ?>
                            </td>
                        </tr>
                    <?php }
                } ?>
            </table>
        </div>

    </div>

<?php require "includes/footer.php"; ?>