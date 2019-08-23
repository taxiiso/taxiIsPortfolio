<?php get_header(); ?>

<section class="message">

<?php
  if(have_posts()):
    while(have_posts()): the_post();
?>
  <h1><?php the_title(); ?></h1>
  <?php the_content(); ?>
<?php endwhile; endif; ?>

</section>

<section class="pickup list">

  <div class="pickup-news">
    <h1 id="aboutme" class="pickup-title"><i class="fas fa-user"></i> ABOUT ME</h1>
    <div class="pickup-content">
      <div class="pickup-image">
        <img src="<?php echo get_template_directory_uri(); ?>/face.png" alt="" >

      </div>
      <div class="pickup-sentence">
  <?php
    $mynews = get_post_field('post_content', '65');
    $mynews = wp_kses($mynews, 'data');
    $mynews = wpautop($mynews);
    echo $mynews;
  ?>
      </div>
    </div>
  </div>

  <div class="pickup-news">
    <h1 class="pickup-title"><i class="fas fa-laptop-code"></i> SKILL</h1>
    <div class="pickup-content pickup-skill">
      <div class="skill-first">
        <p>HTML</p>
        <div class="graph">
          <span class="bar" style="width: 40%;">スクール</span>
        </div>
        <p>CSS</p>
        <div class="graph">
          <span class="bar" style="width: 40%;">スクール</span>
        </div>
        <p>jQuery(javascript)</p>
        <div class="graph">
          <span class="bar" style="width: 40%;">スクール</span>
        </div>
        <p>WordPress</p>
        <div class="graph">
          <span class="bar" style="width: 40%;">スクール</span>
        </div>
        <p>Photoshop</p>
        <div class="graph">
          <span class="bar" style="width: 20%; background: #87CEFA;">独学</span>
        </div>
      </div>
      <div class="skill-second">
        <p>PHP</p>
        <div class="graph">
          <span class="bar" style="width: 40%;">スクール</span>
        </div>
        <p>MySQL</p>
        <div class="graph">
          <span class="bar" style="width: 40%;">スクール</span>
        </div>
        <p>Apache</p>
        <div class="graph">
          <span class="bar" style="width: 40%;">スクール</span>
        </div>
        <p>excel</p>
        <div class="graph">
          <span class="bar" style="width: 20%; background: #87CEFA;">独学</span>
        </div>
        <p>powerpoint</p>
        <div class="graph">
          <span class="bar" style="width: 20%; background: #87CEFA;">独学</span>
        </div>
      </div>

    </div>
  </div>

  <div class="pickup-news">
    <h1 class="pickup-title"><i class="far fa-address-card"></i> CERTIFICATION</h1>
    <div class="pickup-content">
      <ul>
        <li>サーティファイ　Webクリエイター能力認定試験エキスパート</li>
      </ul>
    </div>
  </div>

  <div class="pickup-studio">
    <h1 id="works" class="pickup-title">
      <i class="fas fa-cogs"></i>
       WORKS</h1>
  <?php $myposts = get_posts(array(
    'post_type' => 'page',
    'post_per_page' => '-1',
    'post__in' => array(48,44,46),
    'orderby' => 'post__in'
  )); ?>

    <div class="columns">

    <?php if($myposts):
      foreach($myposts as $post):
        setup_postdata($post); ?>

        <?php get_template_part('post', 'small'); ?>

    <?php endforeach;
    wp_reset_postdata();
    endif; ?>

    </div>
  </div>

  <div class="pickup-news">
    <h1 id="contact" class="pickup-title"><i class="far fa-envelope"></i> CONTACT</h1>
    <div class="pickup-content">
      <p>何かございましたら、お問合せフォームまたはTwitterのDMにてお気軽にご連絡ください。</p>
      <div class="icon-box">
        <div class="mail-icon">
          <a href="https://taxi-world.work/contact-form"><i class="fas fa-envelope"></i></a>
        </div>
        <div class="twitter-icon">
          <a href="https://twitter.com/taxiiso" target="_blank"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
    </div>
  </div>

</section>

<?php get_footer('nomenu'); ?>
