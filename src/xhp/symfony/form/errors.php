<?php

class :symfony:form:errors extends :symfony:base {

  attribute 
    Symfony\Component\Form\FormView formview;

  public function render() {
    $formview = $this->getAttribute('formview');

    $errors = $this->getErrors($formview);

    if (count($errors) == 0) {
      return
        <x:frag />;
    }

    return
      <ul>
        {$errors}
      </ul>;
  }

  private function getErrors(Symfony\Component\Form\FormView $formview) {
    $errors = array();
    foreach ($formview->get('errors') as $error) {
      $errors[] =
        <li>
          {$error->getMessageTemplate()}
        </li>;
    }

    foreach ($formview->getChildren() as $field) {
      $child_errors = $this->getErrors($field);
      if (count($child_errors) == 0) {
        continue;
      }

      $errors[] = 
        <li>
          {$field->get('label')}:
          <ul>{$child_errors}</ul>
        </li>;
    }

    return $errors;
  }

}
