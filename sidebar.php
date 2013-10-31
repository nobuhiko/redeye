<div id="side">
<div class="sidead">
<?php get_template_part('ad');?>
</div>
<?php get_search_form(); ?>
<div class="kizi02">
<!--最近のエントリ-->
<h4 class="menu_underh2">新着エントリー</h4>
<div class="topnews">
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
</a></span></dt><dd><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><h4><?php the_title(); ?></h4></a>
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

<div id="twibox">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
<?php endif; ?>
</div>
</div><!--/kizi-->
<!--アドセンス-->
<div id="ad1">
<div>
<?php /*get_template_part('scroll-ad'); */?>
<?php if ( function_exists('stats_get_csv') && $top_posts = stats_get_csv('postviews', 'days=7&limit=6') ) : ?>
<h4 class="menu_underh2">今、人気の記事</h4>
<div class="topnews">
<div>
<?php foreach ( $top_posts as $p ) : ?>
<?php if (!($p['post_id'] && get_post($p['post_id']))) continue; ?>
    <dl>
        <dt>
            <span><a href="<?php echo $p['post_permalink']; ?>" title="<?php echo $p['post_title']; ?>">
            <?php if ( has_post_thumbnail($p['post_id']) ): // サムネイルを持っているときの処理 ?>
                <?php echo get_the_post_thumbnail($p['post_id'] ,'thumb100'); ?>
            <?php else: // サムネイルを持っていないときの処理 ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/no-img.png" alt="no image" title="no image" width="100" height="100">
            <?php endif; ?>
            </a></span>
        </dt>
        <dd>
            <a href="<?php echo $p['post_permalink']; ?>" title="<?php echo $p['post_title']; ?>"><h4><?php echo $p['post_title']; ?></h4></a>
            <p><?php echo mb_substr(strip_tags(get_post_field('post_content', $p['post_id'])),0,35).'...'; ?></p>
        </dd>
    </dl>
<?php endforeach; ?>
<p class="motto"></p>
</div>
</div>
<?php endif; ?>
</div>
</div>
</div><!-- /#side -->
