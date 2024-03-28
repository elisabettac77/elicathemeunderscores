<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package elicathemeunderscores
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	if (is_singular()) {
		$format = get_post_format();

		if ($format) {
			$template = locate_template(array("content-$format.php"));
			if (!$template) {
				$template = locate_template(array('single.php'));  // Fallback to single.php
			}
			include($template);
		} else {
			// Handle posts without a format (optional)
			include(locate_template(array('single.php')));
		}
	}

	the_post_navigation(
		array(
			'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'elicathemeunderscores') . '</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'elicathemeunderscores') . '</span> <span class="nav-title">%title</span>',
		)
	);

	// If comments are open or we have at least one comment, load up the comment template.
	if (comments_open() || get_comments_number()) :
		comments_template();
	endif;
	?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
