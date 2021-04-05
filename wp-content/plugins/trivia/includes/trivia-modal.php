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
<div id="openModal" class="wptrivia-modal-dialog">
    <div>
        <a href="#close" title="Close" class="close">X</a>
        <h5><?php echo $results[0]->title ?></h5>
        <p><?php echo $results[0]->description ?></p>
    </div>
</div>