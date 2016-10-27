<?php
  $company_name = $this->plugin_options['company_name'];
  $badge_position = $this->plugin_options['badge_position'];
  $company_logo_url = wp_get_attachment_image_src($this->plugin_options['company_logo_id'], 'full')[0];
  $seal_logo_url = wp_get_attachment_image_src($this->plugin_options['seal_logo_id'], 'full')[0];
?>

<a href="#" title="<?php echo $company_name; ?>">
  <img src="<?php echo $seal_logo_url; ?>" />
</a>
