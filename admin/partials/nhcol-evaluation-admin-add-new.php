<div class="wrap">
  <h1><?php echo _e('Add New Evaluation', $this->plugin_name); ?></h1>

  <form method="post" action="">
  
    <table class="form-table">
        <tr valign="top">
          <th scope="row"><?php echo _e('Email', $this->plugin_name); ?></th>
          <td><input type="email" required name="evaluation[email]" class="regular-text" value="" /></td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php echo _e('Comment', $this->plugin_name); ?></th>
          <td>
            <textarea name="evaluation[comment]" required class="regular-text" id="" cols="30" rows="10"></textarea>
          </td>
        </tr>
        <tr valign="top">
          <th scope="row"><?php echo _e('Order Number', $this->plugin_name); ?></th>
          <td><input type="text" required name="evaluation[order_number]" class="regular-text" value="" /></td>
        </tr>

        <?php
          $plugin_options = get_option('nhcol-evaluation');

          for($i = 1; $i <= 5; $i++) {
            $label = 'evaluation_label_' . $i;
            $attribute = 'evaluation_field_' . $i;
            
            if(!empty($plugin_options[$label])) :
        ?>

        <tr valign="top">
          <th scope="row"><?php echo $plugin_options[$label]; ?></th>
          <td>
            <input type="range" required name="evaluation[evaluation_field_<?php echo $i; ?>]"  min="1" max="5" value="1" step="1">
          </td>
        </tr>

        <?php endif; } ?>

        <tr valign="top">
          <th scope="row"><?php echo _e('Confirmed?', $this->plugin_name); ?></th>
          <td>
            <input type="hidden" name="evaluation[confirmed]" value="0" />
            <input type="checkbox" name="evaluation[confirmed]" value="1" />
          </td>
        </tr>
    </table>

    <?php wp_nonce_field( 'nhcol_evaluation' ); ?>
    <?php submit_button( __( 'Add New Evaluation', 'nhcol_evaluation' ), 'primary', 'submit_evaluation' ); ?>
</form>
</div>