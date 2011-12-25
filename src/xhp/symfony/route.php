<?php

abstract class :symfony:route extends :symfony:base {

  attribute
    string route,
    array params;

  protected function getPath() {
    $route = $this->getAttribute('route');

    if (!$route) {
      return null;
    }

    $params = $this->getAttribute('params');
    if (!is_array($params)) {
      $params = array();
    }

    $router = self::$container->get('router');
    return $router->generate($route, $params);
  }
  attribute
    :a;

  public function render() {
    $this->setAttribute('href', $this->getPath());

    return $this->transferToElement(<a />);
  }

}
