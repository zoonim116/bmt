	</div>
	 <footer>
        <div class="row">
            <div class="col-md-4">
                <p><?= favpress_option('bmt_option.company'); ?></p>
                <div class="info-wrap">
                    <p><?php _e('Адрес', 'bmt'); ?>: <?php echo favpress_option('bmt_option.adress'); ?></p>
                    <p><?php _e('Телефон', 'bmt') ?>: <?php echo favpress_option('bmt_option.phone'); ?>, <?php _e('Fax', 'bmt'); ?>: <?= favpress_option('bmt_option.fax'); ?></p>
                    <p><?php _e('E-mail', 'bmt') ?>: <?php echo favpress_option('bmt_option.email'); ?> </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-logo">
                    <a href="#" class="d-inline-block">
                        <img src="<?php echo get_theme_mod('header_footer'); ?>" class="img-responsive" alt="logo"/>
                    </a>
                    <div class="d-inline-block">
                        <p><?php echo favpress_option('bmt_option.services'); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <p><a href="#"><?php _e('Карта сайта', 'bmt') ?></a></p>
                <p>BaltMarine Terminal Ltd &#169; <?php echo date("Y"); ?></p>
            </div>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>