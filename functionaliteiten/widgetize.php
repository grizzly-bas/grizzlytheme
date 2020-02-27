<?php

/* Register widgetized areas */
function header_widgets_init() {

	// HEADERS
	register_sidebar( array(
		'name'          => 'Header top',
		'id'            => 'widget_header_top',
		'before_widget' => '<div class="header-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="header-widget-title">',
		'after_title'   => '</span>',
    ) );
    
    register_sidebar( array(
		'name'          => 'Header middle',
		'id'            => 'widget_header_middle',
		'before_widget' => '<div class="header-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="header-widget-title">',
		'after_title'   => '</span>',
	) );

	register_sidebar( array(
		'name'          => 'Header bottom',
		'id'            => 'widget_header_bottom',
		'before_widget' => '<div class="header-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="header-widget-title">',
		'after_title'   => '</span>',
	) );


	// FOOTERS
	if(get_option('grizzly_footer-block-1') !== '0') {
		register_sidebar( array(
			'name'          => 'Footer 1/5',
			'id'            => 'widget_footer_1_5',
			'before_widget' => '<div class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<span class="footer-widget-title">',
			'after_title'   => '</span>',
		) );
	}

	if(get_option('grizzly_footer-block-2') !== '0') {
		register_sidebar( array(
			'name'          => 'Footer 2/5',
			'id'            => 'widget_footer_2_5',
			'before_widget' => '<div class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<span class="footer-widget-title">',
			'after_title'   => '</span>',
		) );
	}

	if(get_option('grizzly_footer-block-3') !== '0') {
		register_sidebar( array(
			'name'          => 'Footer 3/5',
			'id'            => 'widget_footer_3_5',
			'before_widget' => '<div class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<span class="footer-widget-title">',
			'after_title'   => '</span>',
		) );
	}

	if(get_option('grizzly_footer-block-4') !== '0') {
		register_sidebar( array(
			'name'          => 'Footer 4/5',
			'id'            => 'widget_footer_4_5',
			'before_widget' => '<div class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<span class="footer-widget-title">',
			'after_title'   => '</span>',
		) );
	}

	if(get_option('grizzly_footer-block-5') !== '0') {
		register_sidebar( array(
			'name'          => 'Footer 5/5',
			'id'            => 'widget_footer_5_5',
			'before_widget' => '<div class="footer-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<span class="footer-widget-title">',
			'after_title'   => '</span>',
		) );
	}
	

	register_sidebar( array(
		'name'          => 'Footer bottom',
		'id'            => 'widget_footer_bottom',
		'before_widget' => '<div class="footer-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<span class="footer-widget-title">',
		'after_title'   => '</span>',
	) );

	if(get_option('grizzly_header-mobile') !== '1') {
		register_sidebar( array(
			'name'          => 'Mobile menu',
			'id'            => 'widget_mobile_menu',
			'before_widget' => '<div class="mobile-menu-item %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<span class="footer-widget-title">',
			'after_title'   => '</span>',
		) );
	}

}
add_action( 'widgets_init', 'header_widgets_init' );




// SPACER WIDGET
class gnm_widget_spacer extends WP_Widget {

    function __construct() {
		$widget_ops = array( 
			'classname' => 'widget_spacer',
			'description' => 'spacer widget'
		);
        parent::__construct('gnm_widget_spacer', __('Grizzly Spacer', 'gnm_widget_domain'), $widget_ops);
    }
    
    public function widget( $args, $instance ) {    
		echo $args['before_widget'];
		echo $args['after_widget'];
    }
}

// LOGO WIDGET
class gnm_widget_logo extends WP_Widget {

    function __construct() {
		$widget_ops = array( 
			'classname' => 'widget_logo',
			'description' => 'logo widget',
		);
        parent::__construct('gnm_widget_logo', __('Grizzly logo', 'gnm_widget_domain'), $widget_ops);
    }
    
    public function widget( $args, $instance ) {        
		echo $args['before_widget']; 

		if ( function_exists( 'the_custom_logo' ) ) {
			if (has_custom_logo()){
				the_custom_logo();
			} else {
                echo 'Stel een logo in';
			}
		}

		echo $args['after_widget'];
    }
}

// COPYRIGHT WIDGET
class gnm_widget_copy extends WP_Widget {

    function __construct() {
		$widget_ops = array( 
			'classname' => 'widget_copy',
			'description' => 'copy widget',
		);
        parent::__construct('gnm_widget_copy', __('Grizzly Copyright', 'gnm_widget_domain'), $widget_ops);
    }
    
    public function widget( $args, $instance ) {        
		echo $args['before_widget'];
		
        echo '&copy;' . date("Y") . ' ' . '<a href="' . get_home_url() . '">' . get_bloginfo() . '</a>';

        echo $args['after_widget'];
    }
}

// SOCIAL WIDGET
class gnm_widget_social extends WP_Widget {

    function __construct() {
		$widget_ops = array( 
			'classname' => 'widget_social',
			'description' => 'social widget',
		);
        parent::__construct('gnm_widget_social', __('Grizzly Social', 'gnm_widget_domain'), $widget_ops);
    }
    
    public function widget( $args, $instance ) {        
		echo $args['before_widget'];        
		
		echo '<a class="social-icon" href="facebook.com"><i class="fab fa-facebook-f"></i> Facebook</a>';
		echo '<a class="social-icon" href="twitter.com"><i class="fab fa-twitter"></i> Twitter</a>';
		echo '<a class="social-icon" href="instagram.com"><i class="fab fa-instagram"></i> Instagram</a>';
		
		echo $args['after_widget'];
    }
}

// EMAIL WIDGET
class gnm_widget_email extends WP_Widget {

    function __construct() {
		$widget_ops = array( 
			'classname' => 'widget_email',
			'description' => 'email widget',
		);
        parent::__construct('gnm_widget_email', __('Grizzly Email', 'gnm_widget_domain'), $widget_ops);
    }
    
    public function widget( $args, $instance ) {        
		echo $args['before_widget'];        
		
		echo '<a class="e-mail-clicks" href="mailto:'.get_option('grizzly_mail').'">'.get_option('grizzly_mail').'</a>';
		
		echo $args['after_widget'];
    }
}

// TELEFOON WIDGET
class gnm_widget_tel extends WP_Widget {

    function __construct() {
		$widget_ops = array( 
			'classname' => 'widget_tel',
			'description' => 'tel widget',
		);
        parent::__construct('gnm_widget_tel', __('Grizzly Telefoon', 'gnm_widget_domain'), $widget_ops);
    }
    
    public function widget( $args, $instance ) {        
		echo $args['before_widget'];
	
        echo '<a class="telefoon-clicks" href="tel:'.get_option('grizzly_tel').'">'.get_option('grizzly_tel').'</a>';

		echo $args['after_widget'];
    }
}

// MOBILE MENU WIDGET
class gnm_widget_mobile_menu extends WP_Widget {

    function __construct() {
		$widget_ops = array( 
			'classname' => 'widget_mobile_menu',
			'description' => 'Grizzly mobiel menu button',
		);
        parent::__construct('gnm_widget_mobile_menu', __('Grizzly mobiel menu', 'gnm_widget_domain'), $widget_ops);
    }
    
    public function widget( $args, $instance ) {
		echo $args['before_widget'];
	
        echo '<div class="mobile-menu-button gm-click" data-id="mobile-menu-content" data-animate="slide"><i class="fa fa-bars" aria-hidden="true"></i><i class="fa fa-times" aria-hidden="true"></i></div>';

		echo $args['after_widget'];
    }
}



// MOBILE button WIDGET
class gnm_widget_mobile_button extends WP_Widget {
	// class constructor
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'widget_mobile_button',
			'description' => 'Grizzly mobiel button',
		);

		parent::__construct( 'widget_mobile_button', 'Grizzly mobiel button', $widget_ops );
	}
	
	// output the widget content on the front-end
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
        echo '<a href="' . $instance['link'] . '">' . $instance['text'] . '</a>';
		echo $args['after_widget'];
	}

	// output the option form field in admin Widgets screen
	public function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'text' => '','link' => '' ) );
		$text = format_to_edit($instance['text']);
		$link = format_to_edit($instance['link']);
		?>
			<br />
			<b>Tekst</b>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" value="<?php echo $text; ?>">
			<br /><br />
			<b>Link</b>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id('link'); ?>" name="<?php echo $this->get_field_name('link'); ?>" value="<?php echo $link; ?>">
			<br /><br />
		<?php
	}

	// save options
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
        if ( current_user_can('unfiltered_html') ) {
			$instance['text'] =  $new_instance['text'];
			$instance['link'] =  $new_instance['link'];
		}
        else {
            $instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
			$instance['link'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['link']) ) ); // wp_filter_post_kses() expects slashed
		}
        return $instance;
	}
}


/* Register widgets */
function gnm_load_widget() {
    register_widget( 'gnm_widget_social' );
    register_widget( 'gnm_widget_spacer' );
    register_widget( 'gnm_widget_logo' );
    register_widget( 'gnm_widget_copy' );
    register_widget( 'gnm_widget_email' );
    register_widget( 'gnm_widget_tel' );
    register_widget( 'gnm_widget_mobile_menu' );
	register_widget( 'gnm_widget_mobile_button' );
}
add_action( 'widgets_init', 'gnm_load_widget' );