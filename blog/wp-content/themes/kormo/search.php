<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Kormo
 */

get_header();

$blog_column = is_active_sidebar( 'right-sidebar' ) ? 8 : 12 ;

?>

<div class="basic-blog-area gray-bg pt-120 pb-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-<?php print esc_attr($blog_column); ?> blog-post-items">
                <?php 
					if( have_posts() ):
						?>
							 <div class="result-bar page-header">
								<h1 class="page-title"><?php esc_html_e('Search Results For:','kormo'); ?> <?php print get_search_query(); ?></h1>
							</div>
						<?php 
						while( have_posts() ): the_post();
							get_template_part( 'template-parts/content', 'search' );
						endwhile;
					else:
						get_template_part( 'template-parts/content', 'none' );
					endif; 
				?>
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


