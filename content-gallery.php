<?php get_header(); ?>

<div class="container">
    <main role="main">
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class(); ?>>
                <h2><?php the_title(); ?></h2>
                <?php $gallery_images = get_post_gallery(get_the_ID(), false); ?>
                <?php if ($gallery_images) : ?>
                    <div class="gallery">
                        <?php foreach ($gallery_images['src'] as $image_url) : ?>
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo trim(esc_html($gallery_images['alt'][array_search($image_url, $gallery_images['src'])])); ?>">
                        <?php endforeach; ?>
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