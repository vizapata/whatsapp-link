<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/vizapata
 * @since      1.0.0
 *
 * @package    Whatsapp_Link
 * @subpackage Whatsapp_Link/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Whatsapp_Link
 * @subpackage Whatsapp_Link/includes
 * @author     Victor Zapata <victorzapatabedoya@hotmail.com>
 */
class Whatsapp_Link_i18n
{


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain()
	{

		load_plugin_textdomain(
			'whatsapp-link',
			false,
			dirname(dirname(plugin_basename(__FILE__))) . '/languages/'
		);
	}
}
