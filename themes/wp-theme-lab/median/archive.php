<?php
/**
 * The template for displaying archive pages.
 */

get_header(); ?>
			
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

		
			<?php /* Start the Loop */
			
							$query = new WP_Query(array(
								"posts_per_page" => 4,
								// "category__in" => array(1, 2, 3),
								"orderby" => 'name',
								"order" => 'asc'
							));					
			 ?>

			<?php 
			while ( have_posts()) :  the_post();

				get_template_part("content/content", get_post_type());

			 endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<p><?php echo esc_html( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.' ); ?></p>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
