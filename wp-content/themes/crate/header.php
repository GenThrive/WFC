<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Crate
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- GCF code-->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push(
{'gtm.start': new Date().getTime(),event:'gtm.js'}

);var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PS9M4PL');</script>
<!-- End Google Tag Manager -->

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- GCF code -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-51483554-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-51483554-1');
</script>
<!-- GCF code END-->

<?php if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) { ?>
	<amp-script width=0 height=0 src="<?php echo esc_url( get_template_directory_uri() . '/js/amp-validate.js' ); ?>">
		<span></span>
	</amp-script>
	<amp-analytics type="gtag" data-credentials="include">
		<script type="application/json">
		{
			"vars" : {
				"gtag_id": "UA-51483554-1",
				"config" : {
					"UA-51483554-1": { "groups": "default" }
				}
			}
		}
		</script>
	</amp-analytics>
<?php } ?>

<?php if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) { ?>

	<amp-script width="1" height="1" src="https://cdn.ampproject.org/v0/amp-script-0.1.js" layout="container">
	</amp-script>

	<amp-script width="1" height="1" src="https://s.pinimg.com/ct/core.js" layout="container">
	</amp-script>

	<amp-script script="pinterestTag" layout="container">
	</amp-script>
	<script type="text/plain" target="amp-script" id="pinterestTag">
		!function(e){if(!window.pintrk){window.pintrk = function () {
			window.pintrk.queue.push(Array.prototype.slice.call(arguments))
		};

		pintrk('load', '2612963089645');

		pintrk('page');
	</script>

<?php } ?>

<noscript>
	<img height="1" width="1" style="display:none;" alt="" src="https://ct.pinterest.com/v3/?event=init&tid=2612963089645&pd[em]=<hashed_email_address>&noscript=1" />
</noscript>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="body-wrapper">
		<?php get_template_part( 'template-parts/header-svg' ); ?>

    <!-- GCF code -->
    <!-- Google Tag Manager (noscript) -->
    <noscript>
      <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PS9M4PL" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

		<header id="masthead" class="site-header">

			<div class="wrap">
				<div class="site-branding">
					<p class="site-title">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title__link" rel="home">
							<img class="logo" itemprop="logo" width="578" height="99" src="<?php echo esc_url( get_template_directory_uri() . '/images/logo.png' ); ?>" alt="Logo" />
							<span class="screen-reader-text"><?php bloginfo( 'name' ); ?></span>
						</a>
					</p>
				</div><!-- .site-branding -->

				<button id="site-navigation-toggle" class="menu-toggle" type="button">
					<span class="menu-toggle__icon">
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
						<span></span>
					</span>

					<span class="screen-reader-text"><?php echo esc_html( 'Menu', 'crate' ); ?></span>
				</button>

				<nav id="site-navigation" class="main-navigation" aria-label="Main menu">
						<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'container'       => 'div',
								'container_class' => 'primary-menu-container',
							)
						);
						?>
				</nav><!-- #site-navigation -->

				<button id="open-search" class="search-toggle" type="button" on="tap:AMP.setState({ searchToggledOn: ! searchToggledOn })" aria-expanded="false" data-amp-bind-aria-expanded="searchToggledOn ? 'true' : 'false'" data-amp-bind-class="&quot;search-toggle&quot; + ( searchToggledOn ? &quot; toggled-on&quot; : '' )">
					<svg class="search" height="20" width="20">
						<use xlink:href="#icon-search" class="search-icon"/>
					</svg>
					<span class="screen-reader-text"><?php esc_html_e( 'Search', 'crate' ); ?></span>
				</button>

				<div id="search-container" class="search-container" data-amp-bind-class="&quot;search-container&quot; + ( searchToggledOn ? &quot; toggled-on&quot; : '' )">

					<div class="searchform">
						<?php get_search_form(); ?>
					</div>

					<button id="close-search" class="search-toggle" type="button" on="tap:AMP.setState({ searchToggledOn: ! searchToggledOn })" aria-expanded="false" data-amp-bind-aria-expanded="searchToggledOn ? 'true' : 'false'" data-amp-bind-class="&quot;search-toggle&quot; + ( searchToggledOn ? &quot; toggled-on&quot; : '' )">

						<svg class="close" height="20" width="20">
							<use xlink:href="#icon-close" class="close-icon"/>
						</svg>

						<span class="screen-reader-text"><?php esc_html_e( 'Close', 'crate' ); ?></span>
					</button>
				</div>

			</div><!-- .wrap -->
		</header>

		<main id="main" class="site-main" role="main">
			<div class="site-content">
			<?php if ( ! is_front_page() ) { ?>
				<?php get_template_part( 'template-parts/hero' ); ?>
				<?php if ( ! is_single() && ! is_404() && ! is_search() ) { ?>
					<?php get_template_part( 'template-parts/breadcrumbs' ); ?>
				<?php } ?>
			<?php } ?>
