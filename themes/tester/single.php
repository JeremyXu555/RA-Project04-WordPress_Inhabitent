<?php

echo "This is the single.php";

get_header();

if(have_posts()):

while(have_posts()):the_post();

the_title();
the_content();
the_author();
the_date();

$title = get_the_title();	




endwhile;
	else:




	endif;


get_footer();

?>