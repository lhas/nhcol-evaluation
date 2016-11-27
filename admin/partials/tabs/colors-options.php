<fieldset>
    <p><?php _e('Button Background', $this->plugin_name); ?></p>
    <input type="text" class="nhcol-evaluation-color-picker" id="<?php echo $this->plugin_name; ?>-button_background" name="<?php echo $this->plugin_name; ?>[button_background]" value="<?php if(!empty($button_background)) echo $button_background; ?>"/>
</fieldset>

<fieldset>
    <p><?php _e('Button Text', $this->plugin_name); ?></p>
    <input type="text" class="nhcol-evaluation-color-picker" id="<?php echo $this->plugin_name; ?>-button_text" name="<?php echo $this->plugin_name; ?>[button_text]" value="<?php if(!empty($button_text)) echo $button_text; ?>"/>
</fieldset>

<fieldset>
    <p><?php _e('Background Color of Output Form', $this->plugin_name); ?></p>
    <input type="text" class="nhcol-evaluation-color-picker" id="<?php echo $this->plugin_name; ?>-background_color_output_form" name="<?php echo $this->plugin_name; ?>[background_color_output_form]" value="<?php if(!empty($background_color_output_form)) echo $background_color_output_form; ?>"/>
</fieldset>

<fieldset>
    <p><?php _e('Stars Color', $this->plugin_name); ?></p>
    <input type="text" class="nhcol-evaluation-color-picker" id="<?php echo $this->plugin_name; ?>-stars_color" name="<?php echo $this->plugin_name; ?>[stars_color]" value="<?php if(!empty($stars_color)) echo $stars_color; ?>"/>
</fieldset>
