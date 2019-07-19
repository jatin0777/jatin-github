<?php get_header(); ?>


    <style>
        .showcase{
            height: 500px;
            background-image: url(<?php echo get_theme_mod('showcase_image',get_bloginfo('template_url').'/img/showcase.jpg'); ?>);
            background-repeat: no-repeat;
            background-position: center;
        }
        .showcase .container{
            padding-top: 140px;
            color: white;
            font-family:century gothic;
            font-size:xx-large;
            text-align: center;
        }
        .boxes{
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .box{
            border: 2px solid gray;
            padding: 10px;
        }
    </style>
    <section class="showcase">
        <div class="container">
            <h1 style="color: white;"><?php echo get_theme_mod('showcase_heading','Custom Wordpress bootstrap theme'); ?></h1>
            <p><?php echo get_theme_mod('showcase_text','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore e')?></p>
            <a href="<?php echo get_theme_mod('btn_url','http://test.com'); ?>" class="btn btn-primary btn-lg"><?php echo get_theme_mod('btn_text','Get Started')?></a>
        </div>
    </section>


    <section class="boxes">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="box">
                        <?php if (is_active_sidebar('box1')) : ?>
<?php dynamic_sidebar('box1') ?>
<?php endif; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
    <?php if (is_active_sidebar('box2')) : ?>
        <?php dynamic_sidebar('box2') ?>
    <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
        <?php if (is_active_sidebar('box3')) : ?>
            <?php dynamic_sidebar('box3') ?>
        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>



<?php get_footer(); ?>