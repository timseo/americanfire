<?php
/**
 * Template Name: Vc Container
 *
 * The template file for displaying home page.
 *
 * @package kormo
 */

get_header(); ?>

<div class="container">
<?php

if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		ob_start();
		the_content();
	endwhile;
endif;
?>
</div>

<?php get_footer(); ?>
