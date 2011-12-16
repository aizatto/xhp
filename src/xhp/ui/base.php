<?php

class :ui:base extends :x:element {

  attribute :xhp:html-element;
  
  category %flow;

  // copied from :xhp:html-element
  public function addClass($class) {
    $class = trim($class);

    $currentClasses = $this->getAttribute('class');
    $has = strpos(' '.$currentClasses.' ', ' '.$class.' ') !== false;
    if ($has) {
      return $this;
    }

    $this->setAttribute('class', trim($currentClasses.' '.$class));
    return $this;
  }


  public function transferAttributes(:x:base $element, $ignore = array()) {
    $attributes = $this->getAttributes();
    if ($ignore) {
      $attributes = array_diff_key($attributes, array_flip($ignore));
    }

    $supported = $element->__xhpAttributeDeclaration();

    foreach ($attributes as $key => $value) {
      if (!isset($supported[$key])) {
        continue;
      }

      $element->setAttribute($key, $value);
    }
    return $element;
  }

}
