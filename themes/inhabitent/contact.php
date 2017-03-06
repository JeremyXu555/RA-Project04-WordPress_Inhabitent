<!-- 
Template Name: Contact
 -->

<?php

get_header(); 

?>
<div class="contact-page">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="contact">	 
				<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', get_post_type() ); ?>

				<?php endwhile; // End of the loop. ?>	
				<form class="contact-response" name="contact-response" method="POST">
					<label>name *</label>
					<input type="text" name="name">
					<label>email *</label>
					<input type="text" name="email">
					<label>subject *</label>
					<input type="text" name="subject">
					<label>message *</label>
					<textarea cols="300" rows="10"></textarea>
					<input class="btn" type="submit" name="submit" value="submit">
				</form>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="widget-area"><?php dynamic_sidebar("sidebar-1"); ?></div>
</div>

<?php get_footer(); ?>
