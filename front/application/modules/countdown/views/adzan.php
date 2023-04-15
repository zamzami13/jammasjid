<div class="justify-center items-center">
	<div class="">
		<div class="countdown-body">60</div>
		<input type="hidden" id="current">
		<div class="">
			<div class="swiper text-white">
				<div class="swiper-wrapper">
					<?php foreach ($konten as $key => $value) { ?>
						<div class="swiper-slide cd-footer-text">
							<p class="leading-none"><?php echo $value; ?></p>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(function() {
		const swiper = new Swiper('.swiper', {
			autoplay: {
				delay: 20000,
			},
			// direction: 'vertical',
			loop: true,
		});
	});
</script>

<script type="text/javascript">
	$(function() {

		moment.locale();

		var is_jumat = '<?php echo $is_jumat; ?>';

		var waktu_shalat = '<?php echo $waktu_shalat ?>';

		var newdate = '<?php echo date("Y-m-d 00:00: "); ?>';
		var eventTime = '<?php echo strtotime($waktu_shalat); ?>';
		var currentTime = moment().unix();
		var diffTime = eventTime - currentTime;
		var duration = moment.duration(diffTime * 6000, 'milliseconds');
		var interval = 1000;

		// alert(is_jumat);

		var intervas = setInterval(function() {
			var currentTime = moment().unix();
			duration = moment.duration(duration - interval, 'milliseconds');
			$('.countdown-body').text(moment(newdate + duration.seconds()).format('ss'));
			$('#current').val(duration.seconds())

			console.log('runing');

			if (duration.seconds() <= 1) {
				$('audio#adzan').get(0).play();
			}

			if (is_jumat == true && $('#current').val() < 1) {
				$('.container').slideUp();
				wakeup_time();
			} else if ($('#current').val() < 1) {

				$('.countdown-body').addClass('cd-tiba-adzan');

				$('.owl-carousel').slideUp('slow')

				$('.countdown-body').addClass('blink');
				$('.countdown-body').text("Adzan <?php echo ucfirst($shalat); ?>");
				clearInterval(intervas);
				setInterval(direct, 6000)
			}
		}, interval);

		function direct() {
			window.location.href = "<?php echo base_url(); ?>iqomah/getdata/<?php echo lcfirst($shalat); ?>";
		}




		// moment().tz('Asia/Jakarta');

		/*var a = moment().subtract(1, 'day');
		var b = moment().add(1, 'day');

		var sapa = moment().format('a');
		var lalu = moment().startOf('day').fromNow();

		var end    = moment().endOf('week');

		var min =	moment().get('minute');
		var sec =	moment().get('second');
		var minsec =	moment().format('mm:ss');
		var minsec_unix =	moment(eventTime).unix();

		var day = moment.unix(1318781876);

    	var eventTimeaa	= moment().format('YYYY-MM-DD hh:mm:ss');
    	var eventTimexx	= '<?php echo date("Y-m-d") . " " . substr(jadwal_shalat()['dzuhur'], 0, 5) . ":00"; ?>';
		console.log(eventTimeaa);
		console.log(eventTimexx);


		console.log(lalu);
		console.log(min);
		console.log(sec);
		console.log(minsec);*/


	});
</script>