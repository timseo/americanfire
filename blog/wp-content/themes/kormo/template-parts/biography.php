<?php
$author_data =  get_the_author_meta('description',get_query_var('author') );
$author_bio_avatar_size = 150;
if($author_data !=''):
?>
	<div class="author-meta mrg-tb-80">
		<div class="media">
			<div class="media-left">
				<a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>">
					<?php print get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size,'','',array('class'=>'media-object img-circle') ); ?>
				</a>
			</div>
			<div class="media-body">
				<span class="media-heading"><a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"><?php print get_the_author(); ?></a></span>
				<p>
					<?php the_author_meta( 'description' ); ?>
				</p>
				<div class="social">
					<a href="<?php print esc_attr(get_the_author_meta( 'profile_fb_url')); ?>" target="_blank" ><i class="fab fa-facebook-f"></i></a>
					<a href="<?php print esc_attr(get_the_author_meta( 'profile_twitter_url'));?>" target="_blank" ><i class="fab fa-twitter"></i></a>
					<a href="<?php print esc_attr(get_the_author_meta( 'profile_google_url')); ?>" target="_blank" ><i class="fab fa-google-plus-g"></i></a>
					<a href="<?php print esc_attr(get_the_author_meta( 'profile_instagram_url')); ?>" target="_blank" ><i class="fab fa-linkedin-in"></i></a>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

