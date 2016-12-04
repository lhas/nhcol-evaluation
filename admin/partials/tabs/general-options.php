<fieldset>
    <p><?php _e('Company Name', $this->plugin_name); ?></p>
    <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
    <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-company_name" name="<?php echo $this->plugin_name; ?>[company_name]" value="<?php if(!empty($company_name)) echo $company_name; ?>"/>
</fieldset>

<fieldset>
    <p><?php _e('Maximum Evaluations per Page', $this->plugin_name); ?></p>
    <input type="text" class="regular-text digit-only" id="<?php echo $this->plugin_name; ?>-maximum_evaluations_per_page" name="<?php echo $this->plugin_name; ?>[maximum_evaluations_per_page]" value="<?php if(!empty($maximum_evaluations_per_page)) echo $maximum_evaluations_per_page; ?>"/>
</fieldset>

<?php if(PLUGIN_MODE == 'PREMIUM') : ?>
  <fieldset>
      <p><?php _e('Show Badge or not?', $this->plugin_name); ?></p>
      <input type="hidden" name="<?php echo $this->plugin_name; ?>[show_badge]" value="0">
      <input type="checkbox" id="<?php echo $this->plugin_name; ?>-show_badge" name="<?php echo $this->plugin_name; ?>[show_badge]" value="1" <?php if(!empty($show_badge)) { ?>checked="checked"<?php } ?> />
  </fieldset>
<?php endif; ?>