<?php 
add_action('init', function(){

	add_rewrite_rule('^leaf/([0-9]+)/?', 'index.php?page_id=$matches[1]', 'top');
	add_rewrite_rule('^journals?', 'index.php?post_type=post', 'top');

	flush_rewrite_rules();
});

?>