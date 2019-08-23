<?php get_header(); ?>

<div id="container">
  <div id="content">

  <?php if(have_posts()):
    while(have_posts()): the_post(); ?>

    <article <?php post_class(); ?>>

      <h1><?php the_title(); ?></h1>

      <?php the_post_thumbnail('full'); ?>

      <?php the_content(); ?>

      <table>

      <?php
        $mydata = get_post_custom();
        foreach($mydata as $key => $value):
      ?>
        <?php if(!is_protected_meta($key)): ?>
        <tr>
          <th><?php echo $key; ?></th>
          <td><?php echo esc_html($value[0]); ?></td>
        </tr>

        <?php endif; ?>
      <?php endforeach; ?>
      </table>

    </article>

  <?php endwhile; endif; ?>

  </div>
  <div id="menu">
    <aside>
      <h1><a href="<?php echo get_post_type_archive_link('flower'); ?>">　花図鑑</a></h1>
      <ul>
  <?php
    $myposts = get_posts(array(
      'post_type' => 'flower',
      'posts_per_page' => '-1'
    ));
  ?>

  <?php
    if($myposts):
      foreach($myposts as $post):
        setup_postdata($post);
  ?>
        <li>
          <a href="<?php the_permalink(); ?>>"><?php the_title(); ?></a>
        </li>
  <?php
    endforeach;
    wp_reset_postdata();
    endif;
  ?>
      </ul>
    </aside>
  </div>
</div>

  <?php get_footer('nomenu'); ?>
