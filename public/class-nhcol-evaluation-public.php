 <?php

require_once plugin_dir_path( __FILE__ ) . "../admin/includes/helpers.php";

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

	// validation confirmed
	public $error 	= false;
	public $success = false;

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

		// translates
		$this->plugin_options['translates'] = array(
			array('name' => __('Not rated', $this->plugin_name) ),
			array('name' => __('Deficiente', $this->plugin_name) ),
			array('name' => __('Suficientemente', $this->plugin_name) ),
			array('name' => __('Satisfatório', $this->plugin_name) ),
			array('name' => __('Bom', $this->plugin_name) ),
			array('name' => __('Excelente', $this->plugin_name) ),
		);

		// labels
		$this->plugin_options['labels'] = array();

		for($i = 1; $i <= 5; $i++) :
			if(!empty($this->plugin_options['evaluation_label_' . $i])) :
					$this->plugin_options['labels'][] = array(
							'name' => $this->plugin_options['evaluation_label_' . $i]
					);
			endif;
		endfor;

		// Shortcodes
		add_shortcode('nhcol-evaluation-badge', array($this, 'badge_shortcode') );
		add_shortcode('nhcol-evaluation-input', array($this, 'input_shortcode') );
		add_shortcode('nhcol-evaluation-output-average', array($this, 'output_average_shortcode') );
		add_shortcode('nhcol-evaluation-output-pagination', array($this, 'output_pagination_shortcode') );

		add_action('wp_head', array($this, 'validate_evaluation_confirm') );
		add_action('wp_footer', array($this, 'add_badge_to_website') );

		add_action( 'wp_ajax_submit_evaluation', array($this, 'submit_evaluation_callback') );
		add_action( 'wp_ajax_nopriv_submit_evaluation', array($this, 'submit_evaluation_callback') );
	}

	public function submit_evaluation_callback() {
		$evaluation = json_decode(urldecode(stripslashes($_REQUEST['evaluation'])), true);

		$fields = $evaluation['fields'];

		unset($evaluation['fields']);

		foreach($fields as $index => $field) {
			$subindex = $index+1;
			$evaluation['evaluation_field_' . $subindex] = $field['value'];
		}

		wp_insert_evaluation($evaluation);

		echo __('Evaluation submitted with success. You must confirm it on your email. Thank you!', $this->plugin_name);

		wp_die();
	}

	public function add_badge_to_website() {
		include('partials/shortcodes/badge.php');
	}

	/**
	* Function called when we need to validate evaluation confirm (from email).
	*/
	public function validate_evaluation_confirm() {
		if(isset($_GET['evaluation_confirm'])) {

			global $wpdb;

			// evaluation_id decoded
			$evaluation_id = base64_decode($_GET['evaluation_confirm']);

			// get current evaluation selected
			$table_name = $wpdb->prefix . 'nhcol_evaluation';
			$evaluation = $wpdb->get_row( "SELECT * FROM $table_name WHERE id = $evaluation_id" );
			
			// if evaluation already confirmed
			if($evaluation->confirmed == "1") {
				$this->error = __('Evaluation already confirmed.', $this->plugin_name);
			}
			
			// if evaluation still not confirmed
			if($evaluation->confirmed == "0") {
				// update it
				$wpdb->update( $table_name, array('confirmed' => '1'), array('id' => $evaluation_id) );

				$this->success = __('The evaluation was confirmed. Thank you.', $this->plugin_name);
			}

			add_action( 'wp_footer', array(&$this, 'evaluation_confirmed_output') );

		}
	}


	public function evaluation_confirmed_output() {
		if($this->success) {
			require_once "partials/confirmed/success.php";
		}

		if($this->error) {
			require_once "partials/confirmed/error.php";
		}
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

		wp_enqueue_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css', array(), $this->version, 'all' );
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

		wp_enqueue_script( 'angularjs', 'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js', array( ), $this->version, false );
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
		$this->plugin_options['admin_ajax'] = admin_url('admin-ajax.php');

		ob_start();
		include('partials/shortcodes/input.php');
		return ob_get_clean();
	}

	/**
	 * Output shortcode.
	 *
	 * You can use it as: [nhcol-evaluation-output-average]
	 * It generates the output data.
	 */
	public function output_average_shortcode() {
		global $wpdb;

		// get all evaluations confirmed
		$table_name = $wpdb->prefix . 'nhcol_evaluation';
		$evaluations = $wpdb->get_results( "SELECT * FROM $table_name WHERE confirmed = '1'" );

		// evaluations count
		$this->plugin_options['reviewCount'] = sizeof($evaluations);

		// calc ratings for each field
		$ratings = array(
		);

		foreach($evaluations as $evaluation) {
			for($i = 1; $i <= 5; $i++) {
				$attribute = "evaluation_field_" . $i;

				if(!empty($evaluation->$attribute)) {
					@$ratings[$i] += $evaluation->$attribute;
				}
			}
		}

		foreach($ratings as $index => $rating) {
			$this->plugin_options['labels'][$index-1]['average'] = $rating / sizeof($evaluations);
		}

		$ratingValue = 0;

		foreach($this->plugin_options['labels'] as $label) {
			$ratingValue += $label['average'];
		}

		$this->plugin_options['ratingValue'] = round($ratingValue / sizeof($ratings), 2);
		$this->plugin_options['ratingValueFormatted'] = $this->format_rating($this->plugin_options['ratingValue']);

		ob_start();
		include('partials/shortcodes/output/average.php');
		return ob_get_clean();
	}

	/**
	 * Output Pagination shortcode.
	 *
	 * You can use it as: [nhcol-evaluation-output-pagination]
	 * It generates the output data.
	 */
	public function output_pagination_shortcode() {
		global $wpdb;

		// get all evaluations confirmed
		$table_name = $wpdb->prefix . 'nhcol_evaluation';
		$query = "SELECT * FROM $table_name WHERE confirmed = '1'";
		$total_query = "SELECT COUNT(1) FROM (${query}) AS combined_table";
		$total = $wpdb->get_var( $total_query );
		$items_per_page = 2;
		$page = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
		$offset = ( $page * $items_per_page ) - $items_per_page;
		$latest_evaluations = $wpdb->get_results( $query . " ORDER BY id DESC LIMIT ${offset}, ${items_per_page}" );

		foreach($latest_evaluations as $evaluation) :
			$evaluation->average = 0;
			$n = 0;

			for($i = 1; $i <= 5; $i++) {
				$attribute = 'evaluation_field_' . $i;

				if(!empty($evaluation->$attribute)) {
					$evaluation->average += $evaluation->$attribute;
					$n += 1;
				}
			}

			$evaluation->average = round($evaluation->average / $n, 2);
			$evaluation->average_translate = $this->plugin_options['translates'][$evaluation->average]['name'];
		endforeach;

		ob_start();
		include('partials/shortcodes/output/pagination.php');
		return ob_get_clean();
	}

	public function format_rating($number) {
		return number_format((float)$number, 1, ',', '');
	}

}
