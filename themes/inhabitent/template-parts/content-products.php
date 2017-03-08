<?php
/**
 * Template part for displaying posts.
 *
 * @package Inhabitent_WordPress
 */
if (is_home()) { ?>

	<div class="productType">

			  <img src="<?php the_field("image", $term); ?>" alt="logo">
				
				<p><?php echo $term->description;?></p>
				<p>
					<a class="btn" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name;?> stuff</a>
				</p>
			</div>

<?php } else { ?>
	
<article id="post-<?php the_ID(); ?>" class="<?php if(is_single()){echo ' products-single';}?>">
	<header class="entry-header">
		
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'large' ); ?>
		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="<?php if(is_single()){ echo '';}
		else {echo 'products-arch-metaInfo';}
		?>">
			<p>
				<?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>
			</p>
			<p>
				<?php if(is_single()) {echo "";}
					else{
						echo ".........	";
					}
				?>	
			</p>
			<p>		
				<?php $priceObject = get_field_object("price");
							setlocale(LC_MONETARY,"en_CA");
							echo money_format("%.2n", $priceObject["value"]);
							?>
			</p>
		</div>
		<?php if(is_single()){
			the_content();?>
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
		<?php	}?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
<?php }?>