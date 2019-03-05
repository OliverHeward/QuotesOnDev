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

        <!-- Start of Page Header -->
        <header class="page-header">
            <?php
                the_archive_title( '<h1 class="page-title">', '</h1>' );
                ?>
        </header><!-- End of Page Header -->

        <!-- Start of Post Archives -->
        <div class="post-archives">
            <h2 class="">Quote Authors</h2>
            <?php
                /* WordPress Query Retrieving Posts and Saving in Variable */
                $all_posts = new WP_Query( array( 'post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => -1 ) );
                /* Start of Post Title Conditional */
                if ( $all_posts->have_posts() ) :
                ?>
            <!-- Start of List -->
            <ul>
                <!-- Start of Post Title Loop -->
                <?php while ( $all_posts->have_posts() ) : $all_posts->the_post(); ?>
                <!-- Title List Item with Permalink Anchor -->
                <li><a href="<?php echo get_the_permalink(); ?>">
                    <?php the_title(); ?></a>
                </li> 
                <?php endwhile; ?> <!-- End of Title Loop -->
            </ul> <!-- End of List -->
            <!-- ELSE Conditional -->
            <?php else : ?>
            <p>
                <?php _e( 'Sorry, no posts were found.' ); ?>
            </p>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div> <!-- End of Post-Archives -->

        <!-- Start of Category Archive List -->
        <div class="category-archives">
            <h2 class="">Categories</h2>
            <!-- Start of List -->
            <ul>
                <!-- Creating Categoy Object as a List Inside Variable -->
                <?php
                    $all_cats = wp_list_categories( array(
                        'orderby' => 'count',
                        'order'      => 'DESC',
                        'title_li'   => '',
                        'number'     => 10,
                    ) );
                    ?>
            </ul> <!-- End of List -->
        </div> <!-- End of Category Archive -->

        <!-- Start of Tag Archive -->
        <div class="tag-archives">
            <h2 class="">Tags</h2>
            <!-- Creating Tags Object Saved in Variable -->
            <?php 
                $tags = get_tags(array(
                  'hide_empty' => false
                )); ?>
            <!-- Start of List -->
            <ul>
                <!-- Start of Tags Loop -->
                <?php foreach ($tags as $tag) {?>
                <!-- Tags List Item Retrieving Tag Link by Term ID and Tag Name -->
                <li><a href="<?php echo get_tag_link($tag->term_id); ?>"> <?php echo $tag->name ?> </a></li>
                <?php }; ?>
            </ul> <!-- End of List -->
        </div> <!-- End of Tag Archive -->

    </main> <!-- End of Main -->
    
</div><!-- End of Primary -->
<?php get_footer(); ?>