<?php
/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <header class="page-header">
            <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                ?>
        </header><!-- .page-header -->
        <div class="post-archives">
            <h2 class="">Quote Authors</h2>
            <?php
// the query
$all_posts = new WP_Query( array( 'post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => -1 ) );

if ( $all_posts->have_posts() ) :
?>
            <ul>
                <?php while ( $all_posts->have_posts() ) : $all_posts->the_post(); ?>
                <li><a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?></a></li>
                <?php endwhile; ?>
            </ul>
            <?php else : ?>
            <p>
                <?php _e( 'Sorry, no posts were found.' ); ?>
            </p>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
        </div>

        <div class="category-archives">
            <h2 class="">Categories</h2>
            <ul>
                <?php
                    $all_cats = wp_list_categories( array(
                        'orderby' => 'count',
                        'order'      => 'DESC',
                        'title_li'   => '',
                        'number'     => 10,
                    ) );
                ?>
            </ul>
        </div>

        <div class="tag-archives">
            <h2 class="">Tags</h2>
            <?php 
$tags = get_tags(array(
  'hide_empty' => false
)); ?>
            <ul>
                <?php foreach ($tags as $tag) {?>
  <li><a href="<?php echo get_tag_link($tag->term_id); ?>"> <?php echo $tag->name ?> </a></li>
<?php }; ?>
            </ul>
        </div>


    </main><!-- #main -->
</div><!-- #primary -->
<?php get_footer(); ?>