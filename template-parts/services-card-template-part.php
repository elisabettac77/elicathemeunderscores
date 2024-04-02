<?php

/**
 * Template part for displaying services cards
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package elicathemeunderscores
 */

?>

<div class="services-card">

    <i class="services-card-icon dashicon <?php echo esc_attr(get_post_meta(get_the_ID(), 'service_icon', true)); ?>"></i>

    <div class="services-card-content">
        <h3 class="services-card-title"><?php the_title(); ?></h3>

        <?php $category = esc_html(get_post_meta(get_the_ID(), 'service_category', true)); ?>
        <?php if ($category) : ?>
            <span class="services-card-category"><?php echo $category; ?></span>
        <?php endif; ?>

        <p class="services-card-description"><?php the_excerpt(); ?></p>

        <?php $price = esc_html(get_post_meta(get_the_ID(), 'service_price', true)); ?>
        <?php $currency = esc_html(get_post_meta(get_the_ID(), 'service_currency', true)); ?>
        <?php if ($price) : ?>
            <div class="services-card-price">
                Starting From:
                <?php echo $price . $currency; ?>
            </div>
        <?php endif; ?>

        <?php $link_text = esc_html(get_post_meta(get_the_ID(), 'service_link_text', true)); ?>
        <?php $link_url = esc_url(get_post_meta(get_the_ID(), 'service_link_url', true)); ?>
        <?php if ($link_text && $link_url) : ?>
            <a href="<?php echo $link_url; ?>" class="services-card-button button"><?php echo $link_text; ?></a>
        <?php endif; ?>
    </div>

</div>