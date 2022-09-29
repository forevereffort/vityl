<?php

namespace Flynt\Components\ActionCTA;

use Timber\Timber;
use Flynt\Utils\Asset;

add_action('acf/init', function () {
    
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a test block.
        acf_register_block_type([
            'name'              => 'vityl-action-cta',
            'title'             => __('Action CTA'),
            'description'       => __('Action CTA Section'),
            'render_callback'   => 'Flynt\Components\ActionCTA\actionCTAFunc',
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

function actionCTAFunc($block, $content = '', $is_preview = false, $post_id = 0)
{
    $is_example = get_field('is_example');

    if (!empty($is_example) && $is_example) {
        $screenshot = Asset::requireUrl('Components/ActionCTA/Assets/example.png');

        echo '<img src="' . $screenshot . '" />';
    } else {
        $title = get_field('title');
        $content = get_field('content');
        $link = get_field('link');
        $gravity_form_shortcode = get_field('gravity_form_shortcode');

        Timber::render('index.twig', [
            'title' => $title,
            'content' => $content,
            'link' => $link,
            'gravity_form_shortcode' => $gravity_form_shortcode,
        ]);
    }
}
