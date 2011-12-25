<?php

class :tx extends :x:element {

  public function render() {
    $string = trim(id(<x:frag>{$this->getChildren()}</x:frag>)->toString());

    return
      <x:frag>
        {new HTML($string)}
      </x:frag>;
  }
}
