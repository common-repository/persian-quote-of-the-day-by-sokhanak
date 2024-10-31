<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://sokhanak.com
 * @since      1.0.0
 *
 * @package    Sokhanak
 * @subpackage Sokhanak/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Sokhanak
 * @subpackage Sokhanak/admin
 * @author     Sajjad Salemi <info@sokhanak.com>
 */
class Sokhanak_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->add_hooks();
		

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/sokhanak-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/sokhanak-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	/**
	 * Registers all hooks
	 */
	public function add_hooks() {
		
		//add_action( 'admin_menu', array( $this, 'build_menu' ) );
		add_action( 'admin_init', array( $this, 'initialize' ) );
		add_action("admin_init", array( $this, 'display_theme_panel_fields') );
		add_filter( 'plugin_action_links_' . plugin_basename(SOKHANAK_PLUGIN_FILE), array( $this, 'build_settings_link' ) );
		
	}
	
	/**
	 * Initializes various stuff used in WP Admin
	 *
	 * - Registers settings
	 */
	public function initialize() {

		// register settings
		register_setting( 'sokhanak_settings', 'sokhanak', array( $this, 'save_general_settings' ) );

		// Load upgrader
		//$this->init_upgrade_routines();

		// listen for custom actions
		//$this->listen_for_actions();
	}
	
	//Register a callback for our specific plugin's actions
	public function build_settings_link( $links ){
		
		$links[] = '<a href="'. menu_page_url( 'sokhanak-settings', false ) .'">'.__( 'Settings' ).'</a>';
		return $links;
		
	}

	/**
	 * Register the setting pages and their menu items
	 */
	public function build_menu() {

		$menu_items = array(
			'general' => array(
				'title' => __( 'Sokhanak', 'sokhanak' ),
				'text' => __( 'Sokhanak', 'sokhanak' ),
				'slug' => '',
				'callback' => array( $this, 'show_shortcode_page' ),
				'position' => 0
			),
			'new' => array(
				'title' => __( 'Add' ),
				'text' => __( 'Add' ),
				'slug' => 'new',
				'callback' => array( $this, 'show_add_new_page' ),
				'position' => 80
			),
			'settings' => array(
				'title' => __( 'Settings' ),
				'text' => __( 'Settings' ),
				'slug' => 'settings',
				'callback' => array( $this, 'show_settings_page' ),
				'position' => 90
			)
		);

		// add top menu item
		add_menu_page( __( 'Persian Quote of the Day by Sokhanak', 'sokhanak' ), __( 'Sokhanak', 'sokhanak' ), 'manage_options', 'sokhanak', array( $this, 'show_shortcode_page' ), 'dashicons-format-quote', '99.68491'  );

		// sort submenu items by 'position'
		uasort( $menu_items, array( $this, 'sort_menu_items_by_position' ) );

		// add sub-menu items
		array_walk( $menu_items, array( $this, 'add_menu_item' ) );
	}
	
	/**
	 * @param array $item
	 */
	public function add_menu_item( array $item ) {

		// generate menu slug
		$slug = 'sokhanak';
		if( ! empty( $item['slug'] ) ) {
			$slug .= '-' . $item['slug'];
		}

		// provide some defaults
		$parent_slug = ! empty( $item['parent_slug']) ? $item['parent_slug'] : 'sokhanak';

		// register page
		$hook = add_submenu_page( $parent_slug, $item['title'], $item['text'], 'manage_options', $slug, $item['callback'] );

		// register callback for loading this page, if given
		if( array_key_exists( 'load_callback', $item ) ) {
			add_action( 'load-' . $hook, $item['load_callback'] );
		}
	}
	
	/**
	 * Show the Settings page
	 */
	public function show_shortcode_page() {

	}
	
	public function show_add_new_page() {
?>
	<div class="wrap">
	<h1><?php echo __('Add new', 'sokhanak'); ?></h1>

	</div>
<?php
	}
	
	/**
	 * Show the Settings page
	 */
	public function show_settings_page() {
?>
	<div class="wrap">
<h1><?php
	echo esc_html( __( 'Sokhanak', 'sokhanak' ) );
?></h1>	<form method="post" action="options.php">
		<?php
			settings_fields("section");
			do_settings_sections("sokhanak-options");      
			submit_button(); 
		?>
	</form>

	</div>
<?php
	}
	
function display_sokhanak_api_element(){
	?>
    	<input type="text" name="sokhanak_api" id="sokhanak_api" value="<?php echo get_option('sokhanak_api'); ?>" />
		<p><?php echo __( 'How to get API Key', 'sokhanak' ); ?>: <a href="http://sokhanak.com/api/" target="_blank">sokhanak.com/api</a></p>
    <?php
}


function display_theme_panel_fields(){
	
	add_settings_section("section", __( 'Settings' ), null, "sokhanak-options");
	add_settings_field("sokhanak_api", __( 'API Key', 'sokhanak' ), array( $this, 'display_sokhanak_api_element'), "sokhanak-options", "section");
    register_setting("section", "sokhanak_api");
	
}
	
	/**
	 * Validates the General settings
	 * @param array $settings
	 * @return array
	 */
	public function save_general_settings( array $settings ) {
		
		// Sanitize API key
		$settings['sokhanak_api'] = sanitize_text_field( $settings['sokhanak_api'] );

		return $settings;
	}
	
	
	/**
	 * @param $a
	 * @param $b
	 *
	 * @return int
	 */
	public function sort_menu_items_by_position( $a, $b ) {
		
		$pos_a = isset( $a['position'] ) ? $a['position'] : 80;
		$pos_b = isset( $b['position'] ) ? $b['position'] : 90;
		
		return $pos_a < $pos_b ? -1 : 1;
		
	}
	
}
