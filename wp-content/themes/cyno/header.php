<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cyno
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary">
            <?php esc_html_e('Skip to content', 'cyno'); ?>
        </a>

        <header id="masthead" class="site-header">
            <div class="container">
                <div class="row align-items-center">
                    
                    <!-- Logo + Site branding -->
                    <div class="col-md-4 site-branding">
                        <?php the_custom_logo(); ?>
                        
                        <?php if (is_front_page() && is_home()): ?>
                            <h1 class="site-title mb-0">
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-decoration-none text-dark" rel="home">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </h1>
                        <?php else: ?>
                            <p class="site-title mb-0">
                                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-decoration-none text-dark" rel="home">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </p>
                        <?php endif; ?>

                        <?php $cyno_description = get_bloginfo('description', 'display');
                        if ($cyno_description || is_customize_preview()): ?>
                            <p class="site-description mb-0 small text-muted">
                                <?php echo $cyno_description; ?>
                            </p>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </header>
