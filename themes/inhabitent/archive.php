<?php
/**
 * The template for displaying archive pages.
 *
 * @package Inhabitent_WordPress
 */

get_header(); ?>

	<div id="primary" class="content-area<?php if(is_category('journal')){echo '-journal-archive';}?>">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
	 
			<header class="page-header">
				<?php get_page_header();?>
			</header><!-- .page-header -->
			
			<?php get_content_header() ?>

			<div class="archive">

			<?php while ( have_posts() ) : the_post(); ?>
				
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

<?php get_dynamic_sidebar_arch(); ?>

<?php get_footer(); ?>
