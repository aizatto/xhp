<?php

class :symfony:form extends :symfony:route {

  attribute
    :form;

  public function render() {
    $this->setAttribute('action', $this->getPath());

    return $this->transferToElement(<form />);
  }

}
