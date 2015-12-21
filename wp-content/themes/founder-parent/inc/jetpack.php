<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Founder Parent
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function founder_parent_jetpack_setup() {

add_theme_support( 'jetpack-testimonial' );

add_theme_support( 'site-logo', array(
        'header-text' => array(
        'site-title',
        'site-description',
           )
      ) );

}

add_action( 'after_setup_theme', 'founder_parent_jetpack_setup' );


