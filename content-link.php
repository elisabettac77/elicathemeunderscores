<?php get_header(); ?>

<div class="container">
    <main role="main">
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class(); ?>>
                <h2><?php the_title(); ?></h2>
                <?php $link_url = get_post_meta(get_the_ID(), 'link_url', true); ?>
                <?php if ($link_url) : ?>
                    <a href="<?php echo esc_url($link_url); ?>" target="_blank" class="external-link">
                        <?php echo esc_html(get_the_title()); ?> (Link)
                    </a>
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