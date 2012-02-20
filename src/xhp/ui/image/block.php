<?php

class :ui:image-block extends :cp:base {

  public function render() {
    $children = $this->getChildren();

    $element =
      <div class="image-block">
        <div class="image-block-left">
          {$children[0]}
        </div>
        <div class="image-block-right">
          <div class="image-block-right-wrapper">
            {$children[1]}
          </div>
        </div>
      </div>;

    return $this->transferAttributes($element);
  }

}
