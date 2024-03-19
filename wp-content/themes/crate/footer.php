<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Crate
 */

?>

</div> <!-- /.site-content-->
</main>

<footer class="site-footer">

	<span class="wave" aria-hidden="true"></span>

	<div class="container">

		<?php if ( is_front_page() ) { ?>

			<?php if( have_rows( 'footer_details' ) ):

				while( have_rows( 'footer_details' ) ): the_row();

					// vars
					$heading = get_sub_field( 'footer_heading' );
					$subheading = get_sub_field( 'footer_subheading' );
					?>

					<h4 class="footer-heading"><?php echo esc_html( $heading ); ?></h4>

					<p class="footer-subheading"><?php echo esc_html( $subheading ); ?></p>

					<?php if( have_rows( 'footer_links' ) ): ?>

						<div class="footer-links">

							<?php while ( have_rows( 'footer_links' ) ) : the_row();
								$link_id = get_sub_field( 'link' );
								$link_url = get_permalink( $link_id );
								$link_title = get_the_title( $link_id );
								$button_text = ( ! empty( get_sub_field( 'button_text' ) ) ? get_sub_field( 'button_text' ) : __( 'Learn More', 'crate' ) );
								?>

								<div class="footer-link">
									<?php if ( get_field( 'icon', $link_id ) ) { ?>
										<a href="<?php echo esc_url( $link_url ); ?>" title="<?php echo esc_attr( $button_text ); ?>">
											<?php echo wp_get_attachment_image( get_field( 'icon', $link_id ), 'post-grid', false, array( 'class' => 'footer-link-icon img-footer-icon' ) ); ?>
										</a>
									<?php } ?>
									<h3 class="link-title"><?php echo esc_html( $link_title ); ?></h3>
									<a class="button button-alt" href="<?php echo esc_url( $link_url ); ?>" title="<?php echo esc_attr( $button_text ); ?>"><?php echo esc_html( $button_text ); ?></a>
								</div>

							<?php endwhile; ?>

						</div>

					<?php endif; ?>

				<?php endwhile; ?>

			<?php endif; ?>

		<?php } else { ?>

			<h4 class="footer-heading"><?php esc_html_e( 'Find out your water footprint', 'crate' ); ?></h4>

			<a href="<?php echo esc_url( get_home_url() . '/wfc2/q/household/' ); ?>" class="button button-arrow"><?php esc_html_e( 'Calculate your footprint', 'crate' ); ?><span>&rsaquo;</span></a>

			<a href="<?php echo esc_url( get_home_url() . '/wfc2/esp/' ); ?>" class="spanish-link"><?php esc_html_e( '¿Cuál es su Huella Hídrica?', 'crate' ); ?></a>

			<div class="footer-call-to-action">
				<h5 class="call-to-action-heading">
					<?php esc_html_e( 'Learn how to save water', 'crate' ); ?>
					<a href="<?php echo esc_url( get_home_url() . '/tips' ); ?>" class="button button-alt"><?php esc_html_e( 'Get Tips', 'crate' ); ?></a>
				</h5>
			</div>

		<?php } ?>

		<hr>

		<nav class="footer-nav">
			<?php  wp_nav_menu( array(
				'theme_location' => 'footer',
				'container'      => false,
			) ); ?>
		</nav>

		<div>
			<a href="https://twitter.com/WaterCalcOrg">
				<img class="social-icon-logo" src="https://www.watercalculator.org/wp-content/uploads/2022/04/icon_Twitter.png">
			</a>
			<a href="https://www.pinterest.com/WaterCalculator/_created/">
				<img class="social-icon-logo" src="https://www.watercalculator.org/wp-content/uploads/2022/04/icon_Pinterest2.png">
			</a>
		</div>

		<div class="copyright">
			<p>
				<span><?php crate_copyright_text(); ?></span>
				<a href="<?php echo esc_url( 'https://gracecommunicationsfoundation.org/' ); ?>" title="<?php esc_attr_e( 'GRACE Communications Foundation', 'crate' ); ?>" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'GRACE Communications Foundation', 'crate' ); ?></a><span>. <?php esc_html_e( 'All Rights Reserved', 'crate' ); ?>.</span>
			</p>
		</div>

		<div class="credit">
			<a href="https://cornershopcreative.com"><span class="text"><?php esc_html_e( 'Crafted by Cornershop Creative', 'crate' ); ?></span><i></i></a>
		</div>
	</div>

</footer>

<?php //\CShop\Crate\browsersync_script(); // Browsersync script does not work with AMP enabled ?>

<?php wp_footer(); ?>

	</div><!-- /#body-wrapper -->
</body>
</html>
