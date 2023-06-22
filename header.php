<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>

	<meta name="theme-color" content="#ffffff">

	<?php /*
	<link rel="icon" type="image/svg+xml" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" />
	<link rel="alternate icon" type="image/svg+xml" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" >
	<link rel="mask-icon" type="image/svg+xml" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" color="#FF5D2C">
	*/ ?>
</head>

<body <?php body_class(); ?>>

<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}

do_action( 'ardent_before_site_start' ); ?>
<div class="wrapper">
	<div class="main-container"><?php /*<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ardent' ); ?></a>*/?>
		<?php
		/**
		 * @since 2.0.0
		 */
		ardent_header();
		?>
