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
				<?php if(is_tax("Type")){
					
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				}?>
			</header><!-- .page-header -->
			
			<?php if(is_post_type_archive("adventures")){ ?>

			<h2 adventures-archive-title> Latest Adventures </h2>

			<?php } ?>

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

<?php if(is_category("journal")){ ?>
<div class="journal-sidebar"> <?php get_sidebar(); ?></div>
<?php	}?>

<?php get_footer(); ?>
