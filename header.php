<?php
    /**
     * The header for our theme.
     *
     * @package QOD_Starter_Theme
     */
    ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?> <!-- Exporting Heading -->
    </head>
    <!-- Start of Body - Adding PHP body class -->
    <body <?php body_class(); ?>>
        <!-- Start of Page, container attachment to set fixed styles for page layout -->
        <div id="page" class="hfeed site container">
        <!-- Skip too content screen-reader -->
        <a class="skip-link screen-reader-text" href="#content"><?php echo esc_html( 'Skip to content' ); ?></a>
        <!-- Start of Header -->
        <header id="masthead" class="site-header" role="banner">
            <!-- Start of Site Branding -->
            <div class="site-branding">
                <!-- Logo Container -->
                <div class="logo">
                    <h1 class="site-title screen-reader-text"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name');?></a></h1>
                    <!-- Logo with Hyperlink to Home Page -->
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <img src="<?php echo get_template_directory_uri() . '/assets/qod-logo.svg' ?>" class="logo" alt="Quotes on Dev logo" />
                    </a> <!-- End of Logo -->
                </div>
                <!-- End of Logo Container -->
            </div>
            <!-- End of Site-Branding -->
        </header>
        <!-- End of Masthead -->
        <!-- Start of Site Content -->
        <div id="content" class="site-content">