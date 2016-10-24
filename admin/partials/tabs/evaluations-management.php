<?php if(!empty($_REQUEST['action']) && $_REQUEST['action'] == 'delete') : ?>
<div class="updated notice">
    <p>Evaluation deleted.</p>
</div>
<?php endif; ?>


<div class="wrap">


    <?php
    
    require_once(plugin_dir_path( __DIR__ ) . '../class-evaluation-list-table.php');

    $evaluationListTable = new Evaluation_List_Table();

    $evaluationListTable->prepare_items(); 
    $evaluationListTable->display();
    
    ?>

</div>