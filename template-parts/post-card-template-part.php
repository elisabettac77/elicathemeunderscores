<?php

/**
 * Template part for displaying blog cards
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package elicathemeunderscores
 */

?>
        <div class="card">
            <div class="card-image">
                <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('large'); ?>
                    </a>
                <?php endif; ?>
            </div>
            <div class="card-header">
                <h2 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <span class="card-author">By <?php the_author(); ?></span>
                <span class="card-date"><?php echo get_the_date(); ?></span>
                <span class="card-categories"><?php echo get_the_category_list(', '); ?></span>
                <span class="card-tags"><?php echo get_the_tag_list('', ', '); ?></span>
            </div>
            <div class="card-body">
                <div class="card-content">
                    <?php 
                    // Display excerpt
                    the_excerpt(); 
                    // Custom "Read More" link
                    ?>
                    <a href="<?php the_permalink(); ?>" class="card__read-more">Read More</a>
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
