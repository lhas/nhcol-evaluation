<section class="content-second" itemscope itemtype="https://schema.org/LocalBusiness">
  <div class="center">

    <section class="reviews box content">
      <h5 class="inline-heading"><span class="number"><?php echo $this->plugin_options['reviewCount']; ?></span> <?php echo __('evaluations for', $this->plugin_name); ?> <?php echo get_bloginfo('name'); ?></h5>
      <article>
          <h1 itemprop="aggregateRating" itemscope="" itemtype="https://schema.org/AggregateRating">
              <meta itemprop="reviewCount" content="<?php echo $this->plugin_options['reviewCount']; ?>">
              <meta itemprop="ratingValue" content="<?php echo $this->plugin_options['ratingValue']; ?>">
              <meta itemprop="bestRating" content="5">

              <span class="star-rating huge"><span style="width: 100%; background-size: 100%"></span></span><br>
              <?php echo $this->plugin_options['translates'][$this->plugin_options['ratingValue']]['name']; ?><br>
              <strong class="number"><?php echo $this->plugin_options['ratingValueFormatted']; ?></strong><span class="number"> / 5,0</span>
          </h1>

          <table>
              <tbody>
              <?php foreach($this->plugin_options['labels'] as $index => $label) : ?>
              <?php $average = $label['average']; ?>
              <tr>
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
              <?php endforeach; ?>
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

          <figure>
              <img src="<?php echo wp_get_attachment_image_src($this->plugin_options['seal_logo_id'], 'full')[0]; ?>" alt="">
          </figure>

      </article>
    </section> <!-- .reviews -->

    <section class="content">
        <a href="<?php echo $this->plugin_options['evaluate_url']; ?>" class="button arr"><?php echo __('Evaluate Us', $this->plugin_name); ?></a>
    </section> <!-- .content -->

  </div> <!-- .center -->
</section> <!-- .content-second -->