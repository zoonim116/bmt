<aside class="col-sm-5 col-lg-4 col-xs-12 aside-wrap">
    <span class="aside-title"><?php _e('Наши партнеры', 'bmt'); ?></span>
        <?php dynamic_sidebar( 'partners-sidebar' ); ?>
        <?php if (!empty(get_page_template_slug())) : ?>
            <?php get_template_part('sidebar-', get_page_template_slug()); ?>
        <?php endif; ?>
</aside>