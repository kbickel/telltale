<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Telltale
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main archive" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header fixed-top">
				<?php
					the_archive_title( '<h1 class="archive-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<div class="articles-wrapper">

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'posts' );

				endwhile; ?>
			</div><!-- .articles-wrapper -->

			<?php the_posts_pagination();
			
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
