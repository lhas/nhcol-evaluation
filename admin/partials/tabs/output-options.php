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

<fieldset>
    <p><?php _e('First Block Text', $this->plugin_name); ?></p>
    <textarea class="regular-text" cols="40" id="<?php echo $this->plugin_name; ?>-first_block_text" name="<?php echo $this->plugin_name; ?>[first_block_text]" value=""><?php if(!empty($first_block_text)) echo $first_block_text; ?></textarea>
</fieldset>

<fieldset>
    <p><?php _e('Second Block Text', $this->plugin_name); ?></p>
    <textarea class="regular-text" cols="40" id="<?php echo $this->plugin_name; ?>-second_block_text" name="<?php echo $this->plugin_name; ?>[second_block_text]" value=""><?php if(!empty($second_block_text)) echo $second_block_text; ?></textarea>
</fieldset>
