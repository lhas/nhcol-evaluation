<div class="wrap">
    <h2>Evaluations</h2>
    <div class="tablenav top">
        <div class="alignleft actions">
            <a href="<?php echo admin_url('admin.php?page=sinetiks_schools_create'); ?>">Add New</a>
        </div>
        <br class="clear">
    </div>
    <?php
    global $wpdb;

    $table_name = $wpdb->prefix . "nhcol_evaluation";
    $query = "SELECT * from $table_name";
    $rows = $wpdb->get_results($query);

    // pagination stuff
    $total = $wpdb->get_var( "SELECT COUNT(1) FROM (${query}) AS combined_table" );
    $post_per_page = 1;
    $page = isset( $_GET['cpage'] ) ? abs( (int) $_GET['cpage'] ) : 1;
    $offset = ( $page * $post_per_page ) - $post_per_page;

    $latest_rows = $wpdb->get_results( $query . " ORDER BY id LIMIT ${offset}, ${post_per_page}" );

    ?>
    <table class='wp-list-table widefat fixed striped posts'>
        <tr>
            <th class="manage-column ss-list-width">ID</th>
            <th class="manage-column ss-list-width">E-mail</th>
            <th class="manage-column ss-list-width">Comment</th>
            <th class="manage-column ss-list-width">Order Number</th>

            <?php
            for($i = 1; $i <= 5; $i++) : ?>
            <th class="manage-column ss-list-width">Field #<?php echo $i; ?></th>
            <?php endfor; ?>

            <th class="manage-column ss-list-width">Confirmed?</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach ($latest_rows as $row) { ?>
            <tr>
                <td class="manage-column ss-list-width"><?php echo $row->id; ?></td>
                <td class="manage-column ss-list-width"><?php echo $row->email; ?></td>
                <td class="manage-column ss-list-width"><?php echo $row->comment; ?></td>
                <td class="manage-column ss-list-width"><?php echo $row->order_number; ?></td>

                <?php
                for($i = 1; $i <= 5; $i++) :
                $evaluation_field = "evaluation_field_" . $i;

                if(!empty($row->$evaluation_field)) : ?>
                  <td class="manage-column ss-list-width"><?php echo $row->$evaluation_field; ?></td>
                <?php endif; endfor; ?>

                <td class="manage-column ss-list-width"><?php echo $row->confirmed; ?></td>
                <td>
                    <a href="<?php echo admin_url('admin.php?page=sinetiks_schools_update&id=' . $row->id); ?>" class="button"><span class="dashicons dashicons-edit"></span> Edit</a>
                    <a href="<?php echo admin_url('admin.php?page=sinetiks_schools_update&id=' . $row->id); ?>" class="button"><span class="dashicons dashicons-email"></span> Confirmation</a>
                    <a href="<?php echo admin_url('admin.php?page=sinetiks_schools_update&id=' . $row->id); ?>" class="button"><span class="dashicons dashicons-trash"></span> Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <?php 
    echo paginate_links( array(
        'base' => add_query_arg( 'cpage', '%#%' ),
        'format' => '',
        'prev_text' => __('&laquo;'),
        'next_text' => __('&raquo;'),
        'total' => ceil($total / $post_per_page),
        'current' => $page
    ));
    ?>
</div>