<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Telltale
 */

?>

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="top-footer">
			<?php if ( is_active_sidebar( 'footer-left' ) ) : ?>
				<div class="footer-widget left" role="complementary">
					<?php dynamic_sidebar( 'footer-left' ); ?>
				</div><!-- .footer-widget -->
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-right' ) ) : ?>
				<div class="footer-widget right" role="complementary">
					<?php dynamic_sidebar( 'footer-right' ); ?>
				</div><!-- .footer-widget -->
			<?php endif; ?>
		</div><!-- .top-footer -->

		<div class="bottom-footer">
			<!-- Display secondary menu if it exists -->
			<?php echo get_template_part( 'template-parts/secondary-menu' ); ?>

			<div class="site-info">
				<div class="copyright">
					Copyright &copy; <?php echo date('Y');?> <?php bloginfo( 'name' ); ?>
				</div>

				<div class="site-credit">
					<?php printf( esc_html__( 'Built with ', 'telltale' ) ); ?><a href="<?php echo esc_url( __( 'https://wordpress.org/', 'telltale' ) ); ?>">WordPress</a>
					<?php printf( esc_html__( 'and ', 'telltale' ) ); ?><a href="http://telltalewp.com" rel="designer">Telltale</a>
				</div>
			</div><!-- .site-info -->
		</div><!-- .bottom-footer -->

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
