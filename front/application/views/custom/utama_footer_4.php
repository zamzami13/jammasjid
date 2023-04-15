<div class="row box overflow-hidden ws-container px-3 py-3 rounded-md">
    <div class="z-50 col-md-2 col-lg-2 col-xl-2 padding-0">
        <div class="swiper" id="swiper_jumat">
            <div class="fs-jumat owl-carousel swiper-wrapper">
                <div class="item swiper-slide">
                    <p class="ket-head text-center">Petugas Shalat</p>
                    <p class="ket-body today-waktu-terbit text-color-1 text-center">Jumat</p>
                </div>
                <div class="item swiper-slide">
                    <p class="ket-head text-center">Petugas Shalat</p>
                    <p class="ket-body today-waktu-terbit text-color-2 text-center">Jumat</p>
                </div>
            </div>
        </div>

        <div class="swiper" id="swiper_jumat">
            <div class="fs-general owl-carousel swiper-wrapper">
                <div class="item swiper-slide">
                    <p class="ket-head text-center">Jadwal Imam</p>
                    <p class="ket-body today-waktu-terbit text-color-1 text-center">Hari ini</p>
                </div>
                <div class="item swiper-slide">
                    <p class="ket-head text-center">Jadwal Imam</p>
                    <p class="ket-body today-waktu-terbit text-color-2 text-center">Besok Hari</p>
                </div>
            </div>
        </div>

        <div class="waktu-shalat-b">
            <div class="waktu-shalat border-4 border-teal-600 xbg-terbit z-depth-1 text-center mx-1 my-1 rounded-md">
                <h2 class="text-teal-600">Terbit</h2>
                <h1 style="color: white;"><?php echo substr(jadwal_shalat()['terbit'], 0, 5); ?></h1>
            </div>
        </div>
    </div>
    <div class="z-50 col-md-2 col-lg-2 col-xl-2 padding-0">
        <div class="swiper" id="swiper_jumat">
            <div class="fs-jumat owl-carousel swiper-wrapper">
                <div class="item swiper-slide">
                    <p class="ket-head fs-jumat-ts text-center">&nbsp;</p>
                    <p class="ket-body fs-jumat-tf text-color-1 text-center">&nbsp;</p>
                </div>
                <div class="item swiper-slide">
                    <p class="ket-head fs-jumat-ts-sec text-center">&nbsp;</p>
                    <p class="ket-body fs-jumat-tf-sec text-color-2 text-center">&nbsp;</p>
                </div>
            </div>
        </div>

        <div class="swiper" id="swiper_jumat">
            <div class="fs-general owl-carousel vertical-center swiper-wrapper">
                <div class="item swiper-slide vertical-center">
                    <p class="imam-body today-waktu-subuh text-color-1 text-center"></p>
                </div>
                <div class="item swiper-slide vertical-center">
                    <p class="imam-body tomorrow-waktu-subuh text-color-2 text-center"></p>
                </div>
            </div>
        </div>
        <div class="waktu-shalat-b">
            <div class="waktu-shalat border-4 border-blue-500 xbg-subuh darken-3 unique z-depth-1 text-center mx-1 my-1 rounded-md">
                <h2 class="text-blue-500">Subuh</h2>
                <h1 style="color: white;"><?php echo substr(jadwal_shalat()['subuh'], 0, 5); ?></h1>
            </div>
        </div>
    </div>
    <div class="z-50 col-md-2 col-lg-2 col-xl-2 padding-0">
        <div class="swiper" id="swiper_jumat">
            <div class="fs-jumat owl-carousel swiper-wrapper">
                <div class="item swiper-slide">
                    <p class="ket-head fs-jumat-muadzin-i text-center">Muazin I</p>
                    <p class="ket-body fs-jumat-muadzin-i-name text-color-1 text-center">&nbsp;</p>
                </div>
                <div class="item swiper-slide">
                    <p class="ket-head fs-jumat-muadzin-i-sec text-center">Muazin I</p>
                    <p class="ket-body fs-jumat-muadzin-i-name-sec text-color-2 text-center">&nbsp;</p>
                </div>
            </div>
        </div>

        <div class="swiper" id="swiper_jumat">
            <div class="fs-general owl-carousel swiper-wrapper">
                <div class="item swiper-slide">
                    <p class="imam-body today-waktu-dzuhur text-color-1 text-center"></p>
                </div>
                <div class="item swiper-slide">
                    <p class="imam-body tomorrow-waktu-dzuhur text-color-2 text-center"></p>
                </div>
            </div>
        </div>
        <div class="waktu-shalat-b">
            <div class="waktu-shalat border-4 border-yellow-500 xbg-dzuhur darken-1 z-depth-1 text-center mx-1 my-1 rounded-md">
                <h2 class="text-yellow-500">Dzuhur</h2>
                <h1 style="color: white;"><?php echo substr(jadwal_shalat()['dzuhur'], 0, 5); ?></h1>
            </div>
        </div>
    </div>
    <div class="z-50 col-md-2 col-lg-2 col-xl-2 padding-0">
        <div class="swiper" id="swiper_jumat">
            <div class="fs-jumat owl-carousel swiper-wrapper">
                <div class="item swiper-slide">
                    <p class="ket-head fs-jumat-muadzin-ii text-center">Muazin II</p>
                    <p class="ket-body fs-jumat-muadzin-ii-name text-color-1 text-center">&nbsp;</p>
                </div>
                <div class="item swiper-slide">
                    <p class="ket-head fs-jumat-muadzin-ii-sec text-center">Muazin II</p>
                    <p class="ket-body fs-jumat-muadzin-ii-name-sec text-color-2 text-center">&nbsp;</p>
                </div>
            </div>
        </div>

        <div class="swiper" id="swiper_jumat">
            <div class="fs-general owl-carousel swiper-wrapper">
                <div class="item swiper-slide">
                    <p class="imam-body today-waktu-ashar text-color-1 text-center"></p>
                </div>
                <div class="item swiper-slide">
                    <p class="imam-body tomorrow-waktu-ashar text-color-2 text-center"></p>
                </div>
            </div>
        </div>
        <div class="waktu-shalat-b">
            <div class="waktu-shalat border-4 border-indigo-600 xbg-ashar darken-3 z-depth-1 text-center mx-1 my-1 rounded-md">
                <h2 class="text-indigo-600">Ashar</h2>
                <h1 style="color: white;"><?php echo substr(jadwal_shalat()['ashar'], 0, 5); ?></h1>
            </div>
        </div>
    </div>
    <div class="z-50 col-md-2 col-lg-2 col-xl-2 padding-0">
        <div class="swiper" id="swiper_jumat">
            <div class="fs-jumat owl-carousel swiper-wrapper">
                <div class="item swiper-slide">
                    <p class="ket-head fs-jumat-khatib text-center">Khatib</p>
                    <p class="ket-body fs-jumat-khatib-name text-color-1 text-center">&nbsp;</p>
                </div>
                <div class="item swiper-slide">
                    <p class="ket-head fs-jumat-khatib-sec text-center">Khatib</p>
                    <p class="ket-body fs-jumat-khatib-name-sec text-color-2 text-center">&nbsp;</p>
                </div>
            </div>
        </div>

        <div class="swiper" id="swiper_jumat">
            <div class="fs-general owl-carousel swiper-wrapper">
                <div class="item swiper-slide">
                    <p class="imam-body today-waktu-maghrib text-color-1 text-center"></p>
                </div>
                <div class="item swiper-slide">
                    <p class="imam-body tomorrow-waktu-maghrib text-color-2 text-center"></p>
                </div>
            </div>
        </div>
        <div class="waktu-shalat-b">
            <div class="waktu-shalat border-4 border-red-600 xbg-maghrib darken-3 z-depth-1 text-center mx-1 my-1 rounded-md">
                <h2 class="text-red-600">Maghrib</h2>
                <h1 style="color: white;"><?php echo substr(jadwal_shalat()['maghrib'], 0, 5); ?></h1>
            </div>
        </div>
    </div>

    <div class="z-50 col-md-2 col-lg-2 col-xl-2 padding-0">
        <div class="swiper" id="swiper_jumat">
            <div class="fs-jumat owl-carousel swiper-wrapper">
                <div class="item swiper-slide">
                    <p class="ket-head fs-jumat-imam text-center">Imam</p>
                    <p class="ket-body fs-jumat-imam-name text-color-1 text-center">&nbsp;</p>
                </div>
                <div class="item swiper-slide">
                    <p class="ket-head fs-jumat-imam-sec text-center">Imam</p>
                    <p class="ket-body fs-jumat-imam-name-sec text-color-2 text-center">&nbsp;</p>
                </div>
            </div>
        </div>

        <div class="swiper" id="swiper_jumat">
            <div class="fs-general owl-carousel vertical-center swiper-wrapper">
                <div class="item vertical-center swiper-slide">
                    <p class="imam-body today-waktu-isya text-color-1 text-center"></p>
                </div>
                <div class="item vertical-center swiper-slide">
                    <p class="imam-body tomorrow-waktu-isya text-color-2 text-center"></p>
                </div>
            </div>
        </div>
        <div class="waktu-shalat-b">
            <div class="waktu-shalat border-4 border-sky-600 xbg-isya darken-3 z-depth-1 text-center mx-1 my-1 rounded-md">
                <h2 class="text-sky-600" class="">Isya</h2>
                <h1 class="" style="color: white;"><?php echo substr(jadwal_shalat()['isya'], 0, 5); ?></h1>
            </div>
        </div>
    </div>

    <div class="z-50 row running-text w-full">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <marquee>
                <div class="flex space-x-3 items-center py-3">
                    <?php echo (get_running_text()['status']) ? get_running_text()['data'] : ""; ?>
                </div>
            </marquee>
        </div>
    </div>
</div>

<script>
    $(function() {
        var hari = moment().format('dddd');

        if (hari == "Minggu" || hari == "Senin" || hari == "Selasa" || hari == "Rabu" || hari == "Kamis" || hari == "Jumat" || hari == "Sabtu") {
            localStorage.setItem("tipe", "jumat");
            localStorage.setItem("time", moment().unix() + 20);
            setInterval(check_storage, 1000);
            // fs_jumat();
            hari_jumat();
            $('.fs-jumat').slideDown('slow');
        } else {
            fs_general();
            imam_hari_ini();
            $('.fs-jumat').slideUp('slow');
        }

        function check_storage() {

            var tipe = localStorage.getItem("tipe");
            var time = localStorage.getItem("time");

            var now = moment().unix();

            if (tipe == "jumat" && now > time) {
                localStorage.setItem("tipe", "imam");
                var newtime = moment().unix() + 20;
                localStorage.setItem("time", newtime);
                imam_hari_ini();
            } else if (tipe == "imam" && now > time) {
                localStorage.setItem("tipe", "jumat");
                var newtime = moment().unix() + 20;
                localStorage.setItem("time", newtime);
                hari_jumat();
            } else {}
        }

        hari_jumat();
        imam_hari_ini();

        function hari_jumat() {

            var fs_general = $('.fs-general');
            var fs_jumat = $('.fs-jumat');

            fs_general.slideUp('slow');
            fs_jumat.slideDown('slow');

            var fsJumatTs = $('.fs-jumat-ts');
            var fsJumatTf = $('.fs-jumat-tf');
            var fsJumatTsSec = $('.fs-jumat-ts-sec');
            var fsJumatTfSec = $('.fs-jumat-tf-sec');

            var fsJumatMuadzinI = $('.fs-jumat-muadzin-i');
            var fsJumatMuadzinII = $('.fs-jumat-muadzin-ii');
            var fsJumatMuadzinISec = $('.fs-jumat-muadzin-i-sec');
            var fsJumatMuadzinIISec = $('.fs-jumat-muadzin-ii-sec');

            var fsJumatMuadzinIName = $('.fs-jumat-muadzin-i-name');
            var fsJumatMuadzinIiName = $('.fs-jumat-muadzin-ii-name');
            var fsJumatMuadzinINameSec = $('.fs-jumat-muadzin-i-name-sec');
            var fsJumatMuadzinIiNameSec = $('.fs-jumat-muadzin-ii-name-sec');

            var fsJumatKhatib = $('.fs-jumat-khatib');
            var fsJumatKhatibName = $('.fs-jumat-khatib-name');
            var fsJumatKhatibSec = $('.fs-jumat-khatib-sec');
            var fsJumatKhatibNameSec = $('.fs-jumat-khatib-name-sec');

            var fsJumatImam = $('.fs-jumat-imam');
            var fsJumatImamName = $('.fs-jumat-imam-name');
            var fsJumatImamSec = $('.fs-jumat-imam-sec');
            var fsJumatImamNameSec = $('.fs-jumat-imam-name-sec');

            $.ajax({
                    url: '<?php echo base_url(); ?>service/get_petugas_jumat',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        hari: hari
                    }
                })
                .done(function(res) {
                    fsJumatTs.html(res.petugas1.ts);
                    fsJumatTf.html(moment(res.petugas1.tf).format('D MMM YYYY'));
                    fsJumatMuadzinIName.html(res.petugas1.muadzin_1);

                    if (res.petugas1.muadzin_2 == null) {
                        fsJumatMuadzinI.html('Muazin');
                        fsJumatMuadzinII.html('Khatib');
                        fsJumatKhatib.html('Imam');
                        fsJumatImam.html('&nbsp;');
                        fsJumatMuadzinIiName.html(res.petugas1.khatib);
                        fsJumatKhatibName.html(res.petugas1.imam);
                    } else {
                        fsJumatMuadzinIiName.html(res.petugas1.muadzin_2);
                        fsJumatKhatibName.html(res.petugas1.khatib);
                        fsJumatImamName.html(res.petugas1.imam);
                    }

                    fsJumatTsSec.html(res.petugas2.ts);
                    fsJumatTfSec.html(moment(res.petugas2.tf).format('D MMM YYYY'));
                    fsJumatMuadzinINameSec.html(res.petugas2.muadzin_1);

                    if (res.petugas2.muadzin_2 == null) {
                        fsJumatMuadzinISec.html('Muazin');
                        fsJumatMuadzinIISec.html('Khatib');
                        fsJumatKhatibSec.html('Imam');
                        fsJumatImamSec.html('&nbsp;');
                        fsJumatMuadzinIiNameSec.html(res.petugas2.khatib);
                        fsJumatKhatibNameSec.html(res.petugas2.imam);
                    } else {
                        fsJumatMuadzinIiNameSec.html(res.petugas2.muadzin_2);
                        fsJumatKhatibNameSec.html(res.petugas2.khatib);
                        fsJumatImamNameSec.html(res.petugas2.imam);
                    }

                })
                .fail(function() {})
                .always(function() {});
        }


        function imam_hari_ini() {
            var fs_general = $('.fs-general');
            var fs_jumat = $('.fs-jumat');
            fs_general.slideDown('slow');
            fs_jumat.slideUp('slow');

            var _today_imam_head = $('.today-imam-head');
            var _today_subuh = $('.today-waktu-subuh');
            var _today_dzuhur = $('.today-waktu-dzuhur');
            var _today_ashar = $('.today-waktu-ashar');
            var _today_maghrib = $('.today-waktu-maghrib');
            var _today_isya = $('.today-waktu-isya');

            var _tomorrow_imam_head = $('.tomorrow-imam-head');
            var _tomorrow_subuh = $('.tomorrow-waktu-subuh');
            var _tomorrow_dzuhur = $('.tomorrow-waktu-dzuhur');
            var _tomorrow_ashar = $('.tomorrow-waktu-ashar');
            var _tomorrow_maghrib = $('.tomorrow-waktu-maghrib');
            var _tomorrow_isya = $('.tomorrow-waktu-isya');

            var today = moment().format('dddd');
            var tomorrow = moment().add(1, 'days').format('dddd');

            $.ajax({
                    url: '<?php echo base_url(); ?>service/get_jadwal_imam',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        today: today,
                        tomorrow: tomorrow
                    }
                })
                .done(function(res) {
                    _today_imam_head.html('Imam ' + res.today.jadwalimam_hari);
                    _today_subuh.html(res.today.jadwalimam_subuh);
                    _today_dzuhur.html(res.today.jadwalimam_dzuhur);
                    _today_ashar.html(res.today.jadwalimam_ashar);
                    _today_maghrib.html(res.today.jadwalimam_maghrib);
                    _today_isya.html(res.today.jadwalimam_isya);

                    _tomorrow_imam_head.html('Imam ' + res.tomorrow.jadwalimam_hari);
                    _tomorrow_subuh.html(res.tomorrow.jadwalimam_subuh);
                    _tomorrow_dzuhur.html(res.tomorrow.jadwalimam_dzuhur);
                    _tomorrow_ashar.html(res.tomorrow.jadwalimam_ashar);
                    _tomorrow_maghrib.html(res.tomorrow.jadwalimam_maghrib);
                    _tomorrow_isya.html(res.tomorrow.jadwalimam_isya);

                })
                .fail(function() {})
                .always(function() {});

        }

        const swiper_jumat = new Swiper('#swiper_jumat', {
            autoplay: {
                delay: 15000,
            },
            direction: 'vertical',
            loop: true,
        });

        function fs_jumat() {}

        function fs_general() {}

    });
</script>