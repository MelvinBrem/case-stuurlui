<?php

declare(strict_types=1);

if (!defined('ABSPATH')) exit;

function str_enqueue_scripts()
{
  if (!file_exists(get_template_directory() . '/dist/css/main.css') || !file_exists(get_template_directory() . '/dist/js/main.js')) {
    wp_die('Dist files not found, Have you run `npm run build`?');
  }

  wp_enqueue_style('stuurlui-theme-style', get_template_directory_uri() . '/dist/css/main.css', [], '1.0.0');
  wp_enqueue_script('stuurlui-theme-script', get_template_directory_uri() . '/dist/js/main.js', [], '1.0.0', true);

  wp_enqueue_style('stuurlui-theme-fonts-outfit', 'https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap', [], '1.0.0');
  wp_enqueue_style('stuurlui-theme-fonts-playfair', 'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap', [], '1.0.0');
}
add_action('wp_enqueue_scripts', 'str_enqueue_scripts');
