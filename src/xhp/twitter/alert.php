<?php

class :twitter:alert extends :ui:base {

  attribute
    :div,
    enum {
      'warning',
      'error',
      'success',
      'info'
    } type = 'warning',
    bool block = false;

  public function render() {
    $element =
      <div class="alert-message">
        {$this->getChildren()}
      </div>;

    $type = $this->getAttribute('type');
    if ($type) {
      $element->addClass($type);
    }

    if ($this->getAttribute('block')) {
      $element->addClass('block-message');
    }

    $this->transferAttributes($element);
    return $element;
  }

}
