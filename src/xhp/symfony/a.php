<?php

class :symfony:a extends :symfony:route {

  attribute
    :a;

  public function render() {
    $this->setAttribute('href', $this->getPath());

    return $this->transferToElement(<a />);
  }

}
