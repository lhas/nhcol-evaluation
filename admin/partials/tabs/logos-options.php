<div ng-app="logos" ng-init='$ctrl.options = <?php echo json_encode($options); ?>' ng-controller="LogosCtrl as $ctrl">

    <fieldset class="logo-fieldset">
        <p><?php _e('Badge Size', $this->plugin_name); ?></p>
        <select class="regular-text" name="<?php echo $this->plugin_name; ?>[badge_size]">
            <option value="small" <?php if($badge_size == 'small') { ?>selected="selected"<?php } ?>><?php _e('Small', $this->plugin_name); ?></option>
            <option value="medium" <?php if($badge_size == 'medium') { ?>selected="selected"<?php } ?>><?php _e('Medium', $this->plugin_name); ?></option>
            <option value="big" <?php if($badge_size == 'big') { ?>selected="selected"<?php } ?>><?php _e('Big', $this->plugin_name); ?></option>
        </select>
    </fieldset>

    <fieldset class="logo-fieldset">

        <h3>I want to use...</h3>
        <label>
            <input type="radio" name="<?php echo $this->plugin_name; ?>[badge_display_type]" ng-model="$ctrl.options.badge_display_type" value="predefined">  <?php _e( 'Pre-defined Badge', $this->plugin_name); ?>
        </label>
        <label>
            <input type="radio" name="<?php echo $this->plugin_name; ?>[badge_display_type]" ng-model="$ctrl.options.badge_display_type" value="owned">  <?php _e( 'Custom Badge', $this->plugin_name); ?>
        </label>
    </fieldset>

    <fieldset class="logo-fieldset" ng-if="$ctrl.options.badge_display_type == 'owned'">

        <h3 class="you-selected"><?php _e( 'You selected:', $this->plugin_name); ?> <b><?php _e( 'Custom Badge', $this->plugin_name); ?></b></h3>

        <label for="<?php echo $this->plugin_name;?>-seal_logo">
            <input type="hidden" class="logo_id" name="<?php echo $this->plugin_name;?>[seal_logo_id]" value="<?php echo $seal_logo_id; ?>" />

            <button type="button" class="button button_upload btn-upload-logo">
                <i class="fa fa-upload"></i> <?php _e( 'Upload Logo', $this->plugin_name); ?>
            </button>
        </label>
        <div class="nhcol_evaluation-upload-preview <?php if(empty($seal_logo_id)) echo 'hidden'?>">
            <div class="seal-logo-container" style="background: url(<?php echo $seal_logo_url; ?>) no-repeat; "></div>
            <button id="nhcol_evaluation-delete_logo_button" style="display: inline-block; vertical-align: top;" class="nhcol_evaluation-delete-image">

            <i class="fa fa-trash"></i> <?php _e('Remove', $this->plugin_name);?></button>
        </div>
    </fieldset>

    <fieldset class="logo-fieldset" ng-if="$ctrl.options.badge_display_type == 'predefined'">

        <h3 class="you-selected"><?php _e( 'You selected:', $this->plugin_name); ?> <b><?php _e( 'Pre-defined Badge', $this->plugin_name); ?></b></h3>
        
        <?php
        // Let's get the current predefined badges at badges/ folder
        $path = plugin_dir_path( __FILE__ ) . '../../../badges/';
        $url = plugin_dir_url( __FILE__ ) . '../../../badges/';
        $files = array_diff(scandir($path), array('..', '.'));
        ?>

        <?php
        foreach($files as $file) :
        $url_file = $url . $file;
        $checked = ($options['badge_predefined_file'] == $url_file);
        ?>
        <label class="predefined-option">
            <img src="<?php echo $url_file; ?>" class="predefined-badge" alt="">

            <div class="clearfix"></div>

            <input type="radio" name="<?php echo $this->plugin_name; ?>[badge_predefined_file]" <?php if($checked) : ?>checked="checked"<?php endif; ?> value="<?php echo $url_file; ?>">
        </label> <!-- .predefined-option -->
        <?php endforeach; ?>

    </fieldset>

</div>