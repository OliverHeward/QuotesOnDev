<?php
/**
 * The template for submit page.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php
        if ( is_user_logged_in() ) { ?>
            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header><!-- .entry-header -->
            <div class="entry-content">
                <?php the_content() ?>
            </div>
            <?php
        } else { ?>
            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <p> Sorry, you must be logged in to submit a quote! </p>
                <a href="<?php echo site_url(); ?>/wp-login.php"><p>Click here to login</p></a>
            </div>
            <?php
}
?>
        </article><!-- #post-## -->
        <?php endwhile; // End of the loop. ?>
    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>