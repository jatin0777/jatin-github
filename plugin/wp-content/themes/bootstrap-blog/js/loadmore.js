jQuery(function($){
	$('body').on('click', '.loadmore', function() {
 
		var button = $(this);
		var data = {
			'action': 'bootstrap_blog_loadmore',
			'page' : bootstrap_blog_loadmore_params.current_page,
			'cat' : bootstrap_blog_loadmore_params.cat
		};
 
		$.ajax({
			url : bootstrap_blog_loadmore_params.ajaxurl,
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...');
			},
			success : function( data ) {
				if( data ) { 
					$( 'div.blog-list-block' ).append(data);
					button.text( 'More Posts' );
					bootstrap_blog_loadmore_params.current_page++;
 
					if ( bootstrap_blog_loadmore_params.current_page == bootstrap_blog_loadmore_params.max_page ) { 
						button.remove();
					}
				} else {
					button.remove();
				}
			}
		});
	});
});