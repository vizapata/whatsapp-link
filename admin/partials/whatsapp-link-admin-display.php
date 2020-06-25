<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admins options page for this plugin
 *
 * @link       https://github.com/vizapata
 * @since      1.0.0
 *
 * @package    Whatsapp_Link
 * @subpackage Whatsapp_Link/admin/partials
 */
?>
<form action='options.php' method='post'>
  <?php
  settings_fields('whatsapp_link_options');
  do_settings_sections('whatsapp_link_options');
  submit_button();
  ?>
</form>