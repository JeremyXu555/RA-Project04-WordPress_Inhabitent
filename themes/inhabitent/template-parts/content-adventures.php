<?php
/**
 * Template part for displaying posts.
 *
 * @package Inhabitent_WordPress
 */

?>

<?php

	$thumb_id = get_post_thumbnail_id();
	$id = get_the_ID();
?>

	<div class="storyWrapper adventure-<?php echo $id;?>">	
			<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( ); ?>
			<?php endif; ?>		
		<div class="storyInfo<?php if(is_single()){echo '-single';}?>">
			<h3>
				<a href=""> <?php the_title();?> </a>
			</h3>
			
			<?php if(is_single()){?>

			<h4 class="adventure-author">
				By <?php the_author();?>
			</h4>

			<?php }?>

			<?php if(!is_single()){ ?>
				<a class="btn white-btn" href="#">Read More</a>	
			<?php }?>
		</div>
	</div>

	<?php if(is_single()){
		the_content();?>			
			<div class="adventure-social-btns">
				
				<button class="btn black-btn">
					<i class="fa fa-facebook"></i>
					Like
				</button>
				<button class="btn black-btn">
					<i class="fa fa-twitter"></i>
					Tweet
				</button>
				<button class="btn black-btn">
					<i class="fa fa-pinterest"></i>
					Pin
				</button>						
			</div>
<?php	}?>












