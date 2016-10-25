(function( $ ) {
  'use strict';

  /* evaluations.module.js */
  angular
    .module('app', []);

  /* evaluations.directive.js */
  angular
    .module('app')
    .directive('maxlengthIt', maxlengthIt);

    maxlengthIt.$inject = ['$parse'];
    function maxlengthIt($parse) {
      return {
        scope: {
          maxlength: '='
        },
        link: function (scope, elm, attrs) {

          // ignore these keys
          var ignore = [8,9,13,33,34,35,36,37,38,39,40,46];

          // use keypress instead of keydown as that's the only
          // place keystrokes could be canceled in Opera
          var eventName = 'keypress';

          // handle textareas with maxlength attribute
          $(elm)

            // this is where the magic happens
            .live(eventName, function(event) {
              var self = $(this),
                  maxlength = scope.maxlength,
                  code = $.data(this, 'keycode');

              // check if maxlength has a value.
              // The value must be greater than 0
              if (maxlength && maxlength > 0) {

                // continue with this keystroke if maxlength
                // not reached or one of the ignored keys were pressed.
                return ( self.val().length < maxlength
                        || $.inArray(code, ignore) !== -1 );

              }
            })

            // store keyCode from keydown event for later use
            .live('keydown', function(event) {
              $.data(this, 'keycode', event.keyCode || event.which);
            });
        }
      }
    }
  
  /* evaluations.controller.js */
  angular
    .module('app')
    .controller('EvaluationsCtrl', EvaluationsCtrl);

    EvaluationsCtrl.$inject = ['$http'];
    function EvaluationsCtrl($http) {
      var evaluation = {
        fields: []
      };
      var lastField = {};
      var loading = false;
      var vm = this;

      vm.evaluation = evaluation;
      vm.lastField = lastField;
      vm.loading = loading;
      vm.chooseAnswer = chooseAnswer;
      vm.removeAnswer = removeAnswer;
      vm.submit = submit;

      function submit(evaluation, ajaxurl) {
        var data = {
          action: 'submit_evaluation',
          evaluation: evaluation
        };

        vm.loading = true;

        $http({
          url: ajaxurl,
          method: "POST",
          params: data
        }).then(success, error);

        function success(result) {
          alert(result.data);
          
          vm.loading = false;

          vm.evaluation = {
            fields: []
          };
        }
        function error(result) {
          vm.loading = false;
        }
      }

      function removeAnswer(index) {
        vm.evaluation.fields[index] = undefined;
      }

      function chooseAnswer(rating, label, index) {
        var field = {
          value: rating,
          label: label,
          column: "evaluation_field_" + index
        };

        if(vm.evaluation.fields[index] == undefined) {
          vm.evaluation.fields[index] = field;
          vm.lastField = field;
        } else {
          vm.evaluation.fields[index] = undefined;
        }
      }
    }

})( jQuery );
