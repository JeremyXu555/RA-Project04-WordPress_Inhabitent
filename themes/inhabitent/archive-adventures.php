<?php
/**
 * The template for displaying archive pages.
 *
 * @package Inhabitent_WordPress
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			
			<?php /* Start the Loop */
			
							$query_products_archive = new WP_Query(array(
								"posts_per_page" => 4,
								"post_type" => "adventures",
							));					
			 ?>
			
			<?php if(is_archive()){ ?>

			<h2 adventures-archive-title> Latest Adventures </h2>

			<?php }?>

			<div class="adventures<?php if(is_archive()){ echo "-archive";}?>">
			
			<?php while ( $query_products_archive -> have_posts() ) : $query_products_archive -> the_post(); ?>

				<?php
					get_template_part( 'template-parts/content', get_post_type() );
				?>

			<?php endwhile; ?>
			</div>
			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
