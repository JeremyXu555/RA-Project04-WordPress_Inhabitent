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
			
			<h3 class="entry-title">
				<a href=""><?php the_title(); ?></a>
			</h3>		
						
			<div class="post-quickInfo">
				<p><?php inhabitent_posted_on(); ?></p>
				<p>/ <?php comments_number( '0 Comments', '1 Comment', '% Comments' ) ; ?></p> 	<p>/ <?php inhabitent_posted_by(); ?></p>
			</div><!-- .entry-meta -->
		</div>					
			<?php if(is_category("journal")){
				the_excerpt();
				} if(! is_single()){ ?>
				
				<a class="detail btn black-btn">READ <?php if(is_category("journal")){echo "MORE -->";} else {echo "ENTRY";}?></a>			

				<?php	}?>
			
	</div>
<?php if(is_single()){ ?>		
		<footer class="entry-footer">
			<span class="cat-link">POSTED IN -> 
				<a href="#">CONTESTS</a>
			</span>
			<span class="tags-link">TAGGED ->
				<a href="#">PHOTOGRAPHY, VANS</a> 
			</span>
			<div class="social-btns">
				
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

















