<?php
  $company_name = $this->plugin_options['company_name'];
  $badge_position = $this->plugin_options['badge_position'];
  $company_logo_url = wp_get_attachment_image_src($this->plugin_options['company_logo_id'], 'full')[0];
  $seal_logo_url = wp_get_attachment_image_src($this->plugin_options['seal_logo_id'], 'full')[0];
?>

<a id="nhcol-evaluation-badge" href="#" title="<?php echo $company_name; ?>">
  <img src="<?php echo $seal_logo_url; ?>" />
</a>

<style type="text/css">
#nhcol-evaluation-badge {
  position: fixed;
  <?php if($badge_position == 'up') : ?>
  top: 60px;
  <?php endif; ?>
  <?php if($badge_position == 'middle') : ?>
  top: 45%;
  <?php endif; ?>
  <?php if($badge_position == 'down') : ?>
  bottom: 60px;
  <?php endif; ?>
  right: 60px;
  z-index: 9999;
}
</style>