<?php
/*
 * Plugin Name: Marti's Custom Post Types and Taxonomies
 * Description: A simple plugin that adds custom post types and taxonomies
 * Version: 0.1
 * Author: Martina Gabrielli
 * License: GPL2
 */

/* Marti's Custom Post Types and Taxonomies is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Marti's Custom Post Types and Taxonomies is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Marti's Custom Post Types and Taxonomies. If not, see {URI to Plugin License}.
*/

function my_custom_posttypes(){
    // Testimonials post type
    $labels = array(
        'name'               => 'Testimonials',
        'singular_name'      => 'Testimonial',
        'menu_name'          => 'Testimonials',
        'name_admin_bar'     => 'Testimonial',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Testimonial',
        'new_item'           => 'New Testimonial',
        'edit_item'          => 'Edit Testimonial',
        'view_item'          => 'View Testimonial',
        'all_items'          => 'All Testimonials',
        'search_items'       => 'Search Testimonials',
        'parent_item_colon'  => 'Parent Testimonials:',
        'not_found'          => 'No testimonials found.',
        'not_found_in_trash' => 'No testimonials found in Trash.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-smiley',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'testimonials' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'show_in_rest'       => true
    );

    register_post_type('testimonials', $args);

    // Reviews post type
    $labels = array(
        'name'               => 'Reviews',
        'singular_name'      => 'Review',
        'menu_name'          => 'Reviews',
        'name_admin_bar'     => 'Review',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Review',
        'new_item'           => 'New Review',
        'edit_item'          => 'Edit Review',
        'view_item'          => 'View Review',
        'all_items'          => 'All Reviews',
        'search_items'       => 'Search Reviews',
        'parent_item_colon'  => 'Parent Reviews:',
        'not_found'          => 'No reviews found.',
        'not_found_in_trash' => 'No reviews found in Trash.',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-star-half',
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'reviews' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt', 'comments'),
        'taxonomies'         => array('category', 'post_tag'),
        'show_in_rest'       => true
    );
    
    register_post_type('reviews', $args);
}

add_action('init', 'my_custom_posttypes');

function my_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry, 
    // when you add a post of this CPT.
    my_custom_posttypes();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );


/* Custom Taxonomies */

function my_custom_taxonomies() {
    // Price Range taxonomy
    $labels = array(
        'name'              => 'Price Range',
        'singular_name'     => 'Price Range',
        'search_items'      => 'Search Price Range',
        'all_items'         => 'All Price Range',
        'parent_item'       => 'Parent Price Range',
        'parent_item_colon' => 'Parent Price Range:',
        'edit_item'         => 'Edit Price Range',
        'update_item'       => 'Update Price Range', 
        'add_new_item'      => 'Add New Price Range',
        'new_item_name'     => 'New Type of Price Range',
        'menu_name'         => 'Price Range',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'price-range' ),
        'show_in_rest'      => true
    );

    register_taxonomy( 'price', array( 'reviews' ), $args );
    // Type of Product/Service taxonomy
    $labels = array(
        'name'              => 'Type of Products/Services',
        'singular_name'     => 'Type of Product/Service',
        'search_items'      => 'Search Types of Products/Services',
        'all_items'         => 'All Types of Products/Services',
        'parent_item'       => 'Parent Type of Product/Service',
        'parent_item_colon' => 'Parent Type of Product/Service:',
        'edit_item'         => 'Edit Type of Product/Service',
        'update_item'       => 'Update Type of Product/Service', 
        'add_new_item'      => 'Add New Type of Product/Service',
        'new_item_name'     => 'New Type of Product/Service Name',
        'menu_name'         => 'Type of Product/Service',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'product-types' ),
        'show_in_rest'      => true
    );

    register_taxonomy( 'product-type', array( 'reviews' ), $args );

    // Mood taxonomy (non-hierarchical)
    $labels = array(
        'name'                       => 'Moods',
        'singular_name'              => 'Mood',
        'search_items'               => 'Search Moods',
        'popular_items'              => 'Popular Moods',
        'all_items'                  => 'All Moods',
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => 'Edit Mood',
        'update_item'                => 'Update Mood',
        'add_new_item'               => 'Add New Mood',
        'new_item_name'              => 'New Mood Name',
        'separate_items_with_commas' => 'Separate moods with commas',
        'add_or_remove_items'        => 'Add or remove moods',
        'choose_from_most_used'      => 'Choose from the most used moods',
        'not_found'                  => 'No moods found.',
        'menu_name'                  => 'Moods',
    );

    $args = array(
        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'moods' ),
    );

    register_taxonomy( 'mood', array( 'reviews', 'post' ), $args );
    }

add_action('init', 'my_custom_taxonomies');


