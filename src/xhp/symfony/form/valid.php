<?php

class :symfony:form:valid extends :symfony:base {
  
  attribute
    bool valid;

  public function render() {
    $valid = $this->getAttribute('valid');

    if ($valid === true) {
      $content = $this->renderTrue();
    } else if ($valid === false) {
      $content = $this->renderFalse();
    } else if ($valid === null) {
      $content = $this->renderNull();
    }

    return $content;
  }

  public function renderTrue() {
    $children = $this->getChildren(
      :x:base::element2class('symfony:form:valid:success'));
    if ($children) {
      return
        <x:frag>
          {$children}
        </x:frag>;
    } else {
      return
        <div>
          Success
        </div>;
    }
  }

  public function renderFalse() {
    $children = $this->getChildren(
      :x:base::element2class('symfony:form:valid:failure'));
    if ($children) {
      return
        <x:frag>
          {$children}
        </x:frag>;
    } else {
      return
        <div>
          Failure 
        </div>;
    }
  }

  public function renderNull() {
    return
      <x:frag />;
  }

}
