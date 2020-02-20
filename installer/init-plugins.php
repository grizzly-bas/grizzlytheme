<?php
/**
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Grizzly
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

add_action( 'tgmpa_register', 'grizzly_register_required_plugins' );

function grizzly_register_required_plugins() {
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Gravity Forms', // The plugin name.
			'slug'               => 'gravityforms', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/installer/plugins/gravityforms_2.2.1.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		),
		array(
			'name'               => 'Divi builder', // The plugin name.
			'slug'               => 'divi-builder', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/installer/plugins/divi-builder.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		),
		array(
			'name'               => 'Github updater', // The plugin name.
			'slug'               => 'github-updater', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/installer/plugins/github-updater.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		),
		array(
			'name'      => 'Yoast SEO',
			'slug'      => 'wordpress-seo',
            'required'  => true,
            'force_activation'  => false,
        ),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'grizzly',               // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                    // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		'strings'      => array(
			'page_title'                      => __( 'Installeer verplichte plugins', 'grizzly' ),
			'menu_title'                      => __( 'Installeer plugins', 'grizzly' ),
			'installing'                      => __( 'Plugin aan het installeren: %s', 'grizzly' ),
			'updating'                        => __( 'Plugin aan het updaten: %s', 'grizzly' ),
			'oops'                            => __( 'Er is iets fout gegaan.', 'grizzly' ),
			'notice_can_install_required'     => _n_noop(
				'%1$s Is verplicht om gebruik te maken van dit thema.',
				'De volgende plugins zijn verplicht om gebruik te maken van dit thema: %1$s.',
				'grizzly'
			),
			'notice_can_install_recommended'  => _n_noop(
				'%1$s wordt aangeraden om te installeren.',
				'De volgende plugins worden aangeraden te installeren: %1$s.',
				'grizzly'
			),
			'notice_ask_to_update'            => _n_noop(
				'%1$s moet geupdate worden om gebruik te maken van dit thema.',
				'De volgende plugins moeten geupdate worden om gebruik te maken van dit thema: %1$s.',
				'grizzly'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				'%1$s kan geupdate worden.',
				'De volgende plugins kunnen geupdate worden: %1$s.',
				'grizzly'
			),
			'notice_can_activate_required'    => _n_noop(
				'%1$s moet geactiveerd worden om gebruik te maken van dit thema.',
				'De volgende plugins moeten geactiveerd worden om gebruik te maken van dit thema.',
				'grizzly'
			),
			'notice_can_activate_recommended' => _n_noop(
				'%1$s is geinstalleerd maar niet geactiveerd.',
				'De volgende plugins zijn niet geactiveerd maar wel geinstalleerd: %1$s.',
				'grizzly'
			),
			'install_link'                    => _n_noop(
				'Installeer plugin',
				'Installeer plugins',
				'grizzly'
			),
			'update_link' 					  => _n_noop(
				'Update plugin',
				'Update plugins',
				'grizzly'
			),
			'activate_link'                   => _n_noop(
				'Activeer plugin',
				'Activeer plugins',
				'grizzly'
			),
			'return'                          => __( 'Keer terug naar installatie scherm.', 'grizzly' ),
			'plugin_activated'                => __( 'Plugin succesvol geinstalleerd.', 'grizzly' ),
			'activated_successfully'          => __( 'De volgende plugins zijn goed geactiveerd:', 'grizzly' ),
			'plugin_already_active'           => __( '%1$s was al geactiveerd.', 'grizzly' ),
			'plugin_needs_higher_version'     => __( 'Plugin niet geactiveerd. Een update is vereist voor deze plugin.', 'grizzly' ),
			'complete'                        => __( 'Alle plugins succesvol geinstalleerd en geactiveerd. %1$s', 'grizzly' ),
			'dismiss'                         => __( 'Verberg deze melding', 'grizzly' ),
			'notice_cannot_install_activate'  => __( 'Er zijn een of meer plugins die geinstalleerd, geupdate of geactiveerd dienen te worden om gebruik te maken van dit thema.', 'grizzly' ),
			'contact_admin'                   => __( 'Neem contact op met de administrator voor hulp.', 'grizzly' ),

			'nag_type'                        => 'error', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
	);

	tgmpa( $plugins, $config );
}
