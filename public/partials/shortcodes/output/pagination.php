<h5><?php echo $total; ?> <?php echo __('evaluations', $this->plugin_name); ?> </h5>

<?php foreach($latest_evaluations as $evaluation) : ?>
<article class="nhcol-evaluation-single" itemprop="review" itemscope="" itemtype="https://schema.org/Review">
  <meta itemprop="name" content="MVG - Die Anhängerkupplung">
  <meta itemprop="author" content="mvg-ahk.de - Kunde">

  <h5 itemprop="reviewRating" itemscope="" itemtype="https://schema.org/Rating">
    <meta itemprop="ratingValue" content="<?php echo floor($evaluation->average); ?>">
    <meta itemprop="bestRating" content="5">

    <a itemprop="url" href="<?php echo $this->plugin_options['evaluate_url']; ?>">
      
      
      <?php for($i = 1; $i <= floor($evaluation->average); $i++) : ?>
        <i class="fa fa-star"></i>
      <?php endfor; ?>
      <?php for($i = 1; $i <= (5 - floor($evaluation->average)); $i++) : ?>
        <i class="fa fa-star-o"></i>
      <?php endfor; ?>

      <?php echo $evaluation->average_translate; ?>
    </a>
  </h5>

  <p class="comment" itemprop="description">
    <?php echo $evaluation->comment; ?>
  </p>

  <?php $dateTime = new \DateTime($evaluation->time); ?>
  <time itemprop="datePublished" datetime="<?php echo $dateTime->format('Y-m-d'); ?>"><?php echo $dateTime->format('d.m.Y'); ?></time>

  <div class="clearfix"></div>

</article>
<?php endforeach; ?>

<div class="evaluation-pagination">
  <?php
  echo paginate_links( array(
      'base' => add_query_arg( 'cpage', '%#%' ),
      'format' => '',
      'prev_text' => __('&laquo;'),
      'next_text' => __('&raquo;'),
      'total' => ceil($total / $items_per_page),
      'current' => $page
  ));
  ?>
</div> <!-- .evaluation-pagination -->

<style type="text/css">
    .evaluation-pagination a {
        background: <?php echo $this->plugin_options['button_background']; ?>;
        color: <?php echo $this->plugin_options['button_text']; ?>;
    }
</style>