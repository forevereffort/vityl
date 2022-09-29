<?php

namespace Flynt\Components\Faq;

use Timber\Timber;
use Flynt\Utils\Asset;

add_action('acf/init', function () {
    
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a test block.
        acf_register_block_type([
            'name'              => 'vityl-faq',
            'title'             => __('FAQ'),
            'description'       => __('FAQ Section'),
            'render_callback'   => 'Flynt\Components\Faq\faqFunc',
            'category'          => 'vityl',
            'icon'              => 'admin-comments',
            'keywords'          => ['vityl', 'faq'],
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

function faqFunc($block, $content = '', $is_preview = false, $post_id = 0)
{
    $is_example = get_field('is_example');

    if (!empty($is_example) && $is_example) {
        $screenshot = Asset::requireUrl('Components/Faq/Assets/example.png');

        echo '<img src="' . $screenshot . '" />';
    } else {
        $title = get_field('title');
        $faqs = get_field('faqs');

        Timber::render('index.twig', [
            'title' => $title,
            'faqs' => $faqs,
        ]);
    }
}
