<?php require 'includes/header.php' ?>


    <h1 class="text-center font-weight-bold mt-3">NOTICE</h1>
    <hr>

    <div class="card-body col-md-10 offset-md-1">
        <?php
        if (isset($_GET['n'])) {
            $notice = $school->getSingleNotice($_GET['n']);
            ?>
            <h4><?php echo $notice['title']; ?></h4>
            <h6><i class="fa fa-calendar-o"></i> <?php echo date('D, d M Y', strtotime($notice['publish_date'])); ?>
            </h6>
            <p class="text-center mt-3">
                <?php if (isset($notice['image'])) { ?>
                    <img src="img/exam-result-icon.png <?php /*echo $notice['image']; */?>" class="w-100 img-fluid">
                <?php } ?>

            <p><?php echo $notice['description']; ?></p>
            </p>
        <?php } ?>
    </div>


<?php require 'includes/footer.php' ?>