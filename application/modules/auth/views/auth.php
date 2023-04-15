<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>

    <link href="<?php echo base_url(); ?>assets/font/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>assets/adminbsb/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url(); ?>assets/adminbsb/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url(); ?>assets/adminbsb/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url(); ?>assets/adminbsb/css/style.min.css" rel="stylesheet">

    <style>
        .login-page {
            background-color: #263238;
            padding-left: 0;
            max-width: 360px;
            margin: 5% auto;
            overflow-x: hidden;
        }
    </style>

</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">
                <strong style="color: #f6f7f8;"><?php echo app_masjid()->masjid_nama; ?></strong>
            </a>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" class="" action="<?php echo $fullurl; ?>/action_login/?next=<?php echo @$get_next; ?>" method="post" novalidate="novalidate">
                    <!-- <div class="msg">Sign in to start your session</div> -->
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="uid" placeholder="Username / UID" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-key"></i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-center col-md-12">
                            <button class="text-center btn btn-lg bg-green waves-effect" type="submit">Masuk</button>
                        </div>
                    </div>
                </form>

                <div class="row fSystem">
                    <div class="col-md-12">
                        <p class="text-center grey-text" style="padding-bottom: 10px;">Lihat jadwal Shalat?
                            <a target="_blank" href="<?php echo base_url() ?>front" class="blue-text">Klik di sini</a>
                        </p>
                        <div class="text-center pull-left">
                            <a type="button" data-url="<?php echo base_url(); ?>publik/action" style="margin-bottom:5px;" data-tipe="shutdown" class="system btn btn-circle-lg bg-red waves-effect">
                                <i class="fa fa-power-off"></i>
                            </a>
                            <p class="grey-text"> Shutdown </p>
                        </div>
                        <div class="text-center pull-right">
                            <a type="button" data-url="<?php echo base_url(); ?>publik/action" style="margin-bottom:5px;" data-tipe="restart" class="system btn btn-circle-lg bg-blue-grey waves-effect">
                                <i class="fa fa-repeat"></i>
                            </a>
                            <p class="grey-text"> Restart </p>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-md-12">
                            <p class="text-center grey-text" style="padding-bottom: 10px;">
                                &copy 2018 <?php echo (date("Y") == "2018") ? "" : " - " . date("Y"); ?><a href="https://digitalbee.id"> DIGITALBEE.ID</a>
                            </p>
                            <div class="text-center"><?php echo get_versi(); ?></div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url(); ?>assets/adminbsb/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery.form.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminbsb/plugins/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminbsb/plugins/node-waves/waves.js"></script>


    <script type="text/javascript">
        // new WOW().init();

        $('form').ajaxForm({
            success: function(res) {
                if (res.status == 1) {
                    toastr.success(res.message, 'Success', {
                        timeOut: 1500
                    })
                    setInterval(function() {
                        redirect(res.redirect);
                    }, 1500);

                } else {
                    toastr.error(res.message);
                }
            }
        });

        function redirect(url) {
            window.location.href = decodeURIComponent(url);
        }

        $(".fSystem").on('click', '.system', function(event) {
            event.preventDefault();

            var tipe = $(this).attr('data-tipe');
            var url = $(this).attr('data-url');

            if (tipe == 'shutdown') {
                var title = "Yakin matikan komputer?";
            } else {
                var title = "Yakin mulai ulang komputer?";
            }

            const swalWithBootstrapButtons = swal.mixin({
                confirmButtonClass: 'btn btn-mdb-color',
                cancelButtonClass: 'btn btn-light',
                buttonsStyling: false,
            })

            swalWithBootstrapButtons({
                title: title,
                html: '',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                            url: url,
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                tipe: tipe
                            },
                        })
                        .done(function(res) {
                            if (res.status == 1) {
                                // toastr.success(res.message, 'Success', {timeOut: 2000})
                            } else {
                                toastr.error(res.message, 'Error', {
                                    timeOut: 2000
                                })
                            }
                        })
                        .fail(function(res) {
                            toastr.error(res.message, 'Error', {
                                timeOut: 2000
                            })
                        })
                        .always(function() {});
                }
            })
        });
    </script>



</body>

</html>