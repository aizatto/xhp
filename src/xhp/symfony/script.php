<?php

class :symfony:script extends :symfony:base {

  attribute
    :script,
    enum {
      'text/javascript'
    } rel = 'stylesheet';

  public function render() {
    $assets = self::$container->get('templating.helper.assets');
    $this->setAttribute('src', $assets->getURL($this->getAttribute('src')));

    $element = <script>{$this->getChildren()}</script>; 
    $this->transferAttributes($element);
    return $element;
  }

}
