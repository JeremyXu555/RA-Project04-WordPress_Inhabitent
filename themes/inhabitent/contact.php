<!-- 
Template Name: Contact
 -->

<?php

get_header(); 

?>
<div class="contact-page">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="contact">	 
				<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', get_post_type() ); ?>

				<?php endwhile; // End of the loop. ?>	
				<form id="contact-response-form" class="contact-response" name="contact-response" method="POST" action="<?php echo get_bloginfo('stylesheet_directory')?>/contact_response.php">
					<label>name *</label>
					<input id="name" type="text" name="name">
					<label>email *</label>
					<input id="email" type="text" name="email">
					<label>subject *</label>
					<input type="text" name="subject">
					<label>message</label>
					<textarea cols="300" rows="10" name="message"></textarea>
					<button class="btn" id="btnSubmit" type="button">submit</button>
				</form>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	<div class="widget-area"><?php dynamic_sidebar("sidebar-1"); ?></div>
</div>

<script type="text/javascript">
	function validateForm(){	
/* Validating name field */
var x=document.forms["contact-response-form"].name.value;
if (x==null || x=="")
 {
 alert("Name must be filled out");
 return false;
 }
/* Validating email field */
var x=document.forms["contact-response-form"].email.value;
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
 {
 alert("Not a valid e-mail address");
 return false;
 }

/* Validating subject field */
var x=document.forms["contact-response-form"].subject.value;
if(x == null || x==""){
	alert("Subject must be filled out");
	return false;
}

document.getElementById("contact-response-form").submit();
}

$("#btnSubmit").click(validateForm);

</script>

<?php get_footer(); ?>
