<?php require 'includes/header.php'; ?>


<?php
	$monthNames = Array("January", "February", "March", "April", "May", "June", "July", 
	"August", "September", "October", "November", "December");

	if (!isset($_GET["m"])){
		$_GET["m"] = date("n");
	}
	if (!isset($_GET["y"])){
		$_GET["y"] = date("Y");
	}

	$cMonth = $_GET["m"];
	$cYear = $_GET["y"];
	 
	$prev_year = $cYear;
	$next_year = $cYear;
	$prev_month = $cMonth-1;
	$next_month = $cMonth+1;
	 
	if ($prev_month == 0 ) {
	    $prev_month = 12;
	    $prev_year = $cYear - 1;
	}
	if ($next_month == 13 ) {
	    $next_month = 1;
	    $next_year = $cYear + 1;
	}
?>


<div class="table-responsive text-center my-2 main-calendar">

	<h1 class="font-weight-bold text-uppercase mt-2 mb-4"><?php echo $monthNames[$cMonth-1].' '.$cYear; ?></h1>
	<a class="float-left" href="?m=<?php echo $prev_month; ?>&y=<?php echo $prev_year; ?>"><i class="fa fa-arrow-left"></i> PRE MONTH</a>
	<a href="main-calendar" class="text-uppercase"><?php echo date('D, d M Y'); ?></a>
	<a class="float-right" href="?m=<?php echo $next_month; ?>&y=<?php echo $next_year; ?>">NEXT MONTH <i class="fa fa-arrow-right"></i></a>

	<table class="table table-bordered mt-3">
	<tr class="bg-dark text-light">
		<th>SUN</th>
		<th>MON</th>
		<th>TUE</th>
		<th>WED</th>
		<th>THU</th>
		<th>FRI</th>
		<th>SAT</th>
	</tr>

	<?php 
		$timestamp = mktime(0,0,0,$cMonth,1,$cYear);
		$maxday = date("t",$timestamp);
		$thismonth = getdate ($timestamp);

		$startday = $thismonth['wday'];
		$j=0;
		for ($i=0; $i<($maxday+$startday); $i++) {
			$j++;
		    if($i < $startday){
		    	echo "<td>-</td>";
		    }else{
		    	$day = ($i - $startday + 1);
		    	if ($j == 6) {
		    		echo "<td class='text-warning friday'>". $school->calenderHolidayCheck($day, $cMonth) . "</td>";
		    	}else{
		    		if (date('d') == $day AND date('m') == $cMonth AND date('Y') == $cYear) { 
		    			$today = 'today'; $text = 'Today <br>'; 
		    		}
		    		else { $today = ''; $text  = ''; }
		    		echo "<td class='".$today."'>". $text.$school->calenderHolidayCheck($day, $cMonth) . "</td>";
		    	}
		    }
		    if ($j==7) {
		    	echo "<tr>";
		    	$j=0;
		    }
		}
	?>
</table>
</div>

<?php if ($school->getHolidayByMonth($cMonth)->num_rows > 0) { ?>
	<h6 class="ml-4"><i class="fa fa-calendar"></i> Holidays</h6>
<?php } ?>
<ul>
<?php foreach ($school->getHolidayByMonth($cMonth) as $key => $value) { ?>
	<li><?php echo $value['day'].' '.$monthNames[$value['month']-1].' - '.$value['holiday']; ?></li>
<?php } ?>
</ul>

<?php  ?>

<?php require 'includes/footer.php'; ?>