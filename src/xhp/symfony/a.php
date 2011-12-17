<?php

class :symfony:a extends :symfony:base {

  attribute
    :a,
    string route,
    array params;

  public function render() {
    $route = $this->getAttribute('route');

    if ($route) {
      $params = $this->getAttribute('params');
      if (!is_array($params)) {
        $params = array();
      }

      $router = self::$container->get('router');
      $href = $router->generate($route, $params);

      $this->setAttribute('href', $href);
    }

    $element = <a>{$this->getChildren()}</a>; 
    $this->transferAttributes($element);
    return $element;
  }

}
