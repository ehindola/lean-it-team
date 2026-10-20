<?php
/**
 * Lean IT — theme functions.
 * Goal: ship only what we wrote. Everything below removes WordPress defaults
 * that a small business site doesn't need on the front end.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'after_setup_theme', function () {
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'responsive-embeds' );
	remove_theme_support( 'core-block-patterns' ); // no stock pattern library
} );

// Our one stylesheet.
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'lean-it', get_stylesheet_uri(), [], wp_get_theme()->get( 'Version' ) );
} );

// Only load CSS for blocks actually on the page.
add_filter( 'should_load_separate_core_block_assets', '__return_true' );

// --- Remove front-end bloat ------------------------------------------------

// Emoji detection script + styles (modern browsers render emoji natively).
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
add_filter( 'emoji_svg_url', '__return_false' );

// oEmbed discovery + wp-embed script.
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
remove_action( 'wp_head', 'wp_oembed_add_host_js' );
add_action( 'wp_footer', function () {
	wp_dequeue_script( 'wp-embed' );
} );

// Head clutter.
remove_action( 'wp_head', 'wp_generator' );          // hides WP version
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'wp_head', 'feed_links_extra', 3 );

// Classic-theme styles shim isn't needed in a block theme.
add_action( 'wp_enqueue_scripts', function () {
	wp_dequeue_style( 'classic-theme-styles' );
}, 20 );

// Security: turn off XML-RPC (common brute-force target; we don't use it).
add_filter( 'xmlrpc_enabled', '__return_false' );

// Security: stop user enumeration via ?author=1 and the REST users endpoint for guests.
add_action( 'template_redirect', function () {
	if ( is_author() || isset( $_GET['author'] ) ) {
		wp_safe_redirect( home_url( '/' ), 301 );
		exit;
	}
} );
add_filter( 'rest_endpoints', function ( $endpoints ) {
	if ( ! is_user_logged_in() ) {
		unset( $endpoints['/wp/v2/users'], $endpoints['/wp/v2/users/(?P<id>[\d]+)'] );
	}
	return $endpoints;
} );
