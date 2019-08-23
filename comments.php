<?php if (have_comments()) : ?>
<div id="comments">
  <h3>Comments</h3>

  <ul>
  <?php

  // コメントリストの変更
  $args = array(
    // HTML5でマークアップする
  	'format' => 'html5'
  );

  wp_list_comments($args);

  ?>
  </ul>

</div>
<?php endif; ?>

<?php

// コメントフィールドの変更
$comment_args = array(
  // 返信セクションのタイトル変更
  'title_reply' => 'leave a comment',
  // 送信ボタンのタイトルを変更
  'label_submit' => '送信',
  // 出力をHTML5にする
  'format' => 'html5'
);

comment_form($comment_args);

?>
