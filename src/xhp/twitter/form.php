<?php

class :twitter:form extends :ui:base {

  attribute
    :form,
    bool stacked = false;

  public function render() {
    $form = <form>{$this->getChildren()}</form>;
    $this->transferAttributes($form);
    if ($this->getAttribute('stacked')) {
      $form->addClass('form-stacked');
    }

    return $form;
  }

}
