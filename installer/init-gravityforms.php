<?php
/** 
 * STANDAARD WAARDES VOOR FORMULIEREN
 * https://gist.github.com/JacobDorman/61929bfdead5c0cec7c7
 * https://docs.gravityforms.com/form-object/
 */ 

add_action( 'admin_head', 'init_ugf' );
/**
 * [init_ugf description]
 *
 * @return [type] [description]
 */
init_ugf();
function init_ugf() {

	$gf_contact_form = array (
		'title' => 'Contactformulier',
		'description' =>  "Contactformulier van Grizzly new Marketing",
		'version' => '2.3-rc-5',
		'id' => '14',
		'button' => 'link',
		'labelPlacement' => 'top',
		'useCurrentUserAsAuthor' => true,
		'postContentTemplateEnabled' => false,
		'postTitleTemplateEnabled' => false,
		'postTitleTemplate' => '',
		'postContentTemplate' => '',
		'lastPageButton' => null,
		'pagination' => null,
		'firstPageCssClass' => null,
		'is_active' => '1',
		'is_trash' => '0',
		'confirmations' => array (
			'5acf8e9cf310a' => array (
				'id' => '5acf8e9cf310a',
				'name' => 'Bedankt pagina',
				'isDefault' => true,
				'type' => 'page',
				'pageId' => '3',
			)
		),
		'notifications' => array (
			'5acf8e9cf2b40' => array (
				'id' => '5acf8e9cf2b40',
				'to' => '{admin_email}',
				'name' => 'Administrator melding',
				'event' => 'form_submission',
				'toType' => 'email',
				'subject' => 'New submission from {form_title}',
				'message' => '{all_fields}'
			)
		),
		'fields' => array (
			array (
				'id' => 1,
				'label' => 'Uw naam',
				'adminLabel' => '',
				'type' => 'text',
				'isRequired' => true,
			),
			array (
				'id' => 2,
				'label' => 'Uw email',
				'adminLabel' => '',
				'type' => 'email',
				'isRequired' => true,
			),
			array (
				'id' => 3,
				'label' => 'Onderwerp',
				'adminLabel' => '',
				'type' => 'text',
				'isRequired' => true,
			),
			array (
				'id' => 4,
				'label' => 'Bericht',
				'adminLabel' => '',
				'type' => 'textarea',
				'isRequired' => true,
			),
		),
		'is_active' => '1',
		'date_created' => date( 'Y-m-d H:i:s' ),
	);
	$ugf = new ProgrammaticallyAddGravityForm();
	$ugf->SetForm( $gf_contact_form );
}
