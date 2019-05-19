<?php require 'includes/header.php'; ?>

    <div class="card-body">
        <h1 class="text-center font-weight-bold">CLASS ROUTINE</h1>
        <hr>

        <div class="table-responsive">

            <?php
            $per_page = 1;
            $page = (isset($_GET['p']) AND ($_GET['p'] > 0)) ? $_GET['p'] : 1;
            $start_from = ($page - 1) * $per_page;
            ?>

            <?php
            if (isset($_POST['key'])) {
                $routines = $student->routineSearchByClass($_POST['key']);
            } else {
                $routines = $student->distinctClassFromRoutine($start_from, $per_page);
            }
            ?>

            <div class="float-right mt-2">
                <form method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="key" class="form-control" placeholder="Search by Class name" required>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-outline-info">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <br>

            <?php foreach ($routines as $routine) { ?>
            
                <div id="printRoutine_<?php echo $routine['class_name'] . $routine['class_group']; ?>">

                    <div id="routine-info" class="text-center mt-5">
                        <h2 class="font-weight-bold text-uppercase">Ulipur M S School & College, Kurigram</h2>
                        <h5>Ulipur, Kurigram - 5620</h5>
                        <hr><h3 class="font-weight-bold mt-3">CLASS ROUTINE - <?php echo date('Y'); ?></h3>
                    </div>

                    <h3 class="mt-4 mb-3 text-uppercase">
                        <i class="fa fa-clock-o"></i> CLASS
                        <strong><?php echo (isset($_POST['key'])) ? str_ireplace($_POST['key'], '<span style="background-color: yellow">' . $_POST["key"] . '</span>', $routine['class_name']) : $routine['class_name']; ?></strong>
                        <?php echo $group = ($routine['class_group']) ? '(' . $routine["class_group"] . ')' : ''; ?>

                        <button id="print-btn" onclick="schoolInfo(); printdiv('printRoutine_<?php echo $routine['class_name'] . $routine['class_group']; ?>')"
                                class="btn"><i class="fa fa-print"></i></button>
                    </h3>
                    <table class="table table-bordered text-center">
                        <tr>
                            <th>
                                <i class="fa fa-arrow-right"></i><br>
                                <i class="fa fa-arrow-down"></i>
                            </th>
                            <?php
                            $classTimes = $student->routineClassTime();
                            foreach ($classTimes as $value) {
                            ?><th><?php echo $value; ?></th><?php } ?>
                        </tr>
                        <?php
                        $class_routine = $student->classRoutine($routine['class_name'], $routine['class_group']);
                        foreach ($class_routine as $r) {
                            ?>
                            <tr>
                                <th><?php echo strtoupper($r['day']); ?></th>
                                <td><?php echo $r['1st_period']; ?></td>
                                <td><?php echo $r['2nd_period']; ?></td>
                                <td><?php echo $r['3rd_period']; ?></td>
                                <td><?php echo $r['4th_period']; ?></td>
                                <td><?php echo $r['5th_period']; ?></td>
                                <td><?php echo $r['6th_period']; ?></td>
                                <td><?php echo $r['7th_period']; ?></td>
                                <td><?php echo $r['8th_period']; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <p class="text-center float-right">

                </p>
            <?php } ?>
        </div>
    </div>

    <p class="text-center">
        <?php
        $class_rows = $student->totalRoutine();
        $total_page = ceil($class_rows / $per_page);
        ?>

        <?php $next_page = (isset($_GET['p'])) ? $_GET['p'] + 1 : 2;
        if (isset($_GET['p']) AND ($_GET['p'] > 1)) { ?>
            <a href="?p=<?php echo($_GET['p'] - 1); ?>" class='btn'><i class="fa fa-arrow-left"></i> PREVIOUS</a>
        <?php }
        if ($next_page <= $total_page) { ?>
            <a href="?p=<?php echo $next_page; ?>" class='btn'>NEXT <i class="fa fa-arrow-right"></i></a>
        <?php } ?>
    </p>

    <script>
        document.getElementById('routine-info').style.display = 'none';
        function schoolInfo(el) {
            document.getElementById('routine-info').style.display = 'block';
            document.getElementById('print-btn').style.display = 'none';
        }
    </script>

<?php require 'includes/footer.php'; ?>