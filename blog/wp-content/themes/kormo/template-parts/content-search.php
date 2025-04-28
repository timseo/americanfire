<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kormo
 */
$readmore_text = get_theme_mod('kormo_blog_read_more_text', 'Read More');
$readmore_text_icon = get_theme_mod('kormo_blog_read_more_text_icon', '&rarr;');
$show_readmore = get_theme_mod('kormo_blog_btn_show', true);
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('blog-wrapper mb-30'); ?> data-wow-delay=".3s">
    <?php if( has_post_thumbnail() ): ?>
		<div class="blog-thumb mb-25">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('full', array('class' => 'img-responsive' )); ?>
			</a>
		</div>
    <?php endif; ?>
    <div class="blog-content">
        <h5 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        <div class="blog-meta mb-15">
			<span><i class="far fa-user"></i>
				<a href="<?php print esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php print get_the_author(); ?></a>
			</span>
            <span><i class="far fa-calendar-alt"></i> <?php the_time(get_option('date_format')); ?></span>
            <span><i class="far fa-comments"></i> <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></span>
        </div>
        <?php the_excerpt(); ?>
        <?php if( $show_readmore ): ?>
            <a class="read-more" href="<?php the_permalink(); ?>"> <?php print wp_kses_post($readmore_text ); ?> <span><?php print esc_html( $readmore_text_icon ); ?></span></a>
        <?php endif; ?>
    </div>
</div>


