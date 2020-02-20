<?php

define( 'GF_LICENSE_KEY', '10eaf6e3469f1476b263021308803dda' );
update_option( 'rg_gforms_disable_css', 1 );
update_option( 'rg_gforms_enable_html5', 1 );
update_option( 'rg_gforms_captcha_public_key', '6LeVrBUUAAAAAG9tcrjeoMpiQNi7bnpThzfNJfZM' );
update_option( 'rg_gforms_captcha_private_key', '6LeVrBUUAAAAAO3ZdKfa4Ky64CwB8SER3TZU8JMp' );
update_option( 'rg_gforms_currency', 'EUR' );

include_once get_template_directory() . '/installer/class/required-plugins.class.php';
include_once get_template_directory() . '/installer/class/gravity-forms.class.php';
include_once get_template_directory() . '/installer/required-plugins.php';
include_once get_template_directory() . '/installer/gravity-forms.php';

?>