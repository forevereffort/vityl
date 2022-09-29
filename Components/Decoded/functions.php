<?php

namespace Flynt\Components\Decoded;

use Timber\Timber;
use Flynt\Utils\Asset;

add_action('acf/init', function () {
    
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a test block.
        acf_register_block_type([
            'name'              => 'vityl-decoded',
            'title'             => __('Decoded'),
            'description'       => __('Decoded Section'),
            'render_callback'   => 'Flynt\Components\Decoded\decodedFunc',
            'category'          => 'vityl',
            'icon'              => 'admin-comments',
            'keywords'          => ['vityl', 'decoded'],
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

function decodedFunc($block, $content = '', $is_preview = false, $post_id = 0)
{
    $is_example = get_field('is_example');

    if (!empty($is_example) && $is_example) {
        $screenshot = Asset::requireUrl('Components/Decoded/Assets/example.png');

        echo '<img src="' . $screenshot . '" />';
    } else {
        $pre_title = get_field('pre_title');
        $title = get_field('title');
        $image_1 = get_field('image_1');
        $sub_title_1 = get_field('sub_title_1');
        $sub_content_1 = get_field('sub_content_1');
        $image_2 = get_field('image_2');
        $sub_title_2 = get_field('sub_title_2');
        $sub_content_2 = get_field('sub_content_2');

        Timber::render('index.twig', [
            'pre_title' => $pre_title,
            'title' => $title,
            'image_1' => $image_1,
            'sub_title_1' => $sub_title_1,
            'sub_content_1' => $sub_content_1,
            'image_2' => $image_2,
            'sub_title_2' => $sub_title_2,
            'sub_content_2' => $sub_content_2,
        ]);
    }
}
