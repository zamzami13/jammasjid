<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<div class="overlay"></div>

<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header w-full">
            <!-- <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a> -->
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="javascript:;">Jam Masjid</a>
            <div class="flex flex-col pt-3 justify-center items-center pull-right">
                <a href="<?php echo base_url(); ?>auth/logout" class="px-3 py-2 text-white rounded-md bg-slate-700 hover:text-slate-50">Keluar</a>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
        </div>
    </div>
</nav>

<section>
    <aside id="leftsidebar" class="sidebar">
        <div class="menu">
            <ul class="list">
                <li>
                    <a class="menu_dashboard" href="<?php echo base_url(); ?>dashboard">
                        <i class="material-icons col-green">desktop_windows</i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a class="menu_user" href="<?php echo base_url(); ?>master/user">
                        <i class="material-icons col-green">account_circle</i>
                        <span>User</span>
                    </a>
                </li>

                <li>
                    <a class="menu_konten" href="<?php echo base_url(); ?>konten">
                        <i class="material-icons col-green">description</i>
                        <span>Konten</span>
                    </a>
                </li>

                <li>
                    <a class="menu_sholat_jumat" href="<?php echo base_url(); ?>petugas/shalat-jumat">
                        <i class="material-icons col-green">group</i>
                        <span>Petugas Sholat Jumat</span>
                    </a>
                </li>

                <li>
                    <a class="menu_imam" href="<?php echo base_url(); ?>jadwal-imam-shalat">
                        <i class="material-icons col-green">account_circle</i>
                        <span>Jadwal Imam Sholat</span>
                    </a>
                </li>


                <li>
                    <a class="menu_kajian" href="<?php echo base_url(); ?>jadwal/kajian">
                        <i class="material-icons col-green">mic_none</i>
                        <span>Jadwal Kajian</span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons col-green">settings_applications</i>
                        <span>Pengaturan</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>pengaturan/masjid">Masjid</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>pengaturan/waktu-shalat">Waktu Sholat</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>pengaturan/perwaktu-shalat">Penyesuaian Waktu</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>pengaturan/background/picture">Background</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>pengaturan/tema">Tema</a>
                        </li>

                        <li>
                            <a href="<?php echo base_url(); ?>pengaturan/font">Font</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="menu_about" href="<?php echo base_url(); ?>about">
                        <i class="material-icons col-green">update</i>
                        <span>About</span>
                    </a>
                </li>

            </ul>
        </div>
    </aside>
</section>