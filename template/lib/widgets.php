<?php

// Register Sidebar
function single_sidebar()
{
    $args = array(
        'id' => 'single_sidebar',
        'name' => __('Single page Sidebar', '{{ text_domain }}'),
        'description' => __('Single page Sidebar', '{{ text_domain }}'),
        'class' => 'widget',
        'before_title' => '<header class="widget__header heading-background"><h2 class="widget__title">',
        'after_title' => '</h4></header>',
        'before_widget' => '<aside id="%1$s" class="sidebar__widget">',
        'after_widget' => '</aside>',
    );
    register_sidebar($args);
}

// Hook into the 'widgets_init' action
add_action('widgets_init', 'single_sidebar');
