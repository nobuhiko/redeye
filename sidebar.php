<div id="side">
    <div class="sidead">
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- 300×250 -->
    <ins class="adsbygoogle"
    style="display:inline-block;width:300px;height:250px"
    data-ad-client="ca-pub-2613386057502929"
    data-ad-slot="2513034638"></ins>
    <script>
    (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    </div>
    <?php get_search_form(); ?>
    <div class="kizi02">
        <?php get_template_part('new-entry');?>

        <div id="twibox">
            <?php if (is_active_sidebar(1)) dynamic_sidebar(1); ?>
        </div>
    </div><!--/kizi-->
    <!--アドセンス-->
    <div id="ad1">
        <div>
            <?php /*get_template_part('scroll-ad'); */?>
            <?php get_template_part('popular-entry');?>
        </div>
    </div>
</div><!-- /#side -->
