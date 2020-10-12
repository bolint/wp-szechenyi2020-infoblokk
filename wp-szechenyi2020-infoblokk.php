<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://bolint.hu
 * @since             1.0.0
 * @package           Wp_Szechenyi2020_Infoblokk
 *
 * @wordpress-plugin
 * Plugin Name:       Szechenyi2020 infoblokk
 * Plugin URI:        wp-szechenyi2020-infoblokk
 * Description:       A WordPress plugin which displays the Széchenyi 2020 infoblokk.
 * Version:           1.0.0
 * Author:            Balint Kovacs
 * Author URI:        https://bolint.hu
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-szechenyi2020-infoblokk
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WP_SZECHENYI2020_INFOBLOKK_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-szechenyi2020-infoblokk-activator.php
 */
function activate_wp_szechenyi2020_infoblokk() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-szechenyi2020-infoblokk-activator.php';
	Wp_Szechenyi2020_Infoblokk_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-szechenyi2020-infoblokk-deactivator.php
 */
function deactivate_wp_szechenyi2020_infoblokk() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-szechenyi2020-infoblokk-deactivator.php';
	Wp_Szechenyi2020_Infoblokk_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_szechenyi2020_infoblokk' );
register_deactivation_hook( __FILE__, 'deactivate_wp_szechenyi2020_infoblokk' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-szechenyi2020-infoblokk.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_szechenyi2020_infoblokk() {

	$plugin = new Wp_Szechenyi2020_Infoblokk();
	$plugin->run();

}
run_wp_szechenyi2020_infoblokk();
