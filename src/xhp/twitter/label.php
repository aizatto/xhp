<?php

class :twitter:label extends :ui:base {

  attribute
    :span,
    enum {
      'success',
      'warning',
      'important',
      'notice'
    } type;

  public function render() {
    $element =
      <span class="label">
        {$this->getChildren()}
      </span>;

    $type = $this->getAttribute('type');
    if ($type) {
      $element->addClass($type);
    }

    $this->transferAttributes($element);
    return $element;
  }

}
