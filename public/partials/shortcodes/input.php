<?php
    $this->force_translate();
?>

<div ng-app="app" ng-init='plugin_options = <?php echo json_encode($this->plugin_options); ?>' ng-controller="EvaluationsCtrl as $ctrl" class="nhcol-evaluation-input content-left">
  <span class="loading" ng-show="$ctrl.loading"></span>
  <article class="evaluate box content">

      <h3 class="inline-heading">{{plugin_options.evaluation_question}}</h3>

      <form name="myForm" ng-submit="$ctrl.submit($ctrl.evaluation, plugin_options.admin_ajax)" method="post" class="form">

      <h4 class="inline-heading" style="border: none;"><?php echo $this->plugin_options['company_name']; ?></h4>

          <table class="user-input">
              <tbody>
              <tr ng-repeat="(index, label) in plugin_options.labels">
                  <td class="result-wrapper">
                    {{label.name}}
                    <em ng-if="!$ctrl.evaluation.fields[index]">
                        {{plugin_options.translates[0].name}}
                    </em>
                    <em ng-if="$ctrl.evaluation.fields[index]">
                        {{plugin_options.translates[$ctrl.evaluation.fields[index].value].name}}
                    </em>
                  </td>
                  <td class="reset-wrapper">
                    <a class="reset fa fa-times" href="javascript:void(0);" ng-click="$ctrl.removeAnswer(index)" ng-if="$ctrl.evaluation.fields[index]"></a>
                  </td>
                  <td class="rating-wrapper">
                      <span class="rating">
                          <a href="javascript:void(0);" ng-click="$ctrl.chooseAnswer(1, label, index)">
                            <i class="fa" ng-class="{'fa-star-o': !$ctrl.evaluation.fields[index] || $ctrl.evaluation.fields[index].value < 1, 'fa-star': $ctrl.evaluation.fields[index].value >= 1}"></i>
                          </a>
                      </span>
                      <span class="rating">
                          <a href="javascript:void(0);" ng-click="$ctrl.chooseAnswer(2, label, index)">
                            <i class="fa" ng-class="{'fa-star-o': !$ctrl.evaluation.fields[index] || $ctrl.evaluation.fields[index].value < 2, 'fa-star': $ctrl.evaluation.fields[index].value >= 2}"></i>
                          </a>
                      </span>
                      <span class="rating">
                          <a href="javascript:void(0);" ng-click="$ctrl.chooseAnswer(3, label, index)">
                            <i class="fa" ng-class="{'fa-star-o': !$ctrl.evaluation.fields[index] || $ctrl.evaluation.fields[index].value < 3, 'fa-star': $ctrl.evaluation.fields[index].value >= 3}"></i>
                          </a>
                      </span>
                      <span class="rating">
                          <a href="javascript:void(0);" ng-click="$ctrl.chooseAnswer(4, label, index)">
                            <i class="fa" ng-class="{'fa-star-o': !$ctrl.evaluation.fields[index] || $ctrl.evaluation.fields[index].value < 4, 'fa-star': $ctrl.evaluation.fields[index].value >= 4}"></i>
                          </a>
                      </span>
                      <span class="rating">
                          <a href="javascript:void(0);" ng-click="$ctrl.chooseAnswer(5, label, index)">
                            <i class="fa" ng-class="{'fa-star-o': !$ctrl.evaluation.fields[index] || $ctrl.evaluation.fields[index].value < 5, 'fa-star': $ctrl.evaluation.fields[index].value >= 5}"></i>
                          </a>
                      </span>
                  </td>
              </tr>
          </tbody></table>

          <table class="result">
              <tbody><tr>
                  <td><strong><?php echo __('Total', $this->plugin_name); ?></strong></td>
                  <td ng-if="$ctrl.lastField.value"><strong class="number">{{$ctrl.lastField.value}}</strong><span class="number"> <?php echo __('from 5 stars', $this->plugin_name); ?></span></td>
              </tr>
          </tbody></table>

          <ul class="full">
              <li>
                  <label for="textarea"><?php echo __('Evaluation Comment', $this->plugin_name); ?></label>
                  <textarea id="textarea" ng-model="$ctrl.evaluation.comment" maxlength-it maxlength="500"></textarea>
                  <small id="charNum" style="float: right"><?php echo __('max length 500 characters.', $this->plugin_name); ?> {{$ctrl.evaluation.comment.length}}</small>
              </li>
              <li>
                  <label for="input_0"><?php echo __('Evaluation Email', $this->plugin_name); ?> <span>*</span></label>
                  <input id="input_0" type="email" required ng-model="$ctrl.evaluation.email">
              </li>
              <li>
                  <label for="input_1"><?php echo __('Order Number', $this->plugin_name); ?>: <span>*</span></label>
                  <input id="input_1" type="text" required ng-model="$ctrl.evaluation.order_number">
              </li>
              <li>
                <input type="checkbox" value="1" required id="terms_of_service_checkbox"> 
                <label for="terms_of_service_checkbox">
                  <a href="<?php echo $this->plugin_options['terms_of_service_url']; ?>"><?php echo $this->plugin_options['terms_of_service_text']; ?></a>
                </label>
              </li>
              <li>
                <button type="submit" class="button arr" ng-disabled="$ctrl.evaluation.fields.length != plugin_options.labels.length">
                  <?php echo __('Send', $this->plugin_name); ?>
                </button>
              </li>
          </ul>

          <div class="evaluation-success" ng-show="$ctrl.status == 'success'">
            <p><?php echo __('Evaluation submitted with success. You must confirm it on your email. Thank you!', $this->plugin_name); ?></p>
          </div>

          <div class="evaluation-error" ng-show="$ctrl.status == 'error'">
            <p><?php echo __('Error while sending the evaluation. Try again later.', $this->plugin_name); ?></p>
          </div>
      </form>

  </article>
</div>

<style type="text/css">
    .full .button.arr {
        background: <?php echo $this->plugin_options['button_background']; ?>;
        color: <?php echo $this->plugin_options['button_text']; ?>;
    }
</style>