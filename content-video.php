<?php get_header(); ?>

<div class="container">
    <main role="main">
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class(); ?>>
                <h2><?php the_title(); ?></h2>
                <?php if (get_post_meta(get_the_ID(), 'embed_code', true)) : ?>
                    <div class="featured-video">
                        <?php echo get_post_meta(get_the_ID(), 'embed_code', true); ?>
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