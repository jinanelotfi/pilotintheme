<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_enqueue_styles() {
    wp_enqueue_style('pilotintheme-style', get_stylesheet_directory_uri() . '/dist/css/style.css', array(), filemtime(get_stylesheet_directory() . '/dist/css/style.css'));    
    wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/parts/main.js', array(), filemtime(get_stylesheet_directory() . '/parts/main.js'), true);      
    
     // skrollr
     wp_enqueue_script('skrollr', get_stylesheet_directory_uri() . './parts/skrollr.min.js', array(), filemtime(get_stylesheet_directory() . './parts/skrollr.min.js'), true);wp_enqueue_script('main', get_stylesheet_directory_uri() . './parts/main.js', array(), filemtime(get_stylesheet_directory() . './parts/main.js'), true);
    
     wp_enqueue_script('skrollr-init', get_stylesheet_directory_uri() . './parts/skrollr-init.js', array(), filemtime(get_stylesheet_directory() . './parts/skrollr-init.js'), true);

}

function add_custom_scripts() {
    wp_enqueue_script('jquery');
}




function pilotintheme_supports() {

    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');
    register_nav_menu('toggle', 'Menu burger');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
}


function pilotintheme_register_assets () {
    $header_menu_location = 'header';


    if (has_nav_menu($header_menu_location)) {
        wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css', []);
        wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
        wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', [], false, true);
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js', [], false, true); 
        wp_enqueue_style('bootstrap');
        wp_enqueue_script('bootstrap');
    }
}

function pilotintheme_menu_class ($classes) {
    $classes[] = 'nav-item';
    return $classes;
}

function pilotintheme_menu__link_class ($attrs) {
    $attrs['class'] = 'nav-link';
    return $attrs;
}



class Walker_Kbrand_Nav_Primary extends Walker_Nav_Menu {

   function start_lvl(&$output, $depth = 0, $args = array())    {

    $indent = str_repeat("\t", $depth);
    $submenu = ($depth > 0) ? ' sub-menu' : '';
    // les modif commencent ici :
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
    
    
   }

   function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)    {
    

    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $li_attributes = '';
    $class_names = $values = '';

    $classes[] = empty($item->classes) ? array() : (array) $item->classes;

    $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
    $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
    $classes[] = 'menu-item-' .$item->ID;

    if($depth && $args->walker->has_children) {
        $classes[] = 'dropdown-submenu';
        
              
    }

    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = 'class="' .esc_attr($class_names) .'"';

    $id = apply_filters('nav_menu_item_id', 'menu-item-' .$item->ID, $item, $args);
    $id = 'id="' .esc_attr($id) .'"';


    // Ajout de la balise <img>    
    $image_url = get_template_directory_uri() . "./assets/images/chart-line-up.png";  
    $img_tag = '<img src="' . $image_url . '" alt="Description de l\'image">';      
    // $description = $item->description;
    // $description_tag = '<span class="sub">'.$description.'</span>';

    $output .= $indent.'<li '.$id .$values.$class_names.$li_attributes .'>';
    $output .= $img_tag;
    // $output .= $description_tag;
 

    $attributes = !empty($item->attr_title) ? 'title="' .$item->attr_title.'"' : '';
    $attributes .= !empty($item->target) ? 'target="' .$item->target.'"' : '';
    $attributes .= !empty($item->xfn) ? 'rel="' .$item->xfn.'"' : '';
    $attributes .= !empty($item->url) ? 'href="' .$item->url.'"' : '';

    $attributes .= ($args->walker->has_children) ? 'class="dropdown-toggle" data-toggle="dropdown"' : '';
    
    $menuitems = $args->before;
    $menuitems .= '<a ' .$attributes .'>';
    $menuitems .= $args->before_link .apply_filters('the_title', $item->title, $item->ID) .$args->after_link;
    $menuitems .= ($depth == 0 && $args->walker->has_children) ? '<span class="caret"></span></a>' : '</a>';
    

    $output .= apply_filters('walker_nav_menu_start_el', $menuitems, $item, $depth, $args);
   

   }
}


// Add custom fields for menu items
function add_custom_menu_fields() {
    add_meta_box(
        'custom_menu_image',
        'Custom Menu Image',
        'custom_menu_image_field_callback',
        'nav-menus',
        'side',
        'default'
    );
}
add_action('admin_init', 'add_custom_menu_fields');


function custom_menu_image_field_callback($item) {
    $custom_image = get_post_meta($item->ID, 'custom_menu_image', true);
    ?>
    <p>
        <label for="custom_menu_image">Custom Image URL:</label>
        <input type="text" id="custom_menu_image" name="custom_menu_image" value="<?php echo esc_url($custom_image); ?>">
    </p>
    <?php
}

// Save custom menu fields
function save_custom_menu_fields($menu_id, $menu_item_db_id, $menu_item_data) {
    if (isset($_REQUEST['custom_menu_image'][$menu_item_db_id])) {
        update_post_meta($menu_item_db_id, 'custom_menu_image', sanitize_text_field($_REQUEST['custom_menu_image'][$menu_item_db_id]));
    }
}
add_action('wp_update_nav_menu_item', 'save_custom_menu_fields', 10, 3);









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
add_action('wp_enqueue_scripts', 'add_custom_scripts');
add_action('wp_enqueue_scripts', 'pilotintheme_register_assets');