<fieldset>
    <p><?php _e('Company Name', $this->plugin_name); ?></p>
    <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
    <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-company_name" name="<?php echo $this->plugin_name; ?>[company_name]" value="<?php if(!empty($company_name)) echo $company_name; ?>"/>
</fieldset>

<?php submit_button(__('Save all', $this->plugin_name), 'primary','submit', TRUE); ?>