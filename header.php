<?php require_once('_meta-header.php'); ?>
<header class="header">
    <div class="menu-top">
        <div class="container">
            <a href="<?php echo get_field('instagram', 'options'); ?>" class="nav-bar__top__contact__social" target="_blank">
                <i class="icon-instagram"></i>
            </a>
            <a href="<?php echo get_field('linkedln', 'options'); ?>" class="nav-bar__top__contact__social" target="_blank">
                <i class="icon-linkedin"></i>
            </a>
            <a href="<?php echo get_field('telegram', 'options'); ?>" class="nav-bar__top__contact__social" target="_blank">
                <i class="icon-telegram"></i>
            </a>
        </div>
    </div>
    <div class="nav-bar">
        <div class="container">
            <div class="nav-bar__brand">
                <h1 class="hide">Franco Viola</h1>
                <a class="app-brand" href="<?php echo home_url() ?>">
                    <?php $logo = get_field('logo_principal', 'options'); ?>
                    <img src="<?php echo $logo['url']; ?>" class="app-brand__logo">
                </a>
            </div>

            <nav class="nav-bar__menu">
                <button class="nav-bar__mobile-menu" id="menu-mobile" aria-label="Ver menú">
                    <span></span><span></span><span></span>
                </button>

                <?php
                wp_nav_menu(
                    array(
                        'menu'              => "main-menu",
                        'theme_location'    => "main-menu",
                        'menu_class'        => "nav-bar__menu",
                        'menu_id'           => "main-menu",
                    )
                );
                ?>
            </nav>
        </div>
    </div>
</header>