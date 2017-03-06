<?php
/**
 * The template for displaying all single posts.
 *
 * @package Inhabitent_WordPress
 */

get_header(); ?>

	<div id="primary" class="content-area-<?php if(get_post_type() == 'post') echo 'journal-single';?>">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); 

			 get_template_part( 'template-parts/content', get_post_type() ); 			

			  if(get_post_type()){				
				// If comments are open or we have at least one comment, load up the comment template.
				if ( get_post_type() == 'post' && (comments_open() || get_comments_number() )) {comments_template();};		
				}
		 endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php if(get_post_type()=="post"){?>

<div class="sidebar-journal-single">
	<?php dynamic_sidebar('sidebar-1'); ?>
</div>

<?php } get_footer(); ?>








