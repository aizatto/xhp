<?php

class :symfony:hermes:assetic:javascripts extends :symfony:base {

  attribute
    array assets;

  public function render() {
    $hermes = self::$container->get('hermes')->scripts;
    $assets = $this->getAttribute('assets');

    $html = array();

    if ($assets) { 
      $assets = $hermes->resolveResources($assets);
    } else {
      $assets = $hermes->flush();
    }

    $paths = ipull($assets, 'path');
    $helper = self::$container->get('assetic.helper.dynamic');
    $html = array();
    foreach ($helper->javascripts($paths) as $url) {
      $html[] = <script type="text/javascript" src={$url} ></script>;
    }

    return
      <x:frag>
        {$html}
      </x:frag>;
  }

}
