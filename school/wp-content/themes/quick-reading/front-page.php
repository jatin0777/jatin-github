<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package writers_blogily
 */

get_header();
?>

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
            <h1 style="color: darkred;"><?php echo get_theme_mod('showcase_heading','School Management'); ?></h1>
            <p style="color:darkgray;"><?php echo get_theme_mod('showcase_text','Manage Schools,department,and classes')?></p>
            <a href="<?php echo get_theme_mod('btn_url','http://localhost:8080/jatin/school/school/'); ?>" class="btn btn-primary btn-lg"><button><?php echo get_theme_mod('btn_text','Get Started')?></button></a>
        </div>
    </section>






<?php
get_footer();
