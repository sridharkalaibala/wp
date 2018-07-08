<?php

function my_theme_enqueue_styles() {

	$parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get( 'Version' )
	);
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


add_action( 'init', 'register_film_post_type' );
/**
 * Register a film post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function register_film_post_type() {
	$labels = array(
		'name'               => _x( 'Films', 'Film', 'film' ),
		'singular_name'      => _x( 'Film', 'film', 'film' ),
		'menu_name'          => _x( 'Films', 'Films', 'film' ),
		'name_admin_bar'     => _x( 'Film', 'Add New', 'film' ),
		'add_new'            => _x( 'Add New', 'film', 'film' ),
		'add_new_item'       => __( 'Add New Film', 'film' ),
		'new_item'           => __( 'New Film', 'film' ),
		'edit_item'          => __( 'Edit Film', 'film' ),
		'view_item'          => __( 'View Film', 'film' ),
		'all_items'          => __( 'All Films', 'film' ),
		'search_items'       => __( 'Search Films', 'film' ),
		'parent_item_colon'  => __( 'Parent Films:', 'film' ),
		'not_found'          => __( 'No films found.', 'film' ),
		'not_found_in_trash' => __( 'No films found in Trash.', 'film' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'film' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'film' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'film', $args );
}

add_action( 'init', 'create_film_taxonomies', 0 );

function create_film_taxonomies() {

	$labels = array(
		'name'                       => _x( 'Genres', 'taxonomy general name', 'genre' ),
		'singular_name'              => _x( 'Genre', 'taxonomy singular name', 'genre' ),
		'search_items'               => __( 'Search Genres', 'genre' ),
		'popular_items'              => __( 'Popular Genres', 'genre' ),
		'all_items'                  => __( 'All Genres', 'genre' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Genre', 'genre' ),
		'update_item'                => __( 'Update Genre', 'genre' ),
		'add_new_item'               => __( 'Add New Genre', 'genre' ),
		'new_item_name'              => __( 'New Genre Name', 'genre' ),
		'separate_items_with_commas' => __( 'Separate genres with commas', 'genre' ),
		'add_or_remove_items'        => __( 'Add or remove genres', 'genre' ),
		'choose_from_most_used'      => __( 'Choose from the most used genres', 'genre' ),
		'not_found'                  => __( 'No genres found.', 'genre' ),
		'menu_name'                  => __( 'Genres', 'genre' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'genre' ),
	);

	register_taxonomy( 'genre', array( 'film' ), $args );

	// Add country taxonomy
	$labels = array(
		'name'                       => _x( 'Countries', 'taxonomy general name', 'country' ),
		'singular_name'              => _x( 'Country', 'taxonomy singular name', 'country' ),
		'search_items'               => __( 'Search Countries', 'country' ),
		'popular_items'              => __( 'Popular Countries', 'country' ),
		'all_items'                  => __( 'All Countries', 'country' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Country', 'country' ),
		'update_item'                => __( 'Update Country', 'country' ),
		'add_new_item'               => __( 'Add New Country', 'country' ),
		'new_item_name'              => __( 'New Country Name', 'country' ),
		'separate_items_with_commas' => __( 'Separate countries with commas', 'country' ),
		'add_or_remove_items'        => __( 'Add or remove countries', 'country' ),
		'choose_from_most_used'      => __( 'Choose from the most used countries', 'country' ),
		'not_found'                  => __( 'No countries found.', 'country' ),
		'menu_name'                  => __( 'Countries', 'country' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'country' ),
	);

	register_taxonomy( 'country', 'film', $args );

	// Add year taxonomy
	$labels = array(
		'name'                       => _x( 'Years', 'taxonomy general name', 'year' ),
		'singular_name'              => _x( 'Year', 'taxonomy singular name', 'year' ),
		'search_items'               => __( 'Search Years', 'year' ),
		'popular_items'              => __( 'Popular Years', 'year' ),
		'all_items'                  => __( 'All Years', 'year' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Year', 'year' ),
		'update_item'                => __( 'Update Year', 'year' ),
		'add_new_item'               => __( 'Add New Year', 'year' ),
		'new_item_name'              => __( 'New Year Name', 'year' ),
		'separate_items_with_commas' => __( 'Separate years with commas', 'year' ),
		'add_or_remove_items'        => __( 'Add or remove years', 'year' ),
		'choose_from_most_used'      => __( 'Choose from the most used years', 'year' ),
		'not_found'                  => __( 'No years found.', 'year' ),
		'menu_name'                  => __( 'Years', 'year' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'year' ),
	);

	register_taxonomy( 'year', 'film', $args );

	// Add actor taxonomy
	$labels = array(
		'name'                       => _x( 'Actors', 'taxonomy general name', 'actor' ),
		'singular_name'              => _x( 'Actor', 'taxonomy singular name', 'actor' ),
		'search_items'               => __( 'Search Actors', 'actor' ),
		'popular_items'              => __( 'Popular Actors', 'actor' ),
		'all_items'                  => __( 'All Actors', 'actor' ),
		'parent_item'                => null,
		'parent_item_colon'          => null,
		'edit_item'                  => __( 'Edit Actor', 'actor' ),
		'update_item'                => __( 'Update Actor', 'actor' ),
		'add_new_item'               => __( 'Add New Actor', 'actor' ),
		'new_item_name'              => __( 'New Actor Name', 'actor' ),
		'separate_items_with_commas' => __( 'Separate actors with commas', 'actor' ),
		'add_or_remove_items'        => __( 'Add or remove actors', 'actor' ),
		'choose_from_most_used'      => __( 'Choose from the most used actors', 'actor' ),
		'not_found'                  => __( 'No actors found.', 'actor' ),
		'menu_name'                  => __( 'Actors', 'actor' ),
	);

	$args = array(
		'hierarchical'          => false,
		'labels'                => $labels,
		'show_ui'               => true,
		'show_admin_column'     => true,
		'update_count_callback' => '_update_post_term_count',
		'query_var'             => true,
		'rewrite'               => array( 'slug' => 'actor' ),
	);

	register_taxonomy( 'actor', 'film', $args );


}

// "Country", "Genre", "Ticket Price", "Release Date" values are added at list of films by using hook.

add_action( '__after_film_list_content', 'add_more_information_text' );

function add_more_information_text() {

	echo "<p>" . get_the_term_list( get_the_ID(), 'country', '<b>Country: </b>', ', ', '' ) . "</p>";
	echo "<p>" . get_the_term_list( get_the_ID(), 'genre', '<b>Genres: </b>', ', ', '' ) . "</p>";
	echo "<p>";
	if ( get_field( 'ticket_price' ) ):
		$field_name = "ticket_price";
		$field      = get_field_object( $field_name );
		echo '<b>' . $field['label'] . ': </b>' . $field['value'] . ' ' . $field['append'];
	endif;

	echo "</p>";
	echo "<p>";
	if ( get_field( 'release_date' ) ):
		$field_name = "release_date";
		$field      = get_field_object( $field_name );
		echo '<b>' . $field['label'] . ': </b>' . $field['value'];
	endif;
	echo "</p>";

}

//Shortcode for films. ( Last 5 Added Films )

add_shortcode( 'Last5AddedFilms', 'last_5_added_films_shortcode' );
function last_5_added_films_shortcode() {
	$args = array(
		'post_type'      => 'film',
		'post_status'    => 'publish',
		'posts_per_page' => 5
	);

	global $film;
	$film = new WP_Query( $args );
	$html = "";

	if ( $film->have_posts() ) {
		$html .= '<div class="latest-movies"> <ol>';
		while ( $film->have_posts() ) {
			$film->the_post();
			$html .= '<li><a href="' . get_post_permalink() . '">' . get_the_title() . '</a></li>';
		}
		$html .= '</ol> </div>';
	}
	wp_reset_query();

	return html_entity_decode( $html );
}

?>