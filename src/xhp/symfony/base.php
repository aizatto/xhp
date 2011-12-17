<?php

abstract class :symfony:base extends :ui:base {

  static protected $container;

  public static function setContainer($container) {
    self::$container = $container;
  }

  public static function getContainer() {
    return self::$container;
  }

}
