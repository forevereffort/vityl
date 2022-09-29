<?php

namespace Flynt\Components\CareerHero;

use Timber\Timber;
use Flynt\Utils\Asset;

add_action('acf/init', function () {
    
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a test block.
        acf_register_block_type([
            'name'              => 'vityl-career-hero',
            'title'             => __('Career Hero'),
            'description'       => __('Career Hero Section'),
            'render_callback'   => 'Flynt\Components\CareerHero\careerHeroFunc',
            'category'          => 'vityl',
            'icon'              => 'admin-comments',
            'keywords'          => ['vityl', 'career', 'hero'],
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

function careerHeroFunc($block, $content = '', $is_preview = false, $post_id = 0)
{
    $is_example = get_field('is_example');

    if (!empty($is_example) && $is_example) {
        $screenshot = Asset::requireUrl('Components/CareerHero/Assets/example.png');

        echo '<img src="' . $screenshot . '" />';
    } else {
        $title = get_field('title');
        $content = get_field('content');
        $image_1 = get_field('image_1');
        $image_2 = get_field('image_2');

        Timber::render('index.twig', [
            'title' => $title,
            'content' => $content,
            'image_1' => $image_1,
            'image_2' => $image_2,
        ]);
    }
}
