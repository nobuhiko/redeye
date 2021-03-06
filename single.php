<?php get_header(); ?>
<div class="kuzu">
    <?php /*--- パンくず --- */?>
    <?php if ( function_exists( 'bread_crumb' ) ) { bread_crumb(); } ?>
</div><!--/kuzu-->
<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
    <!--ループ開始-->
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="kizi" itemscope itemtype="http://schema.org/Article">
        <h1 class="entry-title" itemprop="name"><a href="<?php the_permalink(); ?>" itemprop="url"><?php the_title(); ?></a></h1>
        <div class="blog_info contentsbox">
            <p>
            &nbsp;公開日：<time class="published" itemprop="datePublished" content="<?php the_time('c');?>"><?php the_time('Y年n月j日 H:i') ;?></time>
            </p>
        </div>
        <div itemprop="articleBody" class="entry-content">
            <?php the_content(); ?>
        </div>
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
            </ul>
        </div>
    </div>
    <div class="blog_info contentsbox">
        <p>
        <span class="vcard author">
            <span class="fn"><?php the_author_posts_link(); ?></span>
        </span>
        最終更新：<time class="updated" itemprop="dateModified" content="<?php the_modified_date('c'); ?>"><?php the_modified_date(); ?>&nbsp;<?php the_modified_date('G:i'); ?></time>
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
            <div class="topnews">
                <?php foreach ( $related_posts as $related ) : ?>
                <dl>
                    <dt>
                    <a href="<?= get_permalink($related->ID); ?>" title="<?= $related->post_title; ?>">
                        <?php if (has_post_thumbnail($related->ID)): ?>
                        <?= get_the_post_thumbnail($related->ID, 'thumb110'); ?>
                        <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/no-img.png" alt="no image" title="no image" width="110" height="110">
                        <?php endif; ?>
                    </a>
                    </dt>
                    <dd>
                    <a href="<?= get_permalink($related->ID); ?>"><?= $related->post_title; ?></a>
                    <p class="basui">
                    <?php echo mb_substr(strip_tags($related->post_content),0,35).'...'; ?></p>
                    <p class="motto"><a href="<?= get_permalink($related->ID); ?>">記事を読む</a></p>
                    </dd>
                </dl>
                <?php endforeach; ?>
            </div>
        </div>
        <!--/関連記事-->
        <?php endif; ?>
        <?php endif; ?>

    </div><!--/kizi-->
    <?php comments_template(); ?>
    <!--ページナビ-->
    <div class="p-navi">
        <?php previous_post_link_plus( array('in_same_cat' => true, 'format' => '<p>PREV : %link</p>') );?>
        <?php next_post_link_plus( array('in_same_cat' => true, 'format' => '<p>NEXT : %link</p>') );?>
    </div>
    <?php if (!is_mobile ()) : ?>
    <!-- X:S ZenBackWidget --><div id="zenback-widget-loader"></div><script type="text/javascript">!function(d,i){if(!d.getElementById(i)){var r=Math.ceil((new Date()*1)*Math.random());var j=d.createElement("script");j.id=i;j.async=true;j.src="//w.zenback.jp/v1/?base_uri=http%3A//nob-log.info&nsid=111935142657809798%3A%3A111935150442471907&rand="+r;d.body.appendChild(j);}}(document,"zenback-widget-js");</script><!-- X:E ZenBackWidget -->
    <?php endif; ?>
</div><!-- END div.post -->
<?php get_footer(); ?>
