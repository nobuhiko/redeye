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
            <p><?php echo mb_substr(strip_tags(get_post_field('post_content', $p['post_id'])),0,35).'...'; ?></p>
        </dd>
    </dl>
<?php endforeach; ?>
</div>
<?php endif; ?>
