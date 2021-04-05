<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    global $wpdb;
    $table = 'wp_trivia';
    $data = array(
        'title'         => $_POST['title'],
        'description'   => $_POST['description']
    );
    $success= $wpdb->insert( $table, $data);
    if ($success) { ?>
        <div id="message" class="updated notice is-dismissible" style="margin: 15px 5px 5px 0 !important;"><p><?php _e( 'Data has been saved.' ); ?></p></div>
    <?php }
}

?>

<form method="post" novalidate="novalidate"  action="<?php the_permalink(); ?>">
    <input type="hidden" name="action" value="custom_action_hook">
    <h1>Trivia Form</h1>
    <table class="form-table" role="presentation">
        <tr>
            <th><label for="title"><?php _e( 'Title' ); ?></label></th>
            <td><input name="title" type="text" id="title" placeholder="<?php _e( 'Title here' ); ?>" class="regular-text" /></td>
        </tr>

        <tr>
            <th><label for="description"><?php _e( 'Description' ); ?></label></th>
            <td><textarea name="description" type="text" id="description" placeholder="<?php _e( 'Write your trivia description here' ); ?>" cols="50" rows="10" aria-describedby="tagline-description" ></textarea>
        </tr>
        <tr>
            <td></td>
            <td><button class="button-primary"> Save Changes</button></td>
        </tr>
    </table>
</form>
