<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Whatsapp_Link
 * @subpackage Whatsapp_Link/admin
 * @author     Victor Zapata <victorzapatabedoya@hotmail.com>
 */
class Whatsapp_Link_Admin
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
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }


    /**
     * Adds some action links in plugin list once this plugin is activated.
     * Implements the hook plugin_action_links_whatsapp-link/whatsapp-link.php
     * 
     * @since 1.0.0
     * @param string[] $actions current acctions links
     * @param string $plugin_file Path to the plugin file relative to the plugins directory.
     * @param array $plugin_data An array of plugin data. See get_plugin_data().
     * @param string $context The plugin context. By default this can include 'all', 'active', 'inactive', 'recently_activated', 'upgrade', 'mustuse', 'dropins', and 'search'.
     * @see https://developer.wordpress.org/reference/hooks/plugin_action_links_plugin_file/
     * 
     */
    function plugin_action_links($actions, $plugin_file, $plugin_data, $context)
    {
        array_unshift(
            $actions,
            sprintf(
                '<a href="%s" aria-label="%s">%s</a>',
                menu_page_url('whatsapp_link', false),
                esc_attr__('WhatsApp Settings', 'whatsapp-link'),
                esc_html__("Settings", 'default')
            )
        );
        return $actions;
    }

    /**
     * Adds a new entry in Wordpress menu
     * 
     * @see https://developer.wordpress.org/reference/functions/add_submenu_page/
     */
    public function admin_menu()
    {
        add_submenu_page(
            'options-general.php',
            __('WhatsApp Settings', 'whatsapp-link'),
            __('WhatsApp Settings', 'whatsapp-link'),
            'manage_options',
            'whatsapp_link',
            array($this, 'options_page')
        );
    }

    /** 
     * Loads the options page where the settings for this plugin can be set.
     */
    public function options_page()
    {
        require_once plugin_dir_path(__FILE__)  . 'partials/whatsapp-link-admin-display.php';
    }

    /**
     * Init configuration for admin settings interface
     */
    public function admin_init()
    {
        register_setting('whatsapp_link_options', 'whatsapp_link_phone');
        register_setting('whatsapp_link_options', 'whatsapp_link_text');
        register_setting('whatsapp_link_options', 'whatsapp_link_title');
        register_setting('whatsapp_link_options', 'whatsapp_link_desc');

        add_settings_section(
            'whatsapp_link_group',
            __('WhatsApp Settings', 'whatsapp-link'),
            array($this, 'general_settings_section_callback'),
            'whatsapp_link_options'
        );

        add_settings_field(
            'whatsapp_link_phone',
            __('Destination phone number', 'whatsapp-link'),
            array($this, 'whatsapp_link_phone'),
            'whatsapp_link_options',
            'whatsapp_link_group'
        );


        add_settings_field(
            'whatsapp_link_text',
            __('Initial text', 'whatsapp-link'),
            array($this, 'whatsapp_link_text'),
            'whatsapp_link_options',
            'whatsapp_link_group'
        );

        add_settings_field(
            'whatsapp_link_title',
            __('Band title', 'whatsapp-link'),
            array($this, 'whatsapp_link_title'),
            'whatsapp_link_options',
            'whatsapp_link_group'
        );

        add_settings_field(
            'whatsapp_link_desc',
            __('Band message', 'whatsapp-link'),
            array($this, 'whatsapp_link_desc'),
            'whatsapp_link_options',
            'whatsapp_link_group'
        );
    }

    /**
     * 
     * Prints the admin setting for WhatsApp number
     */
    public function whatsapp_link_phone()
    {
        printf("<input type='text' class='regular-text' name='whatsapp_link_phone' value='%s' >", get_option('whatsapp_link_phone'));
        printf("<p class='description' id='tagline-description'>%s.</p>", __('Remember include the country code. ie. <strong>57</strong>1234567890', 'whatsapp-link'));
    }

    /**
     * Prints the admin setting for the text used by the link
     */
    public function whatsapp_link_text()
    {
        printf("<input type='text' class='regular-text' name='whatsapp_link_text' value='%s' >", get_option('whatsapp_link_text'));
        printf("<p class='description' id='tagline-description'>%s.</p>", __('The text used to start the conversation', 'whatsapp-link'));
    }

    /**
     * Prints the admin setting for the title of the public element
     */
    public function whatsapp_link_title()
    {
        printf("<input type='text' class='regular-text' name='whatsapp_link_title' value='%s' >", get_option('whatsapp_link_title'));
        printf("<p class='description' id='tagline-description'>%s.</p>", __('Title displayed in the chat band', 'whatsapp-link'));
    }

    /**
     *  Prints the admin setting for the description of the public element
     */
    public function whatsapp_link_desc()
    {
        printf("<input type='text' class='regular-text' name='whatsapp_link_desc' value='%s' >", get_option('whatsapp_link_desc'));
        printf("<p class='description' id='tagline-description'>%s.</p>", __('Short description for the chat band', 'whatsapp-link'));
    }

    /**
     * Aditional header content for WhatsApp options page.
     */
    public function general_settings_section_callback()
    {
    }
}
