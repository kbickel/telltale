<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Telltale
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main search-results" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header fixed-top">
				<h1 class="archive-title"><?php printf( esc_html__( 'Search Results for: %s', 'telltale' ), get_search_form() ); ?></h1>
			</header><!-- .page-header -->

			<div class="articles-wrapper">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'posts' );

				endwhile; ?>
			</div><!-- .articles-wrapper -->

			<?php the_posts_navigation();

		else : ?>

			<header class="page-header fixed-top">
				<h1 class="archive-title"><?php printf( esc_html__( 'Search Results for: %s', 'telltale' ), get_search_form() ); ?></h1>
			</header><!-- .page-header -->

			<div class="articles-wrapper">
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			</div><!-- .articles-wrapper -->

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
