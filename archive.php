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
<div class="post">
<!--ループ開始-->
<h2>「<?php if( is_category() ) { ?>
<?php single_cat_title(); ?>
<?php } elseif( is_tag() ) { ?>
<?php single_tag_title(); ?>
<?php } elseif( is_tax() ) { ?>
<?php single_term_title(); ?>
<?php } elseif (is_day()) { ?>
日別アーカイブ：<?php echo get_the_time('Y年m月d日'); ?>
<?php } elseif (is_month()) { ?>
月別アーカイブ：<?php echo get_the_time('Y年m月'); ?>
<?php } elseif (is_year()) { ?>
年別アーカイブ：<?php echo get_the_time('Y年'); ?>
<?php } elseif (is_author()) { ?>
投稿者アーカイブ：<?php echo esc_html(get_queried_object()->display_name); ?></h2>
<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
ブログアーカイブ
<?php } ?>」 一覧</h2>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="kizi">
<div class="entry">
<div class="sumbox">

<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
<?php if ( has_post_thumbnail() ): // サムネイルを持っているときの処理 ?>

<?php
$title= get_the_title();
the_post_thumbnail(array( 150,150 ),
array( 'alt' =>$title, 'title' => $title)); ?>
<?php else: // サムネイルを持っていないときの処理 ?>
<img src="<?php echo get_template_directory_uri(); ?>/images/no-img.png" alt="no image" title="no image" width="150" height="150" />
<?php endif; ?>
</a>
</div><!-- /.sumbox -->
<div class="entry-content">
<h3 class="entry-title-ac">  <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
<?php the_title(); ?></a></h3>
<div class="blog_info contentsbox">
<p>
<?php the_time('Y/m/d') ?> | <?php the_category(', ') ?> <?php the_tags('', ', '); ?>
</p></div>  <p class="dami"><?php echo mb_substr(strip_tags($post-> post_content),0,100).'...'; ?></p>
<p class="motto"><a class="more-link" href="<?php the_permalink() ?>">続きを見る</a></p>
</div><!-- .entry-content -->

<div class="clear"></div>
</div>
</div><!--/entry-->

<?php endwhile; else: ?>
    <p>記事がありません</p>
<?php endif; ?>


<div style="padding:20px 0px;">
<?php get_template_part('ad');?>
</div>

<!--ページナビ-->
<?php if (function_exists("pagination")) {
pagination($wp_query->max_num_pages);
} ?>
<!--ループ終了-->
</div><!-- END div.post -->
<?php get_footer(); ?>
