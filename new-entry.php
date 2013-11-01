<h4 class="menu_underh2">新着エントリー</h4>
<div class="topnews">
    <?php
    $newslist = get_posts( array('posts_per_page' => 5 ));
    foreach( $newslist as $post ) :
        setup_postdata( $post );
    ?>
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
            <p><?php echo mb_substr(strip_tags(get_the_excerpt()),0,35).'...'; ?></p>
        </dd>
    </dl>

    <?php
    endforeach;
    wp_reset_postdata();
    ?>
    <p class="motto"><a href="<?php echo home_url(); ?>/">→もっと見る</a></p>
</div>
