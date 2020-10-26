<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://bolint.hu
 * @since      1.0.0
 *
 * @package    Wp_Szechenyi2020_Infoblokk
 * @subpackage Wp_Szechenyi2020_Infoblokk/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Szechenyi2020_Infoblokk
 * @subpackage Wp_Szechenyi2020_Infoblokk/admin
 * @author     Balint Kovacs <balint.kovacs@bolint.hu>
 */
class Wp_Szechenyi2020_Infoblokk_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @param string $plugin_name The name of this plugin.
	 * @param string $version The version of this plugin.
	 *
	 * @since    1.0.0
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-szechenyi2020-infoblokk-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-szechenyi2020-infoblokk-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function add_settings_page() {
		add_options_page( 'Széchenyi 2020 infóblokk', 'Széchenyi 2020 infóblokk', 'manage_options', 'wp-szechenyi2020-infoblokk', 'Wp_Szechenyi2020_Infoblokk_Admin::render_settings_page' );
	}

	public static function render_settings_page() {
		?>
        <h2><?php _e( 'Széchenyi 2020 infóblokk beállítások', 'wp-szechenyi2020-infoblokk' ) ?></h2>
        <form action="options.php" method="post">
			<?php
			settings_fields( 'wp-szechenyi2020-infoblokk_options' );
			do_settings_sections( 'wp-szechenyi2020-infoblokk_options' );
			submit_button(); ?>
        </form>
		<?php
	}

	public static function register_settings() {
		register_setting(
			'wp-szechenyi2020-infoblokk_options',
			'wp-szechenyi2020-infoblokk_settings' );

		add_settings_section(
			'wp-szechenyi2020-infoblokk_position_section',
			__( 'Pozíció', 'wp-szechenyi2020-infoblokk' ),
			'Wp_Szechenyi2020_Infoblokk_Admin::position_section_callback',
			'wp-szechenyi2020-infoblokk_options' );

		add_settings_field(
			'wp-szechenyi2020-infoblokk_position',
			__( 'Helyzete a honlapon', 'wp-szechenyi2020-infoblokk' ),
			'Wp_Szechenyi2020_Infoblokk_Admin::position_render',
			'wp-szechenyi2020-infoblokk_options',
			'wp-szechenyi2020-infoblokk_position_section'
		);

		add_settings_section(
			'wp-szechenyi2020-infoblokk_page_section',
			__( 'Kapcsolódó oldal', 'wp-szechenyi2020-infoblokk' ),
			'Wp_Szechenyi2020_Infoblokk_Admin::page_section_callback',
			'wp-szechenyi2020-infoblokk_options' );

		add_settings_field(
			'wp-szechenyi2020-infoblokk_page_url',
			__( '<label for="wp-szechenyi2020-infoblokk_page_url">Link</label>', 'wp-szechenyi2020-infoblokk' ),
			'Wp_Szechenyi2020_Infoblokk_Admin::page_render',
			'wp-szechenyi2020-infoblokk_options',
			'wp-szechenyi2020-infoblokk_page_section'
		);

		add_settings_field(
			'wp-szechenyi2020-infoblokk_page_target',
			__( '<label for="wp-szechenyi2020-infoblokk_page_target">Új ablakot nyisson?</label>', 'wp-szechenyi2020-infoblokk' ),
			'Wp_Szechenyi2020_Infoblokk_Admin::page_target_render',
			'wp-szechenyi2020-infoblokk_options',
			'wp-szechenyi2020-infoblokk_page_section'
		);
	}

	public static function position_render() {
		$options = get_option( 'wp-szechenyi2020-infoblokk_settings' ); ?>
        <select name='wp-szechenyi2020-infoblokk_settings[wp-szechenyi2020-infoblokk_position]'>
            <option value='1' <?php selected( $options['wp-szechenyi2020-infoblokk_position'], 1 ); ?>>Felül</option>
            <option value='2' <?php selected( $options['wp-szechenyi2020-infoblokk_position'], 2 ); ?>>Alul</option>
        </select>
		<?php
	}

	public static function position_section_callback() {
		echo __( 'Az infóblokk megjelenésének testreszabása', 'wp-szechenyi2020-infoblokk' );
	}

	public static function page_render() {
		$options = get_option( 'wp-szechenyi2020-infoblokk_settings' );
		?>
            <input type="url" name="wp-szechenyi2020-infoblokk_settings[wp-szechenyi2020-infoblokk_page][url]" id="wp-szechenyi2020-infoblokk_page_url" value="<?php echo $options['wp-szechenyi2020-infoblokk_page']['url']; ?>">
		<?php
	}

	public static function page_target_render() {
		$options = get_option( 'wp-szechenyi2020-infoblokk_settings' );
		?>
            <input type="checkbox" name="wp-szechenyi2020-infoblokk_settings[wp-szechenyi2020-infoblokk_page][target]" id="wp-szechenyi2020-infoblokk_page_target" value="1" <?php checked( $options['wp-szechenyi2020-infoblokk_page']['target'], 1 ); ?>>
		<?php
	}

	public static function page_section_callback() {
		_e( 'A Széchenyi 2020 keretében európai uniós támogatással megvalósuló projektet <u>részletező oldal</u> url-je, megnyitásának módja', 'wp-szechenyi2020-infoblokk' );
	}
}
