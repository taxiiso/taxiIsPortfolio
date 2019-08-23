<?php get_header(); ?>

<body>
  <section class="list">
    <h1 class="list-title"><span>検索結果：</span> <?php echo get_search_query(); ?></h1>
    <?php echo category_description(); ?>

  <?php if(have_posts()):
    while(have_posts()): the_post(); ?>

  <?php get_template_part('post', 'medium'); ?>

<?php endwhile; else: ?>

  <div class="noresult">
  <p>検索キーワードと一致する記事が見つかりません。<br>
     別のキーワードで検索してください。</p>
<?php get_search_form(); ?>
  </div>

<?php endif; ?>

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
