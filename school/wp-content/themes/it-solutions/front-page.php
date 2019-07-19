<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package IT Solutions
 */
get_header();?>


    <style>
        .showcase{
            height: 477px;

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
    </style>
    <section class="showcase">
        <div class="container">
            <h1 style="color: darkred;"><?php echo get_theme_mod('showcase_heading','School Management'); ?></h1>
            <p style="color:darkgray;"><?php echo get_theme_mod('showcase_text','Manage Schools,department,and classes')?></p>
            <a href="<?php echo get_theme_mod('btn_url','http://localhost:8080/jatin/school/school/'); ?>" class="btn btn-info btn-lg"><?php echo get_theme_mod('btn_text','Get Started')?></a>
        </div>
    </section>

<?php get_footer(); ?>