<?php
$single = get_queried_object();
?>

<?php get_template_part('templates/headers/header'); ?>

<?php get_template_part('templates/singles/single', $single->post_type); ?>

<?php get_template_part('templates/footers/footer'); ?>
