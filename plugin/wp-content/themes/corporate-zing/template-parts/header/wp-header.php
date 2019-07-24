<?php if(has_header_image()): ?>
	<div class="header-container">
	
		<img src="<?php esc_url(header_image()); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
	
	</div><!-- .header-container -->
<?php endif; ?>