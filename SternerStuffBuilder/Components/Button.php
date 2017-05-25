<?php

namespace SternerStuffBuilder\Components;

use SternerStuffBuilder\Components\Component;

class Button extends Component {
  private $title;
  private $link;
  private $type;
  private $size;

  public function __construct($title, $link, $type = 'Primary', $size = false) {
    $this->title = $title;
    $this->link = $link;
    $this->type = strtolower($type);
    $this->size = $size;
  }

  public function print() {
    echo "<a href='$this->link' class='btn btn-$this->type".($this->size ? " btn-$this->size" : '')."'>$this->title</a>";
  }
}
