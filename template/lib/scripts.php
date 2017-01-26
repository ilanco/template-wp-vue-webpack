<?php

add_action('wp_enqueue_scripts', function() {
  // styles
  wp_register_style('styles/main', asset_path('styles/main.css') , false, null);
  wp_enqueue_style('styles/main');
}, 2);

add_action('wp_enqueue_scripts', function() {
  // JS
  wp_register_script('scripts/vendor', asset_path('scripts/vendor.js'), ['jquery'], true, true);
  wp_register_script('scripts/styles/main', asset_path('styles/main.js'), ['jquery', 'scripts/vendor'], true, true);
  wp_register_script('scripts/main', asset_path('scripts/main.js'), ['jquery', 'scripts/vendor', 'scripts/styles/main'], true, true);
  wp_enqueue_script('scripts/main');
}, 99);
