<?php
    /**
     * The template for displaying all pages.
     *
     * @package QOD_Starter_Theme
     */
    
get_header(); ?> <!-- Calling Header -->

<!-- START OF PAGE CONTENT -->
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <!-- Start of Loop -->
        <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- Entry Header -->
            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header> <!-- End of Entry Header -->

            <!-- Entry Content -->
            <div class="entry-content">
                <!-- Calling the page content -->
                <?php the_content(); ?>
                <?php
                    wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html( 'Pages:' ),
                        'after'  => '</div>',
                    ) );
                    ?>
            </div> <!-- End of Entry Content -->
        </article> <!-- End of Post -->
        <?php endwhile; // End of the loop. ?>

    </main> <!-- End of Main -->
</div> <!-- End of Primary -->
<?php get_footer(); ?> <!-- Calling Footer -->