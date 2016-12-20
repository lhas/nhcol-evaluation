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
        'name' => '',
        'evaluation_field_1' => '',
        'evaluation_field_2' => '',
        'evaluation_field_3' => '',
        'evaluation_field_4' => '',
        'evaluation_field_5' => '',
        'confirmed' => '0'
    );

    $plugin_options = get_option('nhcol-evaluation');

    if($plugin_options['published_directly'] == 1) {
        $defaults['confirmed_admin'] = 1;
    }

    $args       = wp_parse_args( $args, $defaults );
    $table_name = $wpdb->prefix . 'nhcol_evaluation';

    // remove row id to determine if new or update
    $row_id = (int) $args['id'];
    unset( $args['id'] );

    if ( ! $row_id ) {
        $args['time'] = current_time('mysql', 1);

        // insert a new
        if ( $wpdb->insert( $table_name, $args ) ) {

            // confirmed email stuff
            $id = $wpdb->insert_id;
            $to = $args['email'];
            $company =  '[' . get_bloginfo('name') . '] ';
            $subject = $company . __('You must confirm your evaluation', 'nhcol-evaluation');
            $message = '<p>' . __('Hello!', 'nhcol-evaluation') . '</p>';
            $url = get_bloginfo('url') . '/?evaluation_confirm=' . base64_encode($id);

            $message .= '<p>' . __('Recently you submitted a evaluation about our store.', 'nhcol-evaluation') . '</p>';
            $message .= '<p>' . __('Now you need to confirm it, so we can show it at our website.', 'nhcol-evaluation') . '</p>';
            $message .= '<p>' . __('You just need to click in the link below:', 'nhcol-evaluation') . '</p>';
            $message .= '<a href="' . $url . '">' . $url . '</a>';

            add_filter( 'wp_mail_content_type', function( $content_type ) {
                return 'text/html';
            });
            
            wp_mail($to, $subject, $message);

            return $id;
        }

    } else {

        // do update method here
        if ( $wpdb->update( $table_name, $args, array( 'id' => $row_id ) ) ) {
            return $row_id;
        }
    }

    return false;
}

define('PLUGIN_MODE', 'PREMIUM');