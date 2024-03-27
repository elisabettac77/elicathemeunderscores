<?php get_header(); ?>

<div class="container">
    <main role="main">
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class(); ?>>
                <h2><?php the_title(); ?></h2>
                <?php $audio_url = get_post_meta(get_the_ID(), 'audio_url', true); ?>
                <?php if ($audio_url) : ?>
                    <audio controls>
                        <source src="<?php echo esc_url($audio_url); ?>" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
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