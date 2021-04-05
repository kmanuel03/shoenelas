<?php
global $wpdb;

$table_name = $wpdb->prefix . 'trivia';

$results = $wpdb->get_results(
    "SELECT * FROM $table_name 
        ORDER BY RAND ()
        LIMIT 1"
);
?>

<a id="openTriviaModal" href="#openModal" hidden>Open Modal</a>
<?php if($results) : ?>
<div id="openModal" class="wptrivia-modal-dialog">
    <div>
        <a href="#close" title="Close" class="close">X</a>
        <h5><?php echo $results[0]->title ?></h5>
        <p><?php echo $results[0]->description ?></p>
    </div>
    <?php endif; ?>
</div>

<script type="text/javascript">
    // this is to trigger the href click if the query result is not empty
    var op = <?php if(count($results) > 0) :  ?> triggerModal(); <?php endif ?>
    function triggerModal() {
        window.location = document.getElementById('openTriviaModal').href;
    }
</script>