<?php

declare(strict_types=1);

if (!defined('ABSPATH')) exit;

if (function_exists('acf_register_block_type') && function_exists('acf_add_local_field_group')) {
  $blockSlug = 'news-preview';

  acf_register_block_type([
    'name' => $blockSlug,
    'title' => __('News Preview', 'stuurlui-theme'),
    'render_template' => 'templates/blocks/' . $blockSlug . '.php',
    'category' => 'common',
    'icon' => 'format-aside',
    'keywords' => [$blockSlug, 'news', 'nieuws', 'preview'],
    'mode' => 'edit',
    'supports' => ['anchor' => true],
  ]);

  acf_add_local_field_group([
    'key' => $blockSlug . '_fields',
    'title' => __('News preview', 'stuurlui-theme'),
    'fields' => [
      [
        'key' => 'field_' . $blockSlug . '_tab_content',
        'name' => 'content',
        'label' => __('News preview instellingen', 'stuurlui-theme'),
        'type' => 'tab',
      ],
      [
        'key' => 'field_' . $blockSlug . '_title',
        'name' => 'title',
        'label' => __('Titel', 'stuurlui-theme'),
        'type' => 'text',
      ],
      [
        'key' => 'field_' . $blockSlug . '_count',
        'name' => 'count',
        'label' => __('Aantal nieuwsberichten om te tonen', 'stuurlui-theme'),
        'type' => 'number',
        'min' => 1,
        'step' => 1,
        'default' => 3,
        'placeholder' => '3',
        'required' => 1,
      ],
      [
        'key' => 'field_' . $blockSlug . '_link',
        'name' => 'link',
        'label' => __('Link', 'stuurlui-theme'),
        'instructions' => __('Link onderaan het overzicht.<br>Het aantal nieuwsberichten zal als nummer achter de tekst worden gezet.', 'stuurlui-theme'),
        'type' => 'link',
      ],
    ],
    'location' => [
      [
        [
          'param' => 'block',
          'operator' => '==',
          'value' => 'acf/' . $blockSlug,
        ],
      ]
    ],
  ]);
}
