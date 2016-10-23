<fieldset>
    <label for="<?php echo $this->plugin_name;?>-company_logo">
        <input type="hidden" id="company_logo_id" name="<?php echo $this->plugin_name;?>[company_logo_id]" value="<?php echo $company_logo_id; ?>" />
        <input id="upload_company_logo_button" type="button" class="button" value="<?php _e( 'Upload Logo', $this->plugin_name); ?>" />
        <span><?php esc_attr_e('Company Logo', $this->plugin_name);?></span>
    </label>
    <div id="upload_logo_preview" class="nhcol_evaluation-upload-preview <?php if(empty($company_logo_id)) echo 'hidden'?>">
        <img src="<?php echo $company_logo_url; ?>" />
        <button id="nhcol_evaluation-delete_logo_button" class="nhcol_evaluation-delete-image">X</button>
    </div>
</fieldset>

<?php submit_button(__('Save all', $this->plugin_name), 'primary','submit', TRUE); ?>