<?php
/**
 * The template for displaying category archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Telltale
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main category-archive" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header fixed-top">

				<h1 class="archive-title"><?php _e( 'Category:', 'telltale' ); ?></h1>
				<form id="category-select" class="select-dropdown" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
					<?php 
						$args = array(
							'hierarchical'     => 1,
							'orderby'          => 'name'
						);
					?>
					<?php wp_dropdown_categories( $args ); ?>
					<button type="submit" class="search-submit"><i class="fa fa-angle-double-right"></i></button>
				</form>
			</header><!-- .page-header -->

			<div class="articles-wrapper">
				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'posts' );

				endwhile; ?>
			</div><!-- .articles-wrapper -->

			<?php

			the_posts_pagination();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
