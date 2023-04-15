<?php $api = str_replace('_client', '', base_url()); ?>

<!DOCTYPE html>
<html lang="en" class="full-height">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0" />
	<meta http-equiv="cache-control" content="max-age=0" />
	<meta http-equiv="expires" content="0" />
	<meta http-equiv="expires" content="Tue, 18 Feb 1991 1:00:00 GMT" />
	<meta http-equiv="pragma" content="no-cache" />

	<title>eriksanjaya.com - Jadwal Shalat & Informasi Masjid</title>

	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/mdb.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/1920-1080.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/1366-768.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/1280-720.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/980-430.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/app.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/plugins/swiper/swiper-bundle.css" rel="stylesheet">

	<style type="text/css">
		body {
			background-color: #000000;
			/*background: url("<?php //echo $api; 
								?>public/uploads/images/11.jpg")no-repeat center center;*/
			background-size: cover;
			overflow: hidden;
		}
	</style>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.min.js"></script>

	<script type="text/javascript" src='<?php echo base_url(); ?>assets/plugins/momentjs/js/moment.min.js'></script>
	<script type="text/javascript" src='<?php echo base_url(); ?>assets/plugins/momentjs/js/moment-hijri.js'></script>
	<script type="text/javascript" src='<?php echo base_url(); ?>assets/plugins/momentjs/js/id.js'></script>
	<script type="text/javascript" src='<?php echo base_url(); ?>assets/plugins/momentjs/js/moment-duration-format.js'></script>

</head>

<body>

	<audio id="adzan">
		<source src="<?php echo base_url(); ?>assets/sounds/beep-1.mp3" type="audio/mpeg">
	</audio>

	<audio id="iqomah">
		<source src="<?php echo base_url(); ?>assets/sounds/beep-3.mp3" type="audio/mpeg">
	</audio>

	<div class="wrapper">
		<div class="conten h-full text-center px-14 justify-center items-center">
			<?php echo $_countdown_content; ?>
		</div>
	</div>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/circularcountdown.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/mdb.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/swiper/swiper-bundle.min.js"></script>
</body>

</html>