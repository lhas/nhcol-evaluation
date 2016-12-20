<section class="content-second" itemscope itemtype="https://schema.org/LocalBusiness">
  <div class="center">

    <section class="reviews box content">
      <h5 class="inline-heading"><span class="number"><?php echo $this->plugin_options['reviewCount']; ?></span> <?php echo __('evaluations for', $this->plugin_name); ?> <?php echo get_bloginfo('name'); ?></h5>
      <article>

          <div class="left-details">
            
            <div class="stars-details text-star-color">

                  <?php for($i = 1; $i <= floor($this->plugin_options['ratingValueFormatted']); $i++) : ?>
                    <i class="fa fa-star"></i>
                  <?php endfor; ?>
                  <?php for($i = 1; $i <= (5 - floor($this->plugin_options['ratingValueFormatted'])); $i++) : ?>
                    <i class="fa fa-star-o"></i>
                  <?php endfor; ?>

            </div> <!-- .stars-details -->

            <h1 itemprop="aggregateRating" itemscope="" itemtype="https://schema.org/AggregateRating">
                <meta itemprop="reviewCount" content="<?php echo $this->plugin_options['reviewCount']; ?>">
                <meta itemprop="ratingValue" content="<?php echo $this->plugin_options['ratingValue']; ?>">
                <meta itemprop="bestRating" content="5">

                <?php echo __($this->plugin_options['translates'][$this->plugin_options['ratingValue']]['name'], $this->plugin_name); ?><br>
                <strong class="number"><?php echo $this->plugin_options['ratingValueFormatted']; ?></strong><span class="number"> / 5,0</span>
            </h1>
          </div> <!-- .left-details -->

          <table class="rating-table">
              <tbody>
              <?php $even = true; foreach($this->plugin_options['labels'] as $index => $label) : ?>
              <?php $average = $label['average']; ?>
              <tr class="<?php echo ($even) ? 'even' : 'odd'; ?>">
                  <td><?php echo $label['name']; ?></td>
                  <td>
                  <?php for($i = 1; $i <= floor($average); $i++) : ?>
                    <i class="fa fa-star"></i>
                  <?php endfor; ?>
                  <?php for($i = 1; $i <= (5 - floor($average)); $i++) : ?>
                    <i class="fa fa-star-o"></i>
                  <?php endfor; ?>
                  
                  </td>
                  <td class="number"><?php echo $this->format_rating($average); ?></td>
              </tr>
              <?php $even = !$even; endforeach; ?>
              <tr class="result">
                  <td><strong><?php echo __('Total', $this->plugin_name); ?></strong></td>
                  <td>

                  <?php for($i = 1; $i <= floor($this->plugin_options['ratingValueFormatted']); $i++) : ?>
                    <i class="fa fa-star"></i>
                  <?php endfor; ?>
                  <?php for($i = 1; $i <= (5 - floor($this->plugin_options['ratingValueFormatted'])); $i++) : ?>
                    <i class="fa fa-star-o"></i>
                  <?php endfor; ?>

                  </td>
                  <td class="number"><strong><?php echo $this->plugin_options['ratingValueFormatted']; ?></strong></td>
              </tr>
          </tbody></table>

          <div class="badge-right badge-size badge-size-big">
            <?php
              if($this->plugin_options['badge_display_type'] == 'owned') {
                $seal_logo_url = wp_get_attachment_image_src($this->plugin_options['seal_logo_id'], 'logo1')[0];
              } else if($this->plugin_options['badge_display_type'] == 'predefined') {
                $seal_logo_url = $this->plugin_options['badge_predefined_file'];
              }

              if(PLUGIN_MODE == 'STANDARD') :
                  // Let's get the current predefined badges at badges/ folder
                  $path = plugin_dir_path( __FILE__ ) . '../../../../badges/';
                  $url = plugin_dir_url( __FILE__ ) . '../../../../badges/';
                  $files = array_diff(scandir($path), array('..', '.'));

                  $seal_logo_url = $url . array_values($files)[0];
              endif;
            ?>
            <img src="<?php echo $seal_logo_url; ?>" />
          </div>

          <div class="clearfix"></div>

      </article>
    </section> <!-- .reviews -->

    <section class="content">
        <a href="<?php echo $this->plugin_options['evaluate_url']; ?>" class="button arr btn-evaluate-us"><?php echo __('Evaluate Us', $this->plugin_name); ?> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
    </section> <!-- .content -->

    <div class="clearfix"></div>

  </div> <!-- .center -->
</section> <!-- .content-second -->


<style type="text/css">
.content-second {
  background: <?php echo $this->plugin_options['background_color_output_form']; ?>;
  padding: 10px;
}

.rating-table i.fa,  .text-star-color {
  color: <?php echo $this->plugin_options['stars_color']; ?>;
}

.rating-table {
  width: 400px;
  float: left;
}

.badge-right {
  float: left;
  margin-left: 20px;
}
.clearfix {
  clear: both;
}
</style>