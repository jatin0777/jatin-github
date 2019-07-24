<?php

$corporate_zingPostsPagesArray = array(
	'select' => __('Select a post/page', 'corporate-zing'),
);

$corporate_zingPostsPagesArgs = array(
	
	// Change these category SLUGS to suit your use.
	'ignore_sticky_posts' => 1,
	'post_type' => array('post', 'page'),
	'orderby' => 'date',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	
);
$corporate_zingPostsPagesQuery = new WP_Query( $corporate_zingPostsPagesArgs );
	
if ( $corporate_zingPostsPagesQuery->have_posts() ) :
							
	while ( $corporate_zingPostsPagesQuery->have_posts() ) : $corporate_zingPostsPagesQuery->the_post();
			
		$corporate_zingPostsPagesId = get_the_ID();
		if(get_the_title() != ''){
				$corporate_zingPostsPagesTitle = get_the_title();
		}else{
				$corporate_zingPostsPagesTitle = get_the_ID();
		}
		$corporate_zingPostsPagesArray[$corporate_zingPostsPagesId] = $corporate_zingPostsPagesTitle;
	   
	endwhile; wp_reset_postdata();
							
endif;

$corporate_zingYesNo = array(
	'select' => __('Select', 'corporate-zing'),
	'yes' => __('Yes', 'corporate-zing'),
	'no' => __('No', 'corporate-zing'),
);

$corporate_zingSliderType = array(
	'select' => __('Select', 'corporate-zing'),
	'header' => __('WP Custom Header', 'corporate-zing'),
	'owl' => __('Owl Slider', 'corporate-zing'),
);

$corporate_zingServiceLayouts = array(
	'select' => __('Select', 'corporate-zing'),
	'one' => __('One', 'corporate-zing'),
	'two' => __('Two', 'corporate-zing'),
);

$corporate_zingAvailableCats = array( 'select' => __('Select', 'corporate-zing') );

$corporate_zing_categories_raw = get_categories( array( 'orderby' => 'name', 'order' => 'ASC', 'hide_empty' => 0, ) );

foreach( $corporate_zing_categories_raw as $corporate_zing_categoryy ){
	
	$corporate_zingAvailableCats[$corporate_zing_categoryy->term_id] = $corporate_zing_categoryy->name;
	
}

$corporate_zingBusinessLayoutType = array( 
	'select' => __('Select', 'corporate-zing'),
	'one' => __('One', 'corporate-zing'),
	'two' => __('Two', 'corporate-zing'),
	'six' => __('Six', 'corporate-zing'),
	'seven' => __('Seven', 'corporate-zing'),
	'nine' => __('Nine', 'corporate-zing'),
	'woo-one' => __('Woocommerce One', 'corporate-zing'),
);
