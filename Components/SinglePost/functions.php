<?php

namespace Flynt\Components\SinglePost;

use Timber;
use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=SinglePost', function ($data) {
    
    $data['user_avatar_url'] = '';
    
    /**
     * User Profile Picture Plugin Used for User Avatar
     * https://wordpress.org/plugins/metronet-profile-picture/
     */
    if (function_exists('mt_profile_img')) {
        $author_id = $data['post']->post_author;
        $profile_post_id = absint(get_user_option('metronet_post_id', $author_id));

        if (0 === $profile_post_id || 'mt_pp' !== get_post_type($profile_post_id)) {
            $data['user_avatar_url'] = '';
        } else {
            $post_thumbnail_id = get_post_thumbnail_id($profile_post_id);
            $data['user_avatar_url'] = wp_get_attachment_image_src($post_thumbnail_id, 'avatar_138_138')[0];
        }
    }

    $args = [];

    if ($data['post']->post_type === 'post') {
        $args = [
            'post_type' => 'post',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 3,
            'offset' => 0,
            'post__not_in' => [$data['post']->ID]
        ];
    } else if ($data['post']->post_type === 'beta-article') {
        $args = [
            'post_type' => 'beta-article',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 3,
            'offset' => 0,
            'post__not_in' => [$data['post']->ID]
        ];
    }

    // if (count($data['post']->categories) > 0) {
    //     foreach ($data['post']->categories as $cat) {
    //         $args['category__in'][] = $cat->id;
    //     }
    // }

    $data['related_blogs'] = Timber::get_posts($args);
    $data['resources_page_link'] = Options::getGlobal('Post Settings', 'resources_page');
    $data['beta_articles_page_link'] = Options::getGlobal('Post Settings', 'beta_articles_page');
    $data['footer_title'] = Options::getGlobal('Post Settings', 'footer_title');

    $data['category_terms'] = Timber::get_terms([
        'taxonomy' => 'category',
        'hide_empty' => false,
        'exclude' => 1,
    ]);

    return $data;
});
