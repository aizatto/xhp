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

  public function transferToElement($element, $ignore = array()) {
    $element->appendChild($this->getChildren());
    $this->transferAttributes($element, $ignore);
    return $element;
  }

  public function transferAttributes(:x:base $element, $ignore = array()) {
    $attributes = $this->__xhpAttributeDeclaration();
    if ($ignore) {
      foreach ((array) $ignore as $key => $value) {
        unset($attributes[$value]);
      }
    }

    $supported = $element->__xhpAttributeDeclaration();

    foreach ($attributes as $key => $value) {
      if (!isset($supported[$key])) {
        continue;
      }

      if ($value = $this->getAttribute($key)) {
        $element->setAttribute($key, $value);
      }
    }
    return $element;
  }

}
