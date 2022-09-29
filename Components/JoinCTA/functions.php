<?php

namespace Flynt\Components\JoinCTA;

use Timber\Timber;
use Flynt\Utils\Asset;

add_action('acf/init', function () {
    
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a test block.
        acf_register_block_type([
            'name'              => 'vityl-join-cta',
            'title'             => __('Join CTA'),
            'description'       => __('Join CTA Section'),
            'render_callback'   => 'Flynt\Components\JoinCTA\joinCTAFunc',
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

function joinCTAFunc($block, $content = '', $is_preview = false, $post_id = 0)
{
    $is_example = get_field('is_example');

    if (!empty($is_example) && $is_example) {
        $screenshot = Asset::requireUrl('Components/JoinCTA/Assets/example.png');

        echo '<img src="' . $screenshot . '" />';
    } else {
        $title = get_field('title');
        $link = get_field('link');

        Timber::render('index.twig', [
            'title' => $title,
            'link' => $link,
        ]);
    }
}
