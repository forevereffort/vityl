<?php

namespace Flynt\Components\Advantage;

use Timber\Timber;
use Flynt\Utils\Asset;

add_action('acf/init', function () {
    
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a test block.
        acf_register_block_type([
            'name'              => 'vityl-advantage',
            'title'             => __('Advantage'),
            'description'       => __('Advantage Section'),
            'render_callback'   => 'Flynt\Components\Advantage\advantageFunc',
            'category'          => 'vityl',
            'icon'              => 'admin-comments',
            'keywords'          => ['vityl', 'advantage'],
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

function advantageFunc($block, $content = '', $is_preview = false, $post_id = 0)
{
    $is_example = get_field('is_example');

    if (!empty($is_example) && $is_example) {
        $screenshot = Asset::requireUrl('Components/Advantage/Assets/example.png');

        echo '<img src="' . $screenshot . '" />';
    } else {
        $section_id = get_field('section_id');
        $title = get_field('title');
        $sub_title_1 = get_field('sub_title_1');
        $sub_content_1 = get_field('sub_content_1');
        $sub_title_2 = get_field('sub_title_2');
        $sub_content_2 = get_field('sub_content_2');
        $sub_title_3 = get_field('sub_title_3');
        $sub_content_3 = get_field('sub_content_3');

        $image_1 = get_field('image_1');
        $image_2 = get_field('image_2');
        $image_3 = get_field('image_3');

        Timber::render('index.twig', [
            'section_id' => $section_id,
            'title' => $title,
            'sub_title_1' => $sub_title_1,
            'sub_content_1' => $sub_content_1,
            'sub_title_2' => $sub_title_2,
            'sub_content_2' => $sub_content_2,
            'sub_title_3' => $sub_title_3,
            'sub_content_3' => $sub_content_3,
            'image_1' => $image_1,
            'image_2' => $image_2,
            'image_3' => $image_3,
        ]);
    }
}
