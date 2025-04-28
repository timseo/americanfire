<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kormo
 */ 
?>

<!doctype html>
<html <?php language_attributes(); ?> <?php print enable_rtl(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

    
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Add your site or application content here -->

    <!-- header start -->
    <?php do_action('kormo_header_style'); ?>
    <!-- header end -->

    <!-- wrapper-box start -->
    <div class="wrapper-box p-0">
    <?php do_action('kormo_before_main_content'); ?>

        