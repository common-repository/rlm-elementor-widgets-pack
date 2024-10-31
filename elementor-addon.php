<?php

/**
 * Plugin Name: RLM Elementor Widgets Pack
 * Description: Awesome widgets for Elementor.
 * Version:     1.4.0
 * Author:      Zach Silberstein
 * Author URI:  relevantlocalmedia.com
 * Text Domain: rlm-widgets
 */

function register_rlm_widgets($widgets_manager)
{

    require_once(__DIR__ . '/widgets/copyright-widget.php');
    require_once(__DIR__ . '/widgets/menu-sections-widget.php');
    require_once(__DIR__ . '/widgets/menu-section-widget.php');
    require_once(__DIR__ . '/widgets/daily-specials-widget.php');
    require_once(__DIR__ . '/widgets/responsive-page-header.php');
    require_once(__DIR__ . '/widgets/button-widget.php');


    $widgets_manager->register(new \Elementor_Copyright_Widget());
    $widgets_manager->register(new \Elementor_Menu_Sections_Widget());
    $widgets_manager->register(new \Elementor_Menu_Section_Widget());
    $widgets_manager->register(new \Elementor_Daily_Specials_Widget());
    $widgets_manager->register(new \Elementor_Page_Title_Header());
    $widgets_manager->register(new \Elementor_RLM_Button_Widget());
}
add_action('elementor/widgets/register', 'register_rlm_widgets');
