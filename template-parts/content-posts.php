<?php
/**
 * Template part for displaying archive of posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Telltale
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-preview">
		<?php 
			$thumb_id = get_post_thumbnail_id();
			$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
			$thumb_url = $thumb_url_array[0];
			$bg_img = 'background: url(&quot; '. $thumb_url .'&quot;) no-repeat center; background-size: cover; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover;';

			if ( has_post_thumbnail() ) { ?>
				<header class="header-background" style="<?php echo $bg_img; ?>">
					<div class="overlay">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></a>
					</div><!-- .overlay -->
				</header>

				<!-- Post meta and excerpt -->
				<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<!-- Date -->
						<span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date(); ?></span>&emsp;
						<!-- Author -->
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="author"><i class="fa fa-user" aria-hidden="true"></i> <?php the_author(); ?></a>
					</div><!-- .entry-meta -->
				<?php endif; ?>

				<div class="entry-content">
					<?php
						the_excerpt( sprintf(
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

				<!-- Read More -->
				<div class="inner"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><button class="read-more">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></button></a></div>

			<?php } else {  // If the post does not have a featured image ?>
				<div class="no-image">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></a>
					<div class="entry-meta">
						<!-- Date -->
						<span class="date"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date(); ?></span>&emsp;
						<!-- Author -->
						<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="author"><i class="fa fa-user" aria-hidden="true"></i> <?php the_author(); ?></a>
					</div><!-- .entry-meta -->

					<div class="entry-excerpt">
						<?php
							the_excerpt( sprintf(
								/* translators: %s: Name of current post. */
								wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'telltale' ), array( 'span' => array( 'class' => array() ) ) ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							) );

							wp_link_pages( array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'telltale' ),
								'after'  => '</div>',
							) );
						?>
					</div><!-- .entry-excerpt -->
					<!-- Read More -->
					<div class="inner"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><button class="read-more">Read More <i class="fa fa-angle-double-right" aria-hidden="true"></i></button></a></div>
				</div><!-- .no-image --> 
			<?php } ?>
	</div><!-- .post-preview -->

</article><!-- #post-## -->
