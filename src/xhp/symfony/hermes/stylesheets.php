<?php

/**
 * Sample:
 *
 *   <head>
 *     <symfony:hermes:stylesheets />
 *   </head>
 */
class :symfony:hermes:stylesheets extends :symfony:hermes:base {

  protected function getAssetManagerContainer() {
    return self::$container->get('hermes')->stylesheets;
  }

  public function renderAsset($asset) {
    $url = self::$container->get('hermes')->getURL('css', $asset);
    return <link rel="stylesheet" href={$url} ></link>;
  }

}
