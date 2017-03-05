<?php
/**
 * Template part for displaying posts.
 *
 * @package Inhabitent_WordPress
 */

?>

<!-- <?php if(is_tax('Type')){echo "currently on taxonomy.php";}
	
elseif(is_archive()){

}else {

}

?> -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'large' ); ?>
		<?php endif; ?>
		
		<p>
		<?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>
		.........	
		<?php $priceObject = get_field_object("price");
					setlocale(LC_MONETARY,"en_CA");
					echo money_format("%.2n", $priceObject["value"]);
					?>
		</p>			
	</header><!-- .entry-header -->

	<div class="entry-content">
	
	</div><!-- .entry-content -->
</article><!-- #post-## -->
