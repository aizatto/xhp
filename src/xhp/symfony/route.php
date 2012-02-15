<?php

abstract class :symfony:route extends :symfony:base {

  attribute
    string route,
    array params,
    bool absolute;

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
    return $router->generate($route, $params, $this->getAttribute('absolute'));
  }

  protected function isCurrent() {
    $route = $this->getAttribute('route');
    if (!$route) {
      return false;
    }

    $request = self::$container->get('request');
    $current_route = $request->attributes->get('_route');

    return $route == $current_route;
  }

}
