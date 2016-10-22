 <?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://0e1dev.com
 * @since      1.0.0
 *
 * @package    Nhcol_Evaluation
 * @subpackage Nhcol_Evaluation/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Nhcol_Evaluation
 * @subpackage Nhcol_Evaluation/public
 * @author     Luiz Almeida <luizhrqas@gmail.com>
 */
class Nhcol_Evaluation_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->plugin_options = get_option($this->plugin_name);

		// Shortcodes
		add_shortcode('nhcol-evaluation-badge', array($this, 'badge_shortcode') );
		add_shortcode('nhcol-evaluation-input', array($this, 'input_shortcode') );
		add_shortcode('nhcol-evaluation-output', array($this, 'output_shortcode') );
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/nhcol-evaluation-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/nhcol-evaluation-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Badge shortcode.
	 *
	 * You can use it as: [nhcol-evaluation-badge]
	 * It generates the badge.
	 */
	public function badge_shortcode() {
		ob_start();
		include('partials/shortcodes/badge.php');
		return ob_get_clean();
	}

	/**
	 * Input shortcode.
	 *
	 * You can use it as: [nhcol-evaluation-input]
	 * It generates the input form.
	 */
	public function input_shortcode() {
		return 'ae';
	}

	/**
	 * Output shortcode.
	 *
	 * You can use it as: [nhcol-evaluation-output]
	 * It generates the output data.
	 */
	public function output_shortcode() {
		return 'ae';
	}

}
