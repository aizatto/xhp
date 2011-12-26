<?php

class :symfony:form extends :symfony:route {

  attribute
    :form,
    Symfony\Component\Form\FormView formview;

  public function render() {
    $this->setAttribute('action', $this->getPath());
    $element = <form />;
    if ($formview = $this->getAttribute('formview')) {
      $children = $formview->getChildren();
      foreach ($children as $child) {
        $types = $child->get('types');
        if (!is_array($types)) {
          continue;
        }

        $types = array_flip($types);

        if (!isset($types['csrf'])) {
          continue;
        }

        $element->appendChild(
          <symfony:input formview={$children['_token']} />
        );
      }

      if ($formview->get('multipart')) {
        $element->setAttribute('enctype', 'multipart/form-data');
      }
    }

    return $this->transferToElement($element);
  }

}
