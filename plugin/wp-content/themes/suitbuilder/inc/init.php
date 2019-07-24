<?php
/**
 * suitbuilder theme init file
 *
 * @package Suitbuilder themes
 * @subpackage suitbuilder
 * @since Suitbuilder 1.0.0
 */

//header 
require trailingslashit(get_template_directory() ) .'/inc/hooks/header.php';

/**
 * Implement the Custom Header feature.
 */
require trailingslashit(get_template_directory() ) . '/inc/hooks/custom-header.php';

//layout
require trailingslashit(get_template_directory() ) .'/inc/post-meta/layout-meta.php';

//words count
require trailingslashit(get_template_directory() ) .'/inc/function/words-count.php';

//excerpt length
require trailingslashit(get_template_directory() ) .'/inc/hooks/excerpt.php';

//inner header
require trailingslashit(get_template_directory() ) .'/inc/function/inner-head.php';

//image alingment
require trailingslashit(get_template_directory() ) .'/inc/function/single-image-align.php';

//widgets
require trailingslashit(get_template_directory() ) .'/inc/hooks/widgets.php';

//inline styles
require trailingslashit(get_template_directory() ) .'/inc/hooks/inline-style.php';

//footer
require trailingslashit(get_template_directory() ) .'/inc/hooks/footer.php';





