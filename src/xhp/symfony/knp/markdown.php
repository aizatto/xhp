<?php

/**
 * To be used together with https://github.com/KnpLabs/KnpMarkdownBundle
 */
class :symfony:knp:markdown extends :symfony:base {

  public function render() {
    $contents = '';
    foreach ($this->getChildren() as $text) {
      $contents .= self::$container->get('markdown.parser')->transform($text);
    }

    return
      <x:frag>
        {new HTML($contents)}
      </x:frag>;
  }

}
