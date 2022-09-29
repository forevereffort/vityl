<?php

namespace Flynt\Components\FeaturedResource;

use Timber\Timber;
use Flynt\Utils\Asset;

add_action('acf/init', function () {
    
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a test block.
        acf_register_block_type([
            'name'              => 'vityl-featured-resource',
            'title'             => __('Featured Resource'),
            'description'       => __('Featured Resource Section'),
            'render_callback'   => 'Flynt\Components\FeaturedResource\featuredResourceFunc',
            'category'          => 'vityl',
            'icon'              => 'admin-comments',
            'keywords'          => ['vityl', 'featured', 'resource'],
            'example'           => [
                'attributes' => [
                    'mode' => 'preview',
                    'data' => [
                        'is_example' => true
                    ]
                ]
            ]
        ]);
    }
});

function featuredResourceFunc($block, $content = '', $is_preview = false, $post_id = 0)
{
    $is_example = get_field('is_example');

    if (!empty($is_example) && $is_example) {
        $screenshot = Asset::requireUrl('Components/FeaturedResource/Assets/example.png');

        echo '<img src="' . $screenshot . '" />';
    } else {
        $title = get_field('title');
        $sub_title = get_field('sub_title');
        $pre_title = get_field('pre_title');

        $args = [
            'post_type' => 'post',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 3,
            'post_status' => 'publish'
        ];

        $blogs = Timber::get_posts($args);

        $category_terms = Timber::get_terms([
            'taxonomy' => 'category',
            'hide_empty' => false,
            'exclude' => 1,
        ]);

        Timber::render('index.twig', [
            'title' => $title,
            'sub_title' => $sub_title,
            'pre_title' => $pre_title,
            'blogs' => $blogs,
            'category_terms' => $category_terms,
        ]);
    }
}

add_action('wp_ajax_get_featured_articles', 'Flynt\Components\FeaturedResource\getFeaturedArticlesFunc');
add_action('wp_ajax_nopriv_get_featured_articles', 'Flynt\Components\FeaturedResource\getFeaturedArticlesFunc');

function getFeaturedArticlesFunc()
{
    $result = [];
    
    $args = [
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    ];
    $blogs = Timber::get_posts($args);

    $result['blogs_html'] .= Timber::compile('Partials/article-row.twig', ['blogs' => $blogs]);

    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $result = json_encode($result);
        echo $result;
    } else {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    die();
}
