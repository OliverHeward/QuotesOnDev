<?php
    /**
     * The template for displaying the Home/Landing Page.
     *
     * @package QOD_Starter_Theme
     */
    
    
    get_header(); ?> <!-- Calling Header -->

<!-- START OF PAGE CONTENT -->
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <!-- Start of Loop -->
        <?php while (have_posts()): the_post();?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <!-- Entry Content -->
            <div class="entry-content">
                <?php the_content(); ?>
            </div> <!-- End of Content -->
            <!-- Entry-Header -->
            <div class="entry-header">
                <?php the_title( '<h1 class="entry-title">- ', '</h1>' ); ?>

                <!-- Start of Conditional for Source Name & Hyperlink -->
                <?php $source = get_post_meta( get_the_ID(), '_qod_quote_source', true);
                      $source_url = get_post_meta( get_the_ID(), '_qod_quote_source_url', true); ?>
                <?php if ( $source && $source_url ) : ?>
                    <span class="source"> , <a href="<?php echo $source_url; ?>"><?php echo $source; ?></a></span>
                <?php elseif ( $source ) : ?>
                    <span class="source"> , <?php echo $source; ?></span>
                <?php else : ?>
                    <span class="source"></span>
                <?php endif; ?> <!-- End of Conditional -->
            </div> <!-- End of Entry-Header -->
            <?php endwhile;?> <!-- End of Loop -->
            <!-- Re-tweet Quote -->
            <!-- PHP echo's allow for Retweet function to work on initial page load -->
            <a id="tweetlink" href="https://twitter.com/intent/tweet?url=<?php echo $source_url ?>&via=quotesondev&text=<?php echo strip_tags(get_the_content()); ?>">
                <p>Retweet this on Twitter!  <i class="fa fa-retweet"></i></p>
            </a>
        </article>
        <!-- Show Me Another Button -->
        <button type="button" id="new-quote-button">Show Me Another!</button>
    </main> <!-- End of Main -->
</div> <!-- End of Primary -->

<?php get_footer(); ?> <!-- Calling Footer -->