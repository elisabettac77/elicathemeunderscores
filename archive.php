<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package elicathemeunderscores
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php if (have_posts()) : ?>

		<header class="page-header">
			<?php
			the_archive_title('<h1 class="page-title">', '</h1>');
			the_archive_description('<div class="archive-description">', '</div>');
			?>
		</header><!-- .page-header -->

		<div class="card-container"> <!-- Add a container for cards -->
			<?php
			/* Start the Loop */
			while (have_posts()) :
				the_post();

				// Include your custom card template part
				get_template_part('template-parts/card', 'template-part');

			endwhile;
			?>
		</div> <!-- .card-container -->

	<?php
		the_posts_navigation();

	else :

		get_template_part('template-parts/content', 'none');

	endif;
	?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
?>