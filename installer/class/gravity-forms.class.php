<?php

class ProgrammaticallyAddGravityForm {
	private $gf_contact_form = array();
	/**
	 * [setForm description]
	 *
	 * @param [type] $gf_contact_form [description]
	 */
	public function setForm( $gf_contact_form ) {
		$this->gf_contact_form = $gf_contact_form;
		add_action( 'admin_head', array( $this, 'form_create' ), 999 );
	}
	/**
	 * [form_create description]
	 *
	 * @return [type] [description]
	 */
	public function form_create() {
		$forms = RGFormsModel::get_forms( null, 'title' );
		if ( count( $forms ) > 0 ) {
			foreach ( $forms as $form ) {
				if ( $form->title == $this->gf_contact_form['title'] ) {
					$form_exists = true;
				}
			}
		}
		if ( $form_exists != true ) {
			$result = GFAPI::add_form( $this->gf_contact_form );
		}
	}
}