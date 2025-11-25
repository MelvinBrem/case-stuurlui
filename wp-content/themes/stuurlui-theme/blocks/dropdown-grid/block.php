<?php

declare(strict_types=1);

if (!defined('ABSPATH')) exit;

if (function_exists('acf_register_block_type') && function_exists('acf_add_local_field_group')) {
  $blockSlug = 'dropdown-grid';

  acf_register_block_type([
    'name' => $blockSlug,
    'title' => __('Dropdown grid', 'stuurlui-theme'),
    'render_template' => 'templates/blocks/' . $blockSlug . '.php',
    'category' => 'common',
    'icon' => 'grid-view',
    'keywords' => [$blockSlug, 'dropdown', 'grid'],
    'mode' => 'edit',
    'supports' => ['anchor' => true],
  ]);

  acf_add_local_field_group([
    'key' => $blockSlug . '_fields',
    'title' => __('Dropdown grid', 'stuurlui-theme'),
    'fields' => [
      [
        'key' => 'field_' . $blockSlug . '_tab_content',
        'name' => 'content',
        'label' => __('Dropdown grid instellingen', 'stuurlui-theme'),
        'type' => 'tab',
      ],
      [
        'key' => 'field_' . $blockSlug . '_title',
        'name' => 'title',
        'label' => __('Titel', 'stuurlui-theme'),
        'type' => 'text',
      ],
      [
        'key' => 'field_' . $blockSlug . '_faqs',
        'name' => 'faqs',
        'label' => __('Dropdowns', 'stuurlui-theme'),
        'type' => 'repeater',
        'layout' => 'row',
        'sub_fields' => [
          [
            'key' => 'dropdown_title',
            'name' => 'title',
            'label' => __('Dropdown titel', 'stuurlui-theme'),
            'type' => 'text',
            'required' => 1,
          ],
          [
            'key' => 'dropdown_content',
            'name' => 'content',
            'label' => __('Dropdown inhoud', 'stuurlui-theme'),
            'type' => 'wysiwyg',
            'required' => 1,
          ],
          [
            'key' => 'dropdown_link',
            'name' => 'link',
            'label' => __('Dropdown link', 'stuurlui-theme'),
            'type' => 'link',
          ]
        ],
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
