<?php

class :symfony:img extends :symfony:base {

  attribute
    :img;

  public function render() {
    $assets = self::$container->get('templating.helper.assets');
    $this->setAttribute('src', $assets->getURL($this->getAttribute('src')));

    $element = <img />; 
    $this->transferAttributes($element);
    return $element;
  }

}
