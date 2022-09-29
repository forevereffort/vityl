<?php

namespace Flynt\CustomPostTypes;

function registerResourcePostType()
{
    $labels = array(
        'name'                  => _x('Resources', 'Resource General Name', 'flynt'),
        'singular_name'         => _x('Resource', 'Resource Singular Name', 'flynt'),
        'menu_name'             => __('Resource', 'flynt'),
        'name_admin_bar'        => __('Resource', 'flynt'),
        'all_items'             => __('All Resources', 'flynt'),
        'add_new_item'          => __('Add New Resource', 'flynt'),
        'add_new'               => __('Add New', 'flynt'),
        'new_item'              => __('New Resource', 'flynt'),
        'edit_item'             => __('Edit Resource', 'flynt'),
        'update_item'           => __('Update Resource', 'flynt'),
        'view_item'             => __('View Resource', 'flynt'),
        'view_items'            => __('View Resources', 'flynt'),
        'search_items'          => __('Search Resource', 'flynt'),
    );

    $args = array(
        'label'                 => __('Resource', 'flynt'),
        'description'           => __('Resources custom post type', 'flynt'),
        'labels'                => $labels,
        'supports'              => array('title'),
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
        'publicly_queryable'    => false,
        'rewrite'               => array( 'slug' => 'resource', 'with_front' => false ),
        'capability_type'       => 'page',
        'menu_icon'             => 'dashicons-download',
    );

    register_post_type('resource', $args);
}

add_action('init', '\\Flynt\\CustomPostTypes\\registerResourcePostType');

function set_custom_edit_resource_columns($columns)
{
    return [
        'cb' => $columns['cb'],
        'title' => 'Title',
        'featured_image' => 'Image',
        'type' => 'Type',
        'link' => 'Link',
        'categories' => $columns['categories'],
        'date' => $columns['date'],
    ];
}

add_filter('manage_resource_posts_columns', '\\Flynt\\CustomPostTypes\\set_custom_edit_resource_columns');

function custom_resource_column($column, $post_id)
{
    if ($column == 'featured_image') {
        $image = get_field('featured_image', $post_id);
        if (!empty($image)) {
            echo '<img src="' . $image->src('thumbnail') . '" alt="' . $image->alt . '"/>';
        }
    } else if ($column == 'type') {
        $field = get_field_object('type');

        echo $field['choices'][get_field('type', $post_id)];
    } else if ($column == 'link') {
        echo '<a href="' . get_field('external_url', $post_id) . '">' . get_field('external_url', $post_id) . '</a>';
    }
}

add_action('manage_resource_posts_custom_column', '\\Flynt\\CustomPostTypes\\custom_resource_column', 10, 2);

if (function_exists('acf_add_local_field_group')) :
    acf_add_local_field_group(array(
        'key' => 'group_61dff03ee9e34',
        'title' => 'Resource Metabox',
        'fields' => array(
            array(
                'key' => 'field_61dff04b0f8f2',
                'label' => 'Featured Image (2x)',
                'name' => 'featured_image',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'preview_size' => 'medium',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
            ),
            array(
                'key' => 'field_61dff05f0f8f3',
                'label' => 'Excerpt',
                'name' => 'excerpt',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'maxlength' => '',
                'rows' => 4,
                'new_lines' => '',
            ),
            array(
                'key' => 'field_61dff0700f8f4',
                'label' => 'Type',
                'name' => 'type',
                'type' => 'select',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'video' => 'Video',
                    'ebook' => 'E-Book',
                    'guide' => 'Guide',
                ),
                'default_value' => false,
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_61dff0dfeaf67',
                'label' => 'External URL',
                'name' => 'external_url',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'resource',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));
endif;
