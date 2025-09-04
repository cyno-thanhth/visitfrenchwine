<?php
// Prevent direct access.
if (!defined('ABSPATH'))
    exit;


/**
 * Child Theme Initialize
 *
 */
class Child_Theme_Init
{
    /**
     * Child Theme Init constructor.
     */
    public function __construct()
    {
        $this->load_dependency();

        add_action('wp_enqueue_scripts', [$this, 'load_assets'], 999);
        add_action('after_setup_theme', array($this, 'load_child_theme_language'), 99);

        add_action('login_head', [$this, 'load_login_style']);
    }

    /**
     * Load dependency
     *
     * @return bool
     */
    public function load_dependency()
    {
        // Load admin
        include_once THEME_INCLUDES_DIR . '/admin.php';

    }

    public function load_child_theme_language()
    {
        load_child_theme_textdomain('cyno', get_stylesheet_directory() . '/languages');
    }

    // Custom login admin style
    function load_login_style()
    {
        wp_enqueue_style('login', THEME_ASSETS_URI . '/css/login-admin.css', array(), THEME_VERSION, 'all');
    }

    /**
     * Enqueue assets
     *
     * @return void
     */
    public function load_assets()
    {
        // Bootstrap CSS (CDN)
        wp_enqueue_style(
            'bootstrap-css',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
            array(),
            null
        );
        // Bootstrap JS (CDN)
        wp_enqueue_script(
            'bootstrap-js',
            'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
            array('jquery'),
            null,
            true
        );
        // Enqueue styles
        wp_enqueue_style('frontend', THEME_ASSETS_URI . '/css/frontend.css', array(), THEME_VERSION, 'all');

        // Enqueue scripts
        wp_enqueue_script('frontend', THEME_ASSETS_URI . '/js/frontend' . '.js', array(), THEME_VERSION, true);
    }
}

new Child_Theme_Init();
