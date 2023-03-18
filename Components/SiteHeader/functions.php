<?php

namespace Flynt\Components\SiteHeader;

use Timber;
use Timber\Menu;
use Flynt\Utils\Options;

add_action('init', function () {
    register_nav_menus([
        'header_menu' => __('Header Menu', 'flynt')
    ]);
});

add_filter('Flynt/addComponentData?name=SiteHeader', function ($data) {
    $data['header_menu'] = new Menu('header_menu');

    $data['waitlist_title'] = Options::getGlobal('Global Settings', 'title');
    $data['waitlist_gravity_form_shortcode'] = Options::getGlobal('Global Settings', 'gravity_form_shortcode');

    $data['get_in_touch_link'] = Options::getGlobal('Header Settings', 'get_in_touch_link');

    $data['linkedin_url'] = Options::getGlobal('Footer Settings', 'linkedin_url');
    $data['facebook_url'] = Options::getGlobal('Footer Settings', 'facebook_url');
    $data['instagram_url'] = Options::getGlobal('Footer Settings', 'instagram_url');
    $data['twitter_url'] = Options::getGlobal('Footer Settings', 'twitter_url');
    $data['youtube_url'] = Options::getGlobal('Footer Settings', 'youtube_url');

    return $data;
});
