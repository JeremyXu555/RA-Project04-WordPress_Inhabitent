<?php
/**
 * Template part for displaying posts.
 *
 * @package Inhabitent_WordPress
 */
?>

<article id="post-<?php the_ID(); ?>" class="<?php 
	if(is_category('journal')){echo 'journal-archive';}
	if(is_single()){echo 'journal-single';}?>" >
	
	<div class="postItem">
		<div class="entry-header">
			<div class="thumbnail-img">
				<?php if ( has_post_thumbnail() ) :  ?>
				<?php 		
				the_post_thumbnail( 'large'); ?>
				<?php endif; ?>
			</div>
		</div>	
								
		<div class="entry-footer">
			<h3 class="entry-title">
				<a href="<?php echo get_post_permalink();?>"><?php the_title(); ?></a>
			</h3>	
			<div class="post-quickInfo">						
				<p><?php inhabitent_posted_on(); ?> / </p>
				<p> <?php comments_number( ' 0 Comments', ' 1 Comment', ' % Comments' ) ; ?> </p> 	

				<?php if(!is_home()){ ?>
				<p>/ <?php inhabitent_posted_by(); ?></p>
				<?php	}?>
			</div>
		</div>

		<?php	if( is_home()){ ?>			
				<a href="<?php echo get_post_permalink();?>" class="detail btn black-btn">READ ENTRY</a>			
		<?php	}?>

	</div>							
			<?php if(is_category("journal")){
				the_excerpt();
				?>				
				<a href="<?php echo get_post_permalink();?>" class="detail btn black-btn">READ MORE <i class="fa fa-arrow-right" aria-hidden="true"></i> </a>
			<?php	}?>		
	
<?php if(is_single()){ 
	the_content();
	?>		
		<footer class="entry-footer">
			<span class="cat-link">POSTED IN 
				<i class="fa fa-arrow-right" aria-hidden="true"></i> 
				<a href="#" style="color: #248a83; font-size: 1.2rem;"><?php 
					$catArray = get_the_category();
					echo $catArray[0]->cat_name;?></a>
			</span>
			<span class="tags-link">TAGGED 
				<i class="fa fa-arrow-right" aria-hidden="true"></i>
				<a href="#" style="color: #248a83; font-size: 1.2rem;">
				<?php $t = wp_get_post_tags($post->ID); echo $t[0]-> name;?>	
				</a> 
			</span>
			<div class="social-btns" style="margin-top: 10px;">				
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
		</footer> <!--entry-footer -->
	<?php	}?>
</article><!-- post -->




