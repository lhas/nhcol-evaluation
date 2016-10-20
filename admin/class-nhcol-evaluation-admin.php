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

    wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/nhcol-evaluation-admin.css', array(), $this->version, 'all' );

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

    wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/nhcol-evaluation-admin.js', array( 'jquery' ), $this->version, false );

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
    add_options_page( 'NHCOL Evaluation Setup', 'NHCOL Evaluation', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page')
    );
  }
  
  public function add_action_links( $links ) {
    /*
    *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
    */
    $settings_link = array(
      '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
    );

    return array_merge(  $settings_link, $links );
  }

  public function display_plugin_setup_page() {
    include_once( 'partials/nhcol-evaluation-admin-display.php' );
  }

  public function validate($input) {
    // All checkboxes inputs        
    $valid = array();

    $valid['company_name'] = (isset($input['company_name']) && !empty($input['company_name'])) ? $input['company_name'] : null;
    $valid['evaluation_question'] = (isset($input['evaluation_question']) && !empty($input['evaluation_question'])) ? $input['evaluation_question'] : null;
    $valid['evaluation_label_1'] = (isset($input['evaluation_label_1']) && !empty($input['evaluation_label_1'])) ? $input['evaluation_label_1'] : null;
    $valid['evaluation_label_2'] = (isset($input['evaluation_label_2']) && !empty($input['evaluation_label_2'])) ? $input['evaluation_label_2'] : null;
    $valid['evaluation_label_3'] = (isset($input['evaluation_label_3']) && !empty($input['evaluation_label_3'])) ? $input['evaluation_label_3'] : null;
    $valid['evaluation_label_4'] = (isset($input['evaluation_label_4']) && !empty($input['evaluation_label_4'])) ? $input['evaluation_label_4'] : null;
    $valid['evaluation_label_5'] = (isset($input['evaluation_label_5']) && !empty($input['evaluation_label_5'])) ? $input['evaluation_label_5'] : null;
    
    return $valid;
 }

 public function options_update() {
    register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
 }

}
