<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Kormo
 */

get_header();
?>

<div class="intro-area pt-120 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 offset-xl-2">

			<section class="error-404 not-found white-bg">
				<header class="page-header">
					<h1 class="page-title error-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'kormo' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content mb-40">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'kormo' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
				<a href="<?php print esc_url(home_url('/')); ?>" class="btn brand-btn"><?php esc_html_e('BACK HOME','kormo'); ?></a>
			</section><!-- .error-404 -->

			</div>
		</div>
	</div>
</div>

<?php
get_footer();
