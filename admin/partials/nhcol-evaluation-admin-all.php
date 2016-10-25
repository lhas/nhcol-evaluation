<div class="wrap">

    <h2><?php echo _e('All Evaluations', $this->plugin_name); ?></h2>

<?php if(!empty($_REQUEST['action']) && $_REQUEST['action'] == 'delete') : ?>
<div class="updated notice">
    <p><?php echo _e('Evaluations deleted.', $this->plugin_name); ?></p>
</div>
<?php endif; ?>

<?php if(!empty($_GET['notice']) && $_GET['notice'] == 'evaluation_added') : ?>
    <div id="message" class="notice notice-success is-dismissible">
        <p><?php echo _e('Evaluation added with success!', $this->plugin_name); ?></p>
    </div>
<?php endif; ?>

<div class="wrap">
  <form method="post">
      <?php
      
      require_once(plugin_dir_path( __DIR__ ) . '/class-evaluation-list-table.php');

      $evaluationListTable = new Evaluation_List_Table();

      $evaluationListTable->prepare_items(); 
      $evaluationListTable->display();
      
      ?>
  </form>
</div>
</div>