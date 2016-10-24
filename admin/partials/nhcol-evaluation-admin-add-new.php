<div class="wrap">
  <h1>Add New Evaluation</h1>

  <form method="post" action="">
  
    <table class="form-table">
        <tr valign="top">
          <th scope="row">Email</th>
          <td><input type="email" required name="evaluation[email]" class="regular-text" value="" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Comment</th>
          <td>
            <textarea name="evaluation[comment]" required class="regular-text" id="" cols="30" rows="10"></textarea>
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">Order Number</th>
          <td><input type="text" required name="evaluation[order_number]" class="regular-text" value="" /></td>
        </tr>
        <tr valign="top">
          <th scope="row">Evaluation Field #1</th>
          <td>
            <input type="range" required name="evaluation[evaluation_field_1]"  min="1" max="5" value="1" step="1">
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">Evaluation Field #2</th>
          <td>
            <input type="range" required name="evaluation[evaluation_field_2]"  min="1" max="5" value="1" step="1">
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">Evaluation Field #3</th>
          <td>
            <input type="range" required name="evaluation[evaluation_field_3]"  min="1" max="5" value="1" step="1">
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">Evaluation Field #4</th>
          <td>
            <input type="range" required name="evaluation[evaluation_field_4]"  min="1" max="5" value="1" step="1">
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">Evaluation Field #5</th>
          <td>
            <input type="range" required name="evaluation[evaluation_field_5]"  min="1" max="5" value="1" step="1">
          </td>
        </tr>
        <tr valign="top">
          <th scope="row">Confirmed?</th>
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