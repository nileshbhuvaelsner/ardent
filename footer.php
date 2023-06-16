<?php
$hide_footer = false;
$page_id     = get_the_ID();

if ( is_page() ) {
	$hide_footer = get_post_meta( $page_id, '_hide_footer', true );
}

if ( ardent_is_wc_active() ) {
	if ( is_shop() ) {
		$page_id     = wc_get_page_id( 'shop' );
		$hide_footer = get_post_meta( $page_id, '_hide_footer', true );
	}
}

if ( ! $hide_footer ) {
	?>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
		/**
		 * @since 2.0.0
		 * @see ardent_footer_widgets
		 * @see ardent_footer_connect
		 */
		do_action( 'ardent_before_site_info' );
		$ardent_btt_disable = sanitize_text_field( get_theme_mod( 'ardent_btt_disable' ) );

		?>

		<div class="site-info">
			<div class="container">
				<?php if ( $ardent_btt_disable != '1' ) : ?>
					<div class="btt">
						<a class="back-to-top" href="#page" title="<?php echo esc_attr__( 'Back To Top', 'ardent' ); ?>"><i class="fa fa-angle-double-up wow flash" data-wow-duration="2s"></i></a>
					</div>
				<?php endif; ?>
				<?php
				/**
				 * hooked ardent_footer_site_info
				 *
				 * @see ardent_footer_site_info
				 */
				do_action( 'ardent_footer_site_info' );
				?>
			</div>
		</div>

	</footer>
	<?php
}
/**
 * Hooked: ardent_site_footer
 *
 * @see ardent_site_footer
 */
do_action( 'ardent_site_end' );
?>
</div>

<?php do_action( 'ardent_after_site_end' ); ?>

<?php wp_footer(); ?>

</body>
</html>
