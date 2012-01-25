<?php

abstract class :symfony:hermes:base extends :symfony:base {

  attribute
    array assets;

  abstract protected function getAssetManagerContainer();
  abstract protected function renderAsset($asset);

  public function render() {
    $hermes = $this->getAssetManagerContainer();
    $assets = $this->getAttribute('assets');

    $html = array();

    if ($assets) { 
      $assets = array_keys($hermes->resolveResources($assets));
      foreach ($assets as $asset) {
        $html[] = $this->renderAsset($asset);
      }
    } else {
      foreach ($hermes->flush() as $asset) {
        $html[] = $this->renderAsset($asset);
      }
    }

    return
      <x:frag>
        {$html}
      </x:frag>;
  }

}
