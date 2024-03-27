<?php get_header(); ?>

<div class="container">
    <main role="main">
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class(); ?>>
                <h2><?php the_title(); ?></h2>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="featured-image">
                        <?php the_post_thumbnail(); ?>
                    </div>
                <?php endif; ?>
                <div class="content">
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </main>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>