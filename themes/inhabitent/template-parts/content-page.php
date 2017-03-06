<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @package Inhabitent_WordPress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
	<div class="entry-content">
		
		<h2><?php $object = get_field_object("title");	
		echo $object["value"];?></h2>

		<p><?php $object = get_field_object("content");
		echo $object["value"];?></p>
		
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
