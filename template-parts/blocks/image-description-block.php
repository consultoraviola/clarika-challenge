<?php
$image = get_field('imagen');
$description = get_field('texto');
$titulo = get_field('titulo');
?>
<div class="section img-con-descripcion gutter-top-3 gutter-bottom-5" id="quienes-somos">
    <div class="container">
        <div class="is-flex">
            <?php if ($description): ?>
                <div class="text-container">
                    <div class="content">
                        <h2><?php echo $titulo; ?></h2>
                        <p><?php echo esc_html($description); ?></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php if ($image): ?>
        <img src="<?php echo esc_url($image['url']); ?>" loading="lazy" alt="<?php echo esc_attr($image['alt']); ?>">
    <?php endif; ?>
</div>