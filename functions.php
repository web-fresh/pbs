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

        return $context;
    }

    public function theme_supports() {
        add_theme_support('menus');
    }
}

new StarterSite();