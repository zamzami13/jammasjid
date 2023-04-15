<div class="row py-2">

    <?php if (@$status) { ?>

        <div class="col-md-4 swiper" id="swiper_kajian_1">
            <div class="fs-kajian owl-carousel text-center swiper-wrapper">
                <?php if (isset($data['data_1'])) : ?>
                    <?php foreach ($data['data_1'] as $key => $value) : ?>
                        <div class="item swiper-slide">
                            <span class="kaj-ket-ust"><?php echo (@$value['user_nama']) ? '<span class="material-icons">keyboard_voice</span> ' . @$value['user_nama'] : ''; ?></span><br>
                            <span class="kaj-ket-materi"><?php echo @$value['kajian_materi']; ?></span><br>
                            <span class="kaj-ket-waktu"><strong><?php echo (@$value['kajian_tanggal']) ? '<span class="material-icons">event_available</span> ' . app_date_value($value['kajian_tanggal'], 'd M Y') : ''; ?></strong> &nbsp; <?php echo (@$value['kajian_waktu']) ? '<span class="material-icons">access_time</span> ' . $value['kajian_waktu'] : ''; ?></span>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-4 swiper" id="swiper_kajian_2">
            <div class="fs-kajian owl-carousel text-center swiper-wrapper">
                <?php if (isset($data['data_2'])) : ?>
                    <?php foreach ($data['data_2'] as $key => $value) : ?>
                        <div class="item swiper-slide">
                            <span class="kaj-ket-ust"><?php echo (@$value['user_nama']) ? '<span class="material-icons">keyboard_voice</span> ' . @$value['user_nama'] : ''; ?></span><br>
                            <span class="kaj-ket-materi"><?php echo @$value['kajian_materi']; ?></span><br>
                            <span class="kaj-ket-waktu"><strong><?php echo (@$value['kajian_tanggal']) ? '<span class="material-icons">event_available</span> ' . app_date_value($value['kajian_tanggal'], 'd M Y') : ''; ?></strong> &nbsp; <?php echo (@$value['kajian_waktu']) ? '<span class="material-icons">access_time</span> ' . $value['kajian_waktu'] : ''; ?></span>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-4 swiper" id="swiper_kajian_3">
            <div class="fs-kajian owl-carousel text-center swiper-wrapper">
                <?php if (isset($data['data_2'])) : ?>
                    <?php foreach ($data['data_3'] as $key => $value) : ?>
                        <div class="item swiper-slide">
                            <span class="kaj-ket-ust"><?php echo (@$value['user_nama']) ? '<span class="material-icons">keyboard_voice</span> ' . @$value['user_nama'] : ''; ?></span><br>
                            <span class="kaj-ket-materi"><?php echo @$value['kajian_materi']; ?></span><br>
                            <span class="kaj-ket-waktu"><strong><?php echo (@$value['kajian_tanggal']) ? '<span class="material-icons">event_available</span> ' . app_date_value(@$value['kajian_tanggal'], 'd M Y') : ''; ?></strong> &nbsp; <?php echo (@$value['kajian_waktu']) ? '<span class="material-icons">access_time</span> ' . $value['kajian_waktu'] : ''; ?></span>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

    <?php } ?>

</div>

<script>
    $(function() {
        var status = '<?php echo @$status; ?>';
        console.log(status)

        if (status) {
            fs_kajian();
        }

        function fs_kajian() {
            const swiper_kajian_1 = new Swiper('#swiper_kajian_1', {
                autoplay: {
                    delay: 30000,
                },
                // direction: 'vertical',
                loop: true,
            });

            const swiper_kajian_2 = new Swiper('#swiper_kajian_2', {
                autoplay: {
                    delay: 30000,
                },
                // direction: 'vertical',
                loop: true,
            });

            const swiper_kajian_3 = new Swiper('#swiper_kajian_3', {
                autoplay: {
                    delay: 30000,
                },
                // direction: 'vertical',
                loop: true,
            });
        }
    });
</script>