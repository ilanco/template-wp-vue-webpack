<?php
$cpt = isset($post->post_type) ? $post->post_type : '';
?>

<?php get_template_part('templates/headers/header'); ?>

<?php get_template_part('templates/archives/archive', $cpt); ?>

<?php get_template_part('templates/footers/footer'); ?>
