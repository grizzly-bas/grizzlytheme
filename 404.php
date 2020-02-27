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
        <br />
        <a href="<?php echo get_home_url(); ?>" class="button"><i class="fas fa-arrow-alt-left"></i> Naar de homepagina</a>
    </div>
    <div class="et_pb_column_1_2">
        <h1><?php echo do_shortcode('[bedrijfsnaam]'); ?></h1>
        <p><?php echo do_shortcode('[adres]'); ?><br />
        <?php echo do_shortcode('[postcode]') . ' ' . do_shortcode('[woonplaats]'); ?></p>
        <p><?php echo do_shortcode('[telefoon icon="fas fa-phone"]'); ?><br />
        <?php echo do_shortcode('[e-mail icon="fas fa-envelope"]'); ?></p>
    </div>
</div>

<?php
get_footer();
