<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Careerpress
 * @since Careerpress 1.0.0
 */

$options = careerpress_get_theme_options();
$class = has_post_thumbnail() ? '' : 'no-post-thumbnail';
$readmore = ! empty( $options['read_more_text'] ) ? $options['read_more_text'] : esc_html__( 'Learn More', 'careerpress' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

    <div class="blog-wrapper">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="featured-image">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ) ?>
                </a>
            </div><!-- .featured-image -->
        <?php endif; ?>

        <div class="entry-container">
            <div class="entry-meta">
                <span class="cat-links">
                    <?php echo careerpress_article_footer_meta(); ?>
                </span><!-- .cat-links -->       
            </div><!-- .entry-meta -->

            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>

            <div class="entry-content">
                <p><?php the_excerpt(); ?></p>
            </div><!-- .entry-content -->

            <div class="more-link">
                <a href="<?php the_permalink(); ?>"><?php echo esc_html( $readmore ); ?></a>
            </div>
        </div><!-- .entry-container -->
    </div>

</article><!-- #post-## -->
