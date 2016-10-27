<fieldset style="margin-top: 30px;margin-bottom: 30px;">
    <label for="<?php echo $this->plugin_name;?>-company_logo">
        <span><?php esc_attr_e('Company', $this->plugin_name);?></span>
        <input type="hidden" class="logo_id" name="<?php echo $this->plugin_name;?>[company_logo_id]" value="<?php echo $company_logo_id; ?>" />
        <input type="button" class="button button_upload" value="<?php _e( 'Upload Logo', $this->plugin_name); ?>" />
    </label>
    <div class="nhcol_evaluation-upload-preview <?php if(empty($company_logo_id)) echo 'hidden'?>">
        <div style="display: inline-block; width: 200px; height: 200px; background: url(<?php echo $company_logo_url; ?>); background-size: cover !important;"></div>
        <button id="nhcol_evaluation-delete_logo_button" style="display: inline-block; vertical-align: top;" class="nhcol_evaluation-delete-image">Remove</button>
    </div>
</fieldset>
<fieldset style="margin-top: 30px;margin-bottom: 30px;">
    <label for="<?php echo $this->plugin_name;?>-seal_logo">
        <span><?php esc_attr_e('Seal', $this->plugin_name);?></span>
        <input type="hidden" class="logo_id" name="<?php echo $this->plugin_name;?>[seal_logo_id]" value="<?php echo $seal_logo_id; ?>" />
        <input type="button" class="button button_upload" value="<?php _e( 'Upload Logo', $this->plugin_name); ?>" />
    </label>
    <div class="nhcol_evaluation-upload-preview <?php if(empty($seal_logo_id)) echo 'hidden'?>">
        <div style="display: inline-block; width: 200px; height: 200px; background: url(<?php echo $seal_logo_url; ?>); background-size: cover !important;"></div>
        <button id="nhcol_evaluation-delete_logo_button" style="display: inline-block; vertical-align: top;" class="nhcol_evaluation-delete-image">Remove</button>
    </div>
</fieldset>
