<?php
$logo = get_field('logo_footer', 'options');
?>

<footer class="footer" id="footer">
    <div class="footer__container">
        <div class="footer__logo">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo esc_url($logo['url']); ?>" loading="lazy" alt="Logo Footer">
            </a>
        </div>
        <nav class="footer__menu">
            <?php
            wp_nav_menu(
                array(
                    'menu'              => "main-menu",
                    'theme_location'    => "main-menu",
                    'menu_class'        => "footer__menu-list",
                    'menu_id'           => "footer-menu",
                )
            );
            ?>
        </nav>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
