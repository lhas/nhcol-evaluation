<fieldset>
    <p><?php _e('Evaluate URL', $this->plugin_name); ?></p>
    <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-evaluate_url" name="<?php echo $this->plugin_name; ?>[evaluate_url]" value="<?php if(!empty($evaluate_url)) echo $evaluate_url; ?>"/>
</fieldset>

<fieldset>
    <p><?php _e('Badge Position', $this->plugin_name); ?></p>
    <select class="regular-text" name="<?php echo $this->plugin_name; ?>[badge_position]">
        <option value="up" <?php if($badge_position == 'up') { ?>selected="selected"<?php } ?>><?php _e('Up', $this->plugin_name); ?></option>
        <option value="middle" <?php if($badge_position == 'middle') { ?>selected="selected"<?php } ?>><?php _e('Middle', $this->plugin_name); ?></option>
        <option value="down" <?php if($badge_position == 'down') { ?>selected="selected"<?php } ?>><?php _e('Down', $this->plugin_name); ?></option>
    </select>
</fieldset>
