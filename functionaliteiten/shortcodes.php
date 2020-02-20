<?php
    function site_title() {
        return __(get_bloginfo( 'name' ),'grizzly');
    }
    add_shortcode('site-title', 'site_title');

    function page_title() {
        return get_the_title();
    }
    add_shortcode('page-title', 'page_title');

    function bedrijfsnaam_data() {
        if (get_grizzly_option('bedrijfsnaam')) {
            return __(get_grizzly_option('bedrijfsnaam'),'grizzly');
        } else {
            return __('<b>Bedrijfsnaam is nog niet ingevuld</b>','grizzly');
        }
    }
    add_shortcode('bedrijfsnaam', 'bedrijfsnaam_data');
    
    function address_data() {
        if (get_grizzly_option('adres')) {
            return __(get_grizzly_option('adres'),'grizzly');
        } else {
            return __('<b>Adres is nog niet ingevuld</b>','grizzly');
        }
    }
    add_shortcode('adres', 'address_data');

    function postal_data() {
        if (get_grizzly_option('postcode')) {
            return __(get_grizzly_option('postcode'),'grizzly');
        } else {
            return __('<b>Postcode is nog niet ingevuld</b>','grizzly');
        }
    }
    add_shortcode('postcode', 'postal_data');

    function place_data() {
        if (get_grizzly_option('woonplaats')) {
            return __(get_grizzly_option('woonplaats'),'grizzly');
        } else {
            return __('<b>Plaats is nog niet ingevuld</b>','grizzly');
        }
    }
    add_shortcode('woonplaats', 'place_data');

    function tel_data( $atts ) {
        $a = shortcode_atts( array(
            'icon' => '',
        ), $atts );

        if (!empty($a['icon'])) {
            return '<a href="tel:' . preg_replace('/[^0-9.]./', '', get_grizzly_option('telefoon')) . '"><i class="' . $a['icon'] . '"></i>' . get_grizzly_option('telefoon') . '</a>';
        }

        else {
            return '<a href="tel:' . preg_replace('/[^0-9.]./', '', get_grizzly_option('telefoon')) . '">' . get_grizzly_option('telefoon') . '</a>';
        }
    }
    add_shortcode('telefoon', 'tel_data');

    function mail_data($atts) {
        $a = shortcode_atts( array(
            'icon' => '',
        ), $atts );

        if (!empty($a['icon'])) {
            return '<a href="mailto:' . get_grizzly_option('email') . '"><i class="' . $a['icon'] . '"></i>' . get_grizzly_option('email') . '</a>';
        }

        else {
            return '<a href="mailto:' . get_grizzly_option('email') . '">' . get_grizzly_option('email') . '</a>';
        }
    }
    add_shortcode('e-mail', 'mail_data');

    function hours_data() {
        if (get_option('grizzly_hours')) {
            return __(stripslashes(get_option('grizzly_hours')),'grizzly');
        } else {
            return __('<b>Openingstijden is nog niet ingevuld</b>','grizzly');
        }
    }
    add_shortcode('openingstijden', 'hours_data');