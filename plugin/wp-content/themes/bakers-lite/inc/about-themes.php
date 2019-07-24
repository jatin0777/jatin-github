<?php
//about theme info
add_action( 'admin_menu', 'bakers_lite_abouttheme' );
function bakers_lite_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'bakers-lite'), esc_html__('About Theme', 'bakers-lite'), 'edit_theme_options', 'bakers_lite_guide', 'bakers_lite_mostrar_guide');   
} 
//guidline for about theme
function bakers_lite_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_attr_e('Theme Information', 'bakers-lite'); ?>
		   </div>
          <p><?php esc_attr_e('Bakers Lite is a bakery WordPress theme and can be used for cup cake, pastry, muffin, cookies, chocolate, eateries, cafe, coffee and other food related websites. Cakes mean celebration of birthday, wedding, engagement, anniversary, marriage. Coded with page builder plugins and Gutenberg in mind. Coded with WooCommerce compatible so can sell cake directly online. Parcel, food delivery, caterers, fast food, pizza, cuisine, chef, recipe, drinks, wine, restaurant owners can also use this template. SEO optimized and speed optimized. Fast loading, flexible and simple easy to use. You have option to change color scheme of the template.','bakers-lite'); ?></p>
		  <a href="<?php echo esc_url(BAKERS_LITE_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(BAKERS_LITE_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_attr_e('Live Demo', 'bakers-lite'); ?></a> | 
				<a href="<?php echo esc_url(BAKERS_LITE_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_attr_e('Buy Pro', 'bakers-lite'); ?></a> | 
				<a href="<?php echo esc_url(BAKERS_LITE_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_attr_e('Documentation', 'bakers-lite'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(BAKERS_LITE_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>