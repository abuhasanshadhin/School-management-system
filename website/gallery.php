<?php require 'includes/header.php'; ?>

<div class="card-body">
	<h1 class="font-weight-bold text-center">GALLERY</h1><hr>

	<div class="row card-body">
		<?php
			$per_page = 4;
			$page = (isset($_GET['p']) AND ($_GET['p'] > 0)) ? $_GET['p'] : 1 ;
			$start_from = ($page - 1) * $per_page;
		 ?>

		<?php 
			$gallery = $school->getGalleryItem($start_from, $per_page);

			if ($gallery->num_rows > 0) {
				foreach ($gallery as $key => $value) {
		 ?>
		<div class="col-md-6 mt-2">
			<img src="<?php echo $value['image']; ?>" class="w-100 img-fluid mt-2">
			<h5 class="mt-4"><i class="fa fa-calendar"></i> <?php echo date('D, d M Y', strtotime($value['date_time'])); ?></h5>
			<p class="mt-4"><?php echo $value['description']; ?></p>
		</div>
		<?php } } ?>
	</div>

	<p class="text-center">
        <?php
	        $class_rows = $school->totalGalleryItem();
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
</div>

<?php require 'includes/footer.php'; ?>