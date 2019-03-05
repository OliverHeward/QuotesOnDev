<?php
    /**
     * The template for displaying search results pages.
     *
     * @package QOD_Starter_Theme
     */
    
    get_header(); ?> <!-- Calling Header -->

<!-- START OF PAGE CONTENT -->
<section id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <!-- Start of Conditional -->
        <?php if ( have_posts() ) : ?>

        <!-- Page Header -->
        <header class="page-header">
            <h1 class="page-title">
                <?php printf( esc_html( 'Search Results for: %s' ), '<span>' . get_search_query() . '</span>' ); ?>
            </h1>
        </header><!-- End of Page Header -->

        <!-- Start of Post Loop -->
        <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- Entry Header -->
            <header class="entry-header">
                <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                <?php if ( 'post' === get_post_type() ) : ?>
                <?php endif; ?>
            </header> <!-- End of Entry Header -->

            <!-- Entry Summary -->
            <div class="entry-summary">
                <?php the_excerpt(); ?>
            </div> <!-- End of Entry Summary -->

        </article> <!-- End of Post -->

        <!-- End While, Else and If -->
        <?php endwhile; ?> 
        <?php qod_numbered_pagination(); ?>
        <?php else : ?>
        <?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; ?>

    </main> <!-- End of Main -->
</section> <!-- End of Primary -->
<?php get_footer(); ?> <!-- End of Footer -->