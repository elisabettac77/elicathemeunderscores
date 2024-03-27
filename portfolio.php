<?php

/**
 * The template for displaying portfolio projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package elicathemeunderscores
 */

get_header(); ?>

<div class="container">
	<main role="main">

		<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

				<article class="portfolio-item">
					<header class="portfolio-item-header">
						<h2><?php the_title(); ?></h2>

						<?php if (get_the_term_list(get_the_ID(), 'portfolio_category')) : ?>
							<div class="portfolio-item-categories">
								<span>Categories: </span>
								<?php echo get_the_term_list(get_the_ID(), 'portfolio_category', '', ', ', ''); ?>
							</div>
						<?php endif; ?>
					</header>

					<?php if (has_post_thumbnail()) : ?>
						<div class="portfolio-item-image">
							<?php the_post_thumbnail('portfolio-thumb'); ?>
						</div>
					<?php endif; ?>

					<div class="portfolio-item-content">
						<?php the_content(); ?>

						<p class="portfolio-item-customer">
							<?php echo esc_html(get_post_meta(get_the_ID(), 'portfolio_customer', true)); ?>
						</p>

						<?php $website_link = esc_url(get_post_meta(get_the_ID(), 'portfolio_website_link', true)); ?>

						<?php if ($website_link) : ?>
							<a href="<?php echo $website_link; ?>" class="portfolio-item-link" target="_blank">
								Visit Website
							</a>
						<?php endif; ?>
					</div>

				</article>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<p><?php _e('Sorry, no portfolio items found.', 'your-theme-slug'); ?></p>

		<?php endif; ?>

	</main>

	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>