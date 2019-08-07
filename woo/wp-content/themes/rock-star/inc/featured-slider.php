<?php
/**
 * The template for displaying the Slider
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */

if ( !function_exists( 'rock_star_featured_slider' ) ) :
/**
 * Add slider.
 *
 * @uses action hook rock_star_before_content.
 *
 * @since Rock Star 0.3
 */
function rock_star_featured_slider() {
	global $post, $wp_query;
	//rock_star_flush_transients();
	// get data value from options
	$options             = rock_star_get_theme_options();
	$enable_slider       = $options['featured_slider_option'];
	$sliderselect        = $options['featured_slider_type'];
	$enable_slidersocial = $options['featured_slider_enable_social_icons'];
	$imageloader         = $options['featured_slider_image_loader'];

	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();

	// Front page displays in Reading Settings
	$page_on_front = get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts');

	if ( 'entire-site' == $enable_slider  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable_slider  ) ) {
		if ( ( !$output = get_transient( 'rock_star_featured_slider' ) ) ) {
			echo '<!-- refreshing cache -->';
			if ( $enable_slidersocial ) {
				$sliderclass = "main-slider with-social sections";
			}
			else {
				$sliderclass = "main-slider sections";
			}
			$output = '
				<div class="' . $sliderclass . '">
					<div class="wrapper">
						<div class="cycle-slideshow"
						    data-cycle-log="false"
						    data-cycle-pause-on-hover="true"
						    data-cycle-swipe="true"
						    data-cycle-auto-height=container
						    data-cycle-fx="'. esc_attr( $options['featured_slide_transition_effect'] ) .'"
							data-cycle-speed="'. esc_attr( $options['featured_slide_transition_length'] ) * 1000 .'"
							data-cycle-timeout="'. esc_attr( $options['featured_slide_transition_delay'] ) * 1000 .'"
							data-cycle-loader="'. esc_attr( $imageloader ) .'"
							data-cycle-slides="> article"
							data-cycle-next="#next"
							data-cycle-prev="#prev"
							data-cycle-pager="#pager1"
							>';

							// Select Slider
							if ( 'demo-featured-slider' == $sliderselect  && function_exists( 'rock_star_demo_slider' ) ) {
								$output .=  rock_star_demo_slider( $options );
							}
							elseif ( 'featured-post-slider' == $sliderselect  && function_exists( 'rock_star_post_slider' ) ) {
								$output .=  rock_star_post_slider( $options );
							}
							elseif ( 'featured-page-slider' == $sliderselect  && function_exists( 'rock_star_page_slider' ) ) {
								$output .=  rock_star_page_slider( $options );
							}
							elseif ( 'featured-category-slider' == $sliderselect  && function_exists( 'rock_star_category_slider' ) ) {
								$output .=  rock_star_category_slider( $options );
							}
							elseif ( 'featured-image-slider' == $sliderselect  && function_exists( 'rock_star_image_slider' ) ) {
								$output .=  rock_star_image_slider( $options );
							}

						$output .= '
						</div><!-- .cycle-slideshow -->
                        <div class="controls">
                            <div class="cycle-prev"><a href="#" id="prev"><span class="screen-reader-text">' . esc_html__( 'Previous Slide', 'rock-star' ) . '</span></a></div><!-- .cycle-prev -->
                            <div class="cycle-next"><a href="#" id="next"><span class="screen-reader-text">' . esc_html__( 'Next Slide', 'rock-star' ) . '</span></a></div><!-- .cycle-next -->
                        </div><!-- .controls -->
                        <div id="pager1" class="cycle-pager"></div><!-- .cycle-pager -->';
                    	if ( $enable_slidersocial ) {
							$output .= rock_star_get_social_icons();
						}
					$output .= '
					</div><!-- .wrapper -->
				</div><!-- #feature-slider -->';

			set_transient( 'rock_star_featured_slider', $output, 86940 );
		}
		echo $output;
	}
}
endif;
add_action( 'rock_star_header', 'rock_star_featured_slider', 120 );


if ( ! function_exists( 'rock_star_demo_slider' ) ) :
/**
 * This function to display featured posts slider
 *
 * @get the data value from customizer options
 *
 * @since Rock Star 0.3
 *
 */
function rock_star_demo_slider( $options ) {
	return '
	<article class="post demo-image-1 hentry slides displayblock">
		<figure class="slider-image">
        	<img src="'.esc_url( get_template_directory_uri() ).'/images/gallery/slider-01-1920x1080.jpg" alt="banner-image" class="banner">
        </figure><!-- .slider-image -->
        <div class="entry-container slider-contents slide-one">
            <header class="entry-header">
                <h2 class="entry-title">Rock Star</h2>
            </header>
            <div class="entry-summary slider-btn">
                <a href="#" class="btn btn-transparent">Explore Music</a>
            </div>
        </div><!-- .slider-container -->
   	</article><!-- .slides -->

    <article class="post demo-image-2 hentry slides displaynone">
    	<figure class="slider-image">
        	<img src="'.esc_url( get_template_directory_uri() ).'/images/gallery/slider-02-1920x1080.jpg" alt="banner-image" class="banner">
        </figure><!-- .slider-image -->
        <div class="entry-container slider-contents slide-one">
            <header class="entry-header">
           		<h2 class="entry-title">Music Fest</h2>
            </header>
            <div class="entry-summary slider-btn">
                <a href="#" class="btn btn-transparent">Rock Star</a>
            </div>
        </div><!-- .slider-container -->
    </article><!-- .slides -->';
}
endif; // rock_star_demo_slider


if ( ! function_exists( 'rock_star_post_slider' ) ) :
/**
 * This function to display featured posts slider
 *
 * @param $options: rock_star_theme_options from customizer
 *
 * @since Rock Star 0.3
 */
function rock_star_post_slider( $options ) {
	$quantity	= $options['featured_slide_number'];

	global $post;

    $rock_star_post_slider = '';

   	$number_of_post = 0; 		// for number of posts

	$post_list		= array();	// list of valid post ids

	//Get valid post ids
	for( $i = 1; $i <= $quantity; $i++ ){
		if ( isset ( $options['featured_slider_post_' . $i] ) && $options['featured_slider_post_' . $i] > 0 ){
			$number_of_post++;

			$post_list	=	wp_parse_args( $post_list, array( $options['featured_slider_post_' . $i] ) );
		}

	}

	if ( !empty( $post_list ) && $number_of_post > 0 ) {
        $rock_star_post_slider = '';

    	$loop = new WP_Query( array(
            'posts_per_page' => $number_of_post,
            'post__in'       => $post_list,
            'orderby'        => 'post__in',
            'ignore_sticky_posts' => 1 // ignore sticky posts
        ));

		$i=0;
		while ( $loop->have_posts()) : $loop->the_post(); $i++;

			$title_attribute = the_title_attribute( array( 'before' => esc_html__( 'Permalink to: ', 'rock-star' ), 'echo' => false ) );
			$excerpt = get_the_excerpt();
			if ( $i == 1 ) { $classes = 'post post-'.$post->ID.' hentry slides displayblock'; } else { $classes = 'post post-'.$post->ID.' hentry slides displaynone'; }

			$rock_star_post_slider .= '
			<article class="'.$classes.'">
				<figure class="slider-image">';
					if ( has_post_thumbnail() ) {
						$rock_star_post_slider .= get_the_post_thumbnail( $post->ID, 'rock-star-slider', array( 'title' => $title_attribute, 'alt' => $title_attribute, 'class'	=> 'attached-post-image' ) );
					}
					else {
						//Default value if there is no first image
						$rock_star_image = '<img class="pngfix wp-post-image" src="'.esc_url( get_template_directory_uri() ).'/images/gallery/no-featured-image-1920x800.jpg" >';

						//Get the first image in page, returns false if there is no image
						$rock_star_first_image = rock_star_get_first_image( $post->ID, 'rock-star-slider', array( 'title' => $title_attribute, 'alt' => $title_attribute, 'class' => 'attached-post-image' ) );

						//Set value of image as first image if there is an image present in the page
						if ( '' != $rock_star_first_image ) {
							$rock_star_image =	$rock_star_first_image;
						}

						$rock_star_post_slider .= $rock_star_image;
					}
				$rock_star_post_slider .= '
				</figure><!-- .slider-image -->
				<div class="entry-container slider-contents slide-one">
                    <header class="entry-header">
                        <h2 class="entry-title">><a title="' . $title_attribute . '" href="' . esc_url( get_permalink() ) . '">'.the_title( '<span>','</span>', false ).'</a></h2>
                    </header>
                    ';
	                if ( $excerpt !='') {
						$rock_star_post_slider .= '<div class="entry-summary  slider-btn"><p>'. $excerpt.'</p></div>';
					}
                    $rock_star_post_slider .= '
                </div><!-- .slider-container -->
			</article><!-- .slides -->
				';
		endwhile;

		wp_reset_postdata();

		return $rock_star_post_slider;
	}
}
endif; // rock_star_post_slider


if ( ! function_exists( 'rock_star_page_slider' ) ) :
/**
 * This function to display featured page slider
 *
 * @param $options: rock_star_theme_options from customizer
 *
 * @since Rock Star 0.3
 */
function rock_star_page_slider( $options ) {
	$quantity		= $options['featured_slide_number'];
	$more_link_text	=	$options['excerpt_more_text'];

    global $post;

    $rock_star_page_slider = '';
    $number_of_page 		= 0; 		// for number of pages
	$page_list				= array();	// list of valid page ids

	//Get number of valid pages
	for( $i = 1; $i <= $quantity; $i++ ){
		if ( isset ( $options['featured_slider_page_' . $i] ) && $options['featured_slider_page_' . $i] > 0 ){
			$number_of_page++;

			$page_list	=	wp_parse_args( $page_list, array( $options['featured_slider_page_' . $i] ) );
		}

	}

	if ( !empty( $page_list ) && $number_of_page > 0 ) {
		$loop = new WP_Query( array(
			'posts_per_page'	=> $quantity,
			'post_type'			=> 'page',
			'post__in'			=> $page_list,
			'orderby' 			=> 'post__in'
		));
		$i=0;

		while ( $loop->have_posts()) : $loop->the_post(); $i++;
			$title_attribute = the_title_attribute( array( 'before' => esc_html__( 'Permalink to: ', 'rock-star' ), 'echo' => false ) );
			$excerpt = get_the_excerpt();
			if ( $i == 1 ) { $classes = 'page post-'.$post->ID.' hentry slides displayblock'; } else { $classes = 'page post-'.$post->ID.' hentry slides displaynone'; }
			$rock_star_page_slider .= '
			<article class="'.$classes.'">
				<figure class="slider-image">';
					if ( has_post_thumbnail() ) {
						$rock_star_page_slider .= get_the_post_thumbnail( $post->ID, 'rock-star-slider', array( 'title' => $title_attribute, 'alt' => $title_attribute, 'class'	=> 'attached-page-image' ) );
					}
					else {
						//Default value if there is no first image
						$rock_star_image = '<img class="pngfix wp-post-image" src="'.esc_url( get_template_directory_uri() ).'/images/gallery/no-featured-image-1920x800.jpg" >';

						//Get the first image in page, returns false if there is no image
						$rock_star_first_image = rock_star_get_first_image( $post->ID, 'rock-star-slider', array( 'title' => $title_attribute, 'alt' => $title_attribute, 'class' => 'attached-page-image' ) );

						//Set value of image as first image if there is an image present in the page
						if ( '' != $rock_star_first_image ) {
							$rock_star_image =	$rock_star_first_image;
						}

						$rock_star_page_slider .= $rock_star_image;
					}
				$rock_star_page_slider .= '
				</figure><!-- .slider-image -->
				<div class="entry-container slider-contents slide-one"
                    <header class="entry-header">
                        <h2 class="entry-title"><a title="' . $title_attribute . '" href="' . esc_url( get_permalink() ) . '">'.the_title( '<span>','</span>', false ).'</a></h2>
                        <span class="screen-reader-text">'.rock_star_page_post_meta().'</span>
                    </header>';
	                if ( $excerpt !='') {
						$rock_star_page_slider .= '<div class="entry-summary slider-btn"><p>'. $excerpt.'</p></div>';
					}
                    $rock_star_page_slider .= '
                </div><!-- .entry-container -->
			</article><!-- .slides -->
				';
		endwhile;

		wp_reset_postdata();
  	}
	return $rock_star_page_slider;
}
endif; // rock_star_page_slider


if ( ! function_exists( 'rock_star_category_slider' ) ) :
/**
 * This function to display featured category slider
 *
 * @param $options: rock_star_theme_options from customizer
 *
 * @since Rock Star 0.3
 */
function rock_star_category_slider( $options ) {
    $quantity	= $options['featured_slide_number'];

	global $post;

	$rock_star_category_slider = '';

	$category_list	= (array) $options['featured_slider_select_category'];

	if ( !empty( $category_list ) ) {
		$loop = new WP_Query( array(
			'posts_per_page'		=> $quantity,
			'category__in'			=> $category_list,
			'ignore_sticky_posts' 	=> 1 // ignore sticky posts
		));

		$i=0;

		while ( $loop->have_posts()) : $loop->the_post(); $i++;
			$title_attribute = the_title_attribute( array( 'before' => esc_html__( 'Permalink to: ', 'rock-star' ), 'echo' => false ) );

			$excerpt = get_the_excerpt();

			if ( $i == 1 ) { $classes = 'post post-'.$post->ID.' hentry slides displayblock'; } else { $classes = 'post post-'.$post->ID.' hentry slides displaynone'; }

			$rock_star_category_slider .= '
			<article class="'.$classes.'">
				<figure class="slider-image">';
					if ( has_post_thumbnail() ) {
						$rock_star_category_slider .= '<a title="' . $title_attribute . '" href="' . esc_url( get_permalink() ) . '">
							'. get_the_post_thumbnail( $post->ID, 'rock-star-slider', array( 'title' => $title_attribute, 'alt' => $title_attribute, 'class'	=> 'attached-post-image' ) ).'
						</a>';
					}
					else {
						//Default value if there is no first image
						$rock_star_image = '<img class="pngfix wp-post-image" src="'.esc_url( get_template_directory_uri() ).'/images/gallery/no-featured-image-1920x800.jpg" >';

						//Get the first image in page, returns false if there is no image
						$rock_star_first_image = rock_star_get_first_image( $post->ID, 'rock-star-slider', array( 'title' => $title_attribute, 'alt' => $title_attribute, 'class' => 'attached-post-image' ) );
						//Set value of image as first image if there is an image present in the page
						if ( '' != $rock_star_first_image ) {
							$rock_star_image =	$rock_star_first_image;
						}

						$rock_star_category_slider .= '<a title="' . $title_attribute . '" href="' . esc_url( get_permalink() ) . '">
							'. $rock_star_image .'
						</a>';
					}
				$rock_star_category_slider .= '
				</figure><!-- .slider-image -->
				<div class="entry-container slider-contents slide-one">
                    <header class="entry-header">
                        <h2 class="entry-title"><a title="' . $title_attribute . '" href="' . esc_url( get_permalink() ) . '">'.the_title( '<span>','</span>', false ).'</a></h2>
                        <span class="screen-reader-text">'.rock_star_page_post_meta().'</span>
                    </header>';
	                if ( $excerpt !='') {
						$rock_star_category_slider .= '<div class="entry-summary slider-btn"><p>'. $excerpt.'</p></div>';
					}
                    $rock_star_category_slider .= '
                </div><!-- .slider-contents -->
			</article><!-- .slides -->';
		endwhile;

		wp_reset_postdata();
	}
	return $rock_star_category_slider;
}
endif; // rock_star_category_slider


if ( ! function_exists( 'rock_star_image_slider' ) ) :
/**
 * This function to display featured posts slider
 *
 * @get the data value from theme options
 * @displays on the index
 *
 * @useage Featured Image, Title and Excerpt of Post
 *
 */
function rock_star_image_slider( $options ) {
	$quantity	= $options['featured_slide_number'];
	$more_tag_text = $options['excerpt_more_text'];

	$rock_star_image_slider = '';

	for ( $i = 1; $i <= $quantity; $i++ ) {

		//Adding in Classes for Display block and none
		if ( $i == 1 ) { $classes = 'slider-image images-'.$i.' hentry slides displayblock'; } else { $classes = 'slider-image images-'.$i.' hentry slides displaynone'; }

		//Check Image Not Empty to add in the slides
		if ( !empty ( $options[ 'featured_slider_image_'. $i ] ) ) {

			//Checking Title
			if ( !empty ( $options[ 'featured_title_'. $i ] ) ) {
				$imagetitle = $options[ 'featured_title_'. $i ];
			}
			else {
				$imagetitle = 'Featured Image-'.$i;
			}

			//Checking Link
			if ( !empty ( $options[ 'featured_link_'. $i ] ) ) {
				$link = $options[ 'featured_link_'. $i ];

				//Checking Link Target
				if ( !empty ( $options[ 'featured_target_'. $i ] ) ) {
					$target = '_blank';
				} else {
					$target = '_self';
				}

				//Checking image
				$image = '<img alt="'. esc_attr( $imagetitle ) .'" class="wp-post-image" src="'. esc_url( $options[ 'featured_slider_image_'. $i ] ) .'" />';

			}
			else {
				$link = '';
				$target = '';
				$image = '<img alt="'. esc_attr( $imagetitle ) .'" class="wp-post-image" src="'. esc_url( $options['featured_slider_image_'. $i] ).'" />';
			}

			//Checking Title
			if ( !empty ( $options['featured_title_'. $i] ) ) {
				$content_title = $options['featured_title_'. $i];

				if ( !empty ( $options[ 'featured_link_'. $i ] ) ) {
					$title = '<header class="entry-header">
                        		<h2 class="entry-title"><a title="' . esc_attr( $content_title ) . '" href="' . esc_url( $link ) . '" target="' . esc_attr( $target ) . '"><span>' . esc_attr( $content_title ) . '</span></a></h2></header>';
				}
				else {
					$title = '<header class="entry-header">
                        		<h2 class="entry-title"><span>' . esc_attr( $content_title ) . '</span></h2></header>';
				}

			}
			else {
				$content_title = '';
				$title = '';
			}


			$content = '';
			if ( !empty ( $options['featured_content_'. $i] ) || !empty ( $options[ 'featured_link_'. $i ] ) ) {
				$content .= '<div class="entry-summary slider-btn"><p>';
					if ( !empty ( $options['featured_content_'. $i] ) ) {
						$content .= $options['featured_content_'. $i];
					}
					if ( !empty ( $options['featured_link_'. $i] ) ) {
						$content .= '<span class="read-more"><a class="more-link btn btn-transparent" href="' . esc_url( $link ) . '">' .  $more_tag_text . '</a></span>';
					}
				$content .= '</p></div><!-- .entry-summary -->';
			}



			//Content Opening and Closing
			if ( !empty ( $content_title ) || !empty ( $content ) ) {
				$contentopening = '<div class="entry-container slider-contents slide-one">';
				$contentclosing = '</div>';
			}
			else {
				$contentopening = '';
				$contentclosing = '';
			}

			$rock_star_image_slider .= '
									<article class="image-slides hentry '. $classes .'">
										<figure class="slider-image">' . $image . '</figure>'
										. $contentopening . $title . $content . $contentclosing . '
									</article>';
		}
	}
	return $rock_star_image_slider;
}
endif; //rock_star_image_slider
