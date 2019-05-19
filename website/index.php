<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
	<style type="text/css">
		body{
			background: url('img/website-starting.gif') 50% 50% no-repeat;
			background-attachment: fixed;
		}
		p{
			text-align: center;margin-top: 10%;font-size: 10rem;font-weight: bold;
			background: -webkit-linear-gradient(red, blueviolet);-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
		}
	</style>
</head>
<body>

<div class="card-body text-center" id="arrow">
	<p>WELCOME</p>
</div>

<script src='assets/jquery.min.js'></script>
<script src="assets/responsivevoice.js"></script>
<script>
	$('#arrow').hide();
	setTimeout(function() {
	  $('#arrow').slideDown('slow');
	}, 1000);
    setTimeout(function () {
      window.location = 'home';
    }, 2000);

    responsiveVoice.speak('Welcome');
</script>
</body>
</html>



