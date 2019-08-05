<?php get_header(); ?>


<!--breadcrumb-->
<div class="main_container light_bg">
<div class="bre_crumb">
<div class="crumb_inner">
<ul>
<li><a href="#">Home</a><span>/</span></li>
<li><?php echo basename(get_permalink()); ?><span>/</span></li>
</ul>

</div>
</div>
</div>
<!--breadcrumb-->

    <div class="row">

        <div class="col-sm-8 blog-main" style="margin: 80px;">

            <?php if(have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="blog-post">
                        <h2 class="blog-post-title">
                                <?php the_title(); ?>
                            </a>
                        </h2>


                        <?php the_content(); ?>
                    </div><!-- /.blog-post -->
                <?php endwhile; ?>
            <?php else : ?>
                <p><?php __('No Page Found') ?></p>
            <?php endif; ?>

        </div><!-- /.blog-main -->


<?php get_footer(); ?>