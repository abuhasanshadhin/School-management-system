<?php require 'includes/header.php'; ?>

    <div class="card-body">
        <h1 class="text-center font-weight-bold">BOOK LIST</h1>
        <hr>

        <div class="table-responsive">
            <?php
                $per_page = 1;
                $page = (isset($_GET['p']) AND ($_GET['p'] > 0)) ? $_GET['p'] : 1;
                $start_from = ($page - 1) * $per_page;
            ?>

            <?php
                if (isset($_POST['key'])) {
                    $classes = $student->bookSearchByClass($_POST['key']);
                } else {
                    $classes = $student->distinctClassFromBooks($start_from, $per_page);
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

            <?php foreach ($classes as $class) { ?>

                <div id="printBookList_<?php echo $class['class_name'] . $class['class_group']; ?>">

                    <div id="school-info" class="text-center mt-5">
                        <h2 class="font-weight-bold text-uppercase">Ulipur M S School & College, Kurigram</h2>
                        <h5>Ulipur, Kurigram - 5620</h5>
                        <hr><h3 class="font-weight-bold mt-3">BOOK LIST - <?php echo date('Y'); ?></h3>
                    </div>

                    <h3 class="mt-4 mb-3 text-uppercase">
                        <i class="fa fa-book"></i> CLASS
                        <strong><?php echo (isset($_POST['key'])) ? str_ireplace($_POST['key'], '<span style="background-color: yellow">' . $_POST["key"] . '</span>', $class['class_name']) : $class['class_name']; ?></strong>
                        <?php echo $group = ($class['class_group']) ? '(' . $class["class_group"] . ')' : ''; ?>

                        <button id="print-btn" onclick="schoolInfo(); printdiv('printBookList_<?php echo $class['class_name'] . $class['class_group']; ?>')"
                                class="btn"><i class="fa fa-print"></i></button>
                    </h3>
                    <table class="table table-bordered text-center">
                        <tr>
                            <th rowspan="2">SUBJECT <br> CODE</th>
                            <th rowspan="2">SUBJECT <br> NAME</th>
                            <th colspan="4">MARKS</th>
                        </tr>
                        <tr>
                            <th>Theory</th>
                            <th>Objective</th>
                            <th>Practical</th>
                            <th>Total</th>
                        </tr>
                        <?php
                        $books = $student->bookList($class['class_name'], $class['class_group']);
                        foreach ($books as $book) {
                            ?>
                            <tr>
                                <td><?php echo $book['subject_code']; ?></td>
                                <td><?php echo $book['subject_name']; ?></td>
                                <td><?php echo $theory = $book['theory_marks']; ?></td>
                                <td><?php echo $objective = $book['objective_marks']; ?></td>
                                <td><?php echo $practical = $book['practical_marks']; ?></td>
                                <td><?php echo $theory + $objective + $practical; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>

    <p class="text-center">
        <?php
        $class_rows = $student->totalBooks();
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
        document.getElementById('school-info').style.display = 'none';
        function schoolInfo(el) {
            document.getElementById('school-info').style.display = 'block';
            document.getElementById('print-btn').style.display = 'none';
        }
    </script>

<?php require 'includes/footer.php'; ?>