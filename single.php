<?php get_header(); ?>
<div class="kuzu">
<?php /*--- パンくず --- */?>
<?php if ( function_exists( 'bread_crumb' ) ) { bread_crumb(); } ?>
</div><!--/kuzu-->
<div class="post" id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemtype="http://schema.org/BlogPosting">
<!--ループ開始-->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="kizi">

<h1 itemprop="name" class="entry-title"><a itemprop="url" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

<div class="blogbox">
<p>
<span class="kdate">公開日：<time class="entry-date" datetime="<?php the_time('c') ;?>"><?php the_time('Y/m/d') ;?></time>
<?php if ($mtime = get_mtime('Y/m/d')) echo ' 最終更新日：' , $mtime; ?>
</span>
</p>
</div>

<div itemprop="articleBody">
<?php the_content(); ?>
</div>

<?php /*wp_link_pages();*/ ?>
</div>
<div style="padding:20px 0px;">
<?php get_template_part('ad');?>
</div>

<div id="snsbox03">
<div class="sns03">
<ul class="snsb clearfix">
<li><a href="https://twitter.com/share" class="twitter-share-button" data-count="vertical" data-via="" data-url="<?php the_permalink(); ?>" data-text="<?php the_title(); ?>">Tweet</a></li>
<li><div class="fb-like" data-href="<?php the_permalink();?>" data-width="70" data-height="62" data-colorscheme="light" data-layout="box_count" data-action="like" data-show-faces="false" data-send="false"></div></li>
<li></script><g:plusone size="tall" href="<?php the_permalink(); ?>"></g:plusone></li>
<li><a href="http://b.hatena.ne.jp/entry/<?php the_permalink(); ?>" class="hatena-bookmark-button" data-hatena-bookmark-title="<?php the_title(); ?>｜<?php bloginfo('name'); ?>" data-hatena-bookmark-layout="vertical" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only.gif" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a></li>
<li>
<a href='http://cloud.feedly.com/#subscription%2Ffeed%2Fhttp%3A%2F%2Fnob-log.info%2Ffeed%2F'  target='blank'><img id='feedlyFollow' src='http://s3.feedly.com/img/follows/feedly-follow-rectangle-volume-big_2x.png' alt='follow us in feedly' width='131' height='56'></a>
</li>
<li>
<a href="http://photo.blogmura.com/p_underwater/"><img src="http://photo.blogmura.com/p_underwater/img/p_underwater88_31.gif"  width="88" height="31" border="0" alt="にほんブログ村 写真ブログ 水中写真へ" /></a><br /><a href="http://photo.blogmura.com/p_underwater/">にほんブログ村</a>
</li>
</ul>
</div>
</div>
<div class="blog_info contentsbox">
<p>
<span itemprop="keywords"><?php echo implode(' ', array_values(get_the_taxonomies_st())); ?></span>
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
<?php if (function_exists('st_get_related_posts')) :
$related_posts = st_get_related_posts('number=5&title=&include_page=false&format=array');
if ( is_array($related_posts) ) :
?>
<h4 class="kanren">関連記事</h4>
<div class="sumbox02">
<div id="topnews">
<div>
    <?php foreach ( $related_posts as $related ) : ?>
<dl>
    <dt>
    <a href="<?= get_permalink($related->ID); ?>" title="<?= $related->post_title; ?>">
        <?php if ( has_post_thumbnail($related->ID) ): // サムネイルを持っているときの処理 ?>
            <?= get_the_post_thumbnail($related->ID, 'thumb110'); ?>
        <?php else: // サムネイルを持っていないときの処理 ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/no-img.png" alt="no image" title="no image" width="110px" />
        <?php endif; ?>
        </a>
    </dt>
    <dd>
        <h4 class="saisin">
            <a href="<?= get_permalink($related->ID); ?>"><?= $related->post_title; ?></a></h4>
        <p class="basui">
        <?php echo mb_substr(strip_tags($related->post_content),0,35).'...'; ?></p>
        <p class="motto"><a href="<?= get_permalink($related->ID); ?>">記事を読む</a></p>
    </dd>
</dl>
<?php endforeach; ?>

    </div>
</div>
</div>
<!--/関連記事-->
<?php endif; ?>
<?php endif; ?>

</div><!--/kizi-->
<?php comments_template(); ?>
<!--ページナビ-->
<div class="p-navi">
<p>
PREV : <?php previous_post_link_plus( array('in_same_tax' => true, 'format' => '%link') );?><br/>
NEXT : <?php next_post_link_plus( array('in_same_tax' => true, 'format' => '%link') );?></p>
</div>
<?php if (!is_mobile ()) : ?>
<!-- X:S ZenBackWidget --><script type="text/javascript">document.write(unescape("%3Cscript")+" src='http://widget.zenback.jp/?base_uri=http%3A//nob-log.info&nsid=111935142657809798%3A%3A111935150442471907&rand="+Math.ceil((new Date()*1)*Math.random())+"' type='text/javascript'"+unescape("%3E%3C/script%3E"));</script><!-- X:E ZenBackWidget -->
<?php endif; ?>
</div><!-- END div.post -->
<?php get_footer(); ?>
