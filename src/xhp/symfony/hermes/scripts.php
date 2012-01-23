<?php

class :symfony:hermes:scripts extends :symfony:base {

  public function render() {
    $hermes = self::$container->get('hermes');
    $router = self::$container->get('router');

    $scripts = array();
    foreach ($hermes->flushJS() as $asset) {
      $url = $router->generate('hermes', array('id' => $asset));
      $scripts[] = <script type="text/javascript" src={$url} ></script>;
    }

    return
      <x:frag>
        {$scripts}
      </x:frag>;
  }

}
