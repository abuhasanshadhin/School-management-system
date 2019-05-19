<?php require "includes/header.php"; ?>

    <div class="card-body">

        <h2 class="text-center"><strong>TEACHERS</strong></h2>
        <hr>

        <?php
        if (isset($_POST['key']) && ($_POST['key'] != "")) {
            $teachers = $manpower->getTeacherBySearch($_POST['key']);
        } else {
            $teachers = $manpower->getManpowers('total_teachers');
        }
        ?>

        <div class="float-right">
            <form method="post">
                <div class="input-group mb-3">
                    <input type="text" name="key" class="form-control" placeholder="Search by Name or Phone" required>
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
                <?php if (isset($teachers)) { ?>
                    <tr>
                        <th>ID</th>
                        <th>IMAGE</th>
                        <th>TEACHER NAME</th>
                        <th>Designation</th>
                        <th>EDUCATION</th>
                        <th>CONTACT</th>
                    </tr>
                    <?php foreach ($teachers as $teacher) { ?>
                        <tr>
                            <td><?php echo $teacher['id'] ?></td>
                            <td><img src="<?php echo $teacher['image'] ?>" height="80"></td>
                            <td>
                                <?php
                                if (isset($_POST['key'])) {
                                    echo str_ireplace($_POST['key'], '<span style="background-color: yellow">' . $_POST["key"] . '</span>', $teacher['teacher_name']);
                                } else {
                                    echo $teacher['teacher_name'];
                                }
                                ?>
                            </td>
                            <td><?php echo $teacher['designation'] ?></td>
                            <td><?php echo str_replace(',', '<br>', $teacher['education']); ?></td>
                            <td>
                                <?php
                                if (isset($_POST['key'])) {
                                    $contacts = "<strong><i class='fa fa-phone'></i></strong> " . str_ireplace($_POST['key'], '<span style="background-color: yellow">' . $_POST["key"] . '</span>', $teacher['mobile']);
                                } else {
                                    $contacts = "<strong><i class='fa fa-phone'></i></strong> " . $teacher['mobile'];
                                }

                                $contacts .= ($teacher['email']) ? "<br><strong><i class='fa fa-envelope'></i></strong> " . $teacher['email'] : '';
                                echo $contacts;
                                ?>
                            </td>
                        </tr>
                    <?php }
                } ?>
            </table>
        </div>

    </div>

<?php require "includes/footer.php"; ?>