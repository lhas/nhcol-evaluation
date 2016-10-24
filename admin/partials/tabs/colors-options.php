<fieldset>
    <p><?php _e('Button Background', $this->plugin_name); ?></p>
    <input type="text" class="nhcol-evaluation-color-picker" id="<?php echo $this->plugin_name; ?>-button_background" name="<?php echo $this->plugin_name; ?>[button_background]" value="<?php if(!empty($button_background)) echo $button_background; ?>"/>
</fieldset>

<fieldset>
    <p><?php _e('Button Text', $this->plugin_name); ?></p>
    <input type="text" class="nhcol-evaluation-color-picker" id="<?php echo $this->plugin_name; ?>-button_text" name="<?php echo $this->plugin_name; ?>[button_text]" value="<?php if(!empty($button_text)) echo $button_text; ?>"/>
</fieldset>
