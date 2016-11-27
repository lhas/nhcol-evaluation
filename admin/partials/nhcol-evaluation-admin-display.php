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
        $options = get_option($this->plugin_name);

        $company_name = @$options['company_name'];

        $evaluation_question    = @$options['evaluation_question'];
        $evaluation_label_1     = @$options['evaluation_label_1'];
        $evaluation_label_2     = @$options['evaluation_label_2'];
        $evaluation_label_3     = @$options['evaluation_label_3'];
        $evaluation_label_4     = @$options['evaluation_label_4'];
        $evaluation_label_5     = @$options['evaluation_label_5'];

        $evaluation_label_5     = @$options['evaluation_label_5'];

        $button_background      = @$options['button_background'];
        $button_text            = @$options['button_text'];
        $badge_position         = @$options['badge_position'];

        $company_logo_id        = @$options['company_logo_id'];
        $company_logo           = wp_get_attachment_image_src( $company_logo_id, 'logo1' );
        $company_logo_url       = $company_logo[0];

        $seal_logo_id           = @$options['seal_logo_id'];
        $seal_logo              = wp_get_attachment_image_src( $seal_logo_id, 'logo1' );
        $seal_logo_url          = $seal_logo[0];

        $evaluate_url           = @$options['evaluate_url'];
        $first_block_text       = @$options['first_block_text'];
        $second_block_text      = @$options['second_block_text'];

        $maximum_evaluations_per_page   = @$options['maximum_evaluations_per_page'];
        $show_badge                     = @$options['show_badge'];

        $terms_of_service_text          = @$options['terms_of_service_text'];
        $terms_of_service_url           = @$options['terms_of_service_url'];
        $published_directly             = @$options['published_directly'];
        $background_color_output_form   = @$options['background_color_output_form'];
        $stars_color                    = @$options['stars_color'];
        $badge_size                     = @$options['badge_size'];

        if( isset( $_GET[ 'tab' ] ) ) {
            $active_tab = $_GET[ 'tab' ];
        } else {
            $active_tab = 'general_options';
        }
    ?>

    <?php
        settings_fields($this->plugin_name);
        do_settings_sections($this->plugin_name);
    ?>

    <h2 class="nav-tab-wrapper">
        <a href="?page=nhcol-evaluation_setup&tab=general_options" class="nav-tab <?php echo $active_tab == 'general_options' ? 'nav-tab-active' : ''; ?>"><?php echo _e('General Options', $this->plugin_name); ?></a>
        <a href="?page=nhcol-evaluation_setup&tab=input_options" class="nav-tab <?php echo $active_tab == 'input_options' ? 'nav-tab-active' : ''; ?>"><?php echo _e('Input Options', $this->plugin_name); ?></a>
        <a href="?page=nhcol-evaluation_setup&tab=output_options" class="nav-tab <?php echo $active_tab == 'output_options' ? 'nav-tab-active' : ''; ?>"><?php echo _e('Output Options', $this->plugin_name); ?></a>
        <a href="?page=nhcol-evaluation_setup&tab=logos_options" class="nav-tab <?php echo $active_tab == 'logos_options' ? 'nav-tab-active' : ''; ?>"><?php echo _e('Logos Options', $this->plugin_name); ?></a>
        <a href="?page=nhcol-evaluation_setup&tab=colors_options" class="nav-tab <?php echo $active_tab == 'colors_options' ? 'nav-tab-active' : ''; ?>"><?php echo _e('Colors Options', $this->plugin_name); ?></a>
    </h2>

    <div class="<?php if($active_tab != 'general_options') : ?>hidden<?php endif; ?>">
        <?php require_once "tabs/general-options.php"; ?>
    </div>
    
    <div class="<?php if($active_tab != 'input_options') : ?>hidden<?php endif; ?>">
        <?php require_once "tabs/input-options.php"; ?>
    </div>
    
    <div class="<?php if($active_tab != 'output_options') : ?>hidden<?php endif; ?>">
        <?php require_once "tabs/output-options.php"; ?>
    </div>
    
    <div class="<?php if($active_tab != 'logos_options') : ?>hidden<?php endif; ?>">
        <?php require_once "tabs/logos-options.php"; ?>
    </div>
    
    <div class="<?php if($active_tab != 'colors_options') : ?>hidden<?php endif; ?>">
        <?php require_once "tabs/colors-options.php"; ?>
    </div>
    
    <?php submit_button(__('Save all', $this->plugin_name), 'primary','submit', TRUE); ?>

    </form>


    <h3>Shortcodes</h3>

    <fieldset>
        <p><?php echo _e('Input Form', $this->plugin_name); ?></p>
        <input type="text" value="[nhcol-evaluation-input]" class="regular-text">
    </fieldset>

    <fieldset>
        <p><?php echo _e('Output Average', $this->plugin_name); ?></p>
        <input type="text" value="[nhcol-evaluation-output-average]" class="regular-text">
    </fieldset>

    <fieldset>
        <p><?php echo _e('Output Pagination', $this->plugin_name); ?></p>
        <input type="text" value="[nhcol-evaluation-output-pagination]" class="regular-text">
    </fieldset>

    <fieldset>
        <p><?php echo _e('Badge', $this->plugin_name); ?></p>
        <input type="text" value="[nhcol-evaluation-badge]" class="regular-text">
    </fieldset>

</div>
