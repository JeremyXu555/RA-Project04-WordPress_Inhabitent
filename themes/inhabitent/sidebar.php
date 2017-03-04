<?php
/**
 * The sidebar containing the main widget area.s
 *
 * @package Inhabitent_WordPress
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<aside class="widget-contact">
			<h3 class="widget-text">CONTACT</h3>
			<p><i class="fa fa-envelope"></i><a href="mailto:jeremyxu89@gmail.com">info@inhabitent.com</a></p>
			<p><i class="fa fa-phone"></i><a href="tel:1-647-570-0211">1-647-570-0211</a></p>
		</aside>
		<aside class="widget-biz">
			<h3 class="widget-title">BUSINESS HOURS</h3>
				<P><strong>Monday-Friday:</strong> Never rest</P>
				<p><strong>Saturday:</strong> 12:00am to 12:00pm</p>
				<p><strong>Sunday:</strong> Wide Open, all food is free!</p>
		</aside>
		<aside class="widget-archives">
			<h3 class="widget-title"><?php dynamic_sidebar( 'sidebar-1' ); ?></h3>
		</aside>	

</div><!-- #secondary -->
