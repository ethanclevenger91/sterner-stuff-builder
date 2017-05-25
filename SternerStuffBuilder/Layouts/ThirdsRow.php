<?php

namespace SternerStuffBuilder\Layouts;

use SternerStuffBuilder\BuilderRow;
use SternerStuffBuilder\Components\Button;

class ThirdsRow extends BuilderRow {

  function print() {
    ?>
    <div class="container">
  		<div class="row py-5">
  			<?php foreach($this->fields['sections'] as $section): ?>
  				<div class="col-12 col-md-4 text-center mb-5">
            <div class="builder__thirds__third">
              <?php echo $section['content']; ?>
              <?php if($section['with_buttons']): ?>
                <div class="builder__thirds__third__buttons mt-3">
                  <?php if(count($section['buttons']) > 1): ?>
                    <div class="row">
                      <?php $buttonCount = 0;
                      foreach($section['buttons'] as $button):
                        $button = new Button($button['title'], $button['link'], $button['type'], ($button['size'] ?: false));
                        $buttonCount++; ?>
                        <div class="col-6 col-md-4<?php if($buttonCount == 1) echo ' offset-md-2'; ?>">
                          <?php $button->print(); ?>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  <?php else:
                    $button = new Button($section['buttons'][0]['title'], $section['buttons'][0]['link'], $section['buttons'][0]['type'], ($section['buttons'][0]['size'] ?: false)); ?>
                    <div class="col-12 text-center">
                      <?php $button->print(); ?>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            </div>
  				</div>
  			<?php endforeach; ?>
  		</div>
  	</div>
  <?php
  }
}
