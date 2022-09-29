<?php

use Timber\Timber;
use Timber\PostQuery;
use Flynt\Utils\Options;

global $wp_query;

$blog_cat = $wp_query->get_queried_object();

$context = Timber::get_context();
$context['posts'] = new PostQuery();
$context['blog_cat'] = $blog_cat;
$context['title'] = Options::getGlobal('Category Settings', 'title');
$context['signup_form_title'] = Options::getGlobal('Category Settings', 'signup_form_title');
$context['gravity_form_shortcode'] = Options::getGlobal('Category Settings', 'gravity_form_shortcode');

Timber::render('templates/category.twig', $context);
