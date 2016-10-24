<div class="wrap">
  <h1>Edit Evaluation</h1>

  <form method="post" action="">

    <input type="hidden" name="field_id" value="<?php echo @$evaluation->id; ?>">
  
    <table class="form-table">
        <tr valign="top">
          <th scope="row">Email</th>
          <td><input type="email" required name="evaluation[email]" class="regular-text" value="<?php echo @$evaluation->email; ?>" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Comment</th>
          <td>
            <textarea name="evaluation[comment]" required class="regular-text" id="" cols="30" rows="10"><?php echo @$evaluation->comment; ?></textarea>
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">Order Number</th>
          <td><input type="text" required name="evaluation[order_number]" class="regular-text" value="<?php echo @$evaluation->order_number; ?>" /></td>
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
            <input type="range" required name="evaluation[evaluation_field_<?php echo $i; ?>]"  min="1" max="5" value="<?php echo @$evaluation->$attribute; ?>" step="1">
          </td>
        </tr>

        <?php endif; } ?>
        
        <tr valign="top">
          <th scope="row">Confirmed?</th>
          <td>
            <input type="hidden" name="evaluation[confirmed]" value="0" />
            <input type="checkbox" name="evaluation[confirmed]" value="1" <?php if(@$evaluation->confirmed) : ?>checked="checked"<?php endif; ?> />
          </td>
        </tr>
    </table>

    <?php wp_nonce_field( 'nhcol_evaluation' ); ?>
    <?php submit_button( __( 'Edit Evaluation', 'nhcol_evaluation' ), 'primary', 'submit_evaluation' ); ?>
</form>
</div>