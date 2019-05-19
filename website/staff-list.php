<?php require "includes/header.php"; ?>

    <div class="card-body">

        <h2 class="text-center"><strong>STAFF</strong></h2>
        <hr>

        <?php
        if (isset($_POST['key']) && ($_POST['key'] != "")) {
            $staffs = $manpower->getStaffBySearch($_POST['key']);
        } else {
            $staffs = $manpower->getManpowers('total_staff');
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
                <?php if (isset($staffs)) { ?>
                    <tr>
                        <th>ID</th>
                        <th>IMAGE</th>
                        <th>STAFF NAME</th>
                        <th>Designation</th>
                        <th>EDUCATION</th>
                        <th>CONTACT</th>
                    </tr>
                    <?php foreach ($staffs as $staff) { ?>
                        <tr>
                            <td><?php echo $staff['id'] ?></td>
                            <td><img src="<?php echo $staff['image'] ?>" height="80"></td>
                            <td>
                                <?php
                                if (isset($_POST['key'])) {
                                    echo str_ireplace($_POST['key'], '<span style="background-color: yellow">' . $_POST["key"] . '</span>', $staff['staff_name']);
                                } else {
                                    echo $staff['staff_name'];
                                }
                                ?>
                            </td>
                            <td><?php echo $staff['designation'] ?></td>
                            <td><?php echo str_replace(',', '<br>', $staff['education']); ?></td>
                            <td>
                                <?php
                                if (isset($_POST['key'])) {
                                    $contacts = "<strong><i class='fa fa-phone'></i></strong> " . str_ireplace($_POST['key'], '<span style="background-color: yellow">' . $_POST["key"] . '</span>', $staff['mobile']);
                                } else {
                                    $contacts = "<strong><i class='fa fa-phone'></i></strong> " . $staff['mobile'];
                                }

                                $contacts .= ($staff['email']) ? "<br><strong><i class='fa fa-envelope'></i></strong> " . $staff['email'] : '';
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