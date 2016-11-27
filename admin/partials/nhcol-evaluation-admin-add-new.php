<div class="wrap">
  <h1><?php echo _e('Add New Evaluation', $this->plugin_name); ?></h1>

  <form method="post" action="" ng-app="app" ng-init='plugin_options = <?php echo json_encode($this->plugin_options); ?>' ng-controller="EvaluationsCtrl as $ctrl">
  
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

            <input type="hidden" name="evaluation[evaluation_field_<?php echo $i; ?>]" ng-model="$ctrl.evaluation.fields[<?php echo $i; ?>].value" value="{{$ctrl.evaluation.fields[<?php echo $i; ?>].value}}">

            <span class="rating">
                <a href="javascript:void(0);" ng-click="$ctrl.chooseAnswer(1, label, <?php echo $i; ?>)">
                  <i class="fa" ng-class="{'fa-star-o': !$ctrl.evaluation.fields[<?php echo $i; ?>] || $ctrl.evaluation.fields[<?php echo $i; ?>].value < 1, 'fa-star': $ctrl.evaluation.fields[<?php echo $i; ?>].value >= 1}"></i>
                </a>
            </span>
            <span class="rating">
                <a href="javascript:void(0);" ng-click="$ctrl.chooseAnswer(2, label, <?php echo $i; ?>)">
                  <i class="fa" ng-class="{'fa-star-o': !$ctrl.evaluation.fields[<?php echo $i; ?>] || $ctrl.evaluation.fields[<?php echo $i; ?>].value < 2, 'fa-star': $ctrl.evaluation.fields[<?php echo $i; ?>].value >= 2}"></i>
                </a>
            </span>
            <span class="rating">
                <a href="javascript:void(0);" ng-click="$ctrl.chooseAnswer(3, label, <?php echo $i; ?>)">
                  <i class="fa" ng-class="{'fa-star-o': !$ctrl.evaluation.fields[<?php echo $i; ?>] || $ctrl.evaluation.fields[<?php echo $i; ?>].value < 3, 'fa-star': $ctrl.evaluation.fields[<?php echo $i; ?>].value >= 3}"></i>
                </a>
            </span>
            <span class="rating">
                <a href="javascript:void(0);" ng-click="$ctrl.chooseAnswer(4, label, <?php echo $i; ?>)">
                  <i class="fa" ng-class="{'fa-star-o': !$ctrl.evaluation.fields[<?php echo $i; ?>] || $ctrl.evaluation.fields[<?php echo $i; ?>].value < 4, 'fa-star': $ctrl.evaluation.fields[<?php echo $i; ?>].value >= 4}"></i>
                </a>
            </span>
            <span class="rating">
                <a href="javascript:void(0);" ng-click="$ctrl.chooseAnswer(5, label, <?php echo $i; ?>)">
                  <i class="fa" ng-class="{'fa-star-o': !$ctrl.evaluation.fields[<?php echo $i; ?>] || $ctrl.evaluation.fields[<?php echo $i; ?>].value < 5, 'fa-star': $ctrl.evaluation.fields[<?php echo $i; ?>].value >= 5}"></i>
                </a>
            </span>

            <p class="stars-value">{{$ctrl.evaluation.fields[<?php echo $i; ?>].value}}</p>
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
    <?php submit_button( __( 'Add New Evaluation', $this->plugin_name ), 'primary', 'submit_evaluation' ); ?>
</form>
</div>