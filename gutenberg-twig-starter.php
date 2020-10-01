<?php
/**
 * Plugin Name: Gutenberg Twig Boilerplate
 * Plugin URI: 
 * Description: 
 * Author: Alex Woollam (alex.woollam@proagrica.com)
 * Author URI: 
 * Version: 0.0.1
 *
 * @package GBlock
 */

 // Disable direct access.
 if ( ! defined( 'ABSPATH' ) ){
     exit;
 }
 
/**
 * Define global constants.
 *
 * @since 1.0.0
 */
// Plugin version.
if ( ! defined( 'BLOCK_VERSION' ) ) {
	define( 'BLOCK_VERSION', '1.0.0' );
}

if ( ! defined( 'BLOCK_NAME' ) ) {
	define( 'BLOCK_NAME', trim( dirname( plugin_basename( __FILE__ ) ), '/' ) );
}

if ( ! defined( 'BLOCK_DIR' ) ) {
    $str = str_replace( BLOCK_NAME, "", __DIR__ );
	define( 'BLOCK_DIR', $str . BLOCK_NAME );
}

if ( ! defined( 'BLOCK_URL' ) ) {
    $url = str_replace( 'wordpress', "", get_site_url() );
	$url .= 'content/mu-plugins/';
	define( 'BLOCK_URL', $url . BLOCK_NAME );
}

/**
 * We need autoload as we are using namespace.
 */
require_once( BLOCK_DIR . '/vendor/autoload.php' );

/**
 * We suggest concider using the single block per plugin method, unless directly relational.
 */
require_once( BLOCK_DIR . '/block/index.php' );