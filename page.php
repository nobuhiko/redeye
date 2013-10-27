<?php get_header(); ?>
<div class="kuzu">
<?php if ( function_exists( 'bread_crumb' ) ) { bread_crumb(); } ?>
</div><!--/kuzu-->
<div class="post">
<!--ループ開始-->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="kizi">
<h1 class="entry-title">
<?php the_title(); ?></h1>

 <?php the_content(); ?>
</div>
<div style="padding:20px 0px;">
<?php get_template_part('ad');?>
</div>

<?php endwhile; else: ?>
    <p>記事がありません</p>
<?php endif; ?>
<!--ループ終了-->

</div><!-- END div.post -->
<?php get_footer(); ?>
