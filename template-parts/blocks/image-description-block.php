<?php
$image = get_field('imagen'); // Nombre del campo de imagen en ACF
$description = get_field('texto'); // Nombre del campo de descripción en ACF
?>
<div class="section img-con-descripcion gutter-vertical-3" id="quienes-somos">
    <div class="container">
        <div class="is-flex">
            <?php if ($image): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            <?php endif; ?>
            <?php if ($description): ?>
                <div class="text-container">
                    <p><?php echo esc_html($description); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
