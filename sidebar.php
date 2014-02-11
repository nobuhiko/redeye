<div id="side">
    <div class="sidead">
        <?php get_template_part('ad');?>
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
