<?php
/**
 * @package grizzly
 */

get_header();

while ( have_posts() ) : the_post();
	the_content();
endwhile; ?>

<div class="error-404 not-found et_pb_row">
    <div class="et_pb_column_1_2">
        <h1 class="page-title"><?php echo __( 'Oops! That page can&rsquo;t be found.', 'grizzlymarketing' ); ?></h1>
        <p><?php echo __( 'It looks like nothing was found at this location. Maybe try a search?', 'grizzlymarketing' ); ?></p>
        <?php get_search_form(); ?>
    </div>
    <div class="et_pb_column_1_2">
        <h1>Contact</h1>
        <p><?php echo do_shortcode('[bedrijfsnaam]'); ?></p>
        <p><?php echo do_shortcode('[adres]'); ?></p>
        <p><?php echo do_shortcode('[postcode]') . ' ' . do_shortcode('[woonplaats]'); ?></p>
        <p><?php echo do_shortcode('[telefoon]'); ?></p>
        <p><?php echo do_shortcode('[e-mail]'); ?></p>
    </div>
</div>

<?php
get_footer();
