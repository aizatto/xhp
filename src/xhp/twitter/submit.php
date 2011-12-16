<?php

class :twitter:submit extends :ui:base {

  attribute
    :input,
    enum {
      'primary',
      'info',
      'success',
      'danger'
    } type,
    bool disabled = false;

  public function render() {
    $type = $this->getAttribute('type');
    if ($type) {
      $this->addClass($type);
    }

    if ($this->getAttribute('disabled')) {
      $this->addClass('disabled');
    }

    $element = $this->renderElement();
    $this->transferAttributes($element, array('type'));
    return $element;
  }

  private function renderElement() {
    return <input type="submit" class="btn" />;
  }

}
