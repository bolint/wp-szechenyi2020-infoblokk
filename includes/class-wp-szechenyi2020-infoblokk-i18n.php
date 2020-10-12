<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://bolint.hu
 * @since      1.0.0
 *
 * @package    Wp_Szechenyi2020_Infoblokk
 * @subpackage Wp_Szechenyi2020_Infoblokk/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Szechenyi2020_Infoblokk
 * @subpackage Wp_Szechenyi2020_Infoblokk/includes
 * @author     Balint Kovacs <balint.kovacs@bolint.hu>
 */
class Wp_Szechenyi2020_Infoblokk_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-szechenyi2020-infoblokk',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
