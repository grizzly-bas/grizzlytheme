<?php



include_once get_template_directory() . '/installer/class/required-plugins.class.php';
include_once get_template_directory() . '/installer/init-plugins.php';

// SET GFROM LICENSE
if (is_plugin_active( 'gravityforms/gravityforms.php' )){
    define( 'GF_LICENSE_KEY', '10eaf6e3469f1476b263021308803dda' );
}

if(isset($_POST['grizzlyinstall'])) {


    // CREATE DEFAULT PAGES
    include_once get_template_directory() . '/installer/class/post-creator.class.php';
    include_once get_template_directory() . '/installer/init-posts.php';

    // CREATE GFORM FORMS
    include_once get_template_directory() . '/installer/class/gravity-forms.class.php';
    include_once get_template_directory() . '/installer/init-gravityforms.php';

    // SET DEFAULT WORDPRESS SETTINGS
    update_option( 'blogdescription', '' );
    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', 6 );

    // SKIP GEFORM INSTALLER
    update_option( 'gform_pending_installation', 0 );
    update_option( 'gform_enable_background_updates', 0 );
    
    // SET DEFAULT GFORM SETTINGS
    update_option( 'rg_gforms_disable_css', 1 );
    update_option( 'rg_gforms_enable_html5', 1 );
    update_option( 'rg_gforms_captcha_public_key', '6LeVrBUUAAAAAG9tcrjeoMpiQNi7bnpThzfNJfZM' );
    update_option( 'rg_gforms_captcha_private_key', '6LeVrBUUAAAAAO3ZdKfa4Ky64CwB8SER3TZU8JMp' );
    update_option( 'rg_gforms_currency', 'EUR' );

    // SET DEFAULT DIVI UPDATE SETTINGS
    if ( get_option( 'et_automatic_updates_options' ) !== false ) {
        update_option( 'et_automatic_updates_options', 'a:2:{s:8:"username";s:12:"grizzlynmark";s:7:"api_key";s:40:"9c7dcb3a3e2c6a13532e4996944dbbeab49c8026";}' );
    } else {
        add_option( 'et_automatic_updates_options', 'a:2:{s:8:"username";s:12:"grizzlynmark";s:7:"api_key";s:40:"9c7dcb3a3e2c6a13532e4996944dbbeab49c8026";}' );
    }
    
    // SET DEFAULT DIVI SETTINGS
    if ( get_option( 'et_pb_builder_options' ) !== false ) {
        update_option( 'et_pb_builder_options', 'a:13:{i:0;b:0;s:35:"email_provider_credentials_migrated";b:1;s:29:"updates_main_updates_username";s:12:"grizzlynmark";s:28:"updates_main_updates_api_key";s:40:"9c7dcb3a3e2c6a13532e4996944dbbeab49c8026";s:23:"api_main_google_api_key";s:0:"";s:35:"api_main_enqueue_google_maps_script";s:2:"on";s:25:"api_main_use_google_fonts";s:2:"on";s:54:"post_type_integration_main_et_pb_post_type_integration";a:3:{s:4:"post";s:2:"on";s:4:"page";s:2:"on";s:7:"project";s:2:"on";}s:36:"advanced_main_minify_combine_scripts";s:2:"on";s:35:"advanced_main_minify_combine_styles";s:2:"on";s:38:"advanced_main_et_enable_classic_editor";s:2:"on";s:35:"advanced_main_et_pb_static_css_file";s:2:"on";s:39:"advanced_main_et_pb_product_tour_global";s:3:"off";}' );
    } else {
        add_option( 'et_pb_builder_options', 'a:13:{i:0;b:0;s:35:"email_provider_credentials_migrated";b:1;s:29:"updates_main_updates_username";s:12:"grizzlynmark";s:28:"updates_main_updates_api_key";s:40:"9c7dcb3a3e2c6a13532e4996944dbbeab49c8026";s:23:"api_main_google_api_key";s:0:"";s:35:"api_main_enqueue_google_maps_script";s:2:"on";s:25:"api_main_use_google_fonts";s:2:"on";s:54:"post_type_integration_main_et_pb_post_type_integration";a:3:{s:4:"post";s:2:"on";s:4:"page";s:2:"on";s:7:"project";s:2:"on";}s:36:"advanced_main_minify_combine_scripts";s:2:"on";s:35:"advanced_main_minify_combine_styles";s:2:"on";s:38:"advanced_main_et_enable_classic_editor";s:2:"on";s:35:"advanced_main_et_pb_static_css_file";s:2:"on";s:39:"advanced_main_et_pb_product_tour_global";s:3:"off";}' );
    }

    // DELETE DEFAULT POSTS
    wp_delete_post( 1, true );
    wp_delete_post( 2, true );
    wp_delete_post( 3, true );

    // SET DEFAULT YOAST SETTINGS
    $set_yoast = 'a:20:{s:15:"ms_defaults_set";b:0;s:7:"version";s:4:"13.0";s:20:"disableadvanced_meta";b:1;s:19:"onpage_indexability";b:1;s:11:"baiduverify";s:0:"";s:12:"googleverify";s:0:"";s:8:"msverify";s:0:"";s:12:"yandexverify";s:0:"";s:9:"site_type";s:0:"";s:20:"has_multiple_authors";s:0:"";s:16:"environment_type";s:0:"";s:23:"content_analysis_active";b:1;s:23:"keyword_analysis_active";b:1;s:21:"enable_admin_bar_menu";b:1;s:26:"enable_cornerstone_content";b:1;s:18:"enable_xml_sitemap";b:1;s:24:"enable_text_link_counter";b:1;s:22:"show_onboarding_notice";b:1;s:18:"first_activated_on";i:1581588936;s:13:"myyoast-oauth";b:0;}';
    if( get_option('wpseo') !== false ) {
        add_option('wpseo', $set_yoast);
    } else {
        update_option('wpseo', $set_yoast);
    }

    $set_yoast_social = 'a:19:{s:13:"facebook_site";s:0:"";s:13:"instagram_url";s:0:"";s:12:"linkedin_url";s:0:"";s:11:"myspace_url";s:0:"";s:16:"og_default_image";s:0:"";s:19:"og_default_image_id";s:0:"";s:18:"og_frontpage_title";s:0:"";s:17:"og_frontpage_desc";s:0:"";s:18:"og_frontpage_image";s:0:"";s:21:"og_frontpage_image_id";s:0:"";s:9:"opengraph";b:1;s:13:"pinterest_url";s:0:"";s:15:"pinterestverify";s:0:"";s:7:"twitter";b:1;s:12:"twitter_site";s:0:"";s:17:"twitter_card_type";s:19:"summary_large_image";s:11:"youtube_url";s:0:"";s:13:"wikipedia_url";s:0:"";s:10:"fbadminapp";s:0:"";}';
    if( get_option('wpseo_social') !== false ) {
        add_option('wpseo_social', $set_yoast_social);
    } else {
        update_option('wpseo_social', $set_yoast_social);
    }

    // SET THEME TO ACTIVE
    add_option('grizzly_active', true);

}