<?php

/**
 * http://symfony.com/doc/current/reference/forms/types.html
 *
 * Example:
 *
 *   <symfony:input formview={$formview['name']} />
 */
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
      case 'entity':
      case 'choice':
        return $this->renderChoice();
        break;

      case 'date':
      case 'birthday':
        return $this->renderDate();
        break;

      case 'textarea':
        return $this->renderTextArea();
        break;

      case 'hidden':
        $this->setAttribute('type', 'hidden');
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

      $type = $this->getAttribute('type');
      if (($type == 'checkbox' || $type == 'radio') &&
          $formview->get('checked')) {
        $input->setAttribute('checked', 'checked');
      }

      if ($value = $formview->get('max_length')) {
        $input->setAttribute('maxlength', $value);
      }
    } else {
      $this->transferAttributes($input);
    }

    return $input;
  }

  protected function renderChoice() {
    $formview = $this->getAttribute('formview');

    if ($formview->get('expanded')) {
      return
        <x:frag>
          {$this->renderChoiceExpanded()}
        </x:frag>;
    } else {
      return $this->renderChoiceSelect();
    }
  }

  protected function renderChoiceExpanded() {
    $formview = $this->getAttribute('formview');
    $children = $formview->getChildren();

    $html = array();
    foreach ($children as $child) {
      $html[] =
        <label>
          <symfony:input formview={$child} />
          {$child->get('label')}
        </label>;
    }

    return $html;
  }

  protected function renderChoiceSelect() {
    $formview = $this->getAttribute('formview');
    $choices = $formview->get('choices');
    $selected_value = $formview->get('value');

    $options = array();
    foreach ($choices as $value => $option) {
      $option =
        <option value={$value}>
          {$option}
        </option>;

      if ($selected_value == $value) {
        $option->setAttribute('selected', true);
      }

      $options[] = $option;
    }

    $element =
      <select>
        {$options}
      </select>;

    if ($formview->get('multiple')) {
      $element->setAttribute('multiple', 'multiple');
    }

    return $this->transferFormViewAttributes($element);
  }

  protected function renderDate() {
    $formview = $this->getAttribute('formview');
    $widget = $formview->get('widget');
  
    switch ($widget) {
      case 'text':
        return $this->renderDateText();
        break;

      case 'choice':
        return $this->renderDateChoice();
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

  /**
   * TODO add option for 'pattern'
   */
  protected function renderDateChoice() {
    $formview = $this->getAttribute('formview');
    $html = array();

    $date_pattern = $formview->get('date_pattern');
    $values = preg_split(
      '/({{ day }}|{{ month }}|{{ year }})/',
      $date_pattern,
      -1,
      PREG_SPLIT_DELIM_CAPTURE);

    $year = $formview['year'];
    $month = $formview['month'];
    $day = $formview['day'];

    foreach ($values as $index => $value) {
      switch ($value) {
        case '{{ day }}':
          $values[$index] = <symfony:input formview={$day} />;
          break;

        case '{{ month }}':
          $values[$index] = <symfony:input formview={$month} />;
          break;

        case '{{ year }}':
          $values[$index] = <symfony:input formview={$year} />;
          break;

        default:
          // pass;
          break;
      }
    }

    $element =
      <div id={$formview->get('id')}>
        {$values}
      </div>;

    return $element;
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
