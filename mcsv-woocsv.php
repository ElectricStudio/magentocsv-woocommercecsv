<?php
/**
 * The WordPress Plugin Boilerplate.
 *
 * A foundation off of which to build well-documented WordPress plugins that
 * also follow WordPress Coding Standards and PHP best practices.
 *
 * @package   MagentoCSV-to-WooCommerceCSV
 * @author    Electric Studio <hello@electricstudio.co.uk>
 * @license   GPL-2.0+
 * @link      http://www.electricstudio.co.uk
 * @copyright 2014 Electric Studio
 *
 * @wordpress-plugin
 * Plugin Name:       MagentoCSV-to-WooCommerceCSV
 * Plugin URI:        http://www.electricstudio.co.uk/blogpostabouttheplugin
 * Description:       Takes a CSV file exported from Magento and reformats it so that Products CSV Import Suite can correctly import them.
 * Version:           1.0.0
 * Author:            Electric Studio
 * Author URI:        http://www.electricstudio.co.uk
 * Text Domain:       magentocsv-wccsv-locale
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/ElectricStudio/magentocsv-woocommercecsv
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*----------------------------------------------------------------------------*
 * Public-Facing Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-mcsv-woocsv.php` with the name of the plugin's class file
 *
 */
require_once( plugin_dir_path( __FILE__ ) . 'public/class-mcsv-woocsv.php' );

/*
 * Register hooks that are fired when the plugin is activated or deactivated.
 * When the plugin is deleted, the uninstall.php file is loaded.
 *
 * @TODO:
 *
 * - replace MCSV_WooCSV with the name of the class defined in
 *   `class-mcsv-woocsv.php`
 */
register_activation_hook( __FILE__, array( 'MCSV_WooCSV', 'activate' ) );
register_deactivation_hook( __FILE__, array( 'MCSV_WooCSV', 'deactivate' ) );

/*
 * @TODO:
 *
 * - replace MCSV_WooCSV with the name of the class defined in
 *   `class-mcsv-woocsv.php`
 */
add_action( 'plugins_loaded', array( 'MCSV_WooCSV', 'get_instance' ) );

/*----------------------------------------------------------------------------*
 * Dashboard and Administrative Functionality
 *----------------------------------------------------------------------------*/

/*
 * @TODO:
 *
 * - replace `class-mcsv-woocsv-admin.php` with the name of the plugin's admin file
 * - replace MCSV_WooCSV_Admin with the name of the class defined in
 *   `class-mcsv-woocsv-admin.php`
 *
 * If you want to include Ajax within the dashboard, change the following
 * conditional to:
 *
 * if ( is_admin() ) {
 *   ...
 * }
 *
 * The code below is intended to to give the lightest footprint possible.
 */
if ( is_admin() && ( ! defined( 'DOING_AJAX' ) || ! DOING_AJAX ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'admin/class-mcsv-woocsv-admin.php' );
	add_action( 'plugins_loaded', array( 'MCSV_WooCSV_Admin', 'get_instance' ) );

}
