<?php
/**
 * Template part for displaying individual posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Telltale
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php 
			$thumb_id = get_post_thumbnail_id();
			$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
			$thumb_url = $thumb_url_array[0];
			$bg_img = 'background: url(&quot; '. $thumb_url .'&quot;) no-repeat center; background-size: cover; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover;';

			if ( has_post_thumbnail() ) { ?>
				<div class="header-background" style="<?php echo $bg_img; ?>">
					<div class="overlay">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					</div><!-- .overlay -->
				</div><!-- .header-background -->
				<!-- Author and date -->
				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<!-- Date -->
						<span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date(); ?></span>&emsp;
						<!-- Author -->
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="author"><i class="fa fa-user" aria-hidden="true"></i> <?php the_author(); ?></a>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			<?php } else { ?>
				<div class="no-image">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
					<div class="entry-meta">
						<!-- Date -->
						<span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date(); ?></span>&emsp;
						<!-- Author -->
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="author"><i class="fa fa-user" aria-hidden="true"></i> <?php the_author(); ?></a>
					</div><!-- .entry-meta -->
				</div><!-- .no-image -->
			<?php } ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'telltale' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'telltale' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php telltale_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
