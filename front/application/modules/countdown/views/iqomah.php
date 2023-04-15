<style>
	.countdown-footer {
		-webkit-text-stroke: 0 !important;
	}
</style>

<div class="container text-center">
	<div class="cd countdown-body">00:00</div>
	<input type="hidden" id="current">
	<div class="cd countdown-footer swiper text-white">
		<div class="owl-carousel swiper-wrapper">
			<?php foreach ($konten as $key => $value) { ?>
				<div class="cd-footer-text swiper-slide">
					<p><?php echo $value; ?></p>
				</div>
			<?php } ?>
		</div>
	</div>
</div>



<script type="text/javascript">
	$(function() {
		const swiper = new Swiper('.swiper', {
			autoplay: {
				delay: 10000,
			},
			// direction: 'vertical',
			loop: true,
		});
	});
</script>

<script type="text/javascript">
	$(function() {

		var base_url = '<?php echo base_url(); ?>';
		var auto_shutdown = '<?php echo $auto_shutdown; ?>';

		var newdate_m = '<?php echo date("Y-m-d 00:"); ?>';
		var newdate_s = '<?php echo date("Y-m-d 00:00:"); ?>';
		var waktu_shalat = '<?php echo $waktu_shalat ?>';

		var iqomah_time = moment('<?php echo $waktu_shalat ?>').add('<?php echo $jeda_iqomah; ?>', 'minute').unix();
		var currentTime = moment().unix();

		var diffTime = iqomah_time - currentTime;
		var duration = moment.duration(diffTime * 1000, 'milliseconds');
		var interval = 1000;

		$('#current').val(iqomah_time);

		var intervas = setInterval(function() {
			var currentTime = moment().unix();
			duration = moment.duration(duration - interval, 'milliseconds');
			$('.countdown-body').text(moment(newdate_m + duration.minutes()).format('mm') + ":" + moment(newdate_s + duration.seconds()).format('ss'));

			console.log('runing');
			// console.log(iqomah_time);
			// console.log(currentTime);

			if ((iqomah_time - 3) <= currentTime) {
				$('audio#iqomah').get(0).play();
			}

			if (iqomah_time <= currentTime) {

				$('.countdown-body').addClass('cd-tiba-iqomah');

				$('.owl-carousel').slideUp('slow')

				console.log('iqomah dimulai');
				$('.countdown-body').addClass('blink');
				$('.countdown-body').text("LURUS & RAPATKAN SHAF");
				clearInterval(intervas);
				setInterval(direct, 6000)
			}
		}, interval);

		function direct() {
			if (auto_shutdown == '1') {
				$.ajax({
						url: base_url + "service/shutdown",
						type: 'GET',
						dataType: 'json',
					})
					.done(function(res) {
						console.log(res);
					})
					.fail(function(res) {
						console.log(res);
					})
					.always(function(res) {
						console.log(res);
					});
			} else {
				console.log('layar mati');
				$('.container').slideUp();
				wakeup_time();
			}
		}

		function wakeup_time() {
			var wt = setInterval(function() {
				var waktu_sleep = moment(waktu_shalat).add('<?php echo $waktu_sleep; ?>', 'minute').unix();
				var currentTime = moment().unix();

				if (waktu_sleep <= currentTime) {
					console.log('layar hidup lagi');
					window.location.href = "<?php echo base_url(); ?>";
				}
			}, interval)
		}

	});
</script>