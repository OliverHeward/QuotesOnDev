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
                <div class="entry-content">
                        <form method="post" novalidate="novalidate">
                            <p><label> Author of Quote<br>
                                   <input type="text" name="Author" value="" size="40" class="author" id="update-title" aria-invalid="false"></label></p>
                            <p><label> Quote<br>
                                    <textarea name="Quote" cols="40" rows="10" class="quote-text" id="quote" aria-invalid="false"></textarea></label></p>
                            <p><label> Where did you find this quote? (e.g. book name)<br>
                                    <input type="text" name="Reference" value="" size="40" class="where-text" id="quote-where" aria-invalid="false"> </label></p>
                            <p><label> Provide the URL of the quote source, if available.<br>
                                    <input type="url" name="URL" value="" size="40" class="url-text" id="quote-url" aria-invalid="false"> </label></p>
                            <p><input type="submit" value="Submit" class="submit" id="submitQuote"><span class="ajax-loader"></span></p>
                        </form>
                    </div>
                <?php
        } else { ?>
                <header class="entry-header">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                </header><!-- .entry-header -->
                <div class="entry-content">
                    <p> Sorry, you must be logged in to submit a quote! </p>
                    <a href="<?php echo site_url(); ?>/wp-login.php">
                        <p>Click here to login</p>
                    </a>
                </div>
                <?php
}
?>
        </article><!-- #post-## -->
        <?php endwhile; // End of the loop. ?>
    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>