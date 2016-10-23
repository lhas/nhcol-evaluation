<?php
  $evaluation_question = $this->plugin_options['evaluation_question'];

  $evaluation_label_1 = $this->plugin_options['evaluation_label_1'];
  $evaluation_label_2 = $this->plugin_options['evaluation_label_2'];
  $evaluation_label_3 = $this->plugin_options['evaluation_label_3'];
  $evaluation_label_4 = $this->plugin_options['evaluation_label_4'];
  $evaluation_label_5 = $this->plugin_options['evaluation_label_5'];
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

<div class="content-left">
  <article class="evaluate box content">

      <h4 class="inline-heading"><?php echo $evaluation_question; ?></h4>
      <form method="post" class="form">
          <table class="user-input">
              <tbody>
              <?php for($i = 1; $i <= 5; $i++) : if(!empty($this->plugin_options['evaluation_label_' . $i])) : ?>
              <tr>
                  <td class="result-wrapper"><?php echo $this->plugin_options['evaluation_label_' . $i]; ?></td>
                  <td class="reset-wrapper"><a class="reset fa fa-times" href="#" data-reset="rating-1"></a></td>
                  <td class="rating-wrapper">
                      <span class="rating" data-rating="rating-1">
                          <a href="#" data-rating="1">
                            <i class="fa fa-star"></i>
                          </a>
                          <a href="#" data-rating="2">
                            <i class="fa fa-star"></i></a>
                          <a href="#" data-rating="3">
                            <i class="fa fa-star"></i></a>
                          <a href="#" data-rating="4">
                            <i class="fa fa-star"></i></a>
                          <a href="#" data-rating="5">
                            <i class="fa fa-star"></i></a>
                          <span style="width: 0%;"></span>
                          <input class="rating-1" type="hidden" value="0" name="r1">
                      </span>
                  </td>
              </tr>
              <?php endif; endfor; ?>
          </tbody></table>

          <table class="result">
              <tbody><tr>
                  <td><strong>&nbsp;</strong></td>
                  <td><strong class="number">0</strong><span class="number"> from 3 labels</span></td>
              </tr>
          </tbody></table>

          <ul class="full">
              <li>
                  <label for="textarea">Evaluation Comment:</label>
                  <textarea id="textarea" name="kommentar"></textarea>
                  <small id="charNum" style="float: right">max length 500 characters</small>
              </li>
              <script>
                  function testchars(elem) {
                      var char = 500 - elem.val().length;
                      $('#charNum').text('Noch '+ char + ' Zeichen');
                  }
                  $('#textarea').bind("input propertychange", function (e) {
                      testchars($(this));
                  });
                  $(function() { testchars($('#textarea'))});
              </script>
              <li class="required" title="Required">
                  <label for="input_0">Evaluation Email:</label>
                  <input id="input_0" type="email" name="email" value="">
              </li>
              <li class="required" title="Required">
                  <label for="input_1">Order Code:</label>
                  <input id="input_1" type="text" name="bestellnr" value="">
              </li>

              <li><button type="submit" class="button arr">Send</button></li>
          </ul>
      </form>

  </article>
</div>