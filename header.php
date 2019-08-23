<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php wp_title('-', true, 'right'); ?><?php bloginfo('name'); ?></title>
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <link href="https://fonts.googleapis.com/css?family=Chango" rel="stylesheet">
  <link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon">
  <link rel="icon" href="/favicon.ico" type="image/vnd.microsoft.icon">
  <link rel="apple-touch-icon" type="image/png" href="/apple-touch-icon-180x180.png">
  <link rel="icon" type="image/png" href="/icon-192x192.png">


<?php if(is_mysmartphone()): ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style-smartphone.css" media = "(max-width: 899px)">
<?php endif; ?>

  <script src="https://kit.fontawesome.com/b5163ed146.js"></script>


<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
  <header>
    <h1>
      <a href="<?php home_url(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/logo.png" alt="">
<?php bloginfo('name'); ?>
      </a>
    </h1>

<?php wp_nav_menu(array(
  'theme_location' => 'navigation',
  'container' => 'nav'
)); ?>

  </header>
