<?php
/**
 * Plugin Name:     Gradient for Elementor
 * Plugin URI:      #
 * Description:     This plugin will let you have gradient text without using CSS
 * Version:         1.0
 * Author:          Jericho Gane
 * Author URI:      #
 **/

namespace WPC;

class Widget_Loader{

  private static $_instance = null;

  public static function instance()
  {
    if (is_null(self::$_instance)) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }


  private function include_widgets_files(){
    require_once(__DIR__ . '/assets/gradient-text.php');
  }

  public function register_widgets(){

    $this->include_widgets_files();

    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new Widgets\GradientText());

  }

  public function __construct(){
    add_action('elementor/widgets/widgets_registered', [$this, 'register_widgets'], 99);
  }
}

Widget_Loader::instance();