<?php get_header(); ?>

<div class="container">
    <main role="main">
        <?php while (have_posts()) : the_post(); ?>
            <aside <?php post_class(); ?>>
                <h3><?php the_title(); ?></h3>
                <div class="content">
                    <?php the_content(); ?>
                </div>
            </aside>
        <?php endwhile; ?>
    </main>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>