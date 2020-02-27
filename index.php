<?php
/**
 * @package grizzly
 */

get_header();

global $wp_query;

if ( is_search() ):?>

<div class="container search-page">
	<div class="et_pb_row">
		<?php
			echo '<div class="et_pb_column_4_4">'  . get_search_form() . '<br />' . $wp_query->found_posts.' resultaten gevonden:</div>';

			while ( have_posts() ) : the_post();
				echo '<article class="et_pb_column_4_4"><header><a href="' . get_page_link() . '"><h2>' . get_the_title() . '</h2></a><header>
				<p>' . get_the_excerpt() . '</p>
				<a href="' . get_page_link() . '">' . get_page_link() . '</a></article>';
			endwhile;
		?>
	</div>
</div>

<?php else :
	while ( have_posts() ) : the_post();
		the_content();
	endwhile;
endif;



get_footer();
