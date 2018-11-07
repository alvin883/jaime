<?php

// WARNING : this function will remove `<p>` tag from `the_content();`
remove_filter( 'the_content', 'wpautop' );

// WARNING : this function will remove `[...]` text from `the_excerpt();`
function new_excerpt_more( $more ) {
    return ' ... ';
}
add_filter('excerpt_more', 'new_excerpt_more');

// WARNING : this function will remove the default wordpress CSS
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

// This customization guided from https://stackoverflow.com/questions/12159486/wordpress-change-header-navigation-list-items-to-div
class Description_Walker extends Walker_Nav_Menu {
    // This function fixed with https://wordpress.stackexchange.com/questions/249007/error-warning-declaration-of-description-walkerstart-el-after-php-upgrad
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0){
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ',apply_filters('nav_menu_css_class', array_filter($classes), $item));
        !empty($class_names) and $class_names = ' class="' . esc_attr($class_names) . '"';
        $output .= "<div id='menu-item-$item->ID' $class_names>";
        $attributes = "";
        !empty($item->attr_title) and $attributes .= ' title="' . esc_attr($item->attr_title) . '"';
        !empty($item->target) and $attributes .= ' target="' . esc_attr($item->target) . '"';
        !empty($item->xfn) and $attributes .= ' rel="' . esc_attr($item->xfn) . '"';
        !empty($item->url) and $attributes .= ' href="' . esc_attr($item->url) . '"';

        $title = apply_filters('the_title', $item->title, $item->ID);

        $item_output = $args->before . 
            "<a $attributes>" . $args->link_before . $title . "</a></div>" .
            $args->link_after . $args->after;
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);

    }
}

function update_jquery_version(){
    wp_deregister_script('jquery');
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.3.1.min.js');
}

function bootstrap_enqueue_styles(){
    wp_enqueue_style('bootstraptheme-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('material-icon', get_template_directory_uri() . '/MaterialDesignIcon/css/materialdesignicons.css');
    //wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css');
    //$depedencies = array('bootstrap');
    //wp_enqueue_style('bootstraptheme-style', get_stylesheet_uri(), $depedencies);
}

function bootstrap_enqueue_scripts(){
    $depedencies = array('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', $depedencies, '3.3.6', true);
}

function custom_enqueue_scripts(){
    wp_register_script('thisscript', get_template_directory_uri() . '/js/thisscript.js', array('jquery') );
    wp_enqueue_script('thisscript');
}

/**
 * FIXME: With this updated jQuery version , WP Widget can not drag and drop , !important
 */
add_action('wp_enqueue_scripts','update_jquery_version');
add_action('admin_enqueue_scripts','update_jquery_version');
add_action('wp_enqueue_scripts','bootstrap_enqueue_styles');
add_action('wp_enqueue_scripts','bootstrap_enqueue_scripts');
add_action('wp_enqueue_scripts','custom_enqueue_scripts');

function this_theme_setup(){
    // Add Navigation Menus
    register_nav_menus(array(
        'primary' => __('Sidenav Menu'),
        'footer' => __('Footer Menu')
    ));

    // Add featured Image
    add_theme_support('post-thumbnails');

    // Customize Thumbnail Size
    add_image_size('small', 180, 120, true);
    add_image_size('banner', 920, 210, false);
}

add_action('after_setup_theme','this_theme_setup');


// Add our widgets location
function ourWidgetsInit(){
    register_sidebar(array(
        'name' => 'Sidebar',
        'id' => 'sidebar1',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}
add_action('widgets_init','ourWidgetsInit');


/**
 * Custom Comment Template
 */
require get_template_directory() . '/inc/custom/comment.php';


/**
 * Custom Comment Template
 */
require get_template_directory() . '/inc/custom-css.php';


/**
 * Custom Post Types
 */
require get_template_directory() . '/inc/post-type/register-portofolio.php';


/**
 * Redux Framework
 */
if(!class_exists('ReduxFramework')){
    require_once (get_template_directory() . '/redux/framework.php');
    
}
// Register Redux
require_once get_template_directory() . '/inc/redux-config.php';
// Redux getter
require_once get_template_directory() . '/inc/bootstraptheme_options.php';



/**
 * Comment form hidden fields
 */
function comment_form_hidden_fields()
{
    comment_id_fields();
    if ( current_user_can( 'unfiltered_html' ) )
    {
        wp_nonce_field( 'unfiltered-html-comment_' . get_the_ID(), '_wp_unfiltered_html_comment', false );
    }
}

?>