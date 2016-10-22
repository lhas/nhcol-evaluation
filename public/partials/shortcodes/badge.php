<?php
  $company_name = $this->plugin_options['company_name'];
  $company_logo_url = wp_get_attachment_image_src($this->plugin_options['company_logo_id'], 'full')[0];
?>

<a href="#" title="<?php echo $company_name; ?>">
  <img src="<?php echo $company_logo_url; ?>" />
  <p>Badge: <?php echo $company_name; ?></p>
</a>