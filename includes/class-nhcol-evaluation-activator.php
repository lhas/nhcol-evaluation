<?php

/**
 * Fired during plugin activation
 *
 * @link       http://0e1dev.com
 * @since      1.0.0
 *
 * @package    Nhcol_Evaluation
 * @subpackage Nhcol_Evaluation/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Nhcol_Evaluation
 * @subpackage Nhcol_Evaluation/includes
 * @author     Luiz Almeida <luizhrqas@gmail.com>
 */
class Nhcol_Evaluation_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		global $wpdb;

		$table_name = $wpdb->prefix . "nhcol_evaluation"; 

		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
			id mediumint(9) NOT NULL AUTO_INCREMENT,
			time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			email varchar(255) NOT NULL,
			comment text NOT NULL,
			order_number varchar(255) NOT NULL,
			evaluation_field_1 int NULL,
			evaluation_field_2 int NULL,
			evaluation_field_3 int NULL,
			evaluation_field_4 int NULL,
			evaluation_field_5 int NULL,
			confirmed int DEFAULT '0' NULL,
			PRIMARY KEY  (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	}

}
