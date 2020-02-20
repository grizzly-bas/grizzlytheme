<?php
/**
 * @package grizzly
 */

get_header();
?>

<div class="error-404 not-found et_pb_row">
    <div class="et_pb_column_4_4">
        <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentynineteen' ); ?></h1>
    </div>
    <div class="et_pb_column_4_4">
        <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentynineteen' ); ?></p>
        <?php get_search_form(); ?>
    </div>
</div>

<?php
get_footer();
