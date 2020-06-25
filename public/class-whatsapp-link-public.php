<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/vizapata
 * @since      1.0.0
 *
 * @package    Whatsapp_Link
 * @subpackage Whatsapp_Link/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Whatsapp_Link
 * @subpackage Whatsapp_Link/public
 * @author     Victor Zapata <victorzapatabedoya@hotmail.com>
 */
class Whatsapp_Link_Public
{

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
	public function __construct($plugin_name, $version)
	{
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/whatsapp-link-public.css', array(), $this->version, 'all');
	}

	/**
	 * Displays the public facing elements based on current settings.
	 * The WhatsApp number and the link text mus be set first in order to display the WhatsApp link.
	 * 
	 * @since 1.0.0
	 */
	public function wp_footer()
	{
		$phone = get_option('whatsapp_link_phone');
		$text = get_option('whatsapp_link_text');
		if (!empty($phone) && !empty($text)) {
			$link = sprintf('https://api.whatsapp.com/send?phone=%s&text=%s', $phone, urlencode($text));
			require_once plugin_dir_path(__FILE__) . 'partials/whatsapp-link-public-display.php';
		}
	}
}
