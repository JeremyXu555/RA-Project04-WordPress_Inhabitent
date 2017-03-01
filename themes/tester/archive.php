<?php

echo "This is archive.php";

get_header();

$query = new WP_Query(array(
	"post_per_page" => 1
));

if(have_posts()):

while(have_posts()):the_post();

// the_title();
// the_content();
// the_author();
// the_date();

$title = get_the_title();	
$content = get_the_content();
$author = get_the_author();
$date = get_the_date();
$excerpt = get_the_excerpt();
$link = get_the_permalink();


echo "<h1>Title: $title</h1>";
echo "<h2>Excerpt: $excerpt</h2>";
echo "<p>Date: $date</p>";
echo "<p>Author:$author</p>";
the_category();
echo "<a href=$link>Read More</a>";


endwhile;
	else:




	endif;


get_footer();

?>