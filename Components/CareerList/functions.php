<?php

namespace Flynt\Components\CareerList;

use Timber\Timber;
use Flynt\Utils\Asset;

add_action('acf/init', function () {
    
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a test block.
        acf_register_block_type([
            'name'              => 'vityl-career-list',
            'title'             => __('Career List'),
            'description'       => __('Career List Section'),
            'render_callback'   => 'Flynt\Components\CareerList\careerListFunc',
            'category'          => 'vityl',
            'icon'              => 'admin-comments',
            'keywords'          => ['vityl', 'career', 'list'],
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

function careerListFunc($block, $content = '', $is_preview = false, $post_id = 0)
{
    $is_example = get_field('is_example');

    if (!empty($is_example) && $is_example) {
        $screenshot = Asset::requireUrl('Components/CareerList/Assets/example.png');

        echo '<img src="' . $screenshot . '" />';
    } else {
        $section_id = get_field('section_id');
        $pre_title = get_field('pre_title');

        Timber::render('index.twig', [
            'section_id' => $section_id,
            'pre_title' => $pre_title,
        ]);
    }
}
