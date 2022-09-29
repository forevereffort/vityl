<?php

namespace Flynt\Components\Testimonial;

use Timber\Timber;
use Flynt\Utils\Asset;

add_action('acf/init', function () {
    
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a test block.
        acf_register_block_type([
            'name'              => 'vityl-testimonial',
            'title'             => __('Testimonial'),
            'description'       => __('Testimonial Section'),
            'render_callback'   => 'Flynt\Components\Testimonial\testimonialFunc',
            'category'          => 'vityl',
            'icon'              => 'admin-comments',
            'keywords'          => ['vityl', 'testimonial'],
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

function testimonialFunc($block, $content = '', $is_preview = false, $post_id = 0)
{
    $is_example = get_field('is_example');

    if (!empty($is_example) && $is_example) {
        $screenshot = Asset::requireUrl('Components/Testimonial/Assets/example.png');

        echo '<img src="' . $screenshot . '" />';
    } else {
        $name = get_field('name');
        $content = get_field('content');
        $company = get_field('company');
        $image = get_field('image');

        Timber::render('index.twig', [
            'name' => $name,
            'content' => $content,
            'company' => $company,
            'image' => $image,
        ]);
    }
}
