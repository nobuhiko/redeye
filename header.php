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
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">

<?php if (is_mobile()) : ?>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon-152x152.png">

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/smart.css?v=0" media="all">

<?php else: ?>
<meta name="viewport" content="width=1024, maximum-scale=1, user-scalable=yes">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?v=0" media="all">
<?php endif; ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/jquery.pageslide.css" media="all">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="container">
    <header id="header">
        <?php $tag = (is_home()) ? 'h1' : 'p'; ?>
        <<?= $tag ?> class="sitename">
        <a class="open" href="#nav">Menu</a>
        <a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></<?= $tag; ?>>

        <?php //カスタムヘッダー画像// ?>
        <?php if(get_header_image() && !is_mobile()): ?>
        <p id="headimg"><img src="<?php header_image(); ?>" alt="<?php bloginfo('name'); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" /></p>
        <?php endif; ?>
    </header><!-- /#header -->

    <nav id="nav">
    <?php wp_nav_menu(array('theme_location' => 'navbar', 'depth' => (is_mobile()) ? '-1' : '1'));?>
    </nav>

    <div id="wrap">
        <div id="wrap-in">
            <div id="main">
