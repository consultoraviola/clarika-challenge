<?php
require_once 'framework/utilities.php';
function my_theme_enqueue_styles() {
    wp_enqueue_style('main-style', get_template_directory_uri() . '/assets/css/style.css');
    wp_enqueue_script('main-scripts', get_template_directory_uri() . '/assets/js/script.js', array(), null, false);

}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');

function setup()
{
    add_post_type_support('page', 'excerpt');
    add_theme_support('menus');
    add_theme_support('revisions', array('post', 'page', 'carrera', 'beca'));
    register_nav_menus(array(
        'menu-main' => 'Menú principal',
        'menu-footer' => 'Menú footer',
    ));
}

$opciones =  acf_add_options_page(
    array(
        'page_title' => 'Global Setting',
        'menu_title' => 'Global Setting',
        'menu_slug' => 'options_site',
        'capability' => 'edit_posts',
        'position' => false,
        'parent_slug' => '',
        'redirect' => true,
        'post_id' => 'options',
        'autoload' => false,
        'icon_url' => 'dashicons-hammer',
    )
);

acf_add_options_sub_page(array(
    'menu_title'     => 'Opciones Generales',
    'page_title'     => 'Opciones Generales',
    'parent_slug'     => $opciones['menu_slug'],
));

add_action('rest_api_init', function () {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Authorization, Content-Type");
});

function add_thumbnail_support_to_acf_cpt() {
    add_post_type_support('foto', 'thumbnail');
}
add_action('init', 'add_thumbnail_support_to_acf_cpt');

add_action('wpcf7_before_send_mail', 'add_date_time_to_subject');

function add_date_time_to_subject($contact_form) {
    // Obtener la instancia del envío
    $submission = WPCF7_Submission::get_instance();
    
    if ($submission) {
        // Obtener los datos del correo
        $mail = $contact_form->prop('mail');

        // Formatear la fecha y hora actual
        $current_time = date_i18n('Y-m-d H:i:s');

        // Agregar la fecha y hora al asunto
        $mail['subject'] .= ' | Enviado el: ' . $current_time;

        // Establecer el nuevo asunto en los datos del correo
        $contact_form->set_properties(array('mail' => $mail));
    }
}
