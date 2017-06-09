<?php

// namespace must be unique to each plugin
namespace SternerStuffBuilder;

class Builder {
  function __construct() {
    // Load builder repeater fields
    add_filter('acf/settings/load_json', function ($paths) {
        $paths[] = dirname(__FILE__) . '/../acf-json';
        return $paths;
    });

    add_filter('the_content', 'SternerStuffBuilder\Builder::get_content', 1);
  }

  public static function get_content($content) {
    $builder_content = '';
    $index = -1;
    if(get_field('use_builder')) {
      remove_filter( 'the_content', 'wpautop' );
      while (get_field('use_builder') && have_rows('builder') && ++$index !== false) {
        $row_fields = the_row(true);
        $layout = get_row_layout();
        $layout = str_replace(' ', '', ucwords(str_replace('_', ' ', $layout)));
        $layout_class = "\SternerStuffBuilder\Layouts\\".$layout."Row";
        $row = new $layout_class($row_fields);
        $row->setIndex($index);
        $builder_content .= $row->getPrint();
      }
    }
    return (get_field('use_builder') ? $builder_content : $content);
  }
}
