<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php if ( 'post' === get_post_type() ) : ?>
						<div class="entry-meta">
							<div class="avatar-wrapper">
								<?php echo get_avatar( get_the_author_meta( 'ID' ), 40 ); ?>
							</div>
							<span class="byline"><?php echo get_the_author_posts_link(); ?></span>
							<span class="post-date"><?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago'; ?></span>
						</div><!-- .entry-meta -->
						<?php endif; ?>

						<?php if ( has_post_thumbnail() ) : ?>
							<div class="featured-image-wrapper">
								<?php the_post_thumbnail(); ?>
							</div>
						<?php endif; ?>

						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_excerpt(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->