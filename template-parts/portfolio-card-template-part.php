<?php

/**
 * Template part for displaying blog cards
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package elicathemeunderscores
 */

?>

<div class="portfolio-card">

    <a href="<?php the_permalink(); ?>" class="portfolio-card-link">
        <?php if (has_post_thumbnail()) : ?>
            <img src="<?php the_post_thumbnail_url('portfolio-thumb'); ?>" alt="<?php the_title(); ?>" class="portfolio-card-image">
        <?php else : ?>
            <img src="placeholder.jpg" alt="Portfolio Item Placeholder" class="portfolio-card-image"> <?php endif; ?>
    </a>

    <div class="portfolio-card-content">
        <header class="portfolio-card-header">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php if (get_the_term_list(get_the_ID(), 'portfolio_category')) : ?>
                <div class="portfolio-card-categories">
                    <span>Categories: </span>
                    <?php echo get_the_term_list(get_the_ID(), 'portfolio_category', '', ', ', ''); ?>
                </div>
            <?php endif; ?>
        </header>

        <p class="portfolio-card-excerpt"><?php the_excerpt(); ?></p>

        <div class="portfolio-card-meta">
            <?php $customer_name = esc_html(get_post_meta(get_the_ID(), 'portfolio_customer', true)); ?>
            <?php if ($customer_name) : ?>
                <span class="portfolio-card-customer">Client: <?php echo $customer_name; ?></span>
            <?php endif; ?>

            <?php $website_link = esc_url(get_post_meta(get_the_ID(), 'portfolio_website_link', true)); ?>
            <?php if ($website_link) : ?>
                <a href="<?php echo $website_link; ?>" class="portfolio-card-link" target="_blank">Visit Website</a>
            <?php endif; ?>
        </div>

    </div>

</div>
