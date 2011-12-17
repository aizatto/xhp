<?php

class :symfony:slot:output extends :symfony:base {

  attribute
    string name @required;

  public function render() {
    $slots = self::$container->get('templating.helper.slots');
    $name = $this->getAttribute('name');

    return
      <x:frag>
        {new \HTML($slots->get($name, null))}
      </x:frag>;
  }
}
