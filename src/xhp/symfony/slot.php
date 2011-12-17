<?php

class :symfony:slot extends :symfony:base {

  attribute
    string name @required;

  public function render() {
    $slots = self::$container->get('templating.helper.slots');
    $name = $this->getAttribute('name');

    $proxy = <x:frag>{$this->getChildren()}</x:frag>;

    $slots->set($name, $proxy->toString());
    return <x:frag />;
  }
}
