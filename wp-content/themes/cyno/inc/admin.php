<?php
if (!defined('ABSPATH'))
    exit;

// Remove dashboard widget
function cyno_remove_dashboard_widgets()
{
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    // WordPress Development Blog Feed
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    // Quick Press Form
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    // Remove comment
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
}
add_action('wp_dashboard_setup', 'cyno_remove_dashboard_widgets');

// Custom Footer admin text
add_filter('admin_footer_text', 'cyno_admin_footer');
function cyno_admin_footer()
{
    esc_html_e('Website development by CYNO.', 'cyno');
}

// Remove logo and submenu on menu bar
function remove_logo_and_submenu()
{
    global $wp_admin_bar;
    //the following codes is to remove sub menu
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
    $wp_admin_bar->remove_menu('flatsome_panel');

}
add_action('wp_before_admin_bar_render', 'remove_logo_and_submenu');

// Remove menu Flatsome panel
function remove_menus()
{
    remove_menu_page('flatsome-panel');
}
add_action('admin_menu', 'remove_menus', 50);


add_action('admin_menu', 'add_custom_link_into_appearnace_menu');
function add_custom_link_into_appearnace_menu()
{
    global $submenu;
    $permalink = 'admin.php?page=optionsframework';
    $submenu['themes.php'][] = array('Advanced Settings', 'manage_options', $permalink);
}


// Function that outputs the contents of the dashboard widget
function custom_dashboard_help($post, $callback_args)
{
    echo '<p>Chào mừng quý khách đã đến với khu vực quản trị website.</p>';
    echo '<h3><strong>Thông tin hỗ trợ</strong></h3>';
    echo 'Hotline: 077.922.2222<br>';
    echo 'Email kĩ thuật: support@cyno.com.vn<br>';
    echo '<p>Cám ơn quý khách đã sử dụng dịch vụ của <a href="https://cyno.com.vn">CYNO Software</a></p>';
}

// Function used in the action hook
function add_dashboard_widgets_support()
{
    wp_add_dashboard_widget('dashboard_widget', esc_html__('CYNO Support', 'cyno'), 'custom_dashboard_help');
}

// Register the new dashboard widget with the 'wp_dashboard_setup' action
add_action('wp_dashboard_setup', 'add_dashboard_widgets_support');

// Disable editor theme/plugin
function disable_mytheme_action()
{
    define('DISALLOW_FILE_EDIT', TRUE);
}
add_action('init', 'disable_mytheme_action');

// remove require install plugin on flatsome
function remove_my_parent_theme_function()
{
    remove_action('tgmpa_register', 'flatsome_register_required_plugins');
}
add_action('init', 'remove_my_parent_theme_function');


// add_action('login_head', 'login_css');

// Change link logo login admin
add_filter('login_headerurl', 'cyno_loginlogo_url');
function cyno_loginlogo_url($url)
{
    return 'https://cyno.com.vn';
}

add_action('init', 'hide_notice');
function hide_notice()
{
    if (is_admin()) {
        remove_action('admin_notices', 'flatsome_maintenance_admin_notice');
    }
}

function child_remove_page_templates($page_templates)
{
    unset($page_templates['page-blank-featured.php']);
    unset($page_templates['page-blank-landingpage.php']);
    unset($page_templates['page-blank-sub-nav-vertical.php']);
    // unset( $page_templates['page-blank-title-center.php'] );
    unset($page_templates['page-cart.php']);
    unset($page_templates['page-checkout.php']);
    unset($page_templates['page-featured-items-3col.php']);
    unset($page_templates['page-featured-items-4col.php']);
    unset($page_templates['page-right-sidebar.php']);
    unset($page_templates['page-single-page-nav.php']);
    unset($page_templates['page-single-page-nav-transparent.php']);
    unset($page_templates['page-single-page-nav-transparent-light.php']);
    unset($page_templates['page-transparent-header.php']);
    unset($page_templates['page-transparent-header-light.php']);
    unset($page_templates['page-left-sidebar.php']);
    unset($page_templates['page-my-account.php']);
    unset($page_templates['page-header-on-scroll.php']);

    return $page_templates;
}
add_filter('theme_page_templates', 'child_remove_page_templates');
