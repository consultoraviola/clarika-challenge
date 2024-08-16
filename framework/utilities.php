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
        <div class="home-slider" id="hero">
            <div class="home-slider__wrapper">
                <?php while (have_rows('home_slider')) : the_row();
                    $slide_image = get_sub_field('imagen');
                    $slide_title = get_sub_field('descripcion'); ?>

                    <div class="home-slider__slide">
                        <img src="<?php echo esc_url($slide_image['url']); ?>" alt="<?php echo esc_attr($slide_title); ?>">
                        <div class="container">
                            <p><?php echo esc_html($slide_title); ?></p>
                        </div>
                    </div>

                <?php endwhile; ?>
            </div>

            <button class="home-slider__nav home-slider__nav--prev" aria-label="Anterior">&#10094;</button>
            <button class="home-slider__nav home-slider__nav--next" aria-label="Siguiente">&#10095;</button>
        </div>
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
        'posts_per_page' => 6,
    );

    $cpt_query = new WP_Query($args);

    if ($cpt_query->have_posts()) :
        echo '<div class="container gutter-vertical-1" id="portfolio">';
        echo '<h2>Portfolio</h2>';
        echo '<div class="cpt-grid">';
        while ($cpt_query->have_posts()) : $cpt_query->the_post();
        ?>
            <div class="cpt-grid__item">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="cpt-grid__image">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>
                <h3><?php the_title(); ?></h3>
                <p><?php the_excerpt(); ?></p>
            </div>
<?php
        endwhile;
        echo '</div>';
        echo '</div>';
        wp_reset_postdata();
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
