<?php

declare(strict_types=1);

if (!defined('ABSPATH')) exit;

/**
 * Include all PHP files from the lib directory
 */
(function () {
  $lib_path = get_template_directory() . '/lib/';

  if (!is_dir($lib_path)) {
    return;
  }

  $php_files = glob($lib_path . '*.php');

  if (empty($php_files)) {
    return;
  }

  foreach ($php_files as $file) {
    if (is_readable($file)) {
      require_once $file;
    }
  }
})();
