<fieldset>
    <p><?php _e('Company Name', $this->plugin_name); ?></p>
    <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
    <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-company_name" name="<?php echo $this->plugin_name; ?>[company_name]" value="<?php if(!empty($company_name)) echo $company_name; ?>"/>
</fieldset>

<fieldset>
    <p><?php _e('Maximum Evaluations per Page', $this->plugin_name); ?></p>
    <input type="number" class="regular-text" id="<?php echo $this->plugin_name; ?>-maximum_evaluations_per_page" name="<?php echo $this->plugin_name; ?>[maximum_evaluations_per_page]" value="<?php if(!empty($maximum_evaluations_per_page)) echo $maximum_evaluations_per_page; ?>"/>
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
