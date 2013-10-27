<?php

//更新日の追加
function get_mtime($format) {
    $mtime = get_the_modified_time('Ymd');
    $ptime = get_the_time('Ymd');
    if ($ptime > $mtime) {
        return get_the_time($format);
    } elseif ($ptime === $mtime) {
        return null;
    } else {
        return get_the_modified_time($format);
    }
}

function get_the_taxonomies_st($post = 0, $args = array() ) {
	$post = get_post( $post );

	$args = wp_parse_args( $args, array(
		'template' => '%l',
	) );
	extract( $args, EXTR_SKIP );

	$taxonomies = array();

	if ( !$post )
		return $taxonomies;

	foreach ( get_object_taxonomies($post) as $taxonomy ) {
        $t = (array) get_taxonomy($taxonomy);
		if ( empty($t['args']) )
			$t['args'] = array();
		if ( empty($t['template']) )
			$t['template'] = $template;

		$terms = get_object_term_cache($post->ID, $taxonomy);
		if ( false === $terms )
			$terms = wp_get_object_terms($post->ID, $taxonomy, $t['args']);

		$links = array();

		foreach ( $terms as $term )
			$links[] = "<a href='" . esc_attr( get_term_link($term) ) . "'>$term->name</a>";

		if ( $links )
			$taxonomies[$taxonomy] = implode(', ', $links);
	}
	return $taxonomies;
}

function is_mobile () {
    $useragents = array(
        'iPhone',         // Apple iPhone
        'iPad',           // Apple iPad
        'iPod',           // Apple iPod touch
        'Android',        // 1.5+ Android
        'dream',          // Pre 1.5 Android
        'CUPCAKE',        // 1.5+ Android
        'blackberry9500', // Storm
        'blackberry9530', // Storm
        'blackberry9520', // Storm v2
        'blackberry9550', // Storm v2
        'blackberry9800', // Torch
        'webOS',          // Palm Pre Experimental
        'incognito',      // Other iPhone browser
        'webmate'         // Other iPhone browser
    );
    $pattern = '/'.implode('|', $useragents).'/i';
    return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}

function register_user_script() {
    if (!is_admin()) {
        $script_directory = get_template_directory_uri();
        wp_deregister_script('jquery');
	    wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"), false, '1.8.0');
    	wp_enqueue_script('jquery');

        if (!is_mobile()) {
            wp_register_script(
                'stinger',
                get_template_directory_uri() . '/base.js',
                array('jquery'), '1.8.0', true);
        } else {
            wp_enqueue_script(
                'stinger',
                get_template_directory_uri() . '/smartbase.js',
                array('jquery'), '1.8.0', true);
        }
    	wp_enqueue_script('stinger');
    }
}
add_action('wp_enqueue_scripts','register_user_script');


//アイキャッチサムネイル
add_theme_support('post-thumbnails');
add_image_size( 'eyecatch', 150, 150, true );
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
//add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );

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

function add_hatena_notify() {
 
    if (is_single() || is_page()) {
        $url = get_permalink();
    } else {
        $url = get_bloginfo('url');
    }
 
    echo '
        <!--
        <rdf:RDF
          xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
          xmlns:dc="http://purl.org/dc/elements/1.1/"
          xmlns:foaf="http://xmlns.com/foaf/0.1/">
        <rdf:Description rdf:about="'.$url.'">
           <foaf:maker rdf:parseType="Resource">
             <foaf:holdsAccount>
               <foaf:OnlineAccount foaf:accountName="あなたのはてなid">
                 <foaf:accountServiceHomepage rdf:resource="http://www.hatena.ne.jp/" />
               </foaf:OnlineAccount>
             </foaf:holdsAccount>
           </foaf:maker>
        </rdf:Description>
        </rdf:RDF>
        -->
    ';
}
add_action('wp_head', 'add_hatena_notify', 100);
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


