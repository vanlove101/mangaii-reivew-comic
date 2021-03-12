<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gucherry-blog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="amp-script-src" content="sha384-ghqfk0CMMeNTHN-MVAX_btS3F5uLf1c-Z4cjQkXXp8y_k0n6UoJ0DDfKm9c2Hj3d">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
	<link rel="canonical" href="https://amp.dev/documentation/examples/interactivity-dynamic-content/show_more_button/index.html">
</head>

<body <?php body_class(); ?>>
<?php
if( class_exists( 'wp_body_open' ) ) { 
    wp_body_open(); 
}
?>
	<div class="page-wrap">
