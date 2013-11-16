<h4 class="menu_underh2">新着エントリー</h4>
<div class="topnews">
    <?php query_posts('showposts=5'); ?>
    <?php while (have_posts()) : the_post(); ?>
    <dl>
        <dt>
        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
            <?php if ( has_post_thumbnail() ): ?>
            <?php the_post_thumbnail('thumb100'); ?>
            <?php else: ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/no-img.png" alt="no image" title="no image" width="100" height="100">
            <?php endif; ?>
        </a>
        </dt>
        <dd>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
        <p><?php echo mb_substr(strip_tags(get_the_excerpt()),0,25).'...'; ?></p>
        </dd>
    </dl>
    <?php endwhile; wp_reset_postdata(); ?>
    <p class="motto"><a href="<?php echo home_url(); ?>/">→もっと見る</a></p>
</div>
