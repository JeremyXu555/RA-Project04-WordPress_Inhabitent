<?php
/**
 * The template for displaying the footer.
 *
 * @package Inhabitent_WordPress
 */

?>

			</div><!-- #content -->

			<footer id="colophon" class="site-footer footer flex flex-space-between" role="contentinfo">

				<div class="flex-space-between flex">
					<div class="flex">
						<div class="footer-col">
							<h3>CONTACT INFO</h3>
							<p><i class="fa fa-envelope"></i><a href="mailto:jeremyxu89@gmail.com">info@inhabitent.com</a></p>
							<p><i class="fa fa-phone"><a href="tel:1-647-570-0211">1-647-570-0211</a></i></p>
							<p class="footer-icons-row" style="font-size: 1.2rem;">
								<i class="fa fa-facebook-square" aria-hidden="true"></i>
								<i class="fa fa-twitter-square" aria-hidden="true"></i>
								<i class="fa fa-google-plus-square" aria-hidden="true"></i>
							</p>
						</div>
						<!-- contact info -->
						<div class="footer-col">
							<h3>BUSINESS HOURS</h3>
							<P><strong>Monday-Friday:</strong> Never rest</P>
							<p><strong>Saturday:</strong> 12:00am to 12:00pm</p>
							<p><strong>Sunday:</strong> Wide Open, all food is free!</p>
						</div>
					</div>
				<!-- business hours -->
					<div class="logo-text">
						<img src="<?php echo get_bloginfo(stylesheet_directory)?>/images/logos/inhabitent-logo-text.svg">
					</div>
				</div>
					<!-- copyright -->
				<div class="copyright">
				COPYRIGHT &copy; 2016 INHABITENT
				</div>

			
			</footer><!-- #colophon -->
		</div><!-- #page -->

		<?php wp_footer(); ?>

	</body>
</html>

