<?php

declare(strict_types=1);

if (!defined('ABSPATH')) exit;

if (function_exists('acf_register_block_type') && function_exists('acf_add_local_field_group')) {
  $blockSlug = 'news-overview';

  acf_register_block_type([
    'name' => $blockSlug,
    'title' => __('Nieuws overzicht', 'stuurlui-theme'),
    'render_template' => 'templates/blocks/' . $blockSlug . '.php',
    'category' => 'common',
    'icon' => 'format-aside',
    'keywords' => [$blockSlug, 'news', 'nieuws', 'overview', 'overzicht', 'archive', 'archief'],
    'mode' => 'edit',
    'supports' => ['anchor' => true],
  ]);

  acf_add_local_field_group([
    'key' => $blockSlug . '_fields',
    'title' => __('Nieuws overzicht', 'stuurlui-theme'),
    'fields' => [
      [
        'key' => 'field_' . $blockSlug . '_tab_content',
        'name' => 'content',
        'label' => __('Nieuws overzicht instellingen', 'stuurlui-theme'),
        'type' => 'tab',
      ],
      [
        'key' => 'field_' . $blockSlug . '_title',
        'name' => 'title',
        'label' => __('Titel', 'stuurlui-theme'),
        'type' => 'text',
      ],
      [
        'key' => 'field_' . $blockSlug . '_search_placeholder',
        'name' => 'search_placeholder',
        'label' => __('Zoekveld placeholder', 'stuurlui-theme'),
        'type' => 'text',
        'default_value' => 'Zoek je een specifieke blog?',
        'placeholder' => 'Zoek je een specifieke blog?',
      ],
      [
        'key' => 'field_' . $blockSlug . '_count',
        'name' => 'count',
        'label' => __('Aantal nieuwsberichten per pagina', 'stuurlui-theme'),
        'type' => 'number',
        'min' => 1,
        'step' => 1,
        'default_value' => 9,
        'placeholder' => '9',
        'required' => 1,
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
