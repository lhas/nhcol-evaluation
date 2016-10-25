<fieldset>
    <p><?php _e('Evaluate URL', $this->plugin_name); ?></p>
    <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-evaluate_url" name="<?php echo $this->plugin_name; ?>[evaluate_url]" value="<?php if(!empty($evaluate_url)) echo $evaluate_url; ?>"/>
</fieldset>