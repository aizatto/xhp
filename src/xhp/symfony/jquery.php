<?php

class :symfony:jquery extends :symfony:base {

  attribute
    string callback;

  public function render() {
    $protocol = self::$container->get('request')->isSecure() ? 'https' : 'http';
    $key = self::$container->getParameter('google.api_key.'.$protocol);

    $modules = array(
      'modules' => array(
        array(
          'name' => 'jquery',
          'version' => '1.7.1',
        )
      )
    );
    $modules = array();
    $modules = json_encode($modules);

    $params = array(
      'key' => $key,
      'modules' => $modules,
    );

    if ($callback = $this->getAttribute('callback')) {
      $params['callback'] = $callback;
    }

    $query = http_build_query($params);

    $src = "https://www.google.com/jsapi?{$query}";

    return
      <x:frag>
        <script type="text/javascript" src={$src}></script>
        <script
          type="text/javascript "
          src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" >
        </script>

      </x:frag>;
  }

}
