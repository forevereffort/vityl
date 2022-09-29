<?php

namespace Flynt\Components\BelongingHero;

use Timber\Timber;
use Flynt\Utils\Asset;

add_action('acf/init', function () {
    
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a test block.
        acf_register_block_type([
            'name'              => 'vityl-belongin-hero',
            'title'             => __('Belonging Hero'),
            'description'       => __('Belonging Hero Section'),
            'render_callback'   => 'Flynt\Components\BelongingHero\belongingHeroFunc',
            'category'          => 'vityl',
            'icon'              => 'admin-comments',
            'keywords'          => ['vityl', 'belonging', 'hero'],
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

function belongingHeroFunc($block, $content = '', $is_preview = false, $post_id = 0)
{
    $is_example = get_field('is_example');

    if (!empty($is_example) && $is_example) {
        $screenshot = Asset::requireUrl('Components/BelongingHero/Assets/example.png');

        echo '<img src="' . $screenshot . '" />';
    } else {
        $pre_title = get_field('pre_title');
        $title = get_field('title');
        $content = get_field('content');
        $link = get_field('link');
        $image_1 = get_field('image_1');
        $image_2 = get_field('image_2');
        $gravity_form_shortcode = get_field('gravity_form_shortcode');

        Timber::render('index.twig', [
            'pre_title' => $pre_title,
            'title' => $title,
            'content' => $content,
            'link' => $link,
            'image_1' => $image_1,
            'image_2' => $image_2,
            'gravity_form_shortcode' => $gravity_form_shortcode,
        ]);
    }
}
