<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_enqueue_styles() {
    wp_enqueue_style('pilotintheme-style', get_stylesheet_directory_uri() . '/dist/css/style.css', array(), filemtime(get_stylesheet_directory() . '/dist/css/style.css'));    
    wp_enqueue_script('main-js', get_stylesheet_directory_uri() . '/parts/main.js', array(), filemtime(get_stylesheet_directory() . '/parts/main.js'), true);      
    
     // skrollr
     wp_enqueue_script('skrollr', get_stylesheet_directory_uri() . '/parts/skrollr.min.js', array(), filemtime(get_stylesheet_directory() . '/parts/skrollr.min.js'), true);
    
     wp_enqueue_script('skrollr-init', get_stylesheet_directory_uri() . '/parts/skrollr-init.js', array(), filemtime(get_stylesheet_directory() . '/parts/skrollr-init.js'), true);

     // Script fontawesome
    wp_enqueue_script('font-awesome-kit', 'https://kit.fontawesome.com/2141edcbd6.js', array(), null);  

}

function add_custom_scripts() {
    wp_enqueue_script('jquery');
}
// Autoriser les fichiers SVG dans l'uploader
function allow_svg_upload($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
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

// Classe pour le menu
class WalkerNav extends Walker_Nav_Menu {

    private $parentDescription = '';
    private $parentDescriptionDisplayed = false;

    public function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        $submenu = ($depth > 0) ? ' sub-menu' : '';

        // Affiche la description du parent après l'ouverture de <ul>
        // if ($depth === 0 && !$this->parentDescriptionDisplayed && strlen($this->parentDescription) > 2) {
        //     $output .= "$indent<div class=\"sub\">{$this->parentDescription}</div>\n";
        //     $this->parentDescriptionDisplayed = true;
        // }



        $output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\" >\n";        

        // Affiche la description du parent après la balise <ul>
        // if ($depth === 0 && !$this->parentDescriptionDisplayed && strlen($this->parentDescription) > 2) {
        //     $output .= "$indent<div class=\"sub\">{$this->parentDescription}</div>\n";
        //     $this->parentDescriptionDisplayed = true;
        // }
    }

    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $li_attributes = '';
        $class_names = $value = '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        // managing divider: add divider class to an element to get a divider before it.
        $divider_class_position = array_search('divider', $classes);
        if ($divider_class_position !== false) {
            $output .= "<li class=\"divider\"></li>\n";
            unset($classes[$divider_class_position]);
        }       

        $classes[] = ($args->has_children) ? 'dropdown' : '';
        $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
        $classes[] = 'menu-item-'.$item->ID;
        if ($depth && $args->has_children) {
            $classes[] = 'dropdown-submenu';
        }     

        $class_names = implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="'.esc_attr($class_names).'"';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'.$item->ID, $item, $args);
        $id = strlen($id) ? ' id="'.esc_attr($id).'"' : '';
        
        $output .= $indent.'<li'.$id.$value.$class_names.$li_attributes.'>';

        $attributes = !empty($item->attr_title) ? ' title="'.esc_attr($item->attr_title).'"' : '';
        $attributes .= !empty($item->target) ? ' target="'.esc_attr($item->target).'"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="'.esc_attr($item->xfn).'"' : '';
        $attributes .= !empty($item->url) ? ' href="'.esc_attr($item->url).'"' : '';
        $attributes .= ($args->has_children) ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

        $item_output = $args->before;
        $item_output .= '<a'.$attributes.'>';
        $item_output .= $args->link_before.apply_filters('the_title', $item->title, $item->ID).$args->link_after;

            // add support for menu item title
            if (strlen($item->attr_title) > 2) {
                $item_output .= '<h3 class="tit">'.$item->attr_title.'</h3>';
            }
            // // // add support for menu item descriptions
            // if (strlen($item->description) > 2) {
            //     $item_output .= '</a> <span class="sub">'.$item->description.'</span>';
            // }

        // variable pour stocker la description du parent
        
        // Attribuez la description du parent à la variable $parentDescription
        // if ($depth === 0 && !$this->parentDescriptionDisplayed && strlen($item->description) > 2) {
        //     $this->parentDescription = $item->description;
        //     $this->parentDescriptionDisplayed = true;
        // }

        // Utilisez $this->parentDescription pour la description du parent
        // if ($depth > 0 && strlen($this->parentDescription) > 2) {
        //     $item_output .= '<span class="sub">'.$this->parentDescription.'</span>';
        // }

        // Utilisez $item->description pour la description des enfants
        // if ($depth > 0 && strlen($item->description) > 2) {
        //     $item_output .= '<span class="sub-menu-description">'.$item->description.'</span>';
        // }



        
        $item_output .= (($depth == 0 || 1) && $args->has_children) ? ' <i class="fa-solid fa-chevron-down"></i></a>' : '</a>';
        $item_output .= $args->after;


        if ($depth > 0 && strlen($item->title) > 2) {
            $item_output = $args->before;

            // modif ici
            // $item_output .= '<div class="sub">'.$this->parentDescription.'</div>';
            // fin modif

            $item_output .= '<a'.$attributes.'>';
            $item_output .= '<span class="sub-menu-image-title"><img src="wp-content/themes/pilotintheme/assets/images/chart-line-up.png" alt="Description de l\'image" class="votre-classe-image">'. $args->link_before.apply_filters('the_title', $item->title, $item->ID).$args->link_after. '</span>';            
            }

            $item_output .= '</a>';

        if ($depth > 0 && strlen($item->description) > 2) {
            $item_output .= '<span class="sub-menu-description">'.$item->description.'</span>';
        }
               

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output) {

        if (!$element) {
            return;
        }

        $id_field = $this->db_fields['id'];

        //display this element
        if (is_array($args[0])) {
            $args[0]['has_children'] = !empty($children_elements[$element->$id_field]);
        } elseif (is_object($args[0])) {
            $args[0]->has_children = !empty($children_elements[$element->$id_field]);
        }

        $cb_args = array_merge(array(&$output, $element, $depth), $args);
        call_user_func_array(array($this, 'start_el'), $cb_args);

        $id = $element->$id_field;

        // descend only when the depth is right and there are childrens for this element
        if (($max_depth == 0 || $max_depth > $depth + 1) && isset($children_elements[$id])) {
            foreach ($children_elements[ $id ] as $child) {
                if (!isset($newlevel)) {
                    $newlevel = true;
              //start the child delimiter
              $cb_args = array_merge(array(&$output, $depth), $args);
                    call_user_func_array(array($this, 'start_lvl'), $cb_args);
                }
                $this->display_element($child, $children_elements, $max_depth, $depth + 1, $args, $output);
            }
            unset($children_elements[ $id ]);
        }

        if (isset($newlevel) && $newlevel) {
            //end the child delimiter
          $cb_args = array_merge(array(&$output, $depth), $args);
            call_user_func_array(array($this, 'end_lvl'), $cb_args);

            // Affiche la description du parent juste après la fermeture de </ul>
            // if ($depth === 0 && !$this->parentDescriptionDisplayed && strlen($this->parentDescription) > 2) {
            //     $output .= "$indent<div class=\"sub\">{$this->parentDescription}</div>\n";
            //     $this->parentDescriptionDisplayed = true;
            // }
        }

        //end this element
        $cb_args = array_merge(array(&$output, $element, $depth), $args);
        call_user_func_array(array($this, 'end_el'), $cb_args);
        

        
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
add_filter('upload_mimes', 'allow_svg_upload');
add_action('save_post', 'save_custom_css_class_field');
add_action('wp_enqueue_scripts', 'add_custom_scripts');
add_action('wp_enqueue_scripts', 'pilotintheme_register_assets');