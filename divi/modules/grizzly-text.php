<?php

class GM_Text extends ET_Builder_Module {
	public $slug       = 'gm_text';
	public $vb_support = 'on';
	public function init() {
		$this->name = esc_html__( 'Text', 'gm' );
	}
	public function render( $unprocessed_props, $content = null, $render_slug ) {
        print_r($unprocessed_props);
		return sprintf(
			'<p>%1$s</p>',
			$this->props['content']
		);
	}
	public function get_advanced_fields_config() {
		return array(
			'background' => array(
				'use_background_color_gradient' => false,
				'use_background_video' => false,
				'settings' => array(
					'disable_toggle' => false,
				),
				'css' => array(
					'important' => false,
				),
			),
			'box_shadow' 		=> false,
			'css' 				=> false,
			'button' 			=> false,
			'filters' 			=> false,
			'fonts' 			=> false,
			'margin_padding' 	=> false,
			'max_width' 		=> false,
		);
	}
	public function get_custom_css_fields_config() {
		return array(
			'content' => array(
				'label'    => esc_html__( 'Content', 'simp-simple' ),
				'selector' => '%%order_class%% p',
			),
			'heading' => array(
				'label'    => esc_html__( 'Heading', 'simp-simple' ),
				'selector' => '%%order_class%% h1',
			),
		);
	}
}
new GM_Text;