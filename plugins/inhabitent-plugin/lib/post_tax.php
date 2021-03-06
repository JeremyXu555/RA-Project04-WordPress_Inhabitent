<?php
//Remove the Wordpress Admin Bar CSS

add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}
/*
	================================================================================
							ADD CUSTOM POST TYPE AND TAXONOMY
  ================================================================================

*/
function get_post_args($category) {

	$labels = array(
		'name'               => _x( $category, 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( $category, 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( $category, 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( $category, ' add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New ', trim($category,'s'), 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New '. trim($category,'s'), 'your-plugin-textdomain' ),
		'new_item'           => __( 'New ' . trim($category,'s'), 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit ' . trim($category,'s'), 'your-plugin-textdomain' ),
		'view_item'          => __( 'View ' . trim($category,'s'), 'your-plugin-textdomain' ),
		'all_items'          => __( 'All '.$category, 'your-plugin-textdomain' ),
		'search_items'       => __( "Search $category", 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( "Parent $category".":", 'your-plugin-textdomain' ),
		'not_found'          => __( 'No '.$category.' found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No '.$category.' found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		// 'rewrite'            => array( 'slug' => $category ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' )
	);

	return $args;
}

function get_taxonomy_args($taxonomyName){

	$labels = array(
		'name'              => _x( $taxonomyName.'s', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( $taxonomyName, 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( $taxonomyName, 'textdomain' ),
		'all_items'         => __( 'All '.$taxonomyName.'s', 'textdomain' ),
		'parent_item'       => __( 'Parent '.$taxonomyName, 'textdomain' ),
		'parent_item_colon' => __( "Parent $taxonomyName:", 'textdomain' ),
		'edit_item'         => __( "Edit $taxonomyName", 'textdomain' ),
		'update_item'       => __( "Update $taxonomyName", 'textdomain' ),
		'add_new_item'      => __( "Add New $taxonomyName", 'textdomain' ),
		'new_item_name'     => __( "New $taxonomyName Name", 'textdomain' ),
		'menu_name'         => __( "$taxonomyName", 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => $taxonomyName ),
	);

	return $args;
};

function create_post_and_taxo(){

	$post_info_array = array(
		"products" => array("Type"),
		"adventures" => array("Date", "Location")
	);

	foreach($post_info_array as $post_key => $taxonomy_value){

			foreach($taxonomy_value as $taxonomy){

				$taxonomy_args = get_taxonomy_args($taxonomy);

				register_taxonomy($taxonomy, $post_key, $taxonomy_args);
			}
			$post_args = get_post_args($post_key);
			register_post_type($post_key, $post_args);
	}
}

add_action("init", "create_post_and_taxo");

// Add the excerpt to Journal Post

add_action( 'init', 'my_add_excerpts_to_pages' );

function my_add_excerpts_to_pages() {

   add_post_type_support( 'page', 'excerpt' );

}

// Get archive query based on the post type

function get_post_query($post_type){
	return $post_query = "query_archive_$post_type";
}
/*
	========================================
							ADD SIDEBAR
  ========================================

*/

function wpdocs_theme_slug_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Main Sidebar', 'textdomain' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Widgets in this area will be shown on all posts and pages.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );

add_action("pre_get_posts","inhabitent_pre_query");

function inhabitent_pre_query ($query) {
	if (is_post_type_archive("products")) {
		$query->query_vars["posts_per_page"] = 16;
	}

	if($query->is_main_query() && $query->is_home() ) {
		$query->query_vars["posts_per_page"] = 3;
	}
}


/*
	================================================================================
							BUILD QUERY FRO ADVENTURE ON THE HOME PAGE
  ================================================================================

*/
function get_adventures_query_homepage(){
	$query_adventures = new WP_Query(array(
					"post_type" => "adventures",
					"posts_per_page" => "4"
			));
	return $query_adventures;
}
/*
	================================================================================
							BUILD ADVENTURE FLEXBOX STRUCTURE ON THE HOME PAGE
  ================================================================================

*/

function build_adventures_homepage($count){

	if($count == 0){ // First Image ?>
					
				<div class="wrapperRight">	
						
				<?php
				}// First Image

				if($count == 1) { // Second Image ?> 
							
					<div class="wrapperRightBottom">

				<?php
				}// Second Image

				if($count == 2){ //Third Image ?>
					
				<?php } // Third Image

				if($count == 3){ // Last Image ?>
					</div>
				</div>
				<?php }// Last Image
}

/*
	================================================================================
							ARCHIVE REFRACTORING
  ================================================================================

*/

function get_page_header(){
	if(is_tax("Type")){		
			$taxonomyObject = get_queried_object();
			?>

			<h1 class="page-title" style="text-transform: uppercase;"> <?php echo($taxonomyObject->name);?> </h1>

<?php	the_archive_description( '<div class="taxonomy-description">', '</div>');}
}

function get_content_header(){
	if(is_post_type_archive("adventures")){ ?>

			<h2 class="adventures-archive-title"> Latest Adventures </h2>

			<?php } elseif(is_post_type_archive("products")){

				$terms = get_terms(array(
					"taxonomy" => "Type",
					"hide_empty" => false
				)); ?>
			<h2 class="products-archive-title"> SHOP STUFF</h2>
			<div class="products-nav">
				<?php	foreach($terms as $term){ ?>		
					<a href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name;?></a>
				<?php	} ?>
			</div>
		<?php	}
}


function get_dynamic_sidebar_arch(){
	if(is_category("journal")){ ?>
	<div class="journal-sidebar"> <?php dynamic_sidebar("sidebar-1"); ?></div>
	<?php	}
}

/*
	================================================================================
							CUSTOM URL FOR JOURNAL ARCHIVES
  ================================================================================

*/

add_action('init', function(){

	add_rewrite_rule('journals', 'category/uncategorized/', 'top');

	flush_rewrite_rules();
});

/*
	================================================================================
							UPLOAD .svg FILE TO WORDPRESS
  ================================================================================

*/

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


?>