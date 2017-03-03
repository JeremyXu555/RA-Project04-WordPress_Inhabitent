<?php
/**
 * Template part for displaying posts.
 *
 * @package Inhabitent_WordPress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
		<div class="postItem">
			<div class="thumbnail-img">
				<?php if ( has_post_thumbnail() ) :  ?>
				<?php 		
				the_post_thumbnail( 'large'); ?>
				<?php endif; ?>
			</div>
			<h3>
				<a href=""><?php the_title(); ?></a>
			</h3>		
			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="post-quickInfo">
				<p><?php inhabitent_posted_on(); ?></p> / <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?> / <?php inhabitent_posted_by(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>	
			<a class="detail btn black-btn">READ ENTRY</a>			
		</div>	
</article><!-- #post-## -->
