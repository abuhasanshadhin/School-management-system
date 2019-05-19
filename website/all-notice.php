<?php require 'includes/header.php' ?>

<div class="card-body">
    <h1 class="text-center font-weight-bold">NOTICE</h1>
    <hr>

    <div class="table-responsive text-center">
        <table class="table table-striped table-bordered">
            <tr class="bg-dark text-light">
                <th width="7%">SL</th>
                <th>TITLE</th>
                <th>DATE</th>
                <th width="10%">ACTION</th>
            </tr>
            <?php
                $i=1;
                $notices = $school->getAllNotice();
                if (!empty($notices)){
                    foreach ($notices as $notice) {
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td class="text-left"><?php echo $notice['title']; ?></td>
                <td class="text-uppercase">
                    <?php echo date('D, d M Y', strtotime($notice['publish_date']))?>
                </td>
                <td>
                    <a href="single_notice?n=<?php echo $notice['id']; ?>">
                        <i class="fa fa-search-plus"></i> view
                    </a>
                </td>
            </tr>
            <?php } } ?>
        </table>
    </div>
</div>

<?php require 'includes/footer.php' ?>