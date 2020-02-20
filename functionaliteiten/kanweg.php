<?php
function test_page() {
	add_menu_page( 'Test', 'Test', 'manage_options', 'test', 'test_page_content', get_template_directory_uri()  . '/includes/images/favicon.png', 3 );
}
add_action( 'admin_menu', 'test_page' );

function test_page_content() {
// As you are dealing with plugin settings,
// I assume you are in admin side
add_action( 'admin_enqueue_scripts', 'load_wp_media_files' );
function load_wp_media_files( $page ) {
  // change to the $page where you want to enqueue the script
  if( $page == 'options-general.php' ) {
    // Enqueue WordPress media scripts
    wp_enqueue_media();
    // Enqueue custom script that will interact with wp.media
    
  }
}


$image_id = get_option( 'myprefix_image_id' );
if( intval( $image_id ) > 0 ) {
    // Change with the image size you want to use
    $image = wp_get_attachment_image( $image_id, 'medium', false, array( 'id' => 'myprefix-preview-image' ) );
} else {
    // Some default image
    $image = '<img id="myprefix-preview-image" src="https://some.default.image.jpg" />';
}
?>
 <?php echo $image; ?>
 <input type="hidden" name="myprefix_image_id" id="myprefix_image_id" value="<?php echo esc_attr( $image_id ); ?>" class="regular-text" />
 <input type='button' class="button-primary" value="<?php esc_attr_e( 'Select a image', 'mytextdomain' ); ?>" id="myprefix_media_manager"/>ç



<?php
// Ajax action to refresh the user image
add_action( 'wp_ajax_myprefix_get_image', 'myprefix_get_image'   );
function myprefix_get_image() {
    if(isset($_GET['id']) ){
        $image = wp_get_attachment_image( filter_input( INPUT_GET, 'id', FILTER_VALIDATE_INT ), 'medium', false, array( 'id' => 'myprefix-preview-image' ) );
        $data = array(
            'image'    => $image,
        );
        wp_send_json_success( $data );
    } else {
        wp_send_json_error();
    }
}
?>

<script>
jQuery(document).ready( function($) {

jQuery('input#myprefix_media_manager').click(function(e) {

	   e.preventDefault();
	   var image_frame;
	   if(image_frame){
		   image_frame.open();
	   }
	   // Define image_frame as wp.media object
	   image_frame = wp.media({
					 title: 'Select Media',
					 multiple : false,
					 library : {
						  type : 'image',
					  }
				 });

				 image_frame.on('close',function() {
					// On close, get selections and save to the hidden input
					// plus other AJAX stuff to refresh the image preview
					var selection =  image_frame.state().get('selection');
					var gallery_ids = new Array();
					var my_index = 0;
					selection.each(function(attachment) {
					   gallery_ids[my_index] = attachment['id'];
					   my_index++;
					});
					var ids = gallery_ids.join(",");
					jQuery('input#myprefix_image_id').val(ids);
					Refresh_Image(ids);
				 });

				image_frame.on('open',function() {
				  // On open, get the id from the hidden input
				  // and select the appropiate images in the media manager
				  var selection =  image_frame.state().get('selection');
				  var ids = jQuery('input#myprefix_image_id').val().split(',');
				  ids.forEach(function(id) {
					var attachment = wp.media.attachment(id);
					attachment.fetch();
					selection.add( attachment ? [ attachment ] : [] );
				  });

				});

			  image_frame.open();
});

});

// Ajax request to refresh the image preview
function Refresh_Image(the_id){
  var data = {
	  action: 'myprefix_get_image',
	  id: the_id
  };

  jQuery.get(ajaxurl, data, function(response) {

	  if(response.success === true) {
		  jQuery('#myprefix-preview-image').replaceWith( response.data.image );
	  }
  });
}
</script>

<?php }

