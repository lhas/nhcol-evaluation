<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://0e1dev.com
 * @since      1.0.0
 *
 * @package    Nhcol_Evaluation
 * @subpackage Nhcol_Evaluation/admin/partials
 */
?>

<div class="wrap">

    <h2><?php echo esc_html(get_admin_page_title()); ?></h2>
    
    <form method="post" name="<?php echo $this->plugin_name; ?>_options" action="options.php">

      <?php
        //Grab all options
        $options = get_option($this->plugin_name);

        // Cleanup
        $company_name = @$options['company_name'];
        $evaluation_question = @$options['evaluation_question'];
        $evaluation_label_1 = @$options['evaluation_label_1'];
        $evaluation_label_2 = @$options['evaluation_label_2'];
        $evaluation_label_3 = @$options['evaluation_label_3'];
        $evaluation_label_4 = @$options['evaluation_label_4'];
        $evaluation_label_5 = @$options['evaluation_label_5'];
    ?>

    <?php
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
    ?>
      
      <h3>General Config</h3>

        <!--
        <fieldset>
            <p>Seal Logo</p>
            <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
            <input type="file">
        </fieldset>

        <fieldset>
            <p>Company Logo</p>
            <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
            <input type="file">
        </fieldset>-->

        <fieldset>
            <p>Company Name</p>
            <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-company_name" name="<?php echo $this->plugin_name; ?>[company_name]" value="<?php if(!empty($company_name)) echo $company_name; ?>"/>
        </fieldset>

      <h3>Input Config</h3>

        <fieldset>
            <p>Evaluation Title</p>
            <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-evaluation_question" name="<?php echo $this->plugin_name; ?>[evaluation_question]" value="<?php if(!empty($evaluation_question)) echo $evaluation_question; ?>"/>
        </fieldset>

        <fieldset>
            <p>Evaluation Label #1</p>
            <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-evaluation_label_1" name="<?php echo $this->plugin_name; ?>[evaluation_label_1]" value="<?php if(!empty($evaluation_label_1)) echo $evaluation_label_1; ?>"/>
        </fieldset>

        <fieldset>
            <p>Evaluation Label #2</p>
            <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-evaluation_label_2" name="<?php echo $this->plugin_name; ?>[evaluation_label_2]" value="<?php if(!empty($evaluation_label_1)) echo $evaluation_label_2; ?>"/>
        </fieldset>

        <fieldset>
            <p>Evaluation Label #3</p>
            <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-evaluation_label_3" name="<?php echo $this->plugin_name; ?>[evaluation_label_3]" value="<?php if(!empty($evaluation_label_1)) echo $evaluation_label_3; ?>"/>
        </fieldset>

        <fieldset>
            <p>Evaluation Label #4</p>
            <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-evaluation_label_4" name="<?php echo $this->plugin_name; ?>[evaluation_label_4]" value="<?php if(!empty($evaluation_label_1)) echo $evaluation_label_4; ?>"/>
        </fieldset>

        <fieldset>
            <p>Evaluation Label #5</p>
            <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
            <input type="text" class="regular-text" id="<?php echo $this->plugin_name; ?>-evaluation_label_5" name="<?php echo $this->plugin_name; ?>[evaluation_label_5]" value="<?php if(!empty($evaluation_label_1)) echo $evaluation_label_5; ?>"/>
        </fieldset>

        <!--

        <fieldset>
            <p>Button Background Color</p>
            <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
            <input type="url" class="regular-text" id="<?php echo $this->plugin_name; ?>-cdn_provider" name="<?php echo $this->plugin_name; ?>[cdn_provider]" value=""/>
        </fieldset>

        <fieldset>
            <p>Button Text Color</p>
            <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
            <input type="url" class="regular-text" id="<?php echo $this->plugin_name; ?>-cdn_provider" name="<?php echo $this->plugin_name; ?>[cdn_provider]" value=""/>
        </fieldset>

        <fieldset>
            <p>First Text on Right Column</p>
            <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
            <textarea name="<?php echo $this->plugin_name; ?>[cdn_provider]" class="regular-text" id="<?php echo $this->plugin_name; ?>-cdn_provider" cols="30" rows="10"></textarea>
        </fieldset>

        <fieldset>
            <p>Second Text on Right Column</p>
            <legend class="screen-reader-text"><span><?php _e('Choose your prefered cdn provider', $this->plugin_name); ?></span></legend>
            <textarea name="<?php echo $this->plugin_name; ?>[cdn_provider]" class="regular-text" id="<?php echo $this->plugin_name; ?>-cdn_provider" cols="30" rows="10"></textarea>
        </fieldset>

      <h3>Input Config</h3>

        <fieldset>
            <legend class="screen-reader-text"><span>Empty until now</span></legend>
            <label for="<?php echo $this->plugin_name; ?>-cleanup">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-cleanup" name="<?php echo $this->plugin_name; ?> [cleanup]" value="1"/>
                <span><?php esc_attr_e('Empty until now', $this->plugin_name); ?></span>
            </label>
        </fieldset>

      <h3>Output Config</h3>

        <fieldset>
            <legend class="screen-reader-text"><span>Empty until now</span></legend>
            <label for="<?php echo $this->plugin_name; ?>-cleanup">
                <input type="checkbox" id="<?php echo $this->plugin_name; ?>-cleanup" name="<?php echo $this->plugin_name; ?> [cleanup]" value="1"/>
                <span><?php esc_attr_e('Empty until now', $this->plugin_name); ?></span>
            </label>
        </fieldset>-->

        <?php submit_button('Save all changes', 'primary','submit', TRUE); ?>

    </form>

</div>
