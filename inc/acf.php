<?php

namespace Flynt\Acf;

use Flynt\Utils\Options;

add_filter('pre_http_request', function ($preempt, $args, $url) {
    if (strpos($url, 'https://www.youtube.com/oembed') !== false || strpos($url, 'https://vimeo.com/api/oembed') !== false) {
        $response = wp_cache_get($url, 'oembedCache');
        if (!empty($response)) {
            return $response;
        }
    }
    return false;
}, 10, 3);

add_filter('http_response', function ($response, $args, $url) {
    if (strpos($url, 'https://www.youtube.com/oembed') !== false || strpos($url, 'https://vimeo.com/api/oembed') !== false) {
        wp_cache_set($url, $response, 'oembedCache');
    }
    return $response;
}, 10, 3);

// Website global settings
Options::addGlobal('Website Settings', [
    [
        'label' => 'Website Scripts',
        'name' => 'website_scripts',
        'type' => 'group',
        'layout' => 'row',
        'sub_fields' => [
            [
                'label' => 'Run tracking scripts?',
                'name' => 'run_tracking_scripts',
                'type' => 'true_false',
                'ui' => true,
                'ui_on_text' => 'Yes',
                'ui_off_text' => 'No',
            ],
            [
                'label' => 'Before head closing tag',
                'name' => 'before_head_closing_tag',
                'type' => 'textarea',
                'default_value' => '',
            ],
            [
                'label' => 'After body opening tag',
                'name' => 'after_body_opening_tag',
                'type' => 'textarea',
                'default_value' => '',
            ],
            [
                'label' => 'Before body closing tag',
                'name' => 'begore_body_closing_tag',
                'type' => 'textarea',
                'default_value' => '',
            ],
        ]
    ],
]);

Options::addGlobal('Global Settings', [
    [
        [
            'label' => 'Title',
            'name' => 'title',
            'type' => 'text',
        ],
        [
            'label' => 'Gravity Form Shortcode',
            'name' => 'gravity_form_shortcode',
            'type' => 'text',
        ],
    ]
]);

Options::addGlobal('Header Settings', [
    [
        [
            'label' => 'Get In Touch Link',
            'name' => 'get_in_touch_link',
            'type' => 'link',
            'default_value' => '',
        ]
    ]
]);

Options::addGlobal('Footer Settings', [
    [
        [
            'name' => 'title',
            'label' => 'Title',
            'type' => 'text',
        ],
        [
            'name' => 'content',
            'label' => 'Content',
            'type' => 'textarea',
            'rows' => 2,
        ],
        [
            'name' => 'link',
            'label' => 'Link',
            'type' => 'link',
        ],
        [
            'name' => 'phone_number',
            'label' => 'Phone number',
            'type' => 'text',
            'wrapper' => [
                'width' => '50'
            ]
        ],
        [
            'name' => 'email',
            'label' => 'Email',
            'type' => 'text',
            'wrapper' => [
                'width' => '50'
            ]
        ],
        [
            'name' => 'address',
            'label' => __('Address', 'flynt'),
            'type' => 'text',
            'wrapper' => [
                'width' => '25'
            ]
        ],
        [
            'name' => 'city',
            'label' => __('City', 'flynt'),
            'type' => 'text',
            'wrapper' => [
                'width' => '25'
            ]
        ],
        [
            'name' => 'state',
            'label' => __('State', 'flynt'),
            'type' => 'text',
            'wrapper' => [
                'width' => '25'
            ]
        ],
        [
            'name' => 'zip',
            'label' => __('Zip', 'flynt'),
            'type' => 'text',
            'wrapper' => [
                'width' => '25'
            ]
        ],
        [
            'name' => 'linkedin_url',
            'label' => 'Linkedin URL',
            'type' => 'url',
        ],
        [
            'name' => 'facebook_url',
            'label' => 'Facebook URL',
            'type' => 'url',
        ],
        [
            'name' => 'instagram_url',
            'label' => 'Instagram URL',
            'type' => 'url',
        ],
        [
            'name' => 'twitter_url',
            'label' => 'Twitter URL',
            'type' => 'url',
        ],
        [
            'name' => 'youtube_url',
            'label' => 'Youtube URL',
            'type' => 'url',
        ],
        [
            'name' => 'gravity_form_title',
            'label' => 'Gravity Form Title',
            'type' => 'text',
        ],
        [
            'name' => 'gravity_form_shortcode',
            'label' => 'Gravity Form Shortcode',
            'type' => 'text',
        ],
    ]
]);

Options::addGlobal('Post Settings', [
    [
        [
            'label' => 'Resources Page',
            'name' => 'resources_page',
            'type' => 'link',
            'default_value' => '',
        ],
        [
            'label' => 'Beta Articles Page',
            'name' => 'beta_articles_page',
            'type' => 'link',
            'default_value' => '',
        ],
        [
            'name' => 'footer_title',
            'label' => 'Footer Title',
            'type' => 'text',
        ],
    ]
]);

Options::addGlobal('Category Settings', [
    [
        [
            'label' => 'Title',
            'name' => 'title',
            'type' => 'text',
        ],
        [
            'label' => 'Signup Form Title',
            'name' => 'signup_form_title',
            'type' => 'text',
        ],
        [
            'label' => 'Gravity Form Shortcode',
            'name' => 'gravity_form_shortcode',
            'type' => 'text',
        ],
    ]
]);

Options::addGlobal('White Paper Settings', [
    [
        [
            'label' => 'Email Subject',
            'name' => 'email_subject',
            'type' => 'text',
            'default_value' => '',
        ],
        [
            'label' => 'Email Body',
            'name' => 'email_body',
            'type' => 'textarea',
            'default_value' => '',
        ],
        [
            'label' => 'PDF',
            'name' => 'pdf',
            'type' => 'file',
        ],
    ]
]);
