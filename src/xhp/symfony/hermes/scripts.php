<?php

/**
 * Sample:
 *
 *   <body>
 *     <symfony:hermes:scripts />
 *     <javelin:footer />
 *   </body>
 */
class :symfony:hermes:scripts extends :symfony:hermes:base {

  protected function getAssetManagerContainer() {
    return self::$container->get('hermes')->scripts;
  }

  public function renderAsset($asset) {
    $url = self::$container->get('router')
      ->generate('hermes_js', array('id' => $asset));
    return <script type="text/javascript" src={$url} ></script>;
  }

}
