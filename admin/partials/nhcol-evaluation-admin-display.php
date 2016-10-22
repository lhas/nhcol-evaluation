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

        $evaluation_question = @$options['evaluation_question'];
        $evaluation_label_1 = @$options['evaluation_label_1'];
        $evaluation_label_2 = @$options['evaluation_label_2'];
        $evaluation_label_3 = @$options['evaluation_label_3'];
        $evaluation_label_4 = @$options['evaluation_label_4'];
        $evaluation_label_5 = @$options['evaluation_label_5'];

        $evaluation_label_5 = @$options['evaluation_label_5'];

        $button_background = @$options['button_background'];
        $button_text = @$options['button_text'];

        $company_logo_id = @$options['company_logo_id'];
        $company_logo = wp_get_attachment_image_src( $company_logo_id, 'thumbnail' );
        $company_logo_url = $company_logo[0];

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
        <a href="?page=nhcol-evaluation&tab=general_options" class="nav-tab <?php echo $active_tab == 'general_options' ? 'nav-tab-active' : ''; ?>">General Options</a>
        <a href="?page=nhcol-evaluation&tab=input_options" class="nav-tab <?php echo $active_tab == 'input_options' ? 'nav-tab-active' : ''; ?>">Input Options</a>
        <a href="?page=nhcol-evaluation&tab=output_options" class="nav-tab <?php echo $active_tab == 'output_options' ? 'nav-tab-active' : ''; ?>">Output Options</a>
        <a href="?page=nhcol-evaluation&tab=logos_options" class="nav-tab <?php echo $active_tab == 'logos_options' ? 'nav-tab-active' : ''; ?>">Logos Options</a>
        <a href="?page=nhcol-evaluation&tab=colors_options" class="nav-tab <?php echo $active_tab == 'colors_options' ? 'nav-tab-active' : ''; ?>">Colors Options</a>
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

</div>
