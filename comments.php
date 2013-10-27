<?php //以下は削除しないでください。
if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');

if (!empty($post->post_password)) { //投稿にパスワードがかかっている場合
if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) { //さらに、パスワードとCookieが一致しない場合 ?>
<p class="nocomments">この投稿はパスワードで保護されています。コメントを見るには、パスワードを入力してください。<p>
<?php return; 
}
}
?>
<div id="comments">
<h3 id="respond">コメント/トラックバック <?php comments_number('', '（1件）', '（%件）' );?></h3>

<?php if (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) : //コメントのみクローズ ?>
  <p>現在、この投稿へのコメントは受け付けていません。</p>

<?php elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) : //トラックバックのみクローズ ?>
  <p>現在、この投稿へのトラックバックは受け付けていません。</p>

<?php elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) : //コメント・トラックバックともにクローズ ?>
  <p>現在、この投稿へのコメント/トラックバックは受け付けていません。</p>
<?php endif ?>

<?php if ('open' == $post->ping_status) : //トラックバックがオープン ?>
  <p>トラックバック用URL：</p>
  <input type="text" value="<?php trackback_url(true); ?>" readonly="readonly" id="trackbackurl" size="50" />
<?php endif; ?>

<?php if (('open' == $post-> comment_status) || ('open' == $post->ping_status)) : //コメント・トラックバックどちらか1つでもオープン ?>
  <p><?php post_comments_feed_link(); ?></p>
<?php endif ?>

<?php if ($comments) : //投稿コメントがある場合 ?>
  <ol id="commentlist">
    <?php foreach ($comments as $comment) : //各コメントを開始 ?>
    <li id="comment-<?php comment_ID() ?>" class="commentcontent">
    <?php edit_comment_link('コメントを編集','<p><strong>','</strong></p>'); ?>

      <?php if ($comment->comment_approved == '0') : //承認待ちコメントの場合 ?>
      <p class="note"><strong>このコメントは、現在管理人の承認待ちです。</strong></p>
      <?php endif; ?>
      
      <?php echo get_avatar($comment, '40'); //アバター画像を表示させる ?> 
      <?php comment_text(); //コメント本文 ?>
      <dl class="metadata">
        <dt>投稿日時：</dt>
        <dd><a href="#comment-<?php comment_ID() ?>"><?php comment_date('Y.m.j') ?> ＠ <?php comment_time() ?></a></dd>
        <dt>投稿者：</dt>
        <dd class="last"><?php comment_author_link() ?></dd>
      </dl>
    </li>
    <?php endforeach;  //各コメントを終了 ?>
  </ol>
<?php else : //コメントがまだない場合 ?>
<?php endif; //コメントがあるかどうかの判断を終了 ?>
<?php if ('open' == $post->comment_status) : //コメントがオープンなら、以下からのコメントフォームを表示 ?>
  <?php if ( get_option('comment_registration') && !$user_ID ) : //コメントするにはメンバー登録が必要で、ログインしていない場合 ?>
  <p>コメントを投稿するには、<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">ログイン</a>が必要です。</p>
  <?php else : ?>
  <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform"><!-- フォーム開始 -->

  <?php if ( $user_ID ) : //もしログインしている場合 ?>
  <p>現在あなたは「<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>」としてログインしています。<br />
  <strong><a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout">ログアウトする &raquo;</a></strong></p>
  <?php else : ログインしていない場合 ?>
  <p>
    <label for="author">お名前<?php if ($req) _e('(required)'); ?></label><br/>
    <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" size="25" />
  </p>

  <p>
    <label for="email">メールアドレス<?php if ($req) _e('(required)'); ?></label><br/>
    <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" size="25" />
   <br/> <sub>管理人にのみ公開されます</sub>
  </p>
<?php endif; ?>
  <p><textarea name="comment" id="comment" cols="45" rows="10" tabindex="4"></textarea></p>
<div style="text-align:center; margin:10px">
  <p class="submitbutton"><input name="submit" type="submit" id="submit" class="button" tabindex="5" value="コメントを投稿" />
  <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p></div>
  <?php do_action('comment_form', $post->ID); ?>
  </form>
<?php endif; //コメントが投稿できるかどうかの判断を終了 ?>
<?php endif; //コメントがオープンかどうかの判断を終了 ?>
</div><!-- END div#comments -->

<!-- X:S ZenBackWidget --><script type="text/javascript">document.write(unescape("%3Cscript")+" src='http://widget.zenback.jp/?base_uri=http%3A//nob-log.info&nsid=111935142657809798%3A%3A111935150442471907&rand="+Math.ceil((new Date()*1)*Math.random())+"' type='text/javascript'"+unescape("%3E%3C/script%3E"));</script><!-- X:E ZenBackWidget -->
