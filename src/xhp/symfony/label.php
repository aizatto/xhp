<?php

class :symfony:label extends :symfony:base {
  
  attribute
    :label,
    Symfony\Component\Form\FormView formview;

  public function render() {
    $formview = $this->getAttribute('formview');

    $label =
      <label for={$formview->get('id')}>
        {$this->getChildren()}
      </label>;
    return $this->transferAttributes($label);
  }
}
