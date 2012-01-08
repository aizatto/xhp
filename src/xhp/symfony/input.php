<?php

class :symfony:input extends :symfony:base {

  attribute
    :input,
    Symfony\Component\Form\FormView formview;

  public function render() {
    $formview = $this->getAttribute('formview');
    
    if ($formview) {
      $types = $formview->get('types');
      $type = end($types);
    } else {
      $type = $this->getAttribute('type');
    }

    $this->addClass($type);

    switch ($type) {
      case 'choice':
        return $this->renderChoice();
        break;

      case 'date':
        return $this->renderDate();
        break;

      case 'textarea':
        return $this->renderTextArea();
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
    $input = <input />;

    $formview = $this->getAttribute('formview');
    if ($formview) {
      $this->transferFormViewAttributes($input)
        ->setAttribute('value', $formview->get('value'));

      if ($this->getAttribute('type') == 'checkbox' &&
          $formview->get('checked')) {
        $input->setAttribute('checked', 'checked');
      }
    } else {
      $this->transferAttributes($input);
    }

    return $input;
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

  protected function renderDate() {
    $formview = $this->getAttribute('formview');
    $widget = $formview->get('widget');
  
    switch ($widget) {
      case 'text':
        return $this->renderDateText();
        break;
    }

    throw new \Exception(sprintf('Unexpected widget: %s', $widget));
  }
  protected function renderDateText() {
    $formview = $this->getAttribute('formview');

    $html = array();
    foreach ($formview->getChildren() as $child) {
      $html[] =
        <symfony:input
          formview={$child}
        />;
    }

    $element = <div>{$html}</div>;
    $element->setAttribute('id', $formview->get('id'));
    return $this->transferAttributes($element);
  }

  protected function renderTextArea() {
    $textarea = <textarea>{$this->getAttribute('formview')->get('value')}</textarea>;
    $this->transferFormViewAttributes($textarea);

    return $textarea;
  }

  protected function transferFormViewAttributes($element) {
    $formview = $this->getAttribute('formview');
    $element
      ->setAttribute('id', $formview->get('id'))
      ->setAttribute('name', $formview->get('full_name'))
      ->setAttribute('required', $formview->get('required'));

    foreach ($formview->get('attr') as $key => $value) {
      $element->setAttribute($key, $value);
    }

    $this->transferAttributes($element);
    return $element;
  }

}
