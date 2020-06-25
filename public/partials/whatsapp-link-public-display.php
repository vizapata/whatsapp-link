<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://github.com/vizapata
 * @since      1.0.0
 *
 * @package    Whatsapp_Link
 * @subpackage Whatsapp_Link/public/partials
 */
?>
<div class="ws-link-band">
  <a target="_blank" href="<?php print $link; ?>">
    <span class="icon"></span>
    <span class="ws-link-title"><?php print get_option('whatsapp_link_title', __('Contact', 'whatsapp-link')); ?></span>
    <span class="ws-link-desc"><?php print get_option('whatsapp_link_desc', __('Chat with us', 'whatsapp-link')); ?></span>
  </a>
</div>