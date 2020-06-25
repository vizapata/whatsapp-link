<?php

/**
 * @link              https://github.com/vizapata/whatsapp-link
 * @since             1.0.0
 * @package           Whatsapp_Link
 *
 * @wordpress-plugin
 * Plugin Name:       WhatsApp Link
 * Plugin URI:        https://github.com/vizapata/whatsapp-link
 * Description:       A simple plugin to display a WhatsApp link at the bottom of all public pages of a WordPress Website.
 * Version:           1.0.0
 * Author:            Victor Zapata
 * Author URI:        https://github.com/vizapata
 * License:           GPL-3.0+
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       whatsapp-link
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 */
define('WHATSAPP_LINK_VERSION', '1.0.0');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-whatsapp-link.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_whatsapp_link()
{
	$plugin = new Whatsapp_Link();
	$plugin->run();
}
run_whatsapp_link();
