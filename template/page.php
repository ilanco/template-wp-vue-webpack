<?php
$thePage = get_queried_object();
?>

<?php get_template_part('templates/headers/header'); ?>

<?php get_template_part('templates/pages/page', $thePage->post_name); ?>

<?php get_template_part('templates/footers/footer'); ?>
