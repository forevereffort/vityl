<?php

namespace Flynt\Components\BelongingResource;

use Timber\Timber;
use Flynt\Utils\Asset;

add_action('acf/init', function () {
    
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a test block.
        acf_register_block_type([
            'name'              => 'vityl-belongin-resource',
            'title'             => __('Belonging Resource'),
            'description'       => __('Belonging Resource Section'),
            'render_callback'   => 'Flynt\Components\BelongingResource\belongingResourceFunc',
            'category'          => 'vityl',
            'icon'              => 'admin-comments',
            'keywords'          => ['vityl', 'belonging', 'resource'],
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

function belongingResourceFunc($block, $content = '', $is_preview = false, $post_id = 0)
{
    $is_example = get_field('is_example');

    if (!empty($is_example) && $is_example) {
        $screenshot = Asset::requireUrl('Components/BelongingResource/Assets/example.png');

        echo '<img src="' . $screenshot . '" />';
    } else {
        $pre_title = get_field('pre_title');

        $args = [
            'post_type' => 'resource',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 6,
            'post_status' => 'publish'
        ];

        $resources = Timber::get_posts($args);

        Timber::render('index.twig', [
            'pre_title' => $pre_title,
            'resources' => $resources,
        ]);
    }
}

add_action('wp_ajax_get_featured_resources', 'Flynt\Components\BelongingResource\getFeaturedResourcesFunc');
add_action('wp_ajax_nopriv_get_featured_resources', 'Flynt\Components\BelongingResource\getFeaturedResourcesFunc');

function getFeaturedResourcesFunc()
{
    $result = [];
    
    $args = [
        'post_type' => 'resource',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    ];
    $resources = Timber::get_posts($args);

    $result['resources_html'] .= Timber::compile('Partials/resource-row.twig', ['resources' => $resources]);

    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $result = json_encode($result);
        echo $result;
    } else {
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    die();
}
