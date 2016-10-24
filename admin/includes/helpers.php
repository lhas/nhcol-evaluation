<?php

/**
 * Insert a new evaluation
 *
 * @param array $args
 */
function wp_insert_evaluation( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'id'         => null,
        'email' => '',
        'comment' => '',
        'order_number' => '',
        'evaluation_field_1' => '',
        'evaluation_field_2' => '',
        'evaluation_field_3' => '',
        'evaluation_field_4' => '',
        'evaluation_field_5' => '',
        'confirmed' => '0',

    );

    $args       = wp_parse_args( $args, $defaults );
    $table_name = $wpdb->prefix . 'nhcol_evaluation';

    // remove row id to determine if new or update
    $row_id = (int) $args['id'];
    unset( $args['id'] );

    if ( ! $row_id ) {

        

        // insert a new
        if ( $wpdb->insert( $table_name, $args ) ) {
            return $wpdb->insert_id;
        }

    } else {

        // do update method here
        if ( $wpdb->update( $table_name, $args, array( 'id' => $row_id ) ) ) {
            return $row_id;
        }
    }

    return false;
}