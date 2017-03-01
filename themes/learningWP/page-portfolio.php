<?php

get_header();

if(have_posts()):

	while(have_posts()): the_post(); ?>
	
	<article class="post page">
		<div class="container-column clear-fix"><!-- Column Container -->
			<!-- Title Column -->
			<div class="title-column">
				<h2><?php the_title()?></h2>
			</div>
			<!-- Text column -->
			<div class="text-column">
				<?php the_content();?>
			</div>
		</div><!-- Column Container -->
		
	</article>

<?php
	endwhile;

	else:
		echo "<p>No content found</p>";

endif;

get_footer();
?>