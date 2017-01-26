<article>
  <header class="article-header">
    <h1 class="text-center">Articles</h1>
  </header>

  <main class="container">
    <?php while (have_posts()): the_post(); ?>
    <div class="article-content">
      <h2 class="archive__title"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
      <div class="archive__excerpt"><?php the_excerpt(); ?></div>
    </div>
    <?php endwhile; ?>

    <?php if ($wp_query->max_num_pages > 1): ?>
      <nav id="post-nav">
        <div class="post-previous"><?php next_posts_link(__('&larr; Older posts', '{{ text_domain }}')); ?></div>
        <div class="post-next"><?php previous_posts_link(__('Newer posts &rarr;', '{{ text_domain }}')); ?></div>
      </nav>
    <?php endif; ?>
  </main>
</article>
