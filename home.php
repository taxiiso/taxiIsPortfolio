<?php get_header(); ?>

<body>
  <section class="list">
    <h1 class="list-title"><span>REPORTS</span> 四季の記録</h1>

  <?php if(have_posts()):
    the_post(); ?>

  <?php get_template_part('post', 'large'); ?>

<?php endif; ?>

  <div class="columns">
  <?php if(have_posts()):
    while(have_posts()): the_post(); ?>

  <?php get_template_part('post', 'small'); ?>

  <?php endwhile; endif; ?>
 </div>

  <?php if($wp_query->max_num_pages > 1 ): ?>
    <div class="navlink">
      <span class="navlink-prev">
        <?php next_posts_link('<i class="fas fa-chevron-circle-left"></i> 古い記事') ?>
      </span>
      <span class="navlink-next">
        <?php previous_posts_link('<i class="fas fa-chevron-circle-right

        "></i> 新しい記事') ?>
      </span>
    </div>
  <?php endif; ?>
  </section>

  <?php get_footer(); ?>
