<?php

namespace SternerStuffBuilder\Layouts;

abstract class BuilderRow {

  protected $fields;

  public function print() {}

  public function getPrint() {
    ob_start();
    $this->print();
    return ob_get_clean();
  }

  function __construct($fields) {
    $this->fields = $fields;
  }
}
