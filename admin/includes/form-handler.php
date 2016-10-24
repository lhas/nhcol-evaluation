<?php

/**
 * Handle the form submissions
 *
 * @package Package
 * @subpackage Sub Package
 */
class Form_Handler {

    /**
     * Hook 'em all
     */
    public function __construct() {
        add_action( 'admin_init', array( $this, 'handle_form' ) );
    }

    /**
     * Handle the evaluation new and edit form
     *
     * @return void
     */
    public function handle_form() {
        if ( ! isset( $_POST['submit_evaluation'] ) ) {
            return;
        }

        if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'nhcol_evaluation' ) ) {
            die( __( 'Are you cheating?', 'nhcol_evaluation' ) );
        }


        $page_url = admin_url( 'admin.php?page=nhcol-evaluation&tab=evaluations_management&notice=evaluation_added' );
        $field_id = isset( $_POST['field_id'] ) ? intval( $_POST['field_id'] ) : 0;

        $fields = $_POST['evaluation'];

        // New or edit?
        if ( ! $field_id ) {

            $insert_id = wp_insert_evaluation( $fields );

        } else {

            $fields['id'] = $field_id;

            $insert_id = wp_insert_evaluation( $fields );
        }

        if ( is_wp_error( $insert_id ) ) {
            $redirect_to = add_query_arg( array( 'message' => 'error' ), $page_url );
        } else {
            $redirect_to = add_query_arg( array( 'message' => 'success' ), $page_url );
        }

        wp_safe_redirect( $redirect_to );
        exit;
    }
}

new Form_Handler();