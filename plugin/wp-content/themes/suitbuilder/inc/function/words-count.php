<?php
/**
* Returns word count of the sentences.
*
* @since suitbuilder 1.0.0
*/
if ( ! function_exists( 'suitbuilder_words_count' ) ) :
	function suitbuilder_words_count( $length = 25, $suitbuilder_content = null ) {
		$length = absint( $length );
		$more = esc_html__( '&hellip;','suitbuilder' );
		$source_content = preg_replace( '`\[[^\]]*\]`', '', $suitbuilder_content );
		$trimmed_content = wp_trim_words( $source_content, $length, $more );
		return $trimmed_content;
	}
endif;