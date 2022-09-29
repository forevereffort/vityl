<?php

namespace Flynt\Components\VideoCTA;

use Timber\Timber;
use Flynt\Utils\Asset;
use Flynt\Utils\Oembed;

add_action('acf/init', function () {
    
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a test block.
        acf_register_block_type([
            'name'              => 'vityl-video-cta',
            'title'             => __('Video CTA'),
            'description'       => __('Video CTA Section'),
            'render_callback'   => 'Flynt\Components\VideoCTA\videoCTAFunc',
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

function videoCTAFunc($block, $content = '', $is_preview = false, $post_id = 0)
{
    $is_example = get_field('is_example');

    if (!empty($is_example) && $is_example) {
        $screenshot = Asset::requireUrl('Components/VideoCTA/Assets/example.png');

        echo '<img src="' . $screenshot . '" />';
    } else {
        $has_dot_animation = get_field('has_dot_animation');
        $background_color = get_field('background_color');
        $title = get_field('title');
        $content = get_field('content');
        $play_button_title = get_field('play_button_title');
        $play_button_image = get_field('play_button_image');
        $video = Oembed::setSrcAsDataAttribute(
            get_field('video'),
            [
                'autoplay' => 'false'
            ]
        );

        Timber::render('index.twig', [
            'has_dot_animation' => $has_dot_animation,
            'background_color' => $background_color,
            'title' => $title,
            'content' => $content,
            'play_button_title' => $play_button_title,
            'play_button_image' => $play_button_image,
            'video' => $video,
        ]);
    }
}
