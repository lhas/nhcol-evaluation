<fieldset>
    <label for="<?php echo $this->plugin_name;?>-company_logo">
        <input type="hidden" class="logo_id" name="<?php echo $this->plugin_name;?>[company_logo_id]" value="<?php echo $company_logo_id; ?>" />
        <input type="button" class="button button_upload" value="<?php _e( 'Upload Logo', $this->plugin_name); ?>" />
        <span><?php esc_attr_e('Company', $this->plugin_name);?></span>
    </label>
    <div class="nhcol_evaluation-upload-preview <?php if(empty($company_logo_id)) echo 'hidden'?>">
        <img src="<?php echo $company_logo_url; ?>" />
        <button id="nhcol_evaluation-delete_logo_button" class="nhcol_evaluation-delete-image">X</button>
    </div>
</fieldset>

<fieldset>
    <label for="<?php echo $this->plugin_name;?>-seal_logo">
        <input type="hidden" class="logo_id" name="<?php echo $this->plugin_name;?>[seal_logo_id]" value="<?php echo $seal_logo_id; ?>" />
        <input type="button" class="button button_upload" value="<?php _e( 'Upload Logo', $this->plugin_name); ?>" />
        <span><?php esc_attr_e('Seal', $this->plugin_name);?></span>
    </label>
    <div class="nhcol_evaluation-upload-preview <?php if(empty($seal_logo_id)) echo 'hidden'?>">
        <img src="<?php echo $seal_logo_url; ?>" />
        <button id="nhcol_evaluation-delete_logo_button" class="nhcol_evaluation-delete-image">X</button>
    </div>
</fieldset>
