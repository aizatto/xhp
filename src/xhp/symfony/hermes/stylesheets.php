<?php

class :symfony:hermes:stylesheets extends :symfony:base {

  public function render() {
    $hermes = self::$container->get('hermes');
    $router = self::$container->get('router');

    $stylesheets = array();
    foreach ($hermes->flushCSS() as $asset) {
      $url = $router->generate('hermes', array('id' => $asset));
      $stylesheets[] = <link rel="stylesheet" href={$url} ></link>;
    }

    return
      <x:frag>
        {$stylesheets}
      </x:frag>;
  }

}
