<?php
/**
 * The template for displaying all single posts.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<?php
	$args = array(
    'posts_per_page' => 1,
    'post_type' => 'post',
    'post_status' => 'publish',
	);
	?>

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title"> - ', '</h1>' ); ?>
	</header><!-- .entry-header -->
</article><!-- #post-## -->

<button type="button" id="new-quote-button">Show Me Another!</button>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
