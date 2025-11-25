<?php

declare(strict_types=1);

if (!defined('ABSPATH')) exit;

function str_register_post_types()
{
  // News
  register_post_type('news', [
    'labels' => [
      'name' => __('Nieuwsberichten', 'stuurlui-theme'),
      'singular_name' => __('Nieuwsbericht', 'stuurlui-theme'),
      'all_items' => __('Alle nieuwsberichten', 'stuurlui-theme'),
      'add_new' => __('Nieuwsbericht toevoegen', 'stuurlui-theme'),
      'add_new_item' => __('Nieuwsbericht toevoegen', 'stuurlui-theme'),
      'edit_item' => __('Nieuwsbericht bewerken', 'stuurlui-theme'),
      'new_item' => __('Nieuwsbericht', 'stuurlui-theme'),
      'view_item' => __('Nieuwsbericht bekijken', 'stuurlui-theme'),
      'search_items' => __('Nieuwsberichten zoeken', 'stuurlui-theme'),
      'not_found' => __('Geen nieuwsberichten gevonden', 'stuurlui-theme'),
    ],
    'menu_icon' => 'dashicons-format-aside',
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'blog'],
    'supports' => ['title', 'editor', 'thumbnail'],
    'show_in_rest' => true,
  ]);

  register_taxonomy('news-category', 'news', [
    'labels' => [
      'name' => __('Nieuws categorieën', 'stuurlui-theme'),
      'singular_name' => __('Nieuws categorie', 'stuurlui-theme'),
      'all_items' => __('Alle nieuws categorieën', 'stuurlui-theme'),
      'add_new' => __('Nieuws categorie toevoegen', 'stuurlui-theme'),
      'add_new_item' => __('Nieuws categorie toevoegen', 'stuurlui-theme'),
      'edit_item' => __('Nieuws categorie bewerken', 'stuurlui-theme'),
      'new_item' => __('Nieuws categorie', 'stuurlui-theme'),
      'view_item' => __('Nieuws categorie bekijken', 'stuurlui-theme'),
      'search_items' => __('Nieuws categorieën zoeken', 'stuurlui-theme'),
      'not_found' => __('Geen nieuws categorieën gevonden', 'stuurlui-theme'),
    ],
    'hierarchical' => true,
    'show_in_rest' => true,
  ]);
}
add_action('init', 'str_register_post_types');
