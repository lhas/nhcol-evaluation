<?php if(PLUGIN_MODE == 'PREMIUM') : ?>
  <fieldset>
    <p><?php _e('Evaluations Published Directly?', $this->plugin_name); ?></p>
    <input type="hidden" name="<?php echo $this->plugin_name; ?>[published_directly]" value="0">
    <input type="checkbox" id="<?php echo $this->plugin_name; ?>-published_directly" name="<?php echo $this->plugin_name; ?>[published_directly]" value="1" <?php if(!empty($published_directly)) { ?>checked="checked"<?php } ?> />
  </fieldset>
<?php endif; ?>

<fieldset>
    <p><?php _e('Terms of Service Text', $this->plugin_name); ?></p>
    <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-terms_of_service_text" name="<?php echo $this->plugin_name; ?>[terms_of_service_text]" value="<?php if(!empty($terms_of_service_text)) echo $terms_of_service_text; ?>"/>
</fieldset>

<fieldset>
    <p><?php _e('Terms of Service URL', $this->plugin_name); ?></p>
    <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-terms_of_service_url" name="<?php echo $this->plugin_name; ?>[terms_of_service_url]" value="<?php if(!empty($terms_of_service_url)) echo $terms_of_service_url; ?>"/>
</fieldset>


<?php if(PLUGIN_MODE == 'PREMIUM') : ?>
  <fieldset>
      <p><?php _e('Evaluation Title', $this->plugin_name); ?></p>
      <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
      <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-evaluation_question" name="<?php echo $this->plugin_name; ?>[evaluation_question]" value="<?php if(!empty($evaluation_question)) echo $evaluation_question; ?>"/>
  </fieldset>

  <fieldset>
      <p><?php _e('Evaluation Label #1', $this->plugin_name); ?></p>
      <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
      <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-evaluation_label_1" name="<?php echo $this->plugin_name; ?>[evaluation_label_1]" value="<?php if(!empty($evaluation_label_1)) echo $evaluation_label_1; ?>"/>
  </fieldset>

  <fieldset>
      <p><?php _e('Evaluation Label #2', $this->plugin_name); ?></p>
      <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
      <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-evaluation_label_2" name="<?php echo $this->plugin_name; ?>[evaluation_label_2]" value="<?php if(!empty($evaluation_label_1)) echo $evaluation_label_2; ?>"/>
  </fieldset>

  <fieldset>
      <p><?php _e('Evaluation Label #3', $this->plugin_name); ?></p>
      <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
      <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-evaluation_label_3" name="<?php echo $this->plugin_name; ?>[evaluation_label_3]" value="<?php if(!empty($evaluation_label_1)) echo $evaluation_label_3; ?>"/>
  </fieldset>

  <fieldset>
      <p><?php _e('Evaluation Label #4', $this->plugin_name); ?></p>
      <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
      <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-evaluation_label_4" name="<?php echo $this->plugin_name; ?>[evaluation_label_4]" value="<?php if(!empty($evaluation_label_1)) echo $evaluation_label_4; ?>"/>
  </fieldset>

  <fieldset>
      <p><?php _e('Evaluation Label #5', $this->plugin_name); ?></p>
      <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
      <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-evaluation_label_5" name="<?php echo $this->plugin_name; ?>[evaluation_label_5]" value="<?php if(!empty($evaluation_label_1)) echo $evaluation_label_5; ?>"/>
  </fieldset>
<?php endif; ?>