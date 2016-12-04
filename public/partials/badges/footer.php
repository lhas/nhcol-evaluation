<?php
  $company_name = $this->plugin_options['company_name'];
  $badge_position = $this->plugin_options['badge_position'];
  $company_logo_url = wp_get_attachment_image_src($this->plugin_options['company_logo_id'], 'logo1')[0];

  if($this->plugin_options['badge_display_type'] == 'owned') {
    $seal_logo_url = wp_get_attachment_image_src($this->plugin_options['seal_logo_id'], 'logo1')[0];
  } else if($this->plugin_options['badge_display_type'] == 'predefined') {
    $seal_logo_url = $this->plugin_options['badge_predefined_file'];
  }

  if(PLUGIN_MODE == 'STANDARD') :
      // Let's get the current predefined badges at badges/ folder
      $path = plugin_dir_path( __FILE__ ) . '../../../badges/';
      $url = plugin_dir_url( __FILE__ ) . '../../../badges/';
      $files = array_diff(scandir($path), array('..', '.'));

      $seal_logo_url = $url . array_values($files)[0];
  endif;
?>

<div id="nhcol-evaluation-badge" class="badge-size badge-size-<?php echo $this->plugin_options['badge_size']; ?>">

  <span class="close-badge">X</span>

  <a href="<?php echo $this->plugin_options['evaluate_url']; ?>" title="<?php echo $company_name; ?>">

    <img src="<?php echo $seal_logo_url; ?>" />

    <p class="ratingvalue-name">
      <?php echo __($this->plugin_options['translates'][$this->plugin_options['ratingValue']]['name'], $this->plugin_name); ?>
    </p> <!-- .ratingvalue-name -->

    <div class="rating-stars">
      <?php for($i = 1; $i <= floor($this->plugin_options['ratingValueFormatted']); $i++) : ?>
        <i class="fa fa-star"></i>
      <?php endfor; ?>
      <?php for($i = 1; $i <= (5 - floor($this->plugin_options['ratingValueFormatted'])); $i++) : ?>
        <i class="fa fa-star-o"></i>
      <?php endfor; ?>
    </div> <!-- .rating-stars -->

    <p class="ratingvalue-formatted">
      <?php echo $this->plugin_options['ratingValueFormatted']; ?> / 5,0
    </p> <!-- .ratingvalue-formatted -->

  </a>

</div> <!-- #nhcol-evaluation-badge -->

<style type="text/css">
#nhcol-evaluation-badge {
  <?php if($badge_position == 'up') : ?>
  top: 60px;
  <?php endif; ?>
  <?php if($badge_position == 'middle') : ?>
  top: 45%;
  <?php endif; ?>
  <?php if($badge_position == 'down') : ?>
  bottom: 60px;
  <?php endif; ?>
}
</style>