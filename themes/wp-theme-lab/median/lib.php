<?php

/**
 * Register a  post type.
 *
 *
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


function create_post_types(){

	$post_types = array("Products", "Adventures");

	foreach($post_types as $post_type) {
		$post_args = get_post_args($post_type);

		register_post_type($post_type, $post_args);
	}

};

// add_action( 'init', 'create_post_types');


/*
*
*
* Add Meta Boxes
*/


	add_action('add_meta_boxes', function() {
		//  css id, title, callback function, post Type, priority, callback function args
		add_meta_box('product_price', 'price', 'get_product_price', 'products');
	});


function get_product_price($post){
	$price = get_post_meta($post->ID, 'product_price', true);
	?>
		
	<p>
		<label for="product_price">Price</label>
		<input type="text" class="wide-fat" name="product_price" id="product_price" value="<?php echo esc_attr($price);?>">
	</p>


	<?php
}

add_action('save_post', function($id){
	echo $_POST['product_price'];
	if(isset($_POST['product_price'])){
		update_post_meta(
				$id,
				'product_price',
				 strip_tags($_POST['product_price'])
		);
	}
});



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

function createTaxonomy(){
	
	$taxonomies = array("Price" => "products",
										"Color" => "products");

	foreach($taxonomies as $key => $value){
		reg_taxonomy($key, $value);	
	}

};

// add_action('init', 'createTaxonomy');

/*****************************Create Custom Post Type and Taxonomy Type*****************************************/

function create_post_and_taxo(){

	$post_info_array = array(
		"products" => array("Color", "Price"),
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














?>