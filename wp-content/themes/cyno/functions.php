<?php
// Prevent direct access.
if (!defined('ABSPATH'))
    exit;

define('THEME_INCLUDES_DIR', get_stylesheet_directory() . '/inc');
define('THEME_ASSETS_URI', get_stylesheet_directory_uri() . '/assets');
define('THEME_ASSETS_DIR', get_stylesheet_directory() . '/assets');
define('THEME_VERSION', wp_get_theme()->get('Version'));

require_once THEME_INCLUDES_DIR . '/child-theme-init.php';