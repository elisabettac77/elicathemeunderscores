<?php get_header(); ?>

<div class="container">
    <main role="main">
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class(); ?>>
                <blockquote>
                    <?php the_content(); ?>
                    <cite><?php the_title(); ?></cite>
                </blockquote>
            </article>
        <?php endwhile; ?>
    </main>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>