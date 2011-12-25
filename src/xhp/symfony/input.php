<?php

class :symfony:input extends :symfony:base {

  attribute
    :input,
    Symfony\Component\Form\FormView formview;

  public function render() {
    $formview = $this->getAttribute('formview');
    
    $types = $formview->get('types');
    $type = end($types);

    if ($type == 'textarea') {
      return $this->renderTextArea();
    }

    switch (end($types)) {
      case 'file':
        $this->setAttribute('type', 'file');
        break;

      case 'checkbox':
        $this->setAttribute('type', 'checkbox');
        break;

      case 'entity':
      case 'csrf':
        $this->setAttribute('type', 'hidden');
        break;
        
      case 'text':
        $this->setAttribute('type', 'text');
        break;
    };

    return $this->renderField();
  }

  protected function renderField() {
    $formview = $this->getAttribute('formview');
    $input = <input />;

    $this->transferFormViewAttributes($input, array('formview'))
      ->setAttribute('value', $formview->get('value'));

    if ($this->getAttribute('type') == 'checkbox' &&
        $formview->get('checked')) {
      $input->setAttribute('checked', 'checked');
    }

    return $input;
  }

  protected function renderTextArea() {
    $textarea = <textarea>{$this->getAttribute('formview')->get('value')}</textarea>;
    $this->transferFormViewAttributes($textarea);

    return $textarea;
  }

  private function transferFormViewAttributes($element) {
    $formview = $this->getAttribute('formview');
    $element
      ->setAttribute('id', $formview->get('id'))
      ->setAttribute('name', $formview->get('full_name'))
      ->setAttribute('required', $formview->get('required'));

    $this->transferAttributes($element, array('formview'));
    return $element;
  }

}
