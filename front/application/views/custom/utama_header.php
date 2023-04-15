<div class="fixed-top rgba-black-light">
	<div class="container-fluid">
		<div class="row">
			<div class="text-center kiri col-md-3 col-lg-3 col-xl-3">
				<span class="hari" id="day"></span>
				<span class="tanggal_masehi" id="date_masehi"></span> <br>
				<span class="tanggal_hijriah" id="date_hijriah"></span>
			</div>

			<div class="text-center tengah col-md-6 col-lg-6 col-xl-6">
				<span class="nama"><?php echo app_masjid()->masjid_nama; ?></span><br>
				<?php if (app_masjid()->masjid_nama_sub != "" or app_masjid()->masjid_nama_sub != null) : ?>
					<a href="<?php echo base_url(); ?>"><span class="nama_sub"><?php echo app_masjid()->masjid_nama_sub; ?></span></a><br>
				<?php endif; ?>
				<span class="alamat" dir="alamat">
					<?php echo app_masjid()->masjid_alamat; ?>
				</span>
			</div>

			<div class="kanan col-md-3 col-lg-3 col-xl-3">
				<p class="float-right align-middle jam" id="time"></p>
				<!-- <p class="float-right align-middle jam" id="down"></p> -->
			</div>
		</div>
	</div>
</div>