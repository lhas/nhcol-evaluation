<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<style type="text/css">
  .evaluation-success {
    position: fixed;
    width: 100%;
    height: 50px;
    padding-top: 10px;
    background: #43a047;
    z-index: 999;
    left: 0px;
    bottom: 0px;
    box-shadow: 0px 0px 4px rgba(0,0,0,0.6);
    text-align: center;
  }

  .evaluation-success p {
    color: #FFF;
    font-size: 18px;
    font-family: 'Open Sans', sans-serif;
  }
</style>

<div class="evaluation-success">
  <p>
    <?php echo __($this->success, $this->plugin_name); ?>
  </p>
</div>