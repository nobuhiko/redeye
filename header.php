<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">

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
<?php } else { ?>404エラー | <?php bloginfo('name'); ?><?php } ?>
</title>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">

<?php if (is_mobile()) : ?>
<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-precomposed.png">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/smart.css?v=6" media="all">

<?php else: ?>

<meta name="viewport" content="width=1024, maximum-scale=1, user-scalable=yes">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=7" media="all">
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if (is_mobile()) : ?>
<!--アコーディオン-->
<div class="pcnone">
<div id="s-navi">
<section class="list6">
<dl class="acordion">
<dt class="trigger"><p><span class="op">About</span></p></dt>
<dd class="acordion_tree" style="display: none;">
<?php wp_nav_menu(array('theme_location' => 'navbar'));?>
<div class="clear"></div>
</dd>
</dl>
</section>
</div></div>
<!--/アコーディオン-->
<?php endif; ?>

<div id="container">

<div id="header">
    <div id="header-in">
        <div id="h-l">
        <?php if (is_home()) : ?>
        <h1 class="sitename"><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>
        <?php else : ?>
        <p class="sitename"><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></p>
        <?php endif; ?>

        <?php if (is_home()) : ?>
        <p class="descr"><?php bloginfo('description'); ?></p>
        <?php else : ?>
        <p class="descr"><?php bloginfo('description'); ?></p>
        <?php endif; ?>
        </div><!-- /#h-l -->
    </div><!-- /#header-in -->
</div><!-- /#header -->
<div id="gazou">
<div id="gazou-in">

<?php //カスタムヘッダー画像// ?>
<?php if(get_header_image()): ?>
<p id="headimg"><img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" /></p>
<?php endif; ?>

</div><!-- /#gazou-in -->
</div><!-- /#gazou -->
<div class="clear"></div>

<?php if (!is_mobile()): ?>
<!--pcnavi-->
<div class="smanone">
<div id="navi-in">
<?php wp_nav_menu(array('theme_location' => 'navbar'));?>
<div class="clear"></div>
</div></div>
<!--/pcnavi-->
<?php endif; ?>

<div id="wrap">
<div id="wrap-in">
<div id="main">
