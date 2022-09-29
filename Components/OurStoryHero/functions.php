<?php

namespace Flynt\Components\OurStoryHero;

use Timber\Timber;
use Flynt\Utils\Asset;

add_action('acf/init', function () {
    
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a test block.
        acf_register_block_type([
            'name'              => 'vityl-our-story-hero',
            'title'             => __('Our Story Hero'),
            'description'       => __('Our Story Hero Section'),
            'render_callback'   => 'Flynt\Components\OurStoryHero\ourStoryHeroFunc',
            'category'          => 'vityl',
            'icon'              => 'admin-comments',
            'keywords'          => ['vityl', 'our', 'story', 'hero'],
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

function ourStoryHeroFunc($block, $content = '', $is_preview = false, $post_id = 0)
{
    $is_example = get_field('is_example');

    if (!empty($is_example) && $is_example) {
        $screenshot = Asset::requireUrl('Components/OurStoryHero/Assets/example.png');

        echo '<img src="' . $screenshot . '" />';
    } else {
        $title = get_field('title');
        $content = get_field('content');
        $image_1 = get_field('image_1');
        $image_2 = get_field('image_2');
        $link = get_field('link');

        Timber::render('index.twig', [
            'title' => $title,
            'content' => $content,
            'image_1' => $image_1,
            'image_2' => $image_2,
            'link' => $link,
        ]);
    }
}
