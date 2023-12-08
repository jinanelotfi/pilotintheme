<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_enqueue_styles() {
    wp_enqueue_style('pilotintheme-style', get_stylesheet_directory_uri() . '/dist/css/style.css', array(), filemtime(get_stylesheet_directory() . '/dist/css/style.css'));    
    wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/parts/main.js', array(), filemtime(get_stylesheet_directory() . '/parts/main.js'), true);      

}


function pilotintheme_supports() {

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');
    register_nav_menu('toggle', 'Menu burger');
    add_theme_support('custom-logo');
}

function pilotintheme_menu_class ($classes) {
    $classes[] = 'nav-item';
    return $classes;
}

function pilotintheme_menu__link_class ($attrs) {
    $attrs['class'] = 'nav-link';
    return $attrs;
}


// Gestion des sous-elements du menu 
class Custom_Submenu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        $output .= '<ul class="submenu">';
    }

    function end_lvl(&$output, $depth = 0, $args = null) {
        $output .= '</ul>';
    }
}

// Ajout des champs personnalisés 
function add_custom_css_class_field() {
    add_meta_box(
        'custom_css_class',
        'Classe CSS personnalisée',
        'custom_css_class_field_callback',
        'page',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'add_custom_css_class_field');

function custom_css_class_field_callback($post) {
    $custom_css_class = get_post_meta($post->ID, 'custom_css_class', true);
    ?>
    <label for="custom_css_class">Classe CSS personnalisée :</label>
    <input type="text" id="custom_css_class" name="custom_css_class" value="<?php echo esc_attr($custom_css_class); ?>">
    <?php
}

function save_custom_css_class_field($post_id) {
    if (array_key_exists('custom_css_class', $_POST)) {
        update_post_meta(
            $post_id,
            'custom_css_class',
            sanitize_text_field($_POST['custom_css_class'])
        );
    }
}




add_action('after_setup_theme', 'pilotintheme_supports');
add_filter('nav_menu_css_class', 'pilotintheme_menu_class');
add_filter('nav_menu_link_attributes', 'pilotintheme_menu__link_class');
add_action('save_post', 'save_custom_css_class_field');