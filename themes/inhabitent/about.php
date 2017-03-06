<!-- 
Template Name: About
 -->

<?php

get_header(); 

?>
	<div class="about-img">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( ); ?>
			<?php endif; ?>	
		<h1 class="about-title"><?php the_title();?></h1>
	</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="about">
				<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php endwhile; // End of the loop. ?>	
			</div>
			

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
