<?php
    /**
     * The template for submit page.
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
            <!-- Start of Conditional Comparing if User is Logged in or Not -->
            <?php
                if ( is_user_logged_in() && current_user_can( 'edit_posts' ) ) { ?>
            <!-- Entry Header -->
            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header> <!-- End of Entry Header -->

            <!-- Entry Content -->
            <div class="entry-content">
                <!-- Start of Submit Quote Form -->
                <form id="submitQuote">
                    <p>Author of Quote</p>
                    <!-- Input Title -->
                    <input type="text" id="update-title" />
                    <p>Quote</p>
                    <!-- Input Quote -->
                    <textarea id="quote"></textarea>
                    <p>Where did you find this quote? (e.g. book name)</p>
                    <!-- Input Where -->
                    <input type="text" id="quote-where" />
                    <p>Provide the url of the quote source, if available.</p>
                    <!-- Input URL -->
                    <input type="text" id="quote-url" />
                    <!-- Submit Button -->
                    <p><input type="submit" value="Submit" class="submit" id="submitQuote"><span class="ajax-loader"></span></p>
                </form> <!-- End of Form -->
                <p class="submit-success"></p> <!-- Placeholder for AJAX Success Message -->
                <p class="submit-failure"></p> <!-- Place for AJAX Failure Message-->
            </div> <!-- End of Entry Content --> 

            <!-- Start of Else Conditional (If User is Logged Out) -->
            <?php
                } else { ?> 
            <!-- Entry Header -->
            <header class="entry-header">
                <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            </header> <!-- End of Entry Header -->
            <!-- Entry Content -->
            <div class="entry-content">
                <p> Sorry, you must be logged in to submit a quote! </p>
                <!-- PHP echo to WordPress Log in Portal -->
                <a href="<?php echo site_url(); ?>/wp-login.php">
                    <p>Click here to login</p>
                </a>
            </div> <!-- End of Entry Content -->
            <?php
                }
                ?>
        </article> <!-- End of Post -->
        <?php endwhile; // End of the loop. ?>
    </main><!-- End of Main -->
</div><!-- End of Primary -->
<?php get_footer(); ?> <!-- Calling Footer --> 