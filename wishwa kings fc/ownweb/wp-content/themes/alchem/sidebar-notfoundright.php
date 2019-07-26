<?php
	$sidebar = esc_attr(alchem_option('right_sidebar_404'));
	 if ( $sidebar && is_active_sidebar( $sidebar ) ){
	 dynamic_sidebar( $sidebar );
	 }
	 elseif( is_active_sidebar( 'default_sidebar' ) ) {
	    dynamic_sidebar('default_sidebar');
	 }