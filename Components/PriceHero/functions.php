<?php

namespace Flynt\Components\PriceHero;

use Timber\Timber;
use Flynt\Utils\Asset;

add_action('acf/init', function () {
    
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a test block.
        acf_register_block_type([
            'name'              => 'vityl-price-hero',
            'title'             => __('Price Hero'),
            'description'       => __('Price Hero Section'),
            'render_callback'   => 'Flynt\Components\PriceHero\priceFunc',
            'category'          => 'vityl',
            'icon'              => 'admin-comments',
            'keywords'          => ['vityl', 'price', 'hero'],
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

function priceFunc($block, $content = '', $is_preview = false, $post_id = 0)
{
    $is_example = get_field('is_example');

    if (!empty($is_example) && $is_example) {
        $screenshot = Asset::requireUrl('Components/PriceHero/Assets/example.png');

        echo '<img src="' . $screenshot . '" />';
    } else {
        $title = get_field('title');
        $content = get_field('content');
        $plans = get_field('plans');
        $mention_1 = get_field('mention_1');
        $mention_2 = get_field('mention_2');

        Timber::render('index.twig', [
            'title' => $title,
            'content' => $content,
            'plans' => $plans,
            'mention_1' => $mention_1,
            'mention_2' => $mention_2,
        ]);
    }
}
