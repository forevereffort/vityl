<?php

namespace Flynt\Components\LatestNews;

use Timber\Timber;
use Flynt\Utils\Asset;

add_action('acf/init', function () {
    
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a test block.
        acf_register_block_type([
            'name'              => 'vityl-latest-news',
            'title'             => __('Latest News'),
            'description'       => __('Latest News Section'),
            'render_callback'   => 'Flynt\Components\LatestNews\latestNewsFunc',
            'category'          => 'vityl',
            'icon'              => 'admin-comments',
            'keywords'          => ['vityl', 'news'],
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

function latestNewsFunc($block, $content = '', $is_preview = false, $post_id = 0)
{
    $is_example = get_field('is_example');

    if (!empty($is_example) && $is_example) {
        $screenshot = Asset::requireUrl('Components/LatestNews/Assets/example.png');

        echo '<img src="' . $screenshot . '" />';
    } else {
        $pre_title = get_field('pre_title');
        $link = get_field('link');

        $args = [
            'post_type' => 'post',
            'orderby' => 'date',
            'order' => 'DESC',
            'post_status' => 'publish',
            'posts_per_page' => 3,
            'offset' => 0,
        ];
    
        $blogs = Timber::get_posts($args);

        Timber::render('index.twig', [
            'link' => $link,
            'pre_title' => $pre_title,
            'blogs' => $blogs,
        ]);
    }
}
