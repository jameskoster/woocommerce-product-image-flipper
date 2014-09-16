jQuery(document).ready(function($){
	jQuery( '.products .pif-has-gallery a:first-child' ).hover( function() {
		jQuery( this ).children( '.wp-post-image' ).removeClass( 'fadeInDown' ).addClass( 'animated fadeOutUp' );
		jQuery( this ).children( '.secondary-image' ).removeClass( 'fadeOutUp' ).addClass( 'animated fadeInDown' );
		// This makes the secondary image the same width as the primary. Use 'height: auto' in your css to retain proportions. This allows the hover feature to work well for responsive layouts.
		jQuery( this ).children( '.secondary-image' ).css({'width': jQuery( this ).children( '.wp-post-image' ).width() + 'px'});
	}, function() {
		jQuery( this ).children( '.wp-post-image' ).removeClass( 'fadeOutUp' ).addClass( 'fadeInDown' );
		jQuery( this ).children( '.secondary-image' ).removeClass( 'fadeInDown' ).addClass( 'fadeOutUp' );
	});
});