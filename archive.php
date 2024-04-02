<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package elicathemeunderscores
 */


$grid_columns = get_theme_mod('columns', 3);
$grid_margin = get_theme_mod('columns_margin', '3.8%'); // Default margin (optional)
$grid_class = "columns-" . $grid_columns;

get_header();

?>

<main id="primary" class="site-main">

	<?php

	if (have_posts()) : ?>

		<header class="page-header">
			<?php
			the_archive_title('<h1 class="page-title">', '</h1>');
			the_archive_description('<div class="archive-description">', '</div>');
			?>
		</header>

		<div class="grid <?php echo esc_attr($grid_class); ?>" style="margin: <?php echo esc_attr($grid_margin); ?>">
			<?php while (have_posts()) : the_post(); ?>

				<?php
				if (is_post_type_archive('post')) {
					get_template_part('template-parts/post-card', 'template-part');
				} elseif (is_post_type_archive('portfolio')) {
					get_template_part('template-parts/portfolio-card', 'template-part');
				} elseif (is_post_type_archive('services')) {
					get_template_part('template-parts/services-card', 'template-part');
				}
				?>
		</div>

<?php endwhile;
		endif; ?>

<?php
// Previous/next page navigation.
if (function_exists('the_posts_navigation')) :


	the_posts_navigation();

else :

	get_template_part('template-parts/content', 'none');

endif;
?>

</main><?php
		get_sidebar();
		get_footer();
