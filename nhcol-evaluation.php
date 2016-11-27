<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://0e1dev.com
 * @since             1.0.0
 * @package           Nhcol_Evaluation
 *
 * @wordpress-plugin
 * Plugin Name:       NHCOL Evaluation (Premium)
 * Plugin URI:        https://github.com/lhas/nhcol-evaluation
 * Description:       NHCOL created this plug-in for Evaluations.
 * Version:           1.0.0
 * Author:            NHCOL
 * Author URI:        http://nhcol.com.br
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       nhcol-evaluation
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-nhcol-evaluation-activator.php
 */
function activate_nhcol_evaluation() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-nhcol-evaluation-activator.php';
	Nhcol_Evaluation_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-nhcol-evaluation-deactivator.php
 */
function deactivate_nhcol_evaluation() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-nhcol-evaluation-deactivator.php';
	Nhcol_Evaluation_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_nhcol_evaluation' );
register_deactivation_hook( __FILE__, 'deactivate_nhcol_evaluation' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-nhcol-evaluation.php';
require plugin_dir_path( __FILE__ ) . 'admin/includes/helpers.php';
require plugin_dir_path( __FILE__ ) . 'admin/includes/form-handler.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_nhcol_evaluation() {

	$plugin = new Nhcol_Evaluation();
	$plugin->run();

}
run_nhcol_evaluation();
