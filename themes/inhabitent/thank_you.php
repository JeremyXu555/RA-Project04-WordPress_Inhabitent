<!-- 

Template Name: Thank you 

-->

<?php
	get_header();
?>


<div class="thank-you-page">
	
<h1 class="thank-you-title">
	<?php the_title();?>
</h1>

<?php while(have_posts()): the_post();?>	

	<div class="thank-you-content">
	<?php the_content(); ?>
	</div>
<div class="thumbImg">
	<?php the_post_thumbnail(); ?>
</div>

<h3><a href="<?php echo get_bloginfo('wpurl');?>/products">More Products?</a></h3>

</div>

<?php
	endwhile;
get_footer();
?>





