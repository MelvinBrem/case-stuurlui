<?php

declare(strict_types=1);

if (!defined('ABSPATH')) exit;

function str_allow_svg($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'str_allow_svg');
