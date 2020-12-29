<?php
global $houzez_local;
$houzez_local = houzez_get_localization();
/**
 * @package Houzez
 * @since Houzez 1.0
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
    <meta name="format-detection" content="telephone=no">
<!-- 	<meta description="ac shifting , mirpur hostel , house rent in banani, tolet in uttara sector 4 , baridhara 			apartment rent , apartment in uttara , office spcae for rent in banani dhaka , gym near gulshan , flats in dhaka"> -->
	<?php wp_head(); ?>
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-RDQ3GB545G"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-RDQ3GB545G');
	</script>

	<!-- adding AdSense code Start-->
	<script data-ad-client="ca-pub-4435670477112835" async                  src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- adding AdSense code Start-->
	<!-- Facebook Pixel Code -->
	<script>
	!function(f,b,e,v,n,t,s)
	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	n.queue=[];t=b.createElement(e);t.async=!0;
	t.src=v;s=b.getElementsByTagName(e)[0];
	s.parentNode.insertBefore(t,s)}(window, document,'script',
	'https://connect.facebook.net/en_US/fbevents.js');
	fbq('init', '175856574125908');
	fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none"
	src="https://www.facebook.com/tr?id=175856574125908&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Facebook Pixel Code -->
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php get_template_part('template-parts/header/nav-mobile'); ?>

<?php if(houzez_is_dashboard()) { ?>

	<main id="main-wrap" class="main-wrap dashboard-main-wrap">
	<?php get_template_part('template-parts/header/header-mobile'); ?>

<?php } else { ?>

	<main id="main-wrap" class="main-wrap <?php if(houzez_is_splash()) { echo 'splash-page-wrap'; }?>">

	<?php 
	if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) {
		get_template_part('template-parts/header/main'); 
	}?>

	<?php 
	// Header Search Start 
	if( houzez_search_needed() ) {

		$search_enable = houzez_option('main-search-enable');
		$search_position = houzez_option('search_position');
		$search_pages = houzez_option('search_pages');
		$search_selected_pages = houzez_option('header_search_selected_pages');

		$adv_search_enable = get_post_meta($post->ID, 'fave_adv_search_enable', true);
		$adv_search = get_post_meta($post->ID, 'fave_adv_search', true);
		$adv_search_pos = get_post_meta($post->ID, 'fave_adv_search_pos', true);

		if( isset( $_GET['search_pos'] ) ) {
			$search_enable = 1;
			$search_position = $_GET['search_pos'];
		}


		if ((!empty($adv_search_enable) && $adv_search_enable != 'global') && !houzez_is_transparent_logo()) {
			if ($adv_search_pos == 'under_menu') {
				if ($adv_search == 'show' || $adv_search == 'hide_show') {
					if( wp_is_mobile() ) {
						get_template_part('template-parts/search/mobile-search-main');
					} else {
						get_template_part('template-parts/search/main'); 
					}
				}
			}
		} else {
			if (!is_home() && !is_singular('post') && !houzez_is_transparent_logo()) {
				if ($search_enable != 0 && $search_position == 'under_nav') {
					
					if( wp_is_mobile() ) {
						get_template_part('template-parts/search/mobile-search-main');
					} else {
						if ($search_pages == 'only_home') {
							if (is_front_page()) {
								get_template_part('template-parts/search/main'); 
							}
						} elseif ($search_pages == 'all_pages') {
							get_template_part('template-parts/search/main'); 

						} elseif ($search_pages == 'only_innerpages') {
							if (!is_front_page()) {
								get_template_part('template-parts/search/main'); 
							}
						} else if( $search_pages == 'specific_pages' ) {
						    if( is_page( $search_selected_pages ) ) {
						        get_template_part('template-parts/search/main'); 
						    }
						}
					}
				}
			}
		}
	} // Header search End

	get_template_part('template-parts/banners/main');
	
} ?>