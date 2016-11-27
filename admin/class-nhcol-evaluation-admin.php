<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://0e1dev.com
 * @since      1.0.0
 *
 * @package    Nhcol_Evaluation
 * @subpackage Nhcol_Evaluation/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Nhcol_Evaluation
 * @subpackage Nhcol_Evaluation/admin
 * @author     Luiz Almeida <luizhrqas@gmail.com>
 */
class Nhcol_Evaluation_Admin {

  /**
   * The ID of this plugin.
   *
   * @since    1.0.0
   * @access   private
   * @var      string    $plugin_name    The ID of this plugin.
   */
  private $plugin_name;

  /**
   * The version of this plugin.
   *
   * @since    1.0.0
   * @access   private
   * @var      string    $version    The current version of this plugin.
   */
  private $version;

  /**
   * Initialize the class and set its properties.
   *
   * @since    1.0.0
   * @param      string    $plugin_name       The name of this plugin.
   * @param      string    $version    The version of this plugin.
   */
  public function __construct( $plugin_name, $version ) {

    $this->plugin_name = $plugin_name;
    $this->version = $version;

    add_action( 'after_setup_theme',    array( $this, 'addFeaturedImageSupport' ), 11 );
  }


    public function addFeaturedImageSupport()
    {
        add_image_size( 'logo1', 250, 250 );
        add_image_size( 'logo2', 250, 250, true );
    }

  /**
   * Register the stylesheets for the admin area.
   *
   * @since    1.0.0
   */
  public function enqueue_styles() {

    /**
     * This function is provided for demonstration purposes only.
     *
     * An instance of this class should be passed to the run() function
     * defined in Nhcol_Evaluation_Loader as all of the hooks are defined
     * in that particular class.
     *
     * The Nhcol_Evaluation_Loader will then create the relationship
     * between the defined hooks and the functions defined in this
     * class.
     */

      // CSS stylesheet for Color Picker
      wp_enqueue_style( 'wp-color-picker' );
      wp_enqueue_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', array(), $this->version, 'all' );
      wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/nhcol-evaluation-admin.css', array( 'wp-color-picker' ), $this->version, 'all' );
  }

  /**
   * Register the JavaScript for the admin area.
   *
   * @since    1.0.0
   */
  public function enqueue_scripts() {

    /**
     * This function is provided for demonstration purposes only.
     *
     * An instance of this class should be passed to the run() function
     * defined in Nhcol_Evaluation_Loader as all of the hooks are defined
     * in that particular class.
     *
     * The Nhcol_Evaluation_Loader will then create the relationship
     * between the defined hooks and the functions defined in this
     * class.
     */

      wp_enqueue_media();
      wp_enqueue_script( 'angularjs', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js', array( ), $this->version, false );
      wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/nhcol-evaluation-admin.js', array( 'jquery', 'wp-color-picker', 'media-upload' ), $this->version, false );
      wp_enqueue_script( $this->plugin_name . '_public', plugin_dir_url( __FILE__ ) . '../public/js/nhcol-evaluation-public.js', array( 'jquery', 'wp-color-picker', 'media-upload' ), $this->version, false );

  }

  public function add_plugin_admin_menu() {
    /*
    * Add a settings page for this plugin to the Settings menu.
    *
    * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
    *
    *        Administration Menus: http://codex.wordpress.org/Administration_Menus
    *
    */
    add_menu_page( 'NHCOL Evaluation Setup',  __('Evaluations', $this->plugin_name), 'manage_options', $this->plugin_name, array($this, 'display_plugin_all_page'), 'dashicons-megaphone'
    );

    add_submenu_page( $this->plugin_name,  __('Add New', $this->plugin_name),  __('Add New', $this->plugin_name),
    'manage_options', $this->plugin_name. '_add_new', array($this, 'display_plugin_add_new_page'));

    add_submenu_page( $this->plugin_name,  __('Setup', $this->plugin_name),  __('Setup', $this->plugin_name),
    'manage_options', $this->plugin_name. '_setup', array($this, 'display_plugin_setup_page'));

    add_submenu_page( null,  __('Edit', $this->plugin_name),  __('Edit', $this->plugin_name),
    'manage_options', $this->plugin_name. '_edit', array($this, 'display_plugin_edit_page'));
  }
  
  public function add_action_links( $links ) {
    /*
    *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
    */
    $settings_link = array(
      '<a href="' . admin_url( 'admin.php?page=' . $this->plugin_name . '_setup' ) . '">' . __('Settings', $this->plugin_name) . '</a>',
    );

    return array_merge(  $settings_link, $links );
  }

  public function display_plugin_all_page() {
    include_once( 'partials/nhcol-evaluation-admin-all.php' );
  }

  public function display_plugin_add_new_page() {
    include_once( 'partials/nhcol-evaluation-admin-add-new.php' );
  }

  public function display_plugin_edit_page() {
    
    global $wpdb;
    $evaluation_id = $_GET['evaluation'];

    $table_name = $wpdb->prefix . 'nhcol_evaluation';
    $evaluation = $wpdb->get_row( "SELECT * FROM $table_name WHERE id = $evaluation_id" );

    for($i = 1; $i <= 5; $i++) {
      $attribute = 'evaluation_field_'. $i;
      $evaluation->fields[$i] = ['value' => intval($evaluation->$attribute)];
    }

    include_once( 'partials/nhcol-evaluation-admin-edit.php' );
  }

  public function display_plugin_setup_page() {
    include_once( 'partials/nhcol-evaluation-admin-display.php' );
  }

  public function validate($input) {
    // All checkboxes inputs        
    $valid = array();

    $valid['company_name'] = (isset($input['company_name']) && !empty($input['company_name'])) ? $input['company_name'] : null;

    $valid['evaluation_question'] = (isset($input['evaluation_question']) && !empty($input['evaluation_question'])) ? $input['evaluation_question'] : null;
    $valid['evaluate_url'] = (isset($input['evaluate_url']) && !empty($input['evaluate_url'])) ? $input['evaluate_url'] : null;

    $valid['maximum_evaluations_per_page'] = (isset($input['maximum_evaluations_per_page']) && !empty($input['maximum_evaluations_per_page'])) ? $input['maximum_evaluations_per_page'] : null;
    
    $valid['first_block_text'] = (isset($input['first_block_text']) && !empty($input['first_block_text'])) ? $input['first_block_text'] : null;
    $valid['second_block_text'] = (isset($input['second_block_text']) && !empty($input['second_block_text'])) ? $input['second_block_text'] : null;

    $valid['evaluation_label_1'] = (isset($input['evaluation_label_1']) && !empty($input['evaluation_label_1'])) ? $input['evaluation_label_1'] : null;
    $valid['evaluation_label_2'] = (isset($input['evaluation_label_2']) && !empty($input['evaluation_label_2'])) ? $input['evaluation_label_2'] : null;
    $valid['evaluation_label_3'] = (isset($input['evaluation_label_3']) && !empty($input['evaluation_label_3'])) ? $input['evaluation_label_3'] : null;
    $valid['evaluation_label_4'] = (isset($input['evaluation_label_4']) && !empty($input['evaluation_label_4'])) ? $input['evaluation_label_4'] : null;
    $valid['evaluation_label_5'] = (isset($input['evaluation_label_5']) && !empty($input['evaluation_label_5'])) ? $input['evaluation_label_5'] : null;

    $valid['button_background'] = (isset($input['button_background']) && !empty($input['button_background'])) ? $input['button_background'] : null;
    $valid['button_text'] = (isset($input['button_text']) && !empty($input['button_text'])) ? $input['button_text'] : null;
    $valid['badge_position'] = (isset($input['badge_position']) && !empty($input['badge_position'])) ? $input['badge_position'] : null;

    //First Color Picker
    $valid['button_background'] = (isset($input['button_background']) && !empty($input['button_background'])) ? sanitize_text_field($input['button_background']) : '';

    if ( !empty($valid['button_background']) && !preg_match( '/^#[a-f0-9]{6}$/i', $valid['button_background']  ) ) { // if user insert a HEX color with #
        add_settings_error(
                'button_background',                     // Setting title
                'button_background_texterror',            // Error ID
                'Please enter a valid hex value color',     // Error message
                'error'                         // Type of message
        );
    }

    //Second Color Picker
    $valid['button_text'] = (isset($input['button_text']) && !empty($input['button_text'])) ? sanitize_text_field($input['button_text']) : '';
    
    if ( !empty($valid['button_text']) && !preg_match( '/^#[a-f0-9]{6}$/i', $valid['button_text']  ) ) { // if user insert a HEX color with #
        add_settings_error(
                'button_text',                     // Setting title
                'button_text_texterror',            // Error ID
                'Please enter a valid hex value color',     // Error message
                'error'                         // Type of message
        );
    }

    // Company Logo id
    $valid['company_logo_id'] = (isset($input['company_logo_id']) && !empty($input['company_logo_id'])) ? absint($input['company_logo_id']) : 0;

    // Seal Logo
    $valid['seal_logo_id'] = (isset($input['seal_logo_id']) && !empty($input['seal_logo_id'])) ? absint($input['seal_logo_id']) : 0;
    
    $valid['show_badge'] = (isset($input['show_badge']) && !empty($input['show_badge'])) ? $input['show_badge'] : 0;

    // Terms of Service
    $valid['terms_of_service_text'] = (isset($input['terms_of_service_text']) && !empty($input['terms_of_service_text'])) ? $input['terms_of_service_text'] : null;
    $valid['terms_of_service_url'] = (isset($input['terms_of_service_url']) && !empty($input['terms_of_service_url'])) ? $input['terms_of_service_url'] : null;

    return $valid;
 }

 public function options_update() {
    register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
 }

}
