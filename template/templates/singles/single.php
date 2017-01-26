<article class="container">
  <?php while (have_posts()): the_post(); ?>

  <?php
    if ('' != get_the_post_thumbnail()) {
      $src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full-size');
      $img = $src[0];
    } else {
      $img = "http://lorempixel.com/g/800/400/abstract/Post%20thumbnail%20placeholder/";
    };
  ?>
  <header class="article-header" style="background-image:url('<?php echo $img; ?>')">
    <h1 class="text-center"><?php echo get_the_title(); ?></h1>
  </header>

  <main class="container">
    <div class="article-content">
      <?php the_content(); ?>

      <?php get_template_part('templates/modules/social'); ?>
    </div>
  </main>

  <?php endwhile; ?>
</article>
