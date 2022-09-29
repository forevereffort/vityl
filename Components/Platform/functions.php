<?php

namespace Flynt\Components\Platform;

use Timber\Timber;
use Flynt\Utils\Asset;

add_action('acf/init', function () {
    
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a test block.
        acf_register_block_type([
            'name'              => 'vityl-platform',
            'title'             => __('Platform'),
            'description'       => __('Platform Section'),
            'render_callback'   => 'Flynt\Components\Platform\platformFunc',
            'category'          => 'vityl',
            'icon'              => 'admin-comments',
            'keywords'          => ['vityl', 'platform'],
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

function platformFunc($block, $content = '', $is_preview = false, $post_id = 0)
{
    $is_example = get_field('is_example');

    if (!empty($is_example) && $is_example) {
        $screenshot = Asset::requireUrl('Components/Platform/Assets/example.png');

        echo '<img src="' . $screenshot . '" />';
    } else {
        $pre_title = get_field('pre_title');
        $title = get_field('title');
        $content = get_field('content');
        $link = get_field('link');
        $list = get_field('list');

        Timber::render('index.twig', [
            'pre_title' => $pre_title,
            'title' => $title,
            'content' => $content,
            'link' => $link,
            'list' => $list,
        ]);
    }
}
