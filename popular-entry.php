<?php if (function_exists('wpp_get_mostpopular')): ?>
<h4 class="menu_underh2">よく読まれている記事</h4>
<div class="topnews">
<?php
// オプションの設定
$args = array(
    'limit' => 5, // 表示する記事数
    'range' => 'weekly', // 期間("daily", "weekly", "monthly", "all")
    'order_by' => 'views', // ソート順("comments", "views", "avg" (1日の平均閲覧数))
    'post_type' => 'post', // 投稿タイプ（post,page,your-custom-post-type）
    'thumbnail_width' => 100, // サムネイルの横幅
    'thumbnail_height' => 100, // サムネイルの高さ
    'stats_comments' => 0, // コメントを表示する(1)/表示しない(0)
    'stats_views' => 0, // 閲覧数を表示する(1)/表示しない(0)
    'stats_author' => 0, // 投稿者を表示する(1)/表示しない(0)
    'stats_date' => 0, // 日付を表示する(1)/表示しない(0)
    'stats_date_format' => 'Y.n.j', // 日付のフォーマット
    'stats_category' => 0, // カテゴリを表示する(1)/表示しない(0)
    'excerpt_length' => 20, // 投稿のコンテンツから"n"文字の抜粋を作る
    'post_html' => // HTMLの出力フォーマット
    "
    <dl>
        <dt>{thumb}</dt>
        <dd><a href='{url}'>{text_title}</a><p>{summary} </p></dd>
    </dl>
    "
);

global $_curcat;
if ($_curcat->term_id) {
    if ($_curcat->category_parent != 0) {
        $_curcat = get_top_category($_curcat->term_id);
    }
    $catids = get_categories('fields=ids&child_of=' . $_curcat->term_id);
    $catids[] = $_curcat->term_id;
    $args['cat'] = implode(',', $catids);
}
// 関数の実行
wpp_get_mostpopular($args);
?>
</div>
<?php endif; ?>
