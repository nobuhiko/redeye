</div><!-- /#main -->
<?php if(!is_mobile()) get_sidebar(); ?>

<div class="clear"></div><!-- /.cler -->
</div><!-- /#wrap-in -->

</div><!-- /#wrap -->
</div><!-- /#container -->
<div id="footer">
<div id="footer-in">
<div id="gadf">

</div>
<h3><a href="<?php echo home_url(); ?>/">
<?php if (is_home()) : ?>
<?php bloginfo('name'); ?>
<?php else : ?>
<?php wp_title(''); ?>
<?php endif; ?>
</a></h3>

<h4><a href="<?php echo home_url(); ?>/">
<?php bloginfo('description'); ?></a></h4>
<!--このリンクは外す事は禁止しております-->
<p class="stinger"><a href="http://wp-stinger.com" rel="nofollow">WordPress-Theme STINGER3</a></p>
<p class="copy">Copyright &copy; <?php bloginfo('name');?> <?php the_date('Y');?> All Rights Reserved.</p>
</div><!-- /#footer-in -->
</div>
<?php wp_footer(); ?>
<!-- ページトップへ戻る -->
<div id="page-top"><a href="#wrapper">PAGE TOP ↑</a></div>
<!-- ページトップへ戻る　終わり -->

<?php $permalink = (is_home()) ? home_url() : get_permalink(); ?>
<?php if(!is_mobile()):?>
<div id="snsbox">
    <div class="sns">
        <ul class="snsb clearfix">
        <li>
            <a href="https://twitter.com/share" class="twitter-share-button" data-count="vertical" data-via="" data-url="<?php echo $permalink; ?>" data-text="">Tweet</a>
        </li>
        <li>
            <div class="fb-like" data-href="<?php echo $permalink;?>" data-width="70" data-height="62" data-colorscheme="light" data-layout="box_count" data-action="like" data-show-faces="false" data-send="false"></div>
        </li>
        <li>
            <g:plusone size="tall" href="<?php echo $permalink; ?>"></g:plusone></li>
        <li>
            <a href="http://b.hatena.ne.jp/entry/<?php echo $permalink; ?>" class="hatena-bookmark-button" data-hatena-bookmark-title="" data-hatena-bookmark-layout="vertical" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only.gif" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a>
        </li>
        </ul>
    </div>
</div>
<?php endif; ?>
<script type="text/javascript">
(function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js?onload=onLoadCallback';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();
</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>

</body>
</html>
