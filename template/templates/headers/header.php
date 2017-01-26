<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Accept-CH" content="DPR, Viewport-Width, Width">
  <meta http-equiv="x-dns-prefetch-control" content="on">

  <title><?php wp_title(''); ?></title>

  <link rel="dns-prefetch" href="//res.cloudinary.com">
  <link rel="dns-prefetch" href="//use.typekit.net">
  <link rel="dns-prefetch" href="//connect.facebook.net">
  <link rel="dns-prefetch" href="//www.google-analytics.com">

  <?php wp_head(); ?>
</head>

<body>

<?php require_once locate_template('/lib/snippets/ga.php'); ?>
<?php require_once locate_template('/lib/snippets/facebook-init.php'); ?>
<?php require_once locate_template('/lib/snippets/fonts.php'); ?>

<header class="site-header">
  <div class="container">
    <a href="<?php echo get_bloginfo('url'); ?>" class="site-logo">
      <img src="" alt="Logo alt" class="site-logo__img">
      <?php if (is_front_page()): ?><h1 class="site-logo__title">{{ title }}</h1><?php endif; ?>
    </a>

    <nav class="responsive-nav" id="js-responsive-nav">
      <div class="site-nav__main">
      <?php if (has_nav_menu('main')) {
        wp_nav_menu([
          'theme_location' => 'main',
          'container' => 'ul',
          'depth' => 2,
          'menu_class' => 'menu-list',
          'walker' => new Primary_Walker_Nav_Menu()
        ]);
      }; ?>
      </div>
    </nav>
  </div>
</header>

<script>
(function() {
  var responsiveNav = document.getElementById('js-responsive-nav');

  if (responsiveNav.addEventListener) {
    responsiveNav.addEventListener('click', function() {
      responsiveNav.classList.toggle("is-open");
    });
  }else {
    responsiveNav.attachEvent("onclick", function() {
      responsiveNav.classList.toggle("is-open");
    });
  }
})();
</script>
