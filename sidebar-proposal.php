<aside class="col-sm-5 col-lg-4 col-xs-12 aside-wrap">
    <span class="aside-title"><?php _e('Наши партнеры', 'bmt'); ?></span>
        <?php dynamic_sidebar( 'partners-sidebar' ); ?>
        <span class="aside-title"><?php echo _e("Заявка", 'bmt'); ?></span>
        <div class="aside-content">
            <div class="aside-content-text">
                <?php dynamic_sidebar( 'homepage-sidebar' ); ?>
            </div>
            <a href="<?php echo get_page_link(73); ?>" class="btn"><? _e('Заполнить заявку', 'bmt'); ?></a>
        </div>
</aside>