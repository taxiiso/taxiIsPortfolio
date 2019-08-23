<?php get_header(); ?>

  <?php if(have_posts()):
    while(have_posts()): the_post(); ?>

    <article <?php post_class(); ?>>

      <h1><?php the_title(); ?></h1>

      <div class="postinfo">
        <a href="<?php echo get_month_link(get_the_date('Y'), get_the_date('m')); ?>">
          <time datetime="<?php echo get_the_date('C'); ?>">
            <?php echo get_the_date(); ?>
          </time>
        </a>
    <?php if(has_category()): ?>
        <span><i class="fas fa-folder-open"></i><?php the_category(', ')?></span>
    <?php endif; ?>

    <?php the_tags('<span><i class="fas fa-tag"></i>', ', ', '</span>'); ?>

    <?php
      the_terms(
        $post->ID,
        'area',
        '<span><i class="fas fa-map-marker-alt"></i>',
        ',',
        '</span>'
      );
    ?>

      </div>

      <?php the_content(); ?>

      <div class="navlink">
        <span class="navlink-prev">
          <?php previous_post_link('%link', '<i class="fas fa-chevron-circle-left"></i> %title'); ?>
        </span>

        <span class="navlink-next">
          <?php next_post_link('%link', '%title <i class="fas fa-chevron-circle-right"></i>'); ?>
        </span>
      </div>

      <?php comments_template(); ?>

    </article>

  <?php endwhile; endif; ?>

  <?php get_footer(); ?>
