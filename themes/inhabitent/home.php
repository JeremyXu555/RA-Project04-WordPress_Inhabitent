
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

			<?php /* Start the Loop */
				
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
			?>		
			<div class="productType">
				<img src="<?php echo get_bloginfo("stylesheet_directory")?>/images/product-type-icons/<?php echo $term->name;?>.svg">
				<p><?php echo $term->description; ?></p>
				<p>
					<a class="btn" href="#"><?php echo $term->name;?> stuff</a>
				</p>
			</div>
			<?php
				}						
			?>
		</div>
	</div>
<!-- SHOP STUFF -->

<!-- JOURNAL -->
<h2>INHABITENT JOURNAL</h2>
<section class=journal>
<?php 
		
			$query_journal = new WP_Query(array(
								"posts_per_page" => 3,
								"orderby" => 'name',
								"order" => 'asc'
							));	
			

			while ( $query_journal -> have_posts() ) : $query_journal -> the_post();
				get_template_part("template-parts/content", "journalHome") ;
			endwhile;
?>
</section>	
<!-- JOURNAL -->

<!-- ADVENTURES -->

			<?php while ( have_posts() ) : the_post(); 
					
				get_template_part( 'template-parts/content', "adventureHome" );

			endwhile; ?>
<!-- ADVENTURES -->
			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->


<?php get_footer(); ?>


