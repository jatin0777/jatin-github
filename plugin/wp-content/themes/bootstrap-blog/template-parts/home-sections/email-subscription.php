<?php if ( is_active_sidebar( 'email-subscription' ) ) : ?>
	<div class="widget-newsletter spacer">
		<div class="container">
		<?php dynamic_sidebar( 'email-subscription' ); ?>
		</div>
	</div>
<?php endif; ?>