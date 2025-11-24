<?php

declare(strict_types=1);

if (!defined('ABSPATH')) exit;

if (function_exists('acf_register_block_type') && function_exists('acf_add_local_field_group')) {
  $blockSlug = 'home-hero-slider';

  acf_register_block_type([
    'name' => $blockSlug,
    'title' => __('Home Hero Slider', 'stuurlui-theme'),
    'render_template' => 'templates/blocks/' . $blockSlug . '.php',
    'category' => 'common',
    'icon' => 'format-image',
    'keywords' => [$blockSlug, 'slider', 'hero'],
    'mode' => 'edit',
    'supports' => ['anchor' => true],
  ]);

  acf_add_local_field_group([
    'key' => $blockSlug . '_fields',
    'title' => __('Home Hero Slider', 'stuurlui-theme'),
    'fields' => [
      [
        'key' => 'field_' . $blockSlug . '_tab_content',
        'name' => 'content',
        'label' => __('Inhoud', 'stuurlui-theme'),
        'type' => 'tab',
      ],
      [
        'key' => 'field_' . $blockSlug . '_title',
        'name' => 'title',
        'label' => __('Titel', 'stuurlui-theme'),
        'type' => 'text',
      ],
      [
        'key' => 'field_' . $blockSlug . '_content',
        'name' => 'content',
        'label' => __('Inhoud', 'stuurlui-theme'),
        'type' => 'wysiwyg',
      ],
      [
        'key' => 'field_' . $blockSlug . '_awards',
        'name' => 'awards',
        'label' => __('Awards', 'stuurlui-theme'),
        'type' => 'repeater',
        'sub_fields' => [
          [
            'key' => 'award_image',
            'name' => 'image',
            'label' => __('Award logo', 'stuurlui-theme'),
            'type' => 'image',
            'return_format' => 'id',
            'required' => 1,
          ],
          [
            'key' => 'award_link',
            'name' => 'link',
            'label' => __('Award link', 'stuurlui-theme'),
            'type' => 'link',
          ],
        ],
      ],
      [
        'key' => 'field_' . $blockSlug . '_tab_slider',
        'name' => 'slider',
        'label' => __('Slider', 'stuurlui-theme'),
        'type' => 'tab',
      ],
      [
        'key' => 'field_' . $blockSlug . '_case_slider',
        'name' => 'case_slider',
        'label' => __('Cases', 'stuurlui-theme'),
        'type' => 'repeater',
        'layout' => 'row',
        'sub_fields' => [
          [
            'key' => 'case_slide_link',
            'name' => 'link',
            'label' => __('Case link', 'stuurlui-theme'),
            'type' => 'link',
          ],
          [
            'key' => 'case_slide_image',
            'name' => 'image',
            'label' => __('Case afbeelding', 'stuurlui-theme'),
            'type' => 'image',
            'allowed_formats' => ['jpg', 'jpeg', 'png', 'webp'],
            'required' => 1,
            'return_format' => 'id',
          ],
          [
            'key' => 'case_slide_logo',
            'name' => 'logo',
            'label' => __('Case logo', 'stuurlui-theme'),
            'type' => 'image',
            'return_format' => 'id',
            'allowed_formats' => ['jpg', 'jpeg', 'png', 'webp'],
          ]
        ],
      ]
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
