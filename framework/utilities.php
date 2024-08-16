<?php
function printme($thing)
{
    echo '<pre style="display:block; background: black; color:white; width:100%; border: 1px solid white;">';
    print_r($thing);
    echo '</pre>';
}

function home_slider_shortcode()
{
    if (have_rows('home_slider')) {
        ob_start();
?>
        <section class="home-slider" id="hero">
            <div class="home-slider__wrapper">
                <?php while (have_rows('home_slider')) : the_row();
                    $slide_image = get_sub_field('imagen');
                    $slide_title = get_sub_field('descripcion'); ?>

                    <div class="home-slider__slide">
                        <img src="<?php echo esc_url($slide_image['url']); ?>" loading="lazy" alt="<?php echo esc_attr($slide_title); ?>">
                        <div class="container">
                            <p><?php echo esc_html($slide_title); ?></p>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>

            <button class="home-slider__nav home-slider__nav--prev" aria-label="Anterior"></button>
            <button class="home-slider__nav home-slider__nav--next" aria-label="Siguiente"></button>
        </section>
        <?php
        return ob_get_clean();
    }
}
add_shortcode('home_slider', 'home_slider_shortcode');

function cpt_grid_shortcode()
{
    ob_start();

    $args = array(
        'post_type' => 'foto',
        'posts_per_page' => 16,
    );

    $posts = get_posts($args);

    if (!empty($posts)) :
        echo '<section class="portfolio gutter-top-1 gutter-bottom-5" id="portfolio">';
        echo '<div class="container">';
        echo '<h2>Portfolio</h2>';
        echo '<div class="cpt-grid">';

        foreach ($posts as $post) :
            setup_postdata($post); // Preparar datos del post para usar las funciones de WordPress

            if (has_post_thumbnail($post->ID)) : ?>
                <div class="cpt-grid__item">
                    <div class="cpt-grid__image">
                        <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="" loading="lazy">
                        <div class="cpt-grid__overlay">
                            <h3><?php echo get_the_title($post->ID); ?></h3>
                            <p><?php echo get_the_excerpt($post->ID); ?></p>
                        </div>
                    </div>
                </div>
            <?php endif;

        endforeach;
        
        echo '</div>';
        echo '</div>';
        echo '</section>';

        wp_reset_postdata(); // Restablecer datos del post global después del bucle
    endif;

    return ob_get_clean();
}

add_shortcode('cpt_grid', 'cpt_grid_shortcode');


function register_acf_block_types()
{
    // Registrar un bloque de Gutenberg personalizado
    acf_register_block_type(array(
        'name'              => 'image_description_block',
        'title'             => __('Imagen con descripción'),
        'description'       => __('A custom block with an image and a description.'),
        'render_template'   => 'template-parts/blocks/image-description-block.php',
        'category'          => 'formatting',
        'icon'              => 'admin-comments',
        'keywords'          => array('image', 'description'),
    ));
}
add_action('acf/init', 'register_acf_block_types');
