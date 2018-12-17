<aside class="col-sm-5 col-lg-4 col-xs-12 aside-wrap">
    <span class="aside-title"><?php _e('Наши партнеры', 'bmt'); ?></span>
        <?php dynamic_sidebar( 'partners-sidebar' ); ?>
        <span class="aside-title"><?php echo _e("Последние новости", 'bmt'); ?></span> 
            <?php dynamic_sidebar( 'news-sidebar' ); ?>
</aside>