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
				<form id="contact-response-form" class="contact-response" name="contact-response" method="POST" action="<?php echo get_bloginfo('stylesheet_directory')?>/contact_response.php">
					<label>name <span class="required">*</span></label>
					<input id="name" type="text" name="name">
					<label>email <span class="required">*</span></label>
					<input id="email" type="text" name="email">
					<label>subject <span class="required">*</span></label>
					<input type="text" name="subject">
					<label>message</label>
					<textarea cols="300" rows="10" name="message"></textarea>
					<input type="hidden" name="redirect" value="<?php echo get_bloginfo('wpurl')?>/thank_you">
					<button class="btn" id="btnSubmit" type="button">submit</button>
				</form>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="widget-area"><?php dynamic_sidebar("sidebar-1"); ?></div>
</div>

<?php get_footer(); ?>
