<?php
/**
 * The template for displaying all single posts.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
<?php while (have_posts()): the_post();?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="entry-content">
                <?php the_content(); ?>
            </div><!-- .entry-content -->

            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title"> - ', '</h1>' ); ?>
            </header><!-- .entry-header -->
<?php endwhile;?>
            <a id="tweetlink" href="https://twitter.com/intent/tweet?url=URL_HERE&via=quotesondev&text=yourtext"><p>Retweet this on Twitter!<i class="fa fa-retweet"></i></p></a>

        </article><!-- #post-## -->
        <button type="button" id="new-quote-button">Show Me Another!</button>
    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>