<?php
function register_user_script() {
    if (!is_admin()) {
        $script_directory = get_template_directory_uri();
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js');
 
        wp_enqueue_script('MyTheme_InitScript',$script_directory.'/init.js',array('jquery'));    
    }
}
add_action('init','register_user_script');


//アイキャッチサムネイル
add_theme_support('post-thumbnails');
add_image_size('thumb100',100,100,true);
add_image_size('thumb110',110,110,true);

//ENJIからのお知らせ
function dashboard_widget_function() {
echo "
Stingerに関するバグや更新情報は@ENJILOG（https://twitter.com/ENJILOG）で呟いていますのでフォローして下さい。
最新のテーマはhttp://wp-stinger.com/dl/stinger2.zipでダウンロードできます。 ";
}
function add_dashboard_widgets() {
wp_add_dashboard_widget('dashboard_widget_welcome', '「Stinger」について', 'dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'add_dashboard_widgets' );

//WordPress の投稿スラッグを自動的に生成する
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );

//カスタムメニュー
register_nav_menus(array('navbar' => 'ナビゲーションバー'));

//カスタムヘッダー
$args = array(
	'width'         => 986,
	'height'        => 150,
	'default-image' => get_template_directory_uri() . '/images/stinger3.png',
);
add_theme_support( 'custom-header', $args );

//RSS
add_theme_support('automatic-feed-links');

//エディタスタイル
add_theme_support('editor-style');
add_editor_style('editor-style.css');
function custom_editor_settings( $initArray ){
	$initArray['body_class'] = 'editor-area';
	return $initArray;
}
add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );

//画像に重ねる文字の色
define('HEADER_TEXTCOLOR', '');

//画像に重ねる文字を非表示にする
define('NO_HEADER_TEXT',true);

//投稿用ファイルを読み込む
get_template_part('functions/create-thread');

//カスタム背景
add_theme_support( 'custom-background' );

//ページャー機能
function pagination($pages = '', $range = 4)
{
     $showitems = ($range * 2)+1; 
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }  
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link

(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; 

Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems 

))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link

($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 

1)."\">Next &rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a 

href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}

//ヘッダーを綺麗に
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'wp_generator' ); 

//moreリンク
function custom_content_more_link( $output ) {
    $output = preg_replace('/#more-[\d]+/i', '', $output );
    return $output;
}
add_filter( 'the_content_more_link', 'custom_content_more_link' );

//セルフピンバック禁止
function no_self_ping( &$links ) {
    $home = home_url();
    foreach ( $links as $l => $link )
        if ( 0 === strpos( $link, $home ) )
            unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_ping' );


//ウイジェット追加
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(4) )
register_sidebars(1,
    array(
    'name'=>'サイドバー1',
    'before_widget' => '<ul><li>',
    'after_widget' => '</li></ul>',
    'before_title' => '<h4 class="menu_underh2">',
    'after_title' => '</h4>',
    ));
register_sidebars(1,
    array(
    'name'=>'スクロール広告用',
    'before_widget' => '<ul><li>',
    'after_widget' => '</li></ul>',
    'before_title' => '<h4 class="menu_underh2" style="text-align:left;">',
    'after_title' => '</h4>',
    ));
register_sidebars(1,
    array(
    'name'=>'Googleアドセンス用',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h4 style="display:none">',
    'after_title' => '</h4>',
    ));

register_sidebars(1,
    array(
    'name'=>'Googleアドセンスのスマホ用width300',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '<h4 style="display:none">',
    'after_title' => '</h4>',
    ));

if ( ! isset( $content_width ) ) $content_width = 546;

?>
