<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<style type="text/css">
  .evaluation-error {
    position: fixed;
    width: 100%;
    height: 50px;
    padding-top: 10px;
    background: #e53935;
    z-index: 999;
    left: 0px;
    bottom: 0px;
    box-shadow: 0px 0px 4px rgba(0,0,0,0.6);
    text-align: center;
  }

  .evaluation-error p {
    color: #FFF;
    font-size: 18px;
    font-family: 'Open Sans', sans-serif;
  }
</style>

<div class="evaluation-error">
  <p>
    <?php echo __($this->error, $this->plugin_name); ?>
  </p>
</div>