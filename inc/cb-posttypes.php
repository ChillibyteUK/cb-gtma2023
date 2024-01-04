<?php

function cb_register_post_types()
{
    $labels = [
        "name" => "Suppliers",
        "singular_name" => "Supplier",
        "add_new" => "Add New Supplier",
        "update_item" => "Update Supplier",
        "edit_item" => "Edit Supplier",
        "view_item" => "View Supplier",
    ];

    $args = [
        "label" => "supplier",
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "menu_icon" => "dashicons-open-folder",
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "suppliers", "with_front" => false ],
        "query_var" => true,
        "supports" => [ "title",  "editor" ],
        "show_in_graphql" => false,
        "exclude_from_search" => false
    ];

    register_post_type("suppliers", $args);


    $labels = [
        "name" => __("SCS Magazines", "cb-gtma2023"),
        "singular_name" => __("SCS Magazine", "cb-gtma2023"),
    ];

    $args = [
        "label" => __("scs", "cb-gtma2023"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "menu_icon" => "dashicons-open-folder",
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "scs", "with_front" => false ],
        "query_var" => true,
        "supports" => [ "title", "editor" ],
        "show_in_graphql" => false,
        "exclude_from_search" => false
    ];

    register_post_type("scs", $args);

    $labels = [
        "name" => __("Events", "cb-gtma2023"),
        "singular_name" => __("Event", "cb-gtma2023"),
    ];

    $args = [
        "label" => __("Events", "cb-gtma2023"),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "menu_icon" => "dashicons-open-folder",
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => [ "slug" => "events", "with_front" => false ],
        "query_var" => true,
        "supports" => [ "title", "editor", "thumbnail" ],
        "show_in_graphql" => false,
        "exclude_from_search" => false
    ];

    register_post_type("event", $args);
}
add_action('init', 'cb_register_post_types');


/*

// ************* Remove default Posts type if no blog *************

// Remove side menu
add_action( 'admin_menu', 'remove_default_post_type' );

function remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}

// Remove +New post in top Admin Menu Bar
add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );

function remove_default_post_type_menu_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'new-post' );
}

// Remove Quick Draft Dashboard Widget
add_action( 'wp_dashboard_setup', 'remove_draft_widget', 999 );

function remove_draft_widget(){
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}

// End remove post type

*/

// SUPPLIERS


// ADD NEW COLUMN
function suppliers_featured_head($defaults) {
	$column_name = 'profile';//column slug
	$column_heading = 'Profile Level';//column heading
	$defaults[$column_name] = $column_heading;
	return $defaults;
}
 
// SHOW THE COLUMN CONTENT
function suppliers_featured_content($name, $post_ID) {
    $column_name = 'profile';//column slug	
    $column_field = 'profile';//field slug	
    if ($name == $column_name) {
        $post_meta = get_post_meta($post_ID,$column_field,true);
        if ($post_meta) {
            echo $post_meta;
        }
    }
}

// ADD STYLING FOR COLUMN
function suppliers_featured_style(){
	$column_name = 'profile';//column slug	
	echo "<style>.column-$column_name{width:10%;}</style>";
}

function is_featured_dropdown() {
    $scr = get_current_screen();
    if ( $scr->base !== 'edit' && $scr->post_type !== 'suppliers') return;

    $selected = filter_input(INPUT_GET, 'profile');

    $choices = [
      'Featured' => 'Featured',
      'Full Profile' => 'Full Profile',
      'Basic' => 'Basic '
    ];

    echo'<select name="profile">';
        echo '<option value="all" '. (( $selected == 'all' ) ? 'selected="selected"' : "") . '>' . 'All Profile Levels' . '</option>';
        foreach( $choices as $key => $value ) {
            echo '<option value="' . $key . '" '. (( $selected == $key ) ? 'selected="selected"' : "") . '>' . $value . '</option>';
        }
    echo'</select>';
}
add_action('restrict_manage_posts', 'is_featured_dropdown');


function is_featured_filter($query) {
    if ( is_admin() && $query->is_main_query() ) {
      $scr = get_current_screen();
      if ( $scr->base !== 'edit' && $scr->post_type !== 'suppliers' ) return;

      if (isset($_GET['profile']) && $_GET['profile'] != 'all') {
        $query->set('meta_query', array( array(
          'key' => 'profile',
          'value' => sanitize_text_field($_GET['profile'])
        ) ) );
      }
    }
}

add_action('pre_get_posts','is_featured_filter'); 

add_filter('manage_suppliers_posts_columns', 'suppliers_featured_head');
add_action('manage_suppliers_posts_custom_column', 'suppliers_featured_content', 10, 2);
add_filter('admin_head', 'suppliers_featured_style');

add_action('after_switch_theme', function () {
    // cb_register_post_types();
    flush_rewrite_rules();
});

// EVENTS

// ADD NEW COLUMN
function event_start_head($defaults) {
	$column_name = 'start';//column slug
	$column_heading = 'Start Date';//column heading
	$defaults[$column_name] = $column_heading;
	return $defaults;
}
 
// SHOW THE COLUMN CONTENT
function event_start_content($name, $post_ID) {
    $column_name = 'start';//column slug	
    $column_field = 'start_date';//field slug	
    if ($name == $column_name) {
        $post_meta = get_post_meta($post_ID,$column_field,true);
        if ($post_meta) {
            $start = datetime::createfromformat('Ymd',$post_meta);
            echo date_format($start,"d/m/Y");
        }
    }
}

// ADD STYLING FOR COLUMN
function event_start_style(){
	$column_name = 'start';//column slug	
	echo "<style>.column-$column_name{width:10%;}</style>";
}

add_filter('manage_event_posts_columns', 'event_start_head');
add_action('manage_event_posts_custom_column', 'event_start_content', 10, 2);
add_filter('admin_head', 'event_start_style');

add_action('after_switch_theme', function () {
    // cb_register_post_types();
    flush_rewrite_rules();
});

// ADD NEW COLUMN
function event_end_head($defaults) {
	$column_name = 'end';//column slug
	$column_heading = 'End Date';//column heading
	$defaults[$column_name] = $column_heading;
	return $defaults;
}
 
// SHOW THE COLUMN CONTENT
function event_end_content($name, $post_ID) {
    $column_name = 'end';//column slug	
    $column_field = 'end_date';//field slug	
    if ($name == $column_name) {
        $post_meta = get_post_meta($post_ID,$column_field,true);
        if ($post_meta) {
            $end = datetime::createfromformat('Ymd',$post_meta);
            echo date_format($end,"d/m/Y");
        }
    }
}

// ADD STYLING FOR COLUMN
function event_end_style(){
	$column_name = 'end';//column slug	
	echo "<style>.column-$column_name{width:10%;}</style>";
}

add_filter('manage_event_posts_columns', 'event_end_head');
add_action('manage_event_posts_custom_column', 'event_end_content', 10, 2);
add_filter('admin_head', 'event_end_style');



add_action('after_switch_theme', function () {
    // cb_register_post_types();
    flush_rewrite_rules();
});
