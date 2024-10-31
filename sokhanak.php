<?php

/**
 * The plugin bootstrap file
 *
 * @link              http://sokhanak.com
 * @since             1.0.0
 * @package           Sokhanak
 *
 * @wordpress-plugin
 * Plugin Name:       Persian Quote of the Day by Sokhanak
 * Plugin URI:        http://sokhanak.com/widgets/
 * Description:       This plugin lets you add a Quote of the Day widget to your WordPress page.
 * Version:           1.3
 * Author:            Sajjad Salemi
 * Author URI:        http://sokhanak.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sokhanak
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'SOKHANAK_VERSION', '1.3' );
define( 'SOKHANAK_PLUGIN_DIR', dirname( __FILE__ ) . '/' );
define( 'SOKHANAK_PLUGIN_URL', plugins_url( '/' , __FILE__ ) );
define( 'SOKHANAK_PLUGIN_FILE', __FILE__ );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-sokhanak-activator.php
 */
function activate_sokhanak() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sokhanak-activator.php';
	Sokhanak_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-sokhanak-deactivator.php
 */
function deactivate_sokhanak() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-sokhanak-deactivator.php';
	Sokhanak_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_sokhanak' );
register_deactivation_hook( __FILE__, 'deactivate_sokhanak' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-sokhanak.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-widget.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_sokhanak() {

	$plugin = new Sokhanak();
	$plugin->run();

}
run_sokhanak();

function widgets_scripts( $hook ) {
    if ( 'widgets.php' != $hook ) {
        return;
    }
    wp_enqueue_style( 'wp-color-picker' );        
    wp_enqueue_script( 'wp-color-picker' ); 
}
add_action( 'admin_enqueue_scripts', 'widgets_scripts' );