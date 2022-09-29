<?php

namespace Flynt\Components\Team;

use Timber\Timber;
use Flynt\Utils\Asset;

add_action('acf/init', function () {
    
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a test block.
        acf_register_block_type([
            'name'              => 'vityl-team',
            'title'             => __('Team'),
            'description'       => __('Team Section'),
            'render_callback'   => 'Flynt\Components\Team\teamFunc',
            'category'          => 'vityl',
            'icon'              => 'admin-comments',
            'keywords'          => ['vityl', 'team'],
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

function teamFunc($block, $content = '', $is_preview = false, $post_id = 0)
{
    $is_example = get_field('is_example');

    if (!empty($is_example) && $is_example) {
        $screenshot = Asset::requireUrl('Components/Team/Assets/example.png');

        echo '<img src="' . $screenshot . '" />';
    } else {
        $pre_title = get_field('pre_title');
        $team_list = get_field('team_list');
        $custom_padding_top = get_field('custom_padding_top');
        $custom_padding_bottom = get_field('custom_padding_bottom');
        $column_counts = get_field('column_counts');

        Timber::render('index.twig', [
            'pre_title' => $pre_title,
            'team_list' => $team_list,
            'custom_padding_top' => $custom_padding_top,
            'custom_padding_bottom' => $custom_padding_bottom,
            'column_counts' => $column_counts,
        ]);
    }
}
