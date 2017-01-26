<?php

add_theme_support('post-thumbnails');
add_theme_support('menus');

if (function_exists('add_image_size')) {
    add_image_size('square', 350, 350, true);
}

/**
 * Menu register
 */
register_nav_menus([
    'main' => __('Primary Navigation')
]);

/**
 * Asset discovery
 *
 * @param $filename
 * @return string
 */
function asset_path($file)
{
    static $manifest;

    $manifestPath = get_template_directory() . '/dist/assets.json';

    if (!$manifest) {
        $manifest = file_exists($manifestPath) ? json_decode(file_get_contents($manifestPath), true) : [];
    }

    $filePathInfo = pathinfo($file);
    $fileExtention = $filePathInfo['extension'];
    $filePath = $filePathInfo['dirname'] . '/' . $filePathInfo['filename'];

    if (isset($manifest[$filePath][$fileExtention])) {
        $file = $manifest[$filePath][$fileExtention];

        $uri = get_template_directory_uri() . "/dist/$file";
    } else {
        $uri = WEBPACK_DEV_URL . "/assets/$file";
    }

    return (string) $uri;
}

/**
 * Text manipulation
 */
function excerpt($limit)
{
    $excerpt = explode(' ',  strip_images(get_the_content()), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
    echo $excerpt;
}

function truncate($text, $limit)
{
    $newtext = explode(' ',$text, $limit);
    if (count($newtext)>=$limit) {
        array_pop($newtext);
        $newtext = implode(" ",$newtext).'...';
    } else {
        $newtext = implode(" ",$newtext);
    }
    $newtext = preg_replace('`\[[^\]]*\]`','',$newtext);
    echo $newtext;
}

function strip_images($content)
{
    return preg_replace('/<img[^>]+./','',$content);
}

/**
 * Remove menu items
 */
function my_remove_menu_pages()
{
    remove_menu_page('link-manager.php');
    remove_menu_page('edit-comments.php');

    if (!current_user_can('administrator')) {
        remove_menu_page('edit.php?post_type=acf');
        remove_menu_page('tools.php');
    }
}
add_action('admin_menu', 'my_remove_menu_pages');

/**
 * Remove Dashboard Widgets
 */
function remove_dashboard_widgets()
{
    global $wp_meta_boxes;

    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets');

/**
 * Remove WP SEO Colums
 */
add_filter('wpseo_use_page_analysis', '__return_false');

/**
 * Remove wpseo from slideshow 100%
 */
function template_wp_vue_webpack_remove_metabox()
{
    remove_meta_box('wpseo_meta', 'slideshow', 'normal');
}
add_action('add_meta_boxes', 'template_wp_vue_webpack_remove_metabox', 11);

/**
 * Remove Commenst from tables
 */
function remove_pages_count_columns($defaults)
{
    unset($defaults['comments']);
    return $defaults;
}
add_filter('manage_pages_columns', 'remove_pages_count_columns');

function remove_posts_count_columns($defaults)
{
    unset($defaults['comments']);
    return $defaults;
}
add_filter('manage_posts_columns', 'remove_posts_count_columns');

// Remove the REST API endpoint.
remove_action('rest_api_init', 'wp_oembed_register_route');

// Turn off oEmbed auto discovery.
add_filter('embed_oembed_discover', '__return_false');

// Don't filter oEmbed results.
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

// Remove oEmbed discovery links.
remove_action('wp_head', 'wp_oembed_add_discovery_links');

// Remove oEmbed-specific JavaScript from the front-end and back-end.
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

// Remove all embeds rewrite rules.
add_filter('xmlrpc_enabled', '__return_false');
add_filter('xmlrpc_methods', 'remove_xmlrpc_pingback_ping');

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function stop_loading_wp_embed_and_jquery()
{
    if (!is_admin()) {
        wp_deregister_script('wp-embed');
        wp_deregister_script('jquery');
    }
}
add_action('admin_enqueue_scripts', 'stop_loading_wp_embed_and_jquery');

function remove_xmlrpc_pingback_ping($methods)
{
    unset($methods['pingback.ping']);
    return $methods;
}
