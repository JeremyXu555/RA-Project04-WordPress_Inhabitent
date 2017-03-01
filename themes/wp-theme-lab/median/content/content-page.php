<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<div class="entry-meta">
						<div class="avatar-wrapper">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
						</div>
						<span class="byline"><?php echo get_the_author_posts_link(); ?></span>
						<span class="post-date"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
					</div><!-- .entry-meta -->

					<?php if ( has_post_thumbnail() ) : ?>
						<div class="featured-image-wrapper">
							<?php the_post_thumbnail(); ?>
						</div>
					<?php endif; ?>

					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->

				<footer class="entry-footer">
					<?php
						$categories_list = get_the_category_list( esc_html( ' ' ) );
						if ( $categories_list ) {
							printf( '<span class="cat-links">%1$s</span>', $categories_list );
						}
					?>
				</footer><!-- .entry-footer -->
</article><!-- #post-## -->