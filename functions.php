<?php

function theme_enqueue_styles() {
	/* Stylesheet */
	wp_enqueue_style(
		'theme-style',
		get_stylesheet_uri(),
		array(),
		filemtime( get_stylesheet_directory() . '/style.css' )
	);
	/* Scripts */
	wp_enqueue_script(
		'theme-script',
		get_stylesheet_directory_uri() . '/scripts.js',
		array(),
		filemtime( get_stylesheet_directory() . '/scripts.js' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

// Alle Core-Patterns entfernen
add_action('init', function() {
    remove_theme_support('core-block-patterns');
    
    // Query Loop Patterns einzeln entfernen
    unregister_block_pattern('core/query-standard-posts');
    unregister_block_pattern('core/query-medium-posts');
    unregister_block_pattern('core/query-small-posts');
    unregister_block_pattern('core/query-grid-posts');
    unregister_block_pattern('core/query-large-title-posts');
    unregister_block_pattern('core/query-offset-posts');
}, 15);

// Core Pattern Kategorien löschen
add_action('init', 'themeslug_unregister_pattern_categories');

function themeslug_unregister_pattern_categories() {
    unregister_block_pattern_category('featured');
    unregister_block_pattern_category('about');
    unregister_block_pattern_category('audio');
    unregister_block_pattern_category('banner');
    unregister_block_pattern_category('buttons');
    unregister_block_pattern_category('call-to-action');
    unregister_block_pattern_category('columns');
    unregister_block_pattern_category('contact');
    unregister_block_pattern_category('footer');
    unregister_block_pattern_category('gallery');
    unregister_block_pattern_category('header');
    unregister_block_pattern_category('media');
    unregister_block_pattern_category('portfolio');
    unregister_block_pattern_category('posts');
    unregister_block_pattern_category('query');
    unregister_block_pattern_category('services');
    unregister_block_pattern_category('team');
    unregister_block_pattern_category('testimonials');
    unregister_block_pattern_category('text');
		unregister_block_pattern_category('videos');
}

// Pattern Kategorien erstellen
add_action('init', function() {
    register_block_pattern_category('hero', [
        'label' => 'Hero'
    ]);
    
    register_block_pattern_category('vorteile', [
        'label' => 'Vorteile'
    ]);
    
    register_block_pattern_category('cta', [
        'label' => 'CTA'
    ]);
});