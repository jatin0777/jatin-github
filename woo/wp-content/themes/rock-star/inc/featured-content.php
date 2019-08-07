<?php
/**
 * The template for displaying the Featured Content
 *
 * @package Catch Themes
 * @subpackage Rock Star
 * @since Rock Star 0.3
 */


if ( !function_exists( 'rock_star_featured_content_display' ) ) :
/**
* Add Featured content.
*
* @uses action hook rock_star_before_content.
*
* @since Rock Star 0.3
*/
function rock_star_featured_content_display() {
	//rock_star_flush_transients();
	global $post, $wp_query;

	// get data value from options
	$options        = rock_star_get_theme_options();
	$enable_content = $options['featured_content_option'];
	$content_select = $options['featured_content_type'];
	$layouts       	= $options['featured_content_layout'];

	// Front page displays in Reading Settings
	$page_on_front 	= get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts');
	$classes 		= array();


	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();
	if ( 'entire-site' == $enable_content || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable_content ) ) {
		if ( ( !$output = get_transient( 'rock_star_featured_content' ) ) ) {
			$headline 	 = $options['featured_content_headline'];
			$subheadline = $options['featured_content_subheadline'];

			echo '<!-- refreshing cache -->';

			if ( !empty( $layouts ) ) {
				$classes[] = $layouts ;
			}

			$classes[] = $content_select;

			if ( 'demo-featured-content' == $content_select  ) {
				$headline 		= esc_html__( 'Featured Content', 'rock-star' );
				$subheadline 	= esc_html__( 'Here you can showcase the x number of Featured Content. You can edit this Headline, Subheadline and Feaured Content from "Appearance -> Customize -> Featured Content Options".', 'rock-star' );
			}

			$position = $options['featured_content_position'];

			if ( '1' == $position ) {
				$classes[] = 'border-top' ;
			}

			$output ='
                <section id="featured-content" class="'. esc_attr( implode( ' ', $classes ) ) . '" role="complementary">
				    <div class="wrapper">';
						if ( !empty( $headline ) || !empty( $subheadline ) ) {
							$output .='<div class="featured-heading-wrap">';
								if ( !empty( $headline ) ) {
									$output .='<h2 id="featured-heading" class="section-title">' . wp_kses_post( $headline ) . '</h2>';
								}
								if ( !empty( $subheadline ) ) {
									$output .='<p class="sub-title">' . wp_kses_post( $subheadline ) . '</p>';
								}
							$output .='</div><!-- .featured-heading-wrap -->';
						}

						$output .='
						<div class="featured-content-wrap">';

							// Select content
							if ( 'demo-featured-content' == $content_select ) {
								$output .= rock_star_demo_content( $options );
							}
							elseif ( 'featured-post-content' == $content_select || 'featured-page-content' == $content_select || 'featured-category-content' == $content_select ) {
								$output .= rock_star_post_page_category_content( $options );
							}
							elseif ( 'featured-image-content' == $content_select  ) {
								$output .= rock_star_image_content( $options );
							}

						$output .='
						</div><!-- .featured-content-wrap -->
					</div><!-- .wrapper -->
				</section><!-- #featured-content -->';

			set_transient( 'rock_star_featured_content', $output, 86940 );
		}
		echo $output;
	}
}
endif;


if ( ! function_exists( 'rock_star_featured_content_display_position' ) ) :
	/**
	 * Homepage Featured Content Position
	 *
	 * @action rock_star_content, rock_star_after_secondary
	 *
	 * @since Rock Star 0.3
	 */
	function rock_star_featured_content_display_position() {
		// Getting data from Theme Options
		$options  = rock_star_get_theme_options();
		$position = $options['featured_content_position'];

		if ( !$position ) {
			add_action( 'rock_star_before_content', 'rock_star_featured_content_display', 40 );
		}
		else {
			add_action( 'rock_star_footer', 'rock_star_featured_content_display', 5 );
		}
	}
	endif; // rock_star_featured_content_display_position
add_action( 'rock_star_before_content', 'rock_star_featured_content_display_position', 10 );



if ( ! function_exists( 'rock_star_demo_content' ) ) :
/**
 * This function to display featured posts content
 *
 * @get the data value from customizer options
 *
 * @since Rock Star 0.3
 *
 */
function rock_star_demo_content( $options ) {
	return '
		<article id="featured-post-1" class="hentry post post-demo">
			<figure class="featured-content-image">
				<img class="wp-post-image" src="'.trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/gallery/blog-01-420x280.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a title="Lorem ipsum dolor sit amet" href="#">Lorem ipsum dolor sit amet</a>
					</h2>
				</header>
				<div class="entry-excerpt">
					<p>Nullam dolor ante, iaculis eu euismodnec, lobortis nec tortor. Sed a aliquetrisus. Cras lobortis pharetra sodales.
						<span class="read-more"><a href="#" class="btn btn-transparent">Read More</a></span>
					</p>
				</div><!-- .entry-excerpt -->
			</div><!-- .entry-container -->
		</article>

		<article id="featured-post-2" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img class="wp-post-image" src="'.trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/gallery/blog-02-420x280.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a title="Lorem ipsum dolor sit amet" href="#">Lorem ipsum dolor sit amet</a>
					</h2>
				</header>
				<div class="entry-excerpt">
					<p>Nullam dolor ante, iaculis eu euismodnec, lobortis nec tortor. Sed a aliquetrisus. Cras lobortis pharetra sodales.
						<span class="read-more"><a href="#" class="btn btn-transparent">Read More</a></span>
					</p>
				</div><!-- .entry-excerpt -->
			</div><!-- .entry-container -->
		</article>

		<article id="featured-post-3" class="post hentry post-demo">
			<figure class="featured-content-image">
				<img class="wp-post-image" src="'.trailingslashit( esc_url ( get_template_directory_uri() ) ) . 'images/gallery/blog-03-420x280.jpg" />
			</figure>
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title">
						<a title="Lorem ipsum dolor sit amet" href="#">Lorem ipsum dolor sit amet</a>
					</h2>
				</header>
				<div class="entry-excerpt">
					<p>Nullam dolor ante, iaculis eu euismodnec, lobortis nec tortor. Sed a aliquetrisus. Cras lobortis pharetra sodales.
						<span class="read-more"><a href="#" class="btn btn-transparent">Read More</a></span>
					</p>
				</div><!-- .entry-excerpt -->
			</div><!-- .entry-container -->
		</article>';
}
endif; // rock_star_demo_content


if ( ! function_exists( 'rock_star_post_page_category_content' ) ) :
/**
 * This function to display featured posts/page/content content
 *
 * @param $options: rock_star_theme_options from customizer
 *
 * @since Rock Star 0.3
 */
function rock_star_post_page_category_content( $options ) {
	global $post;
	$quantity     = $options['featured_content_number'];
	$no_of_post   = 0; // for number of posts
	$post_list    = array();// list of valid post/page ids
	$type         = $options['featured_content_type'];
	$more_text    = $options['excerpt_more_text'];
	$show_content = $options['featured_content_show'];
	$output       = '';

	$args = array(
		'post_type'           => 'post',
		'orderby'             => 'post__in',
		'ignore_sticky_posts' => 1 // ignore sticky posts
	);

	//Get valid number of posts
	if ( 'featured-post-content' == $type || 'featured-page-content' == $type  ) {
		for( $i = 1; $i <= $quantity; $i++ ){
			$post_id = '';

			if ( 'featured-post-content' == $type ) {
				$post_id = isset( $options['featured_content_post_' . $i] ) ? $options['featured_content_post_' . $i] : false;
			}
			elseif ( 'featured-page-content' == $type ) {
				$post_id = isset( $options['featured_content_page_' . $i] ) ? $options['featured_content_page_' . $i] : false;
			}

			if ( $post_id && '' != $post_id ) {
				$post_list = array_merge( $post_list, array( $post_id ) );

				$no_of_post++;
			}
		}

		$args['post__in'] = $post_list;

		if ( 'featured-page-content' == $type ) {
			$args['post_type'] = 'page';
		}
	}
	elseif ( 'featured-category-content' == $type ) {
		$no_of_post = $quantity;

		$args['category__in'] = (array) $options['featured_content_select_category'];
	}

	if ( 0 == $no_of_post ) {
		return;
	}

	$args['posts_per_page'] = $no_of_post;

	$loop = new WP_Query( $args );

	$i =0;

	while ( $loop->have_posts()) : $loop->the_post(); $i++;
		$title_attribute = the_title_attribute( array( 'before' => esc_html__( 'Permalink to: ', 'rock-star' ), 'echo' => false ) );

		$excerpt = get_the_excerpt();

		$output .= '
		<article id="featured-post-' . $i . '" class="featured-page-post hentry">';

			$image = '<img class="pngfix wp-post-image" src="'.esc_url( get_template_directory_uri() ).'/images/gallery/no-featured-image-1920x800.jpg" >';

			if ( has_post_thumbnail() ) {
				$image = get_the_post_thumbnail( $post->ID, 'post-thumbnail', array( 'title' => $title_attribute, 'alt' => $title_attribute ) );
			}
			else {
				//Get the first image in page, returns false if there is no image
				$first_image = rock_star_get_first_image( $post->ID, 'post-thumbnail', array( 'title' => $title_attribute, 'alt' => $title_attribute ) );

				//Set value of image as first image if there is an image present in the page
				if ( '' != $first_image ) {
					$image = $first_image;
				}
			}

			$output .= '
			<figure class="featured-content-image">
				<a href="' . esc_url( get_permalink() ) . '" title="' . $title_attribute . '">
				'. $image .'
				</a>
			</figure><!-- .image -->';

			$output .= '
			<div class="entry-container">
				<header class="entry-header">
					<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . the_title( '','', false ) . '</a></h2>
				</header><!-- .entry-header -->';
				if ( 'excerpt' == $show_content ) {
					$output .= '<div class="entry-excerpt"><p>' . $excerpt . '</p></div><!-- .entry-excerpt -->';
				}
				elseif ( 'full-content' == $show_content ) {
					$content = apply_filters( 'the_content', get_the_content() );
					$content = str_replace( ']]>', ']]&gt;', $content );
					$output .= '<div class="entry-content">' . wp_kses_post( $content ) . '</div><!-- .entry-content -->';
				}
			$output .= '
			</div><!-- .entry-container -->
		</article><!-- .featured-post-'. $i .' -->';
	endwhile;

	wp_reset_postdata();

	return $output;
}
endif; // rock_star_post_page_category_content

if ( ! function_exists( 'rock_star_image_content' ) ) :
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
function rock_star_image_content( $options ) {
	$quantity       = $options['featured_content_number'];
	$show_content   = $options['featured_content_show'];

	$output         = '';

	for ( $i = 1; $i <= $quantity; $i++ ) {
		if ( !empty ( $options[ 'featured_content_target_' . $i ] ) ) {
			$target = '_blank';
		} else {
			$target = '_self';
		}

		//Checking Link
		if ( !empty ( $options[ 'featured_content_link_' . $i ] ) ) {
			//support qTranslate plugin
			if ( function_exists( 'qtrans_convertURL' ) ) {
				$link = qtrans_convertURL(  $options[ 'featured_content_link_' . $i ] );
			}
			else {
				$link =  $options[ 'featured_content_link_' . $i ];
			}
		}
		else {
			$link = '#';
		}

		//Checking Title
		if ( !empty ( $options[ 'featured_content_title_'. $i ] ) ) {
			$title =$options[ 'featured_content_title_'. $i ];
		}
		else {
			$title = '';
		}

		//Checking Content
		if ( !empty ( $options[ 'featured_content_content_'. $i ] ) ) {
			$content =$options[ 'featured_content_content_'. $i ];
		}
		else {
			$content = '';
		}

		$output .= '
		<article id="featured-post-'.$i.'" class="image-content hentry">';
			if ( !empty ( $options[ 'featured_content_image_' . $i ] ) ) {
				$output .= '
				<figure class="featured-content-image">
					<a title="' . esc_attr( $title ) . '" href="' . esc_url( $link ) . '" target="' . esc_attr( $target ) . '">
						<img src="'. $options[ 'featured_content_image_' . $i ] .'" class="wp-post-image" alt="' . esc_attr( $title ) . '" title="' . esc_attr( $title ) . '">
					</a>
				</figure>';
			}
			if ( '' != $title  || $content!='' ) {
				$output .= '<div class="entry-container">';

				if ( '' != $title  ) {
					$output .= '
					<header class="entry-header">
						<h2 class="entry-title">
						<a href="' . esc_url( $link ) . '" rel="bookmark" target="' . esc_attr( $target ) . '">' . $title . '</a>
						</h2>
					</header>';
				}
				if ( 'hide-content' != $show_content ) {
					if ( '' != $content )  {
						$output .= '
						<div class="entry-excerpt"><p>
							' . $content . '
						</p></div><!-- .entry-excerpt -->';
					}
				}

				$output .= '</div><!-- .entry-container -->';
			}
		$output .= '
		</article><!-- .featured-post-'.$i.' -->';

	}
	return $output;
}
endif; //rock_star_image_content
