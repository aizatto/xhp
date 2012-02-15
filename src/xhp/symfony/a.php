<?php

class :symfony:a extends :symfony:route {

  attribute
    :a;

  public function render() {
    if (!$this->getAttribute('href')) {
      $this->setAttribute('href', $this->getPath());
    }

    if ($this->isCurrent()) {
      $this->addClass('current');
    }

    return $this->transferToElement(<a />);
  }

}
