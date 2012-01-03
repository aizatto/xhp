<?php

class :symfony:input extends :symfony:base {

  attribute
    :input,
    Symfony\Component\Form\FormView formview;

  public function render() {
    $formview = $this->getAttribute('formview');
    
    $types = $formview->get('types');
    $type = end($types);
    $this->addClass($type);

    switch ($type) {
      case 'textarea':
        return $this->renderTextArea();
        break;

      case 'choice':
        return $this->renderChoice();
        break;

      case 'file':
        $this->setAttribute('type', 'file');
        break;

      case 'radio':
        $this->setAttribute('type', 'radio');
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

      case 'email':
      case 'password':
        $this->addClass('text');
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

  protected function renderChoice() {
    $formview = $this->getAttribute('formview');

    if ($formview->get('expanded')) {
      if ($formview->get('multiple')) {
        $content = $this->renderChoiceCheckbox();
      } else {
        $content = $this->renderChoiceRadio();
      }

      return
        <x:frag>
          {$content}
        </x:frag>;
    } else {
      return $this->renderChoiceSelect();
    }
  }

  protected function renderChoiceCheckbox() {
    $formview = $this->getAttribute('formview');
    $choices = $formview->get('choices');
    $html = array();
    foreach ($choices as $value => $option) {
      $input = <input type="checkbox" value={$value} />;
      $this->transferFormViewAttributes($input);
      $html[] =
        <label>
          {$input}
          {$option}
        </label>;
    }

    return $html;
  }

  protected function renderChoiceRadio() {
    $formview = $this->getAttribute('formview');
    $choices = $formview->get('choices');
    $html = array();
    foreach ($choices as $value => $option) {
      $input = <input type="radio" value={$value} />;
      $this->transferFormViewAttributes($input);
      $html[] =
        <label>
          {$input}
          {$option}
        </label>;
    }

    return $html;
  }

  protected function renderChoiceSelect() {
    $formview = $this->getAttribute('formview');
    $choices = $formview->get('choices');
    $options = array();
    foreach ($choices as $value => $option) {
      $options[] =
        <option value={$value}>
          {$option}
        </option>;
    }

    $element =
      <select>
        {$options}
      </select>;

    return $this->transferFormViewAttributes($element);
  }

  protected function transferFormViewAttributes($element) {
    $formview = $this->getAttribute('formview');
    $element
      ->setAttribute('id', $formview->get('id'))
      ->setAttribute('name', $formview->get('full_name'))
      ->setAttribute('required', $formview->get('required'));

    $this->transferAttributes($element, array('formview'));
    return $element;
  }

}
