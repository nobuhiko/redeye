<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<?php if(is_category()): ?>
<?php elseif(is_archive()): ?>
<meta name="robots" content="noindex">
<?php elseif (is_page('8595')): ?>
<meta name="robots" content="noindex">
<?php elseif(is_tag()): ?>
<meta name="robots" content="noindex">
<?php endif; ?>

<title>
<?php if (is_home() && !is_paged() ) {?><?php bloginfo('name'); ?>
<?php } elseif ( is_home() && is_paged() ) { ?><?php bloginfo( 'name' ); ?> - Part <?php echo get_query_var( 'paged' ); ?>
<?php } elseif ( is_search() ) { ?>検索結果:<?php echo the_search_query(); ?> | <?php bloginfo('name'); ?>
<?php } elseif ( is_single() ) { ?><?php wp_title(''); ?> | <?php bloginfo('name'); ?>
<?php } elseif ( is_page() ) { ?><?php wp_title(''); ?> | <?php bloginfo('name'); ?>
<?php } elseif ( is_category() ) { ?>「<?php single_cat_title(); ?>」一覧 | <?php bloginfo('name'); ?>
<?php } elseif ( is_month() ) { ?><?php the_time('Y年F'); ?>の記事 | <?php bloginfo('name'); ?>
<?php } elseif ( is_tag() ) { ?>「<?php single_tag_title();?>」一覧 | <?php bloginfo('name'); ?>
<?php } else { ?>404エラー | サイト名<?php } ?>
</title>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/rogo.ico" />


<!---css切り替え--->
<?php 
if(strpos($_SERVER['HTTP_USER_AGENT'],'ipod')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'iPhone')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'Windows Phone')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'Android')!==false){
?>
<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-precomposed.png" />
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/smart.css" type="text/css" media="all" />
<?php 
}else{
?>

<meta name="viewport" content="width=1024, maximum-scale=1, user-scalable=yes">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />
<?php
}
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>


<?php
if(strpos($_SERVER['HTTP_USER_AGENT'],'ipod')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'iPhone')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'Windows Phone')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'Android')!==false){
?>
<!--アコーディオン-->
<div class="pcnone">
<div id="s-navi">
<section class="list6">
<dl class="acordion">
<dt class="trigger"><p><span class="op">About</span></p></dt>
<dd class="acordion_tree">
<ul>
<li>
<a href="<?php echo home_url();?>" title="トップページ">TOP</a>
</li>
<?php wp_nav_menu(array('theme_location' => 'navbar'));?>
</ul>    
<div class="clear"></div>
</dd>
</dl>
</section>
</div></div>
<!--/アコーディオン-->
<?php
}else{
?>
<?php
}
?>

<div id="container">

<div id="header">
<div id="header-in">
<div id="h-l"><p class="sitename"><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></p>

<?php if (is_home()) { ?>
<h1 class="descr">
<?php bloginfo('description'); ?>
</h1>
<?php } else { ?>
<p class="descr">
<?php bloginfo('description'); ?>
</p>
<?php } ?>
</div><!-- /#h-l -->
</div><!-- /#header-in -->
</div><!-- /#header -->
<div id="gazou">
<div id="gazou-in">

<?php if (is_home()) { ?>
<?php //カスタムヘッダー画像// ?>
<?php if(get_header_image()): ?>
<p id="headimg"><img src="<?php header_image(); ?>" alt="*" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" /></p>
<?php endif; ?>

<?php } else { ?>
<?php //カスタムヘッダー画像// ?>
<?php if(get_header_image()): ?>
<p id="headimg"><img src="<?php header_image(); ?>" alt="*" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" /></p>
<?php endif; ?>
<?php } ?>
</div><!-- /#gazou-in -->
</div><!-- /#gazou -->
<div class="clear"></div>
<?php 
if(strpos($_SERVER['HTTP_USER_AGENT'],'ipod')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'iPhone')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'Windows Phone')!==false ||
strpos($_SERVER['HTTP_USER_AGENT'],'Android')!==false){
?>

<?php 
}else{
?>
<!--pcnavi-->
<div class="smanone">
<div id="navi-in">
<ul>
<li>
<a href="<?php echo home_url();?>" title="トップページ">TOP</a>
</li>
<?php wp_nav_menu(array('theme_location' => 'navbar'));?>
</ul>	
<div class="clear"></div>
</div></div>
<!--/pcnavi-->
<?php
}
?>



<div id="wrap">
<div id="wrap-in">
<div id="main">
