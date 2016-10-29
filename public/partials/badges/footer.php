<?php
  $company_name = $this->plugin_options['company_name'];
  $badge_position = $this->plugin_options['badge_position'];
  $company_logo_url = wp_get_attachment_image_src($this->plugin_options['company_logo_id'], 'logo1')[0];
  $seal_logo_url = wp_get_attachment_image_src($this->plugin_options['seal_logo_id'], 'logo1')[0];
?>

<div id="nhcol-evaluation-badge">

  <span class="close-badge">X</span>

  <a href="<?php echo $this->plugin_options['evaluate_url']; ?>" title="<?php echo $company_name; ?>">

    <img src="<?php echo $seal_logo_url; ?>" style="width: 100px;" />

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