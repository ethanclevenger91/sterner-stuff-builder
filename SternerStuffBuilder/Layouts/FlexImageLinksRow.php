<?php

namespace SternerStuffBuilder\Layouts;

use SternerStuffBuilder\Layouts\BuilderRow;

class FlexImageLinksRow extends BuilderRow {

  function print() {
    echo '<div class="builder__flex-image-links">';
      echo '<div class="container">';
        if($this->fields['header']):
          echo '<div class="builder__flex-image-links__header mb-5">';
            echo $this->fields['header'];
          echo '</div>';
        endif;
        if(count($this->fields['items'])): ?>
          <div class="row">
            <div class="col-12 d-flex justify-content-around flex-wrap align-items-center">
              <?php foreach($this->fields['items'] as $item):
                $this->printItem($item);
              endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    <?php endif;
  }

  function printItem($item) {
    if($item['link']) echo '<a href="'.$item['link'].'">';
    echo wp_get_attachment_image($item['image']['ID'], 'medium');
    if($item['link']) echo '</a>';
  }

}
