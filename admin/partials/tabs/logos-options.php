<fieldset style="margin-top: 30px;margin-bottom: 30px;">
    <label for="<?php echo $this->plugin_name;?>-seal_logo">
        <span><?php _e('Seal', $this->plugin_name);?></span>
        <input type="hidden" class="logo_id" name="<?php echo $this->plugin_name;?>[seal_logo_id]" value="<?php echo $seal_logo_id; ?>" />
        <input type="button" class="button button_upload" value="<?php _e( 'Upload Logo', $this->plugin_name); ?>" />
    </label>
    <div class="nhcol_evaluation-upload-preview <?php if(empty($seal_logo_id)) echo 'hidden'?>">
        <div style="display: inline-block; width: 250px; height: 250px; background: url(<?php echo $seal_logo_url; ?>) no-repeat; "></div>
        <button id="nhcol_evaluation-delete_logo_button" style="display: inline-block; vertical-align: top;" class="nhcol_evaluation-delete-image"><?php _e('Remove', $this->plugin_name);?></button>
    </div>
</fieldset>

<fieldset>
    <p><?php _e('Badge Size', $this->plugin_name); ?></p>
    <select class="regular-text" name="<?php echo $this->plugin_name; ?>[badge_size]">
        <option value="small" <?php if($badge_size == 'small') { ?>selected="selected"<?php } ?>><?php _e('Small', $this->plugin_name); ?></option>
        <option value="medium" <?php if($badge_size == 'medium') { ?>selected="selected"<?php } ?>><?php _e('Medium', $this->plugin_name); ?></option>
        <option value="big" <?php if($badge_size == 'big') { ?>selected="selected"<?php } ?>><?php _e('Big', $this->plugin_name); ?></option>
    </select>
</fieldset>
