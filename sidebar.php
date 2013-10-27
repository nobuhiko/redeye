<div id="side">
<div class="sidead">
<?php get_template_part('ad');?>
</div>
<?php get_search_form(); ?>
<div class="kizi02">
<!--最近のエントリ-->     
<h4 class="menu_underh2">NEW ENTRY</h4>
<div id="topnews">
<div><?php
foreach((get_the_category()) as $cat) {
$cat_id = 0;
break ;
}$cat_id = NULL;
$query = 'cat=' . $cat_id. '&showposts=5'; //表示本数
query_posts($query) ;
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<dl><dt><span><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
<?php if ( has_post_thumbnail() ): // サムネイルを持っているときの処理 ?>
<?php the_post_thumbnail('thumb100'); ?>
<?php else: // サムネイルを持っていないときの処理 ?>
<img src="<?php echo get_template_directory_uri(); ?>/images/no-img.png" alt="no image" title="no image" width="100" height="100">
<?php endif; ?>
</a></span></dt><dd><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
<p><?php echo mb_substr(strip_tags($post-> post_content),0,35).'...'; ?></p>
</dd>
</dl>
<?php endwhile; else: ?>
<p>記事がありません</p>
<?php endif; ?>
<?php wp_reset_query(); ?>
<p class="motto">
<a href="<?php echo home_url(); ?>/">→もっと見る</a></p>
</div>
</div>
 <!--/最近のエントリ--> 
<div id="twibox">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
<?php endif; ?>
</div>
</div><!--/kizi-->
<!--アドセンス-->
<div id="ad1"> 
<div style="text-align:center;">
<?php get_template_part('scroll-ad');?>
</div>    
</div>
</div><!-- /#side -->
