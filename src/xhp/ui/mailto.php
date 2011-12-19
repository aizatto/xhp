<?php

class :ui:mailto extends :ui:base {

  attribute
    :a,
    string email @required,
    string subject,
    string cc,
    string bcc,
    string body;

  public function render() {
    $element = $this->transferToElement(<a />);
    $email = $this->getAttribute('email');
    $params = array();

    foreach (array('subject', 'cc', 'bcc', 'body') as $key) {
      if ($value = $this->getAttribute($key)) {
        $params[$key] = $value;
      }
    }

    $params = http_build_query(
      $params,
      null,
      ini_get('arg_separator.output'));

    $element->setAttribute(
      'href',
      'mailto:'.$email.'?'.$params);

    if (!$element->getChildren()) {
      $element->appendChild(
        <x:frag>
          {$email}
        </x:frag>
      ); 
    }

    return $element;
  }

}
