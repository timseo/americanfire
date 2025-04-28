<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Kormo
 */

get_header();

$blog_column = is_active_sidebar( 'right-sidebar' ) ? 8 : 12 ;

?>

<div class="basic-blog-area gray-bg pt-120 pb-80">
    <div class="container">
        <div class="row">
			<div class="col-lg-<?php print esc_attr($blog_column); ?> blog-post-items">
				<div class="kormo-blog-details mb-40">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', get_post_type() );

						the_post_navigation( array(
						    'prev_text'                  => esc_html__( 'prev post', 'kormo' ),
						    'next_text'                  => esc_html__( 'next post', 'kormo' ),
						    'in_same_term'               => true,
						    'screen_reader_text' => ' '
						) );

						get_template_part( 'template-parts/biography');

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>
			</div>
			<?php if ( is_active_sidebar( 'right-sidebar' ) ) { ?>
		        <div class="col-lg-4 sidebar-blog right-side">
					<?php get_sidebar(); ?>
	            </div>
			<?php
			}
			?>
		</div>
	</div>
</div>

<?php
get_footer();
