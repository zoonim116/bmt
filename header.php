<!doctype html>
<html lang="<?php echo WPGlobus::Config()->language; ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php wp_head(); ?>
    </head>
   <body <?php body_class(); ?>>
   	<div class="container">
   		 <header>
                <section class="lang-panel">
                	<?php do_action('bmt_show_language_panel_action'); ?>
                </section>
                <section class="logo-wrapper">
                    <a href="#" class="d-inline-block logo">
                    	<?php 
	                    	$custom_logo_id = get_theme_mod( 'custom_logo' );
	                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    	?>
                        <img src="<?php echo $logo[0]; ?>" class="img-responsive" alt="logo"/>
                    </a>
                    <div class="d-inline-block tagline">
                        <p><?php echo get_bloginfo('name') ?></p>
                        <p><?php echo get_bloginfo('description'); ?></p>
                    </div>
                </section>
                <section class="navigation">
                        <nav class="navbar navbar-expand-lg ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <?php 
                            wp_nav_menu([
							     'menu'            => 'header-menu',
							     'theme_location'  => 'header-menu',
							     'container'       => 'div',
							     'container_id'    => 'bs4navbar',
							     'container_class' => 'collapse navbar-collapse',
							     'menu_id'         => false,
							     'menu_class'      => 'navbar-nav mr-auto',
							     'depth'           => 2,
							     'fallback_cb'     => 'bs4navwalker::fallback',
							     'walker'          => new bs4navwalker()
						   	]);
                            ?>
                        </nav>
                </section>
            </header>
        <div class="row content">
            
