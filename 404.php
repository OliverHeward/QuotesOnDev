<?php
    /**
     * The template for displaying 404 pages (not found).
     *
     * @link https://codex.wordpress.org/Creating_an_Error_404_Page
     *
     * @package QOD_Starter_Theme
     */
    
    get_header(); ?> <!-- Calling Header -->

<!-- START OF PAGE CONTENT -->
<div id="primary" class="content-area">

	<!-- Site Main -->
    <main id="main" class="site-main" role="main">

        <!-- Start of Section 404 -->
        <section class="error-404 not-found">

            <!-- Page Header -->
            <header class="page-header">
                <h1 class="page-title"><?php echo esc_html( 'Oops! That page can&rsquo;t be found.' ); ?></h1>
            </header>
            <!-- End of Header -->

            <!-- Page Content -->
            <div class="page-content">
                <p><?php echo esc_html( 'It looks like nothing was found at this location. Maybe try a search?' ); ?></p>
                <?php get_search_form(); ?>
            </div>
            <!-- End of Page Content -->

        </section>
        <!-- End of Section -->

    </main>
    <!-- End of Main -->
</div>
<!-- End of Primary -->

<?php get_footer(); ?>