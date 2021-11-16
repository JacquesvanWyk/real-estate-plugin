<?php
/**
* Plugin Name:       Motion Stack Real Estate Plugin
* Plugin URI:        https://motionstack.design/plugins/real-eastate
* Description:       Real Estate Wordpress Plugin
* Version:           0.0.1
* Requires at least: 5.2
* Requires PHP:      7.2
* Author:            Jacques van Wyk
* Author URI:        https://motionstack.design/
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Update URI:        https://example.com/my-plugin/
* Text Domain:       motionstack-real-estate
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class RealEstate {
    public function __construct()
    {
        add_action('init',array($this, 'wpdocs_codex_Property_init'));
        add_action('init',array($this, 'wpdocs_create_property_taxonomies'));
    }

    public function wpdocs_codex_Property_init() {
        $labels = array(
            'name'                  => _x( 'Properties', 'Post type general name', 'textdomain' ),
            'singular_name'         => _x( 'Property', 'Post type singular name', 'textdomain' ),
            'menu_name'             => _x( 'Properties', 'Admin Menu text', 'textdomain' ),
            'name_admin_bar'        => _x( 'Property', 'Add New on Toolbar', 'textdomain' ),
            'add_new'               => __( 'Add New', 'textdomain' ),
            'add_new_item'          => __( 'Add New Property', 'textdomain' ),
            'new_item'              => __( 'New Property', 'textdomain' ),
            'edit_item'             => __( 'Edit Property', 'textdomain' ),
            'view_item'             => __( 'View Property', 'textdomain' ),
            'all_items'             => __( 'All Properties', 'textdomain' ),
            'search_items'          => __( 'Search Properties', 'textdomain' ),
            'parent_item_colon'     => __( 'Parent Properties:', 'textdomain' ),
            'not_found'             => __( 'No Properties found.', 'textdomain' ),
            'not_found_in_trash'    => __( 'No Properties found in Trash.', 'textdomain' ),
            'featured_image'        => _x( 'Property Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
            'archives'              => _x( 'Property archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
            'insert_into_item'      => _x( 'Insert into Property', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
            'uploaded_to_this_item' => _x( 'Uploaded to this Property', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
            'filter_items_list'     => _x( 'Filter Properties list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
            'items_list_navigation' => _x( 'Properties list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
            'items_list'            => _x( 'Properties list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'Property' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'menu_icon'          => 'dashicons-schedule',
            'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
        );

        register_post_type( 'Property', $args );
    }

    
    
    function wpdocs_create_property_taxonomies() {
        // Add new taxonomy, make it hierarchical (like categories)
        $labels = array(
            'name'              => _x( 'Types', 'taxonomy general name', 'textdomain' ),
            'singular_name'     => _x( 'Type', 'taxonomy singular name', 'textdomain' ),
            'search_items'      => __( 'Search Types', 'textdomain' ),
            'all_items'         => __( 'All Types', 'textdomain' ),
            'parent_item'       => __( 'Properties', 'textdomain' ),
            'parent_item_colon' => __( 'Parent Type:', 'textdomain' ),
            'edit_item'         => __( 'Edit Type', 'textdomain' ),
            'update_item'       => __( 'Update Type', 'textdomain' ),
            'add_new_item'      => __( 'Add New Type', 'textdomain' ),
            'new_item_name'     => __( 'New Type Name', 'textdomain' ),
            'menu_name'         => __( 'Type of Property', 'textdomain' ),
        );

        $args = array(
            'hierarchical'      => true,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'Type' ),
        );

        register_taxonomy( 'Type', array( 'property' ), $args );
    }

    
    
    
}

new RealEstate;