<?php

if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Evaluation_List_Table extends WP_List_Table {
  public static $table_name = "nhcol_evaluation";
  public static $plugin_name = "nhcol-evaluation";

  function get_columns(){
    $columns        = array();
    $plugin_options = get_option('nhcol-evaluation');

    $columns['cb']        = '<input type="checkbox" />';
    $columns['confirmed'] = __('Confirmed?', self::$plugin_name);

    if($plugin_options['published_directly'] == 0) {
      $columns['confirmed_admin'] = __('Confirmed by admin?', self::$plugin_name);
    }

    $columns['email']         = __('Email', self::$plugin_name);
    $columns['comment']       = __('Comment', self::$plugin_name);
    $columns['name']  = __('Name', self::$plugin_name);


    for($i = 1; $i <= 5; $i++) {
      $label = 'evaluation_label_' . $i;

      if(!empty($plugin_options[$label])) {
        $columns['evaluation_field_' . $i] = $plugin_options[$label];
      }
    }


    return $columns;
  }

  function get_sortable_columns() {
    $sortable_columns = array();
    $plugin_options   = get_option('nhcol-evaluation');

    $sortable_columns['email']              = array('email',false);
    $sortable_columns['comment']            = array('comment',false);
    $sortable_columns['confirmed']          = array('confirmed',false);

    if($plugin_options['published_directly'] == 0) {
      $sortable_columns['confirmed_admin'] = array('confirmed_admin', true);
    }

    $sortable_columns['name']       = array('name',false);
    $sortable_columns['evaluation_field_1'] = array('evaluation_field_1',false);
    $sortable_columns['evaluation_field_2'] = array('evaluation_field_2',false);
    $sortable_columns['evaluation_field_3'] = array('evaluation_field_3',false);
    $sortable_columns['evaluation_field_4'] = array('evaluation_field_4',false);
    $sortable_columns['evaluation_field_5'] = array('evaluation_field_5',false);

    return $sortable_columns;
  }

  public static function record_count() {
    global $wpdb;

    $table_name = self::$table_name;
    $sql = "SELECT COUNT(*) FROM {$wpdb->prefix}$table_name";

    return $wpdb->get_var( $sql );
  }

  function prepare_items() {
    $columns = $this->get_columns();
    $hidden = array();
    $sortable = $this->get_sortable_columns();
    $this->_column_headers = array($columns, $hidden, $sortable);

    /** Process bulk action */
    $this->process_bulk_action();
  
    // pagination stuff
    $per_page     = $this->get_items_per_page( 'evaluations_per_page', 10 );
    $current_page = $this->get_pagenum();
    $total_items  = self::record_count();

    $this->set_pagination_args( [
      'total_items' => $total_items, //WE have to calculate the total number of items
      'per_page'    => $per_page //WE have to determine how many items to show on a page
    ] );

    $this->items = self::get_evaluations( $per_page, $current_page );
  }

  function column_default( $item, $column_name ) {
    switch( $column_name ) {
      case 'confirmed':

        return ($item[ $column_name ] == "1") ? '<span style="color: green; font-weight: bold;">' . __('Yes', 'nhcol-evaluation') . '</span>' : '<span style="color: red; font-weight: bold;">' . __('No', 'nhcol-evaluation') . '</span>';

        break;
      case 'confirmed_admin':

        return ($item[ $column_name ] == "1") ? '<span style="color: green; font-weight: bold;">' . __('Yes', 'nhcol-evaluation') . '</span>' : '<span style="color: red; font-weight: bold;">' . __('No', 'nhcol-evaluation') . '</span>';

        break;
      case 'email':
      case 'comment':
      case 'name':
        return $item[ $column_name ];
        break;
      case 'evaluation_field_1':
      case 'evaluation_field_2':
      case 'evaluation_field_3':
      case 'evaluation_field_4':
      case 'evaluation_field_5':

        $evaluation = '';

        for($i = 1; $i <= $item[$column_name]; $i++) {
          $evaluation .= '<span class="dashicons dashicons-star-filled"></span>';
        }

        $stars_remaining = 5 - $item[$column_name];

        if($stars_remaining > 0) {
          for($i = 1; $i <= $stars_remaining; $i++) {
            $evaluation .= '<span class="dashicons dashicons-star-empty"></span>';
          }
        }

        return $evaluation;
        break;
      default:
        return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
    }
  }

  function column_email($item) {
    $actions = array(
              'edit'      => sprintf('<a href="?page=%s&evaluation=%s">Edit</a>','nhcol-evaluation_edit',$item['id']),
          );

    return sprintf('%1$s %2$s', $item['email'], $this->row_actions($actions) );
  }

  public function process_bulk_action() {
    //Detect when a bulk action is being triggered...
    if ( 'delete' === $this->current_action() ) {

      $evaluations = isset($_REQUEST['evaluations']) ? $_REQUEST['evaluations'] : null;
      
      if(!empty($evaluations)) {
        global $wpdb;
        
        foreach($evaluations as $evaluation_id) {
          $table_name = $wpdb->prefix . self::$table_name;
          $wpdb->query("DELETE FROM $table_name WHERE id = $evaluation_id");
        }
      }
    }

  }

  public static function get_evaluations( $per_page = 10, $page_number = 1 ) {
    global $wpdb;

    $table_name = self::$table_name;
    $sql = "SELECT * FROM {$wpdb->prefix}$table_name";

    if ( ! empty( $_REQUEST['orderby'] ) ) {
      $sql .= ' ORDER BY ' . esc_sql( $_REQUEST['orderby'] );
      $sql .= ! empty( $_REQUEST['order'] ) ? ' ' . esc_sql( $_REQUEST['order'] ) : ' ASC';
    }

    if ( empty( $_REQUEST['orderby'] ) ) {
      $sql .= ' ORDER BY ' . esc_sql( 'id' ) . ' DESC';
    }

    $sql .= " LIMIT $per_page";

    $sql .= ' OFFSET ' . ( $page_number - 1 ) * $per_page;


    $result = $wpdb->get_results( $sql, 'ARRAY_A' );

    return $result;
  }

  function get_bulk_actions() {
    $actions = array(
      'delete'    => 'Delete'
    );
    return $actions;
  }

  function column_cb($item) {
      return sprintf(
          '<input type="checkbox" name="evaluations[]" value="%s" />', $item['id']
      );    
  }

}