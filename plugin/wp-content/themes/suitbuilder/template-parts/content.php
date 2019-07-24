<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package suitbuilder
 */

global $suitbuilder_customizer_all_values;

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
 <div class="wrapper-grid">

	<div class="entry-content <?php if (!has_post_thumbnail( )) { echo 'non-image';}?>">
		<?php
		$suitbuilder_archive_layout = $suitbuilder_customizer_all_values['suitbuilder-archive-layout'];
		$suitbuilder_archive_image_align = $suitbuilder_customizer_all_values['suitbuilder-archive-image-align']; ?>
		<?php if( 1 == $suitbuilder_customizer_all_values['suitbuilder-latest-blog-enable-title'] ) { ?>
			<h2 class="content-title"><a href="<?php the_permalink();?>"><?php echo get_the_title(); ?></a></h2>
		<?php } ?>
		<?php if( 1 == $suitbuilder_customizer_all_values['suitbuilder-latest-blog-enable-date-author-cat'] ) {  ?>
			<div class="entry-meta">
				<?php suitbuilder_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php } ?>
		<?php 
		if( 'excerpt-only' == $suitbuilder_archive_layout ){ 
			echo wp_trim_excerpt( get_the_excerpt() );

		}
		elseif( 'full-post' == $suitbuilder_archive_layout ){ 
			
			the_content( sprintf(
			/* translators: %s: Name of current post. */
				wp_kses( __( 'Read More %s <span class="meta-nav">&rarr;</span>', 'suitbuilder' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		}
		elseif( 'thumbnail-and-full-post' == $suitbuilder_archive_layout ){
			if (has_post_thumbnail( )) {
				if( 'left' == $suitbuilder_archive_image_align ){
					echo "<div class='image-left post-image'>";
					echo '<a href="'.esc_url(get_permalink()).'">';
					the_post_thumbnail('medium');
				}
				elseif( 'right' == $suitbuilder_archive_image_align ){
					echo "<div class='image-right post-image'>";
					echo '<a href="'.esc_url(get_permalink()).'">';
					the_post_thumbnail('medium');
				}
				else{
					echo "<div class='image-full post-image'>";
					echo '<a href="'.esc_url(get_permalink()).'">';
					the_post_thumbnail('slider-banner-image');
				}
				echo "</a>";
				echo "</div>";/*div end*/ 
			}
				echo "<div class='entry-content-stat'>";
			?> 

			<?php the_content( sprintf(
			/* translators: %s: Name of current post. */
				wp_kses( __( 'Read More %s <span class="meta-nav">&rarr;</span>', 'suitbuilder' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			echo "</div>";
		}
		else{
			if( 1 == $suitbuilder_customizer_all_values['suitbuilder-latest-blog-enable-image'] ) {
				if (has_post_thumbnail( )) {
					if( 'left' == $suitbuilder_archive_image_align ){
						echo "<div class='image-left post-image'>";
						echo '<a href="'.esc_url(get_permalink()).'">';
						the_post_thumbnail('medium');
					}
					elseif( 'right' == $suitbuilder_archive_image_align ){
						echo "<div class='image-right post-image'>";
						echo '<a href="'.esc_url(get_permalink()).'">';
						the_post_thumbnail('medium');
					}
					else{
						echo "<div class='image-full post-image'>";
						echo '<a href="'.esc_url(get_permalink()).'">';
						the_post_thumbnail('slider-banner-image');
					}
					echo "</a>";
					echo "</div>";/*div end*/
				}
			}
				echo "<div class='entry-content-stat'>";
			 ?>
			<header class="entry-header">
				<?php
				if ( is_single() ) {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				} 
				
				?>
			</header><!-- .entry-header -->
			<?php 
				if( 1 == $suitbuilder_customizer_all_values['suitbuilder-latest-blog-enable-excerpt'] ){
					the_excerpt();
				}
			echo "</div>";
		}
		?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'suitbuilder' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	</div>
</article><!-- #post-## -->