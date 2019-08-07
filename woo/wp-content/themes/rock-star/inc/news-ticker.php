<?php
/**
 * The template for displaying the News Ticker
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */

if ( !function_exists( 'rock_star_news_ticker_display' ) ) :
/**
* Add News Ticker
*
* @uses action hook rock_star_before_content.
*
* @since Rock Star 0.3
*/
function rock_star_news_ticker_display() {
	//rock_star_flush_transients();
	global $post, $wp_query;

	// get data value from options
	$options 		= rock_star_get_theme_options();
	$enablecontent 	= $options['news_ticker_option'];
	$contentselect 	= $options['news_ticker_type'];

	// Front page displays in Reading Settings
	$page_on_front 	= get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts');


	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();
	if ( 'entire-site' == $enablecontent  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enablecontent  ) ) {
		if ( ( !$news_ticker = get_transient( 'rock_star_news_ticker' ) ) ) {

			$headline = $options['news_ticker_label'];

			echo '<!-- refreshing cache -->';


			if ( 'demo-news-ticker' == $contentselect  ) {
				$headline 		= esc_html__( 'The Latest News', 'rock-star' );
			}

			$news_ticker ='
				<div id="news-ticker" class="' . esc_attr( $contentselect ) . '">
					<div class="wrapper">';
						if ( !empty( $headline ) ) {
							$news_ticker .='<h2 class="news-ticker-label">' . wp_kses_post( $headline ) . '</h2>';
						}
						$news_ticker .='

						<div class="new-ticket-content">
							<div class="news-ticker-slider cycle-slideshow"
							    data-cycle-log="false"
							    data-cycle-pause-on-hover="true"
							    data-cycle-swipe="true"
							    data-cycle-auto-height=container
								data-cycle-slides="> h2"
								data-cycle-fx="'. esc_attr( $options['news_ticker_transition_effect'] ) .'"
								>';

								// Select content
								if ( 'demo-news-ticker' == $contentselect  && function_exists( 'rock_star_demo_ticker' ) ) {
									$news_ticker .= rock_star_demo_ticker( $options );
								}
								elseif ( 'post-news-ticker' == $contentselect  && function_exists( 'rock_star_post_ticker' ) ) {
									$news_ticker .= rock_star_post_ticker( $options );
								}
								elseif ( 'page-news-ticker' == $contentselect  && function_exists( 'rock_star_page_ticker' ) ) {
									$news_ticker .= rock_star_page_ticker( $options );
								}
								elseif ( 'category-news-ticker' == $contentselect  && function_exists( 'rock_star_category_ticker' ) ) {
									$news_ticker .= rock_star_category_ticker( $options );
								}
								elseif ( 'text-news-ticker' == $contentselect  && function_exists( 'rock_star_text_ticker' ) ) {
									$news_ticker .= rock_star_text_ticker( $options );
								}

				$news_ticker .='
							</div><!-- .news-ticker-slider -->
						</div><!-- .new-ticket-content -->
					</div><!-- .wrapper -->
				</div><!-- #news-ticker -->';
			set_transient( 'rock_star_news_ticker', $news_ticker, 86940 );

		}

		echo $news_ticker;
	}
}
endif;


if ( ! function_exists( 'rock_star_news_ticker_display_position' ) ) :
/**
 * Homepage Featured Content Position
 *
 * @action rock_star_content, rock_star_after_secondary
 *
 * @since Rock Star 0.3
 */
function rock_star_news_ticker_display_position() {
	// Getting data from Theme Options
	$options 		= rock_star_get_theme_options();

	$news_ticker_position = $options['news_ticker_position'];

	if ( 'below-menu' == $news_ticker_position ) {
		add_action( 'rock_star_header', 'rock_star_news_ticker_display', 150 );
	} else {
		add_action( 'rock_star_before_content', 'rock_star_news_ticker_display', 50 );
	}

}
endif; // rock_star_news_ticker_display_position
add_action( 'rock_star_before', 'rock_star_news_ticker_display_position' );


if ( ! function_exists( 'rock_star_demo_ticker' ) ) :
/**
 * This function to display featured posts content
 *
 * @get the data value from customizer options
 *
 * @since Rock Star 0.3
 *
 */
function rock_star_demo_ticker( $options ) {
	return '<h2 class="news-ticker-title displayblock">
				<a href="#">
					Solar plane lands in Arizona on latest leg of around the world flight.
				</a>
			</h2>
			<h2 class="news-ticker-title displaynone">
				<a href="#">
					Murray Beats Nadal To Move Into Madrid Final
				</a>
			</h2>
			<h2 class="news-ticker-title displaynone">
				<a href="#">
					Baby Rescued From Rubble Nearly Four Days After Kenya Building Collapse
				</a>
			</h2>
			<h2 class="news-ticker-title displaynone">
				<a href="#">
					Six of the Greatest Legends in Rock History to Gather for 3-Day Concert in October
				</a>
			</h2>';
}
endif; // rock_star_demo_content


if ( ! function_exists( 'rock_star_post_ticker' ) ) :
/**
 * This function to display featured posts content
 *
 * @param $options: rock_star_theme_options from customizer
 *
 * @since Rock Star 0.3
 */
function rock_star_post_ticker( $options ) {
	global $post;

	$quantity 		= $options['news_ticker_number'];

	$number_of_post = 0; 		// for number of posts

	$post_list		= array();	// list of valid post ids

	$post_content = '';

	//Get valid number of posts
	for( $i = 1; $i <= $quantity; $i++ ){
		if ( isset ( $options['news_ticker_post_' . $i] ) && $options['news_ticker_post_' . $i] > 0 ){
			$number_of_post++;

			$post_list	=	wp_parse_args( $post_list, array( $options['news_ticker_post_' . $i] ) );
		}

	}

	if ( !empty( $post_list ) && $number_of_post > 0 ) {
		$loop = new WP_Query( array(
                    'posts_per_page' => $number_of_post,
                    'post__in'       => $post_list,
                    'orderby'        => 'post__in',
                    'ignore_sticky_posts' => 1 // ignore sticky posts
                ));

		$i=0;
		while ( $loop->have_posts()) : $loop->the_post();
			if ( $i == 1 ) { $classes = 'post post-'.$post->ID.' news-ticker-title displayblock'; } else { $classes = 'post post-'.$post->ID.' news-ticker-title displaynone'; }
			$post_content .= '
			<h2 class="'.$classes.'">
				<a href="'. esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>
			</h2>';
		endwhile;

		wp_reset_postdata();
	}

	return $post_content;
}
endif; // rock_star_post_content


if ( ! function_exists( 'rock_star_page_ticker' ) ) :
/**
 * This function to display featured page content
 *
 * @param $options: rock_star_theme_options from customizer
 *
 * @since Rock Star 0.3
 */
function rock_star_page_ticker( $options ) {
	global $post;

	$quantity 		= $options['news_ticker_number'];

	$more_link_text	= $options['excerpt_more_text'];

	$show_content	= $options['news_ticker_show'];

	$number_of_page = 0; 		// for number of pages

	$page_list		= array();	// list of valid pages ids

	$page_ticker 	= '';

	//Get valid pages
	for( $i = 1; $i <= $quantity; $i++ ){
		if ( isset ( $options['news_ticker_page_' . $i] ) && $options['news_ticker_page_' . $i] > 0 ){
			$number_of_page++;

			$page_list	=	wp_parse_args( $page_list, array( $options['news_ticker_page_' . $i] ) );
		}

	}
	if ( !empty( $page_list ) && $number_of_page > 0 ) {
		$loop = new WP_Query( array(
                    'posts_per_page' 		=> $number_of_page,
                    'post__in'       		=> $page_list,
                    'orderby'        		=> 'post__in',
                    'post_type'				=> 'page',
                ));

		$i=0;
		while ( $loop->have_posts()) : $loop->the_post();
			if ( $i == 1 ) { $classes = 'page post-'.$post->ID.' news-ticker-title displayblock'; } else { $classes = 'page post-'.$post->ID.' news-ticker-title displaynone'; }
			$page_ticker .= '
			<h2 class="'.$classes.'">
				<a href="'. esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>
			</h2>';
		endwhile;

		wp_reset_postdata();
	}

	return $page_ticker;
}
endif; // rock_star_page_ticker


if ( ! function_exists( 'rock_star_category_ticker' ) ) :
/**
 * This function to display featured category content
 *
 * @param $options: rock_star_theme_options from customizer
 *
 * @since Rock Star 0.3
 */
function rock_star_category_ticker( $options ) {
	global $post;

	$quantity 		= $options['news_ticker_number'];

	$more_link_text	= $options['excerpt_more_text'];

	$category_list	= (array) $options['news_ticker_select_category'];

	$show_content	= $options['news_ticker_show'];

	$category_ticker = '';

	$loop = new WP_Query( array(
		'posts_per_page'		=> $quantity,
		'category__in'			=> $category_list,
		'ignore_sticky_posts' 	=> 1 // ignore sticky posts
	));

	$i=0;
	while ( $loop->have_posts()) : $loop->the_post();
		if ( $i == 1 ) { $classes = 'post post-'.$post->ID.' news-ticker-title displayblock'; } else { $classes = 'post post-'.$post->ID.' news-ticker-title displaynone'; }
		$category_ticker .= '
		<h2 class="'.$classes.'">
			<a href="'. esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>
		</h2>';
	endwhile;

	wp_reset_postdata();
	return $category_ticker;
}
endif; // rock_star_category_ticker


if ( ! function_exists( 'rock_star_text_ticker' ) ) :
/**
 * This function to display featured posts content
 *
 * @get the data value from theme options
 * @displays on the index
 *
 * @useage Featured Image, Title and Excerpt of Post
 *
 * @uses set_transient
 *
 * @since Rock Star 0.3
 */
function rock_star_text_ticker( $options ) {
	$quantity 		= $options['news_ticker_number'];

	$more_link_text	= $options['excerpt_more_text'];

	$show_content	= $options['news_ticker_show'];

	$text_ticker = '';

	for ( $i = 1; $i <= $quantity; $i++ ) {

		//Adding in Classes for Display block and none
		if ( $i == 1 ) { $classes = 'new-ticker-text text-'. $i .' news-ticker-title displayblock'; } else { $classes = 'new-ticker-text text-'.  $i .' news-ticker-title displaynone'; }

		$title = isset( $options[ 'news_ticker_title_'. $i ] ) ? $options[ 'news_ticker_title_'. $i ] : '';

		if ( empty( $title ) ) {
			//break loop if title is empty
			break;
		}

		if ( !empty ( $options[ 'news_ticker_target_' . $i ] ) ) {
			$target = '_blank';
		} else {
			$target = '_self';
		}

		//Checking Link
		if ( !empty ( $options[ 'news_ticker_link_' . $i ] ) ) {
			//support qTranslate plugin
			if ( function_exists( 'qtrans_convertURL' ) ) {
				$link = qtrans_convertURL(  $options[ 'news_ticker_link_' . $i ] );
			}
			else {
				$link =  $options[ 'news_ticker_link_' . $i ];
			}
		}
		else {
			$link = '#';
		}

		$text_ticker .= '
		<h2 class="'.$classes.'">
			<a href="'. esc_url( $link ) . '">' . esc_html( $title ) . '</a>
		</h2>';
	}
	return $text_ticker;
}
endif; //rock_star_text_ticker
