<?php

namespace SternerStuffBuilder\Layouts;

use SternerStuffBuilder\Layouts\BuilderRow;

class ContentPlainRow extends BuilderRow {

  public $slug = 'content-plain';

  function content() {
    ?>
    <div class="container">
  		<div class="row py-5">
  			<div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
  				<?php echo $this->fields['content']; ?>
  			</div>
  		</div>
    </div>
  <?php
  }
}
