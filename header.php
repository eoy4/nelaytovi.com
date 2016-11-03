<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <?php endif; ?>
  <link href="https://fonts.googleapis.com/css?family=Elsie" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/vendor/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/css/styles.css" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<script src="<?php echo get_stylesheet_directory_uri() ?>/js/vendor/bootstrap.min.js"></script>
<div id="page" class="site">
  <div class="site-inner">
    <header id="masthead" class="site-header" role="banner">
    </header>

    <div id="content" class="site-content">
