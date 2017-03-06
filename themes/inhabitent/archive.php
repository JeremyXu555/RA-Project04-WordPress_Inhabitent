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
			
			<?php /* Start the Loop */
			/*
						$query_archive_products = new WP_Query(array(
								"posts_per_page" => 16,
								"post_type" => "products",
							));		

						$query_archive_adventures = new WP_Query(array(
								"posts_per_page" => 4,
								"post_type" => "adventures",
							));	

						$query_archive_journals = new WP_Query(array(
							"posts_per_page" => 8,
							"post_type" => "post"
						));

						// $query = get_post_query(get_post_type());	

						if(get_post_type() == "adventures"){
							$query = $query_archive_adventures;
						} elseif(get_post_type() == "products" && !is_tax()){
							$query = $query_archive_products;
						} elseif(get_post_type() == "post") {
							$query = $query_archive_journals;
						}
		*/
		 ?>	
			
			<?php if(is_post_type_archive("adventures")){ ?>

			<h2 adventures-archive-title> Latest Adventures </h2>

			<?php } ?>

			<div class="archive<?php 
			if(is_post_type_archive("adventures")){echo "-adventures";}
			if(is_post_type_archive("products")){echo "-products";}
			if(is_tax("Type")) {echo " products-tax";}
			?>">

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
