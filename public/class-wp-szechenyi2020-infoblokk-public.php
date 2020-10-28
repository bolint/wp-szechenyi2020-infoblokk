<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://bolint.hu
 * @since      1.0.0
 *
 * @package    Wp_Szechenyi2020_Infoblokk
 * @subpackage Wp_Szechenyi2020_Infoblokk/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_Szechenyi2020_Infoblokk
 * @subpackage Wp_Szechenyi2020_Infoblokk/public
 * @author     Balint Kovacs <balint.kovacs@bolint.hu>
 */
class Wp_Szechenyi2020_Infoblokk_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Szechenyi2020_Infoblokk_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Szechenyi2020_Infoblokk_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-szechenyi2020-infoblokk-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Display the "infoblokk" on frontend
	 *
	 * @since    1.0.0
	 */
	public function render () {
		$options = get_option( 'wp-szechenyi2020-infoblokk_settings' );

		$image_id = $options['wp-szechenyi2020-infoblokk_image_id'];
		if (!$image_id) {
			/*
			 * Nothing to display
			 */
			return;
		}

		$height = intval($options['wp-szechenyi2020-infoblokk_image_height']) >= 150 ?: 150;
		$image = wp_get_attachment_image( $options['wp-szechenyi2020-infoblokk_image_id'], array('auto', $height) );

		/*
		 * Specify position to display
		 * default: top
		 */
		$placement = 'top';
		if ('2' === $options['wp-szechenyi2020-infoblokk_position']) {
			$placement = 'bottom';
		}

		$url = $options['wp-szechenyi2020-infoblokk_page']['url'];
		if (!$url) {
			/*
			 * No url specified for the image
			 */
			printf('<span class="wp-szechenyi2020-infoblokk" data-placement="%s">%s</span>', $placement, $image);
			return;
		}

		/*
		 * Link will be opened in a new tab/window or not
		 */
		$target = '';
		if ($options['wp-szechenyi2020-infoblokk_page']['target']) {
		    $target = 'target="_blank"';
		}

		/*
		 * Render the image with link
		 */
		printf('<a class="wp-szechenyi2020-infoblokk" data-placement="%s" href="%s" %s>%s</a>', $placement, $url, $target, $image);
	}
}
