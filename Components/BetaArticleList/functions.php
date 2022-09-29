<?php

namespace Flynt\Components\BetaArticleList;

use Timber\Timber;
use Flynt\Utils\Asset;

add_action('acf/init', function () {
    
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a test block.
        acf_register_block_type([
            'name'              => 'vityl-beta-article-list',
            'title'             => __('Beta Article List'),
            'description'       => __('Beta Article List Section'),
            'render_callback'   => 'Flynt\Components\BetaArticleList\betaArticleListFunc',
            'category'          => 'vityl',
            'icon'              => 'admin-comments',
            'keywords'          => ['vityl', 'article'],
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

function betaArticleListFunc($block, $content = '', $is_preview = false, $post_id = 0)
{
    $is_example = get_field('is_example');

    if (!empty($is_example) && $is_example) {
        $screenshot = Asset::requireUrl('Components/BetaArticleList/Assets/example.png');

        echo '<img src="' . $screenshot . '" />';
    } else {
        $title = get_field('title');
        $sub_title = get_field('sub_title');
        $pre_title = get_field('pre_title');
        $list = get_field('list');

        Timber::render('index.twig', [
            'title' => $title,
            'sub_title' => $sub_title,
            'pre_title' => $pre_title,
            'list' => $list,
        ]);
    }
}
