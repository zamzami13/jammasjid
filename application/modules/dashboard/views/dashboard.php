<div class="row clearfix space-y-3 ">

    <div class="space-y-3 col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="grid grid-cols-1 sm:grid-cols-6 gap-3">

            <a target="_blank" href="<?php echo base_url() ?>front" class="cursor-pointer hover:no-underline">
                <div class="flex flex-col border-l-4 border-lime-500 justify-center items-center px-3 py-3 rounded-md shadow-md bg-slate-50">
                    <i class="material-icons text-slate-500">desktop_mac</i>
                    <p class="text-slate-500">Tampilan Depan</p>
                </div>
            </a>


        </div>

        <div>
            <p class="text-slate-500">Jadwal Sholat</p>
            <div>
                <div class="grid grid-cols-2 sm:grid-cols-6 gap-3">

                    <div class="flex flex-col border-l-4 border-emerald-500 justify-center items-center px-3 py-3 rounded-md shadow-md bg-slate-50">
                        <p class="text-2xl text-slate-500 capitalize">terbit</p>
                        <p class="text-3xl text-slate-500"><?php echo substr(jadwal_shalat()['terbit'], 0, 5); ?></p>
                    </div>

                    <div class="flex flex-col border-l-4 border-blue-500 justify-center items-center px-3 py-3 rounded-md shadow-md bg-slate-50">
                        <p class="text-2xl text-slate-500 capitalize">subuh</p>
                        <p class="text-3xl text-slate-500"><?php echo substr(jadwal_shalat()['subuh'], 0, 5); ?></p>
                    </div>

                    <div class="flex flex-col border-l-4 border-yellow-500 justify-center items-center px-3 py-3 rounded-md shadow-md bg-slate-50">
                        <p class="text-2xl text-slate-500 capitalize">dzuhur</p>
                        <p class="text-3xl text-slate-500"><?php echo substr(jadwal_shalat()['dzuhur'], 0, 5); ?></p>
                    </div>

                    <div class="flex flex-col border-l-4 border-indigo-500 justify-center items-center px-3 py-3 rounded-md shadow-md bg-slate-50">
                        <p class="text-2xl text-slate-500 capitalize">ashar</p>
                        <p class="text-3xl text-slate-500"><?php echo substr(jadwal_shalat()['ashar'], 0, 5); ?></p>
                    </div>

                    <div class="flex flex-col border-l-4 border-red-500 justify-center items-center px-3 py-3 rounded-md shadow-md bg-slate-50">
                        <p class="text-2xl text-slate-500 capitalize">maghrib</p>
                        <p class="text-3xl text-slate-500"><?php echo substr(jadwal_shalat()['maghrib'], 0, 5); ?></p>
                    </div>

                    <div class="flex flex-col border-l-4 border-cyan-500 justify-center items-center px-3 py-3 rounded-md shadow-md bg-slate-50">
                        <p class="text-2xl text-slate-500 capitalize">isya</p>
                        <p class="text-3xl text-slate-500"><?php echo substr(jadwal_shalat()['isya'], 0, 5); ?></p>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript" src='<?php echo base_url(); ?>assets/plugins/momentjs/js/moment.min.js'></script>
<script type="text/javascript" src='<?php echo base_url(); ?>assets/plugins/momentjs/js/moment-with-locales.js'></script>
<script type="text/javascript" src='<?php echo base_url(); ?>assets/plugins/momentjs/js/id.js'></script>

<script>
    const log = console.log;

    let jam_display = $('#jam_display')
    let jam_local = $('#jam_local')
    let nlog = $('.nlog')

    const notif = $('.nNotif')

    notif.hide();

    // jam_local.val(moment().format('dddd') + ", ");
    // $('#time').html(moment().format('HH:mm:ss'));

    const checkJam = () => {
        $.ajax({
                url: '<?php echo base_url(); ?>service/jam',
                type: 'get',
                dataType: 'json',
            })
            .done(function(res) {
                jam_display.val(res.jam);
                jam_local.val(moment().add(0, 'seconds').format('YYYY-MM-DD HH:mm:ss'));
            })
            .fail(function(res) {

            })
            .always(function() {});
    }

    setInterval(checkJam, 1000);

    const updateClock = () => {
        $.ajax({
                url: '<?php echo base_url(); ?>service/updateClock',
                type: 'post',
                dataType: 'json',
                data: {
                    jam: moment().add(2, 'seconds').format('YYYY-MM-DD HH:mm:ss')
                }
            })
            .done(function(res) {
                if (res.status) {
                    notif.slideDown('slow')
                    nlog.html('yes')
                }

                notif.slideUp('slow')

            })
            .fail(function(res) {
                nlog.html('no')
            })
            .always(function() {});
    }
</script>