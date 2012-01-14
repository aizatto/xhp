<?php

class :symfony:a extends :symfony:route {

  attribute
    :a;

  public function render() {
    if (!$this->getAttribute('href')) {
      $this->setAttribute('href', $this->getPath());
    }

    return $this->transferToElement(<a />);
  }

}
