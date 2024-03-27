<?php

get_header(); ?>

<div class="container">

    <main role="main">

        <?php if (have_posts()) : ?>

            <section class="portfolio-grid">

                <?php while (have_posts()) : the_post(); ?>

                    <div class="portfolio-grid-item <?php echo esc_attr(get_theme_mod('grid_column_class')); ?>">
                        <?php get_template_part('template-parts/portfolio-card', 'template-part'); ?>
                    </div>

                <?php endwhile; ?>

            </section>

            <?php the_posts_navigation(); ?>

        <?php else : ?>

            <p><?php _e('Sorry, no portfolio items found.', 'your-theme-slug'); ?></p>

        <?php endif; ?>

    </main>
</div>

<?php get_footer(); ?>