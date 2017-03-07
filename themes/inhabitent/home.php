<?php
/**
 * The main template file.
 *
 * @package Inhabitent_WordPress
 */
get_header(); 
?>

<div class="banner">
	
</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<?php if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php endif; ?>

			<?php 
				
				$terms = get_terms(array(
					'taxonomy' => 'Type',
					'hide_empty' => false,
				));
				?>
<!-- SHOP STUFF -->
	<div class="productType-info container">
		<h2>SHOP STUFF</h2>
		<div class="shopStuff">
			<?php
				foreach($terms as $term) {
					include(locate_template('template-parts/content-products.php'));
				}						
			?>
		</div>
	</div>
<!-- SHOP STUFF -->

<!-- JOURNAL -->
<h2>INHABITENT JOURNAL</h2>
<section class=journal>
<?php 		
	while (  have_posts() ) : the_post();
		get_template_part("template-parts/content", get_post_type()) ;
			endwhile;
?>
</section>	
<!-- JOURNAL -->

<!-- ADVENTURES -->
<section class="adventures">
	<h2>LATEST ADVENTURES</h2>
	<div class="adventure-content">	
		<?php 
			$query = get_adventures_query_homepage();
			$index = 0;	

	while ( $query -> have_posts() ) : $query -> the_post();				

		get_template_part( 'template-parts/content', get_post_type() );				
		build_adventures_homepage($index);
		$index ++;

  endwhile; ?>
	</div>
</section>		
<!-- ADVENTURES -->

		<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->


<?php get_footer(); ?>


