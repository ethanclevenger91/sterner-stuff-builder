<?php

namespace SternerStuffBuilder\Layouts;

abstract class BuilderRow {

  protected $fields;
  public $index;

  public function content() {}

  public function print() {
    $this->wrap();
    $this->content();
    $this->endWrap();
  }

  public function getPrint() {
    ob_start();
    $this->print();
    return ob_get_clean();
  }

  public function wrap() {
    echo '<div class="'.implode(' ', $this->getWrapClasses()).'"'.($this->getWrapId() ? ' id="'.$this->getWrapId().'"': '').'>';
  }

  public function endWrap() {
    echo '</div>';
  }

  public function getWrapClasses() {
    return apply_filters('ssb-row-class', ['ssb-row', 'ssb-row--'.$this->slug], $this);
  }

  public function getWrapId() {
    return ($this->index ? 'ssb-row__'.$this->index : false);
  }

  public function setIndex($index) {
    $this->index = $index;
  }

  function __construct($fields) {
    $this->fields = $fields;
  }
}
