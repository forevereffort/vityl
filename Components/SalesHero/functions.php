<?php

namespace Flynt\Components\SalesHero;

use Timber\Timber;
use Flynt\Utils\Asset;
use Flynt\Utils\Oembed;

add_action('acf/init', function () {
    
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a test block.
        acf_register_block_type([
            'name'              => 'vityl-sales-hero',
            'title'             => __('Sales Hero'),
            'description'       => __('Sales Hero Section'),
            'render_callback'   => 'Flynt\Components\SalesHero\salesHeroFunc',
            'category'          => 'vityl',
            'icon'              => 'admin-comments',
            'keywords'          => ['vityl', 'sales', 'hero'],
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

function salesHeroFunc($block, $content = '', $is_preview = false, $post_id = 0)
{
    $is_example = get_field('is_example');

    if (!empty($is_example) && $is_example) {
        $screenshot = Asset::requireUrl('Components/SalesHero/Assets/example.png');

        echo '<img src="' . $screenshot . '" />';
    } else {
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
        $form_title = get_field('form_title');
        $gravity_form_shortcode = get_field('gravity_form_shortcode');
        $context = Timber::get_context();

        Timber::render('index.twig', [
            'title' => $title,
            'content' => $content,
            'play_button_title' => $play_button_title,
            'play_button_image' => $play_button_image,
            'video' => $video,
            'form_title' => $form_title,
            'gravity_form_shortcode' => $gravity_form_shortcode,
            'site' => $context['site'],
        ]);
    }
}
