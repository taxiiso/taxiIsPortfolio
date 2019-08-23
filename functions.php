<?php

// コンテンツの横幅
if (!isset($content_width)){
  if(is_mysmartphone()){
    $content_width = 300;
  }else{
  $content_width = 840;
  }
}

// デフォルトスクリプト
function my_scripts(){
  if(is_single()){
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'my_scripts');

// 概要の文字数
function my_length($length){
  if(is_mysmartphone()){
    return 25;
  }else{
  return 100;
  }
}

add_filter('excerpt_mblength', 'my_length');

// 概要（抜粋）の省略記号
function my_more($more){
  return '…';
}

add_filter('excerpt_more', 'my_more');

// アイキャッチ画像
add_theme_support('post-thumbnails');

// ウィジェット
register_sidebar( array(
  'id' => 'column01',
  'name' => 'フッターカラム01',
  'description' => '1段目に表示するウィジェットを指定。',
  'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  'after_widget' => '</aside>',
  'before_title' => '<h1 class="widgettitle">',
  'after_title' => '<h1>'
));

register_sidebar( array(
  'id' => 'column02',
  'name' => 'フッターカラム02',
  'description' => '2段目に表示するウィジェットを指定。',
  'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  'after_widget' => '</aside>',
  'before_title' => '<h1 class="widgettitle">',
  'after_title' => '<h1>'
));

register_sidebar( array(
  'id' => 'column03',
  'name' => 'フッターカラム03',
  'description' => '3段目に表示するウィジェットを指定。',
  'before_widget' => '<aside id="%1$s" class="widget %2$s">',
  'after_widget' => '</aside>',
  'before_title' => '<h1 class="widgettitle">',
  'after_title' => '<h1>'
));

// 検索フォーム
add_theme_support('html5', array('search-form'));

// メインクエリの変更
function my_query($query) {
  if(is_admin() || !$query->is_main_query()){
    return;
  }

  if($query->is_home()) {
    $query->set('posts_per_page','7');
  }
}

add_action('pre_get_posts', 'my_query');

// カスタムメニュー
register_nav_menu('navigation', 'ナビゲーション');

// 個別ページの「抜粋」機能を有効化
function my_excerpt(){
  add_post_type_support('page', 'excerpt');
}
add_action('init', 'my_excerpt');

// カスタムヘッダー
add_theme_support('custom-header',array(
  'width' => 1600,
  'height' => 700,
  'default-image' => '%s/header.jpg',
  'header-text' => false,
  'wp-head-callback' => 'my_header_style'
));

function my_header_style(){
  if(is_front_page() && get_header_image()){
?>

<style>
.message {
  background-size: cover;
  background-image: url(<?php header_image(); ?>);
  background-repeat: no-repeat;
  background-position: 50% 0;
  background-color: #2f2e0a;
  border-bottom: none;
}
</style>

<?php
 }
}

// スマートフォンの判別
function is_mysmartphone(){

  $ua = $_SERVER['HTTP_USER_AGENT'];

  if(
    (strpos($ua, 'Android') && strpos($ua, 'Mobile'))
    || strpos($ua, 'iPhone')
    || strpos($ua, 'Windows Phone')
    ){
    return true;
  }else{
    return false;
  }
}

// カテゴリータクソノミー
function my_taxonomy() {
  register_taxonomy(
    'area',
    'post',
    array(
      'label' => 'エリア',
      'hierarchical' => true,
      'show_admin_column' => true
    )
  );
}

add_action('init', 'my_taxonomy');

// エリアウィジェット
class my_area_widget extends WP_Widget {
  function my_area_widget(){
    $this->WP_Widget(
    'my_area_menu',
    'エリア',
    array('description' => 'エリアのカテゴリーメニュー')
    );
  }

  function widget($args, $instance){
  ?>

  <aside>
    <h1>エリア</h1>
    <ul>
  <?php wp_list_categories(array(
    'taxonomy' => 'area',
    'title_li' => ''
  )); ?>
    </ul>
  </aside>

  <?php
  }
}

function my_register_widget(){
  register_widget('my_area_widget');
}

add_action('widgets_init','my_register_widget');

// 記事の自動整形を無効化
remove_filter('the_content', 'wpautop');

// 抜粋の自動整形を無効化
remove_filter('the_excerpt', 'wpautop');

/* フィード */
add_theme_support('automatic-feed-links');

// 管理バーの表示
show_admin_bar( true );
