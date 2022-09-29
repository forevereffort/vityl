<?php

namespace Flynt\Components\SiteFooter;

use Timber;
use Flynt\Utils\Options;

add_action('init', function () {
    register_nav_menus([
        'footer_menu_1' => __('Footer Menu 1', 'flynt'),
        'footer_menu_2' => __('Footer Menu 2', 'flynt'),
    ]);
});

add_filter('Flynt/addComponentData?name=SiteFooter', function ($data) {
    $data['footer_menu_1'] = new Timber\Menu('footer_menu_1');
    $data['footer_menu_2'] = new Timber\Menu('footer_menu_2');

    $data['title'] = Options::getGlobal('Footer Settings', 'title');
    $data['content'] = Options::getGlobal('Footer Settings', 'content');
    $data['link'] = Options::getGlobal('Footer Settings', 'link');
    $data['phone_number'] = Options::getGlobal('Footer Settings', 'phone_number');
    $data['email'] = Options::getGlobal('Footer Settings', 'email');
    $data['address'] = Options::getGlobal('Footer Settings', 'address');
    $data['city'] = Options::getGlobal('Footer Settings', 'city');
    $data['state'] = Options::getGlobal('Footer Settings', 'state');
    $data['zip'] = Options::getGlobal('Footer Settings', 'zip');
    $data['linkedin_url'] = Options::getGlobal('Footer Settings', 'linkedin_url');
    $data['facebook_url'] = Options::getGlobal('Footer Settings', 'facebook_url');
    $data['instagram_url'] = Options::getGlobal('Footer Settings', 'instagram_url');
    $data['twitter_url'] = Options::getGlobal('Footer Settings', 'twitter_url');
    $data['youtube_url'] = Options::getGlobal('Footer Settings', 'youtube_url');
    $data['gravity_form_title'] = Options::getGlobal('Footer Settings', 'gravity_form_title');
    $data['gravity_form_shortcode'] = Options::getGlobal('Footer Settings', 'gravity_form_shortcode');

    return $data;
});
