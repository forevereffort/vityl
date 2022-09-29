<?php

namespace Flynt\Components\DiscoverCTA;

use Timber\Timber;
use Flynt\Utils\Asset;

add_action('acf/init', function () {
    
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a test block.
        acf_register_block_type([
            'name'              => 'vityl-discover-cta',
            'title'             => __('Discover CTA'),
            'description'       => __('Discover CTA Section'),
            'render_callback'   => 'Flynt\Components\DiscoverCTA\discoverCTAFunc',
            'category'          => 'vityl',
            'icon'              => 'admin-comments',
            'keywords'          => ['vityl', 'cta'],
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

function discoverCTAFunc($block, $content = '', $is_preview = false, $post_id = 0)
{
    $is_example = get_field('is_example');

    if (!empty($is_example) && $is_example) {
        $screenshot = Asset::requireUrl('Components/DiscoverCTA/Assets/example.png');

        echo '<img src="' . $screenshot . '" />';
    } else {
        $title = get_field('title');
        $content = get_field('content');
        $link_1 = get_field('link_1');
        $link_2 = get_field('link_2');

        Timber::render('index.twig', [
            'title' => $title,
            'content' => $content,
            'link_1' => $link_1,
            'link_2' => $link_2,
        ]);
    }
}
