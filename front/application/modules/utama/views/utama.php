<div id="swiper_konten" class="swiper">
    <div class="content-data swiper-wrapper">
        <?php foreach ($data as $key => $value) { ?>
            <div class="slide swiper-slide">
                <?php if (@$value['konten_arab'] != "" or @$value['konten_arab'] != null) : ?>
                    <h1><?php echo @$value['konten_arab']; ?></h1>
                <?php endif; ?>
                <p class="content-text"><?php echo $value['konten_teks']; ?></p>
            </div>
        <?php } ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        const swiper_konten = new Swiper('#swiper_konten', {
            autoplay: {
                delay: 15000,
            },
            loop: true,
        });

        // $("#owl-conten").owlCarousel({
        //     items: 1,
        //     loop: true,
        //     autoplay: true,
        //     autoplayTimeout: 15000,
        //     margin: 90,
        // });
    });
</script>