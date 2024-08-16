<?php
get_header();
$whatsapp = get_field('whatsapp', 'options');
?>

<main class="top-130">
    <?php
    if (have_posts()) : while (have_posts()) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
    <a href="<?php echo $whatsapp; ?>" target="_blank" title="Ir a whatsapp" class="button--whatsapp  z-9">
        <span>¿Necesitas ayuda?</span>
    </a>
</main>

<?php
get_footer();
?>