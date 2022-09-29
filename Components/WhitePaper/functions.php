<?php

namespace Flynt\Components\WhitePaper;

use Timber\Timber;
use Flynt\Utils\Asset;
use Flynt\Utils\Options;

add_action('acf/init', function () {
    
    // Check function exists.
    if (function_exists('acf_register_block_type')) {
        // register a test block.
        acf_register_block_type([
            'name'              => 'vityl-white-paper',
            'title'             => __('White Paper'),
            'description'       => __('White Paper Section'),
            'render_callback'   => 'Flynt\Components\WhitePaper\whitePaperFunc',
            'category'          => 'vityl',
            'icon'              => 'admin-comments',
            'keywords'          => ['vityl', 'paper'],
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

function whitePaperFunc($block, $content = '', $is_preview = false, $post_id = 0)
{
    $is_example = get_field('is_example');

    if (!empty($is_example) && $is_example) {
        $screenshot = Asset::requireUrl('Components/WhitePaper/Assets/example.png');

        echo '<img src="' . $screenshot . '" />';
    } else {
        $title = get_field('title');
        $content = get_field('content');
        $gravity_form_short_code = get_field('gravity_form_short_code');

        Timber::render('index.twig', [
            'title' => $title,
            'content' => $content,
            'gravity_form_short_code' => $gravity_form_short_code,
        ]);
    }
}

add_action('gform_after_submission_5', function ($entry, $form) {
    $email = rgar($entry, '1');

    $subject = Options::getGlobal('White Paper Settings', 'email_subject');
    $message = Options::getGlobal('White Paper Settings', 'email_body');
    $headers = '';
    $pdf = Options::getGlobal('White Paper Settings', 'pdf');
    $attachments = [get_attached_file($pdf['id'])];

    wp_mail($email, $subject, $message, $headers, $attachments);
}, 10, 2);
