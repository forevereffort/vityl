<?php

namespace Flynt\Components\ResourceList;

use Flynt\Utils\Options;
use Timber;

add_filter('Flynt/addComponentData?name=ResourceList', function ($data) {
    $data['resources_page_link'] = Options::getGlobal('Post Settings', 'resources_page');

    $data['category_terms'] = Timber::get_terms([
        'taxonomy' => 'category',
        'hide_empty' => false,
        'exclude' => 1,
    ]);

    $args = [
        'post_type' => 'resource',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'cat' => $data['blog_cat']->term_id
    ];
    $data['resources'] = Timber::get_posts($args);

    return $data;
});
