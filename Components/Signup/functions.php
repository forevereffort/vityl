<?php

namespace Flynt\Components\Signup;

use Timber\Timber;
use Flynt\Utils\Asset;

add_action('acf/init', function () {
    
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a test block.
        acf_register_block_type([
            'name'              => 'vityl-signup',
            'title'             => __('Signup'),
            'description'       => __('Signup Section'),
            'render_callback'   => 'Flynt\Components\Signup\signupFunc',
            'category'          => 'vityl',
            'icon'              => 'admin-comments',
            'keywords'          => ['vityl', 'signup'],
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

function signupFunc($block, $content = '', $is_preview = false, $post_id = 0)
{
    $is_example = get_field('is_example');

    if (!empty($is_example) && $is_example) {
        $screenshot = Asset::requireUrl('Components/Signup/Assets/example.png');

        echo '<img src="' . $screenshot . '" />';
    } else {
        $title = get_field('title');
        $gravity_form_shortcode = get_field('gravity_form_shortcode');
        $is_page = get_field('is_page');

        Timber::render('index.twig', [
            'title' => $title,
            'gravity_form_shortcode' => $gravity_form_shortcode,
            'is_page' => $is_page,
        ]);
    }
}
