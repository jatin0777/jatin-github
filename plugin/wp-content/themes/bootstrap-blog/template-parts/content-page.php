<?php /**  
* The template used for displaying page content in page.php  
*  
* @package Bootstrap Blog  */

?>

<h1 class="page-title"><?php the_title(); ?></h1>

<div class="single-post">
	<div class="post-content">
		
		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>			
			<figure class="feature-image">				
				<?php the_post_thumbnail( 'full' ); ?>
			</figure>			
		<?php endif; ?>
		
		<article>
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'bootstrap-blog' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		</article> <!-- /.end of article -->
	</div>


</div>


<div class="entry-meta">
	<?php edit_post_link( __( 'Edit', 'bootstrap-blog' ), '<span class="edit-link">', '</span>' ); ?>
</div><!-- .entry-meta -->