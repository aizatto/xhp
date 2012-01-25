<?php

class :symfony:hermes:stylesheets extends :symfony:hermes:base {

  protected function getAssetManagerContainer() {
    return self::$container->get('hermes')->stylesheets;
  }

  public function renderAsset($asset) {
    $url = self::$container->get('router')
      ->generate('hermes_css', array('id' => $asset));
    return <link rel="stylesheet" href={$url} ></link>;
  }

}
