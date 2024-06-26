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
		</header>
		<div class="card-columns">
			<?php
			while (have_posts()) :
				the_post();
				get_template_part('template-parts/service-card', 'template-part');
			endwhile;
			wp_reset_postdata(); // Reset after the loop
			?>
		</div> <?php the_posts_navigation(); ?>

	<?php
	else :

		get_template_part('template-parts/content', 'none');

	endif;
	?>

</main><?php
		get_sidebar();
		get_footer();
		?>
