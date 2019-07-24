<?php 
if( !function_exists('suitbuilder_google_font') ) :
	/**
	* Suitbuilder googgle fonts
	*
	* @since suitbuilder 1.0.0
	* @param null
	* @return $suitbuilder_google_fonts
	*/

	function suitbuilder_google_font(){
		global $suitbuilder_google_fonts;
		$suitbuilder_google_fonts = array(
	    'Open+Sans:400,400italic,600,700'               => 'Open Sans',
	    'Roboto:400,500,300,700,400italic'              => 'Roboto',
	    'Lato:400,300,400italic,900,700'                => 'Lato',
	    'Raleway:400,300,500,600,700,900'               => 'Raleway',
	    'Droid+Sans:400,700'                            => 'Droid Sans',
	    'Ubuntu:400,400italic,500,700'                  => 'Ubuntu',
	    'Droid+Serif:400,400italic,700'                 => 'Droid Serif',
	    'Roboto+Slab:400,300,700'                       => 'Roboto Slab',
	    'Poiret+One'                                    => 'Poiret One',
	    'Noto +Sans:400,400italic,700'                  => 'Noto Sans',
	    'Playfair+Display:400,400italic,700,900'        => 'Playfair Display',
	    'Noto +Serif:400,400italic,700'                 => 'Noto Serif',
	    'Hind:400,300,600,700'                          => 'Hind',
	    'Muli:400,300italic,300'                        => 'Muli',
	    'Libre+Baskerville:400,400italic,700'           => 'Libre Baskerville',
	    'Cuprum:400,400italic'                          => 'Cuprum',
	    'Play:400,700'                                  => 'Play',
	    'Varela+Round'                                  => 'Varela Round',
	    'Pathway+Gothic+One'                            => 'Pathway Gothic One',
	    'Questrial'                                     => 'Questrial',
	    'Russo+One'                                     => 'Russo One',
	    'Cinzel:400,700,900'                            => 'Cinzel',
	    'Fugaz+One'                                     => 'Fugaz One',
	    'Tangerine:400,700'                             => 'Tangerine',
	    'Alex+Brush'                                    => 'Alex Brush',
	    'Fredericka+the+Great'                          => 'Fredericka the Great',
	    'Catamaran:400,600,700'                         => 'Catamaran'
	);

		$suitbuilder_fonts = apply_filters('suitbuilder_fonts_arrya','suitbuilder_google_fonts');
		return $suitbuilder_google_fonts;
	}
endif;