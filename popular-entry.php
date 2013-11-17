
<?php if (function_exists('wpp_get_mostpopular')): ?>
<h4 class="menu_underh2">よく読まれている記事</h4>
<div class="topnews">
<?php
// オプションの設定
$args = array(
    'limit' => 5, // 表示する記事数
    'range' => 'weekly', // 期間
    'order_by' => 'views', // ソート順（これは閲覧数）
    'post_type' => 'post', // 投稿タイプ（カスタム投稿タイプを表示したくない場合など）
    'thumbnail_width' => 100, // サムネイルの横幅
    'thumbnail_height' => 100, // サムネイルの高さ
    'stats_comments' => 0, // コメントを表示する(1)/表示しない(0)
    'stats_views' => 0, // 閲覧数を表示する(1)/表示しない(0)
    'stats_author' => 0, // 投稿者を表示する(1)/表示しない(0)
    'stats_date' => 0, // 日付を表示する(1)/表示しない(0)
    'stats_date_format' => 'Y.n.j', // 日付のフォーマット
    'stats_category' => 0, // カテゴリを表示する(1)/表示しない(0)
    'wpp_start' => "<ul class='popular_posts'>", // リストの開始タグ
    'wpp_end' => "</ul>", // リストの終了タグ
    'post_html' => // HTMLの出力フォーマット
    "
    <dl>
        <dt>{thumb}</dt>
        <dd><a href='{url}'>{text_title}</a></dd>
    </dl>
    "
);

global $_curcat;
if ($_curcat->term_id) {
    $cat = get_top_category($_curcat->term_id);
    $children = implode(',', get_categories('fields=ids&child_of=' . $cat->term_id));
    $args['cat'] = $children . ',' . $cat->term_id;
}
// 関数の実行
wpp_get_mostpopular($args);
?>
</div>
<?php endif; ?>

<?php /*
<?php if ( function_exists('stats_get_csv') && $top_posts = stats_get_csv('postviews', 'days=7&limit=6') ) : ?>
<h4 class="menu_underh2">今、人気の記事</h4>
<div class="topnews">
    <?php foreach ( $top_posts as $p ) : ?>
    <?php if (!($p['post_id'] && get_post($p['post_id']))) continue; ?>
    <dl>
        <dt>
        <a href="<?php echo $p['post_permalink']; ?>" title="<?php echo $p['post_title']; ?>">
            <?php if ( has_post_thumbnail($p['post_id']) ): // サムネイルを持っているときの処理 ?>
            <?php echo get_the_post_thumbnail($p['post_id'] ,'thumb100'); ?>
            <?php else: // サムネイルを持っていないときの処理 ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/no-img.png" alt="no image" title="no image" width="100" height="100">
            <?php endif; ?>
        </a>
        </dt>
        <dd>
        <a href="<?php echo $p['post_permalink']; ?>" title="<?php echo $p['post_title']; ?>"><?php echo $p['post_title']; ?></a>
        <?php <p><?php echo mb_substr(strip_tags(get_post_field('post_content', $p['post_id'])),0,35).'...'; ?></p>?>
        </dd>
    </dl>
    <?php endforeach; ?>
</div>
<?php endif; ?>
 */?>
