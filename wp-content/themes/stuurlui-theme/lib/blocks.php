<?php

declare(strict_types=1);

if (!defined('ABSPATH')) exit;

function str_auto_load_blocks()
{
  $blocksPath = get_template_directory() . '/blocks/';
  if (!is_dir($blocksPath)) return;

  $blockDirs = glob($blocksPath . '*', GLOB_ONLYDIR);
  if (empty($blockDirs)) return;

  foreach ($blockDirs as $blockDir) {
    $blockFile = $blockDir . '/block.php';
    if (is_readable($blockFile)) {
      require_once $blockFile;
    }
  }
}

add_action('init', 'str_auto_load_blocks', 20);

function str_only_allow_acf_blocks($allowedBlocks, $editorContext)
{
  $allowed = [];

  if (function_exists('acf_get_block_types')) {
    $acfBlocks = acf_get_block_types();
    foreach ($acfBlocks as $block) {
      if (!empty($block['name'])) {
        $allowed[] = $block['name'];
      }
    }
  }

  return $allowed;
}
add_filter('allowed_block_types_all', 'str_only_allow_acf_blocks', 10, 2);
