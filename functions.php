<?php

if(!class_exists('Timber')) {

    add_action(
        'admin_notices',
        function() {
            echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
        }
    );

    add_filter(
        'template_include',
        function($template) {
            return get_stylesheet_directory() . '/static/no-timber.html';
        }
    );
    return;
}


class StarterSite extends Timber\Site {
    public function __construct(){
        add_filter('timber_context', [$this, 'add_to_context']);
        add_action('widgets_init', [$this, 'register_sidebars']);
        add_action('init', [$this, 'register_menus']);
        add_action('after_setup_theme', [$this, 'custom_logo_support']);
        parent::__construct();
    }

    function register_menus() {
        register_nav_menus([
            'menu_header' => __('Header Menu'),
            'menu_footer' => __('Footer Menu')
        ]);
    }

    public function add_to_context($context){
        $context['menu_header'] = new Timber\Menu('Header Menu');
        $context['menu_footer'] = new Timber\Menu('Footer Menu');
        $context['site'] = $this;

        // Custom Logo
        $custom_logo_id = get_theme_mod('custom_logo');
        $custom_logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
        $context['custom_logo_url'] = $custom_logo_url;

        return $context;
    }

    public function custom_logo_support() {
        add_theme_support('custom-logo');
    }

    public function theme_supports() {
        add_theme_support('menus');
    }
}

new StarterSite();