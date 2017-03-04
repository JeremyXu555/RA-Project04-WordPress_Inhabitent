<?php
/**
 * Template part for displaying posts.
 *
 * @package Inhabitent_WordPress
 */

?>

<?php
if(is_home()){
	// HOME PAGE
	$thumb_id = get_post_thumbnail_id();
	$id = get_the_ID();
?>


	<div class="storyWrapper adventure-<?php echo $id;?>">	
			<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( ); ?>
			<?php endif; ?>		
		<div class="storyInfo">
			<h3>
				<a href=""> <?php the_title();?> </a>
			</h3>
			<a class="btn white-btn" href="#">Read More</a>
		</div>
	</div>



<?php
} else if(is_archive()){
// ARCHIVE PAGE


} else {
// SINGLE PAGE


}



?>



