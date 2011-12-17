<?php

class :symfony:link extends :symfony:base {

  attribute
    :link,
    enum {
      'stylesheet'
    } rel = 'stylesheet';

  public function render() {
    $assets = self::$container->get('templating.helper.assets');
    $this->setAttribute('href', $assets->getURL($this->getAttribute('href')));

    $element = <link />; 
    $this->transferAttributes($element);
    return $element;
  }

}
