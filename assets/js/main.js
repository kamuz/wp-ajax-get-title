jQuery( 'document' ).ready( function( $ ) {
	$( '#get-post-title-by-id' ).submit( function( e ) {
		e.preventDefault();
		let form = $( this );
		$.ajax( {
			type : 'POST', // HTTP method
			url : ajax.ajaxurl, // AJAX handler
			data: form.serialize(), // get all data from form
			beforeSend: function( xhr ) {
				form.find( 'button' ).text( 'Loading...' );
			},
			success: function( data ) {
				$( '#result' ).html( data );
				form.find( 'button' ).text( 'Submit' );
			}
		} );
	} );
} );