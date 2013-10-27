<?php get_header(); ?>
<div class="kuzu">
<?php /*--- パンくず --- */?>
<div id="breadcrumb">
<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
<a href="<?php echo home_url(); ?>" itemprop="url">
<span itemprop="title">ホーム</span>
</a> &gt;
</div>
<?php /*--- カテゴリーが階層化している場合に対応させる --- */ ?>
<?php $postcat = get_the_category(); ?>
<?php $catid = $postcat[0]->cat_ID; ?>
<?php $allcats = array($catid); ?>
<?php 
while(!$catid==0) {	/* すべてのカテゴリーIDを取得し配列にセットするループ */
    $mycat = get_category($catid); 	/* カテゴリーIDをセット */
    $catid = $mycat->parent; 	/* 上で取得したカテゴリーIDの親カテゴリーをセット */
    array_push($allcats, $catid);
}
array_pop($allcats);
$allcats = array_reverse($allcats);
?>
<?php /*--- 親カテゴリーがある場合は表示させる --- */ ?>
<?php foreach($allcats as $catid): ?>
<div itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
<a href="<?php echo get_category_link($catid); ?>" itemprop="url">
<span itemprop="title"><?php echo get_cat_name($catid); ?></span>
</a> &gt;
</div>
<?php endforeach; ?>
</div>
</div><!--/kuzu-->
<div id="dendo">
</div><!-- /#dendo -->
<div class="post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!--ループ開始-->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="kizi">

<h1 class="entry-title">
<?php the_title(); ?></h1>


<?php the_content(); ?>

<?php wp_link_pages(); ?>
</div>
<div style="padding:20px 0px;">
<?php get_template_part('ad');?>
</div>

<div id="snsbox03">
<div class="sns03">
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
<div class="blog_info contentsbox">
<p>
<?php the_time('Y/m/d') ?> | <?php the_category(', ') ?> <?php the_tags('', ', '); ?>
</p>
</div>    
<div style="padding:20px 0px;">
<?php get_template_part('ad');?>
</div>
<?php endwhile; else: ?>
<p>記事がありません</p>
<?php endif; ?>
<!--ループ終了-->
<div class="kizi02">
<!--関連記事-->
<h4 class="kanren">関連記事</h4>
<div class="sumbox02">
<?php

	$cur_post = $wp_query->get_queried_object();
	$post_cats = get_the_category($cur_post->ID);
	
?>
<div id="topnews">
<div><?php
foreach((get_the_category()) as $cat) {
$cat_id = $cat->cat_ID ;
break ;
}
$query = 'cat=' . $cat_id. '&showposts=5'; //9が表示本数です！
query_posts($query) ;
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<dl><dt>
<?php if ($post->ID == $cur_post->ID) : ?>
 <?php else :?>
<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
<?php if ( has_post_thumbnail() ): // サムネイルを持っているときの処理 ?>
<?php echo get_the_post_thumbnail($post->ID, 'thumb110'); ?>
<?php else: // サムネイルを持っていないときの処理 ?>
<img src="<?php echo get_template_directory_uri(); ?>/images/no-img.png" alt="no image" title="no image" width="110px" />
<?php endif; ?>
</a>
<?php endif; ?>
</dt>
<dd>
<?php if ($post->ID == $cur_post->ID) : ?>
 <?php else :?>
<h4 class="saisin">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
<p class="basui">
  <?php echo mb_substr(strip_tags($post-> post_content),0,35).'...'; ?></p>
<p class="motto"><a href="<?php the_permalink(); ?>">記事を読む</a></p>
<?php endif; ?>
</dd></dl>
<?php endwhile; else: ?>
    <p>記事がありません</p>
<?php endif; ?>
	
<?php wp_reset_query(); ?>
	</div>
</div>
</div>
<!--/関連記事-->

<!--新着記事-->
<h4 class="kanren">新着記事</h4>
<div class="sumbox02">
<div id="topnews">
<div><?php
foreach((get_the_category()) as $cat) {
$cat_id = 0 ;
break ;
}
$query = 'cat=' . $cat_id. '&showposts=5'; //表示本数です
query_posts($query) ;
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<dl><dt>
<?php if ($post->ID == $cur_post->ID) : ?>
 <?php else :?>
<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
<?php if ( has_post_thumbnail() ): // サムネイルを持っているときの処理 ?>
<?php echo get_the_post_thumbnail($post->ID, 'thumb110'); ?>
<?php else: // サムネイルを持っていないときの処理 ?>
<img src="<?php echo get_template_directory_uri(); ?>/images/no-img.png" alt="no image" title="no image" width="110px" />
<?php endif; ?>
</a>
<?php endif; ?>
</dt>
<dd>
<?php if ($post->ID == $cur_post->ID) : ?>
 <?php else :?>
<h4 class="saisin">
<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
<p class="basui">
<?php echo mb_substr(strip_tags($post-> post_content),0,35).'...'; ?></p>
<p class="motto"><a href="<?php the_permalink(); ?>">記事を読む</a></p>
<?php endif; ?>
</dd></dl>
<?php endwhile; else: ?>
    <p>記事がありません</p>
<?php endif; ?>
<?php wp_reset_query(); ?>
</div>
</div>
</div>
</div><!--/kizi-->
<?php comments_template(); ?>
<!--ページナビ-->
<div class="p-navi">
<p>
PREV : <?php previous_post_link('%link', '%title', TRUE, ''); ?><br/>
NEXT : <?php next_post_link('%link', '%title', TRUE, ''); ?></p>
</div>
</div><!-- END div.post -->
<?php get_footer(); ?>
