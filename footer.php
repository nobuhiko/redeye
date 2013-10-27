</div><!-- /#main -->
<?php get_sidebar(); ?>

<div class="clear"></div><!-- /.cler -->
</div><!-- /#wrap-in -->

</div><!-- /#wrap -->
</div><!-- /#container -->
<div id="footer">
<div id="footer-in">
<div id="gadf">

</div>
<h3><a href="<?php echo home_url(); ?>/"><?php wp_title(''); ?></a></h3>
  <h4><a href="<?php echo home_url(); ?>/">
<?php bloginfo('description'); ?></a></h4>     
<!--このリンクは外す事は禁止しております-->
<p class="stinger"><a href="http://wp-stinger.com">WordPress-Theme STINGER3</a></p>
<p class="copy">Copyright&copy; <?php bloginfo('name');?>,<?php the_date('Y');?> All Rights Reserved.</p>
</div><!-- /#footer-in -->
</div>
<?php wp_footer(); ?>
<!-- ページトップへ戻る -->
<div id="page-top"><a href="#wrapper">PAGE TOP ↑</a></div>

<!-- ページトップへ戻る　終わり -->
<!---js切り替え--->
<?php 
if(strpos($_SERVER['HTTP_USER_AGENT'],'ipod')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'iPhone')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'Windows Phone')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'Android')!==false){
?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/smartbase.js"></script>
<?php 
}else{
?>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/base.js"></script>
<?php
}
?>

<?php if (is_home()) { ?>

<div id="snsbox">
<div class="sns">

<ul class="snsb clearfix">
<li>
<a href="https://twitter.com/share" class="twitter-share-button" data-count="vertical" data-via="" data-url="<?php echo home_url(); ?>" data-text="<?php bloginfo('name'); ?>">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
</li>
<li>
<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo home_url(); ?>&amp;layout=box_count&amp;show_faces=false&amp;width=50&amp;action=like&amp;colorscheme=light&amp;height=62" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:70px; height:62px;" allowTransparency="true"></iframe>
</li>
<li><script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><g:plusone size="tall" href="<?php echo home_url(); ?>"></g:plusone></li>
<li>
<a href="http://b.hatena.ne.jp/entry/<?php echo home_url(); ?>" class="hatena-bookmark-button" data-hatena-bookmark-title="<?php bloginfo('name'); ?>" data-hatena-bookmark-layout="vertical" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only.gif" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
</li>
</ul>
</div>
</div>

<?php } else { ?>
<div id="snsbox">
<div class="sns">

    <ul class="snsb clearfix">
<li>
<a href="https://twitter.com/share" class="twitter-share-button" data-count="vertical" data-via="" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
</li>
<li>
<iframe src="http://www.facebook.com/plugins/like.php?href=<?php the_permalink(); ?>&amp;layout=box_count&amp;show_faces=false&amp;width=50&amp;action=like&amp;colorscheme=light&amp;height=62" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:70px; height:62px;" allowTransparency="true"></iframe>
</li>
<li><script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><g:plusone size="tall" href="<?php the_permalink(); ?>"></g:plusone></li>
<li>
<a href="http://b.hatena.ne.jp/entry/<?php the_permalink(); ?>" class="hatena-bookmark-button" data-hatena-bookmark-title="<?php the_title(); ?>｜<?php bloginfo('name'); ?>" data-hatena-bookmark-layout="vertical" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only.gif" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
</li>
</ul>

</div>
</div>
<?php } ?>

</body>
</html>
