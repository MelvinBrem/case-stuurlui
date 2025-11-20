<?php

declare(strict_types=1);

if (!defined('ABSPATH')) exit;

if (!file_exists(ABSPATH . '/vendor/autoload.php')) {
	wp_die('Composer autoload.php not found, Have you run `composer install`?');
}

require_once ABSPATH . '/vendor/autoload.php';

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
