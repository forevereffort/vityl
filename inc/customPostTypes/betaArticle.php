<?php

namespace Flynt\CustomPostTypes;

function registerBetaArticlePostType()
{
    $labels = array(
        'name'                  => _x('Beta Articles', 'Beta Article General Name', 'flynt'),
        'singular_name'         => _x('Beta Article', 'Beta Article Singular Name', 'flynt'),
        'menu_name'             => __('Beta Article', 'flynt'),
        'name_admin_bar'        => __('Beta Article', 'flynt'),
        'all_items'             => __('All Beta Articles', 'flynt'),
        'add_new_item'          => __('Add New Beta Article', 'flynt'),
        'add_new'               => __('Add New', 'flynt'),
        'new_item'              => __('New Beta Article', 'flynt'),
        'edit_item'             => __('Edit Beta Article', 'flynt'),
        'update_item'           => __('Update Beta Article', 'flynt'),
        'view_item'             => __('View Beta Article', 'flynt'),
        'view_items'            => __('View Beta Articles', 'flynt'),
        'search_items'          => __('Search Beta Article', 'flynt'),
    );

    $args = array(
        'label'                 => __('Beta Article', 'flynt'),
        'description'           => __('Beta Articles custom post type', 'flynt'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'author'),
        'taxonomies'            => ['category'],
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'show_in_rest'          => true,
        'rewrite'               => array( 'slug' => 'beta/article'),
        'capability_type'       => 'page',
        'menu_icon'             => 'dashicons-book',
    );

    register_post_type('beta-article', $args);
}

add_action('init', '\\Flynt\\CustomPostTypes\\registerBetaArticlePostType');
