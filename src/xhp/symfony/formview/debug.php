<?php

class :symfony:formview:debug extends :symfony:base {

  attribute
    Symfony\Component\Form\FormView formview @required;

  public function render() {
    $formview = $this->getAttribute('formview');

    return
      <x:frag>
        <h3>{$formview->get('full_name')}</h3>
        {$this->renderVars()}
        <hr />
        {$this->renderChildren()}
      </x:frag>;
  }

  public function renderVars() {
    $formview = $this->getAttribute('formview');

    $vars = $formview->getVars();

    $vars['children'] = $formview->count();
    $html = array();
    foreach ($vars as $key => $var) {
      $string = '';
      if ($var === true) {
        $string = 'true';
      } else if ($var === false) {
        $string = 'false';
      } else if (!is_object($var)) {
        $string = print_r($var, true);
      }

      $html[] =
        <tr>
          <td>{$key}</td>
          <td>{gettype($var)}</td>
          <td>{$string}</td>
        </tr>;
    }

    return
      <table>
        {$html}
      </table>;
  }

  public function renderChildren() {
    $formview = $this->getAttribute('formview');
    $html = array();
    foreach ($formview->getChildren() as $key => $child) {
      $html[] = 
        <x:frag>
          <symfony:formview:debug formview={$child} />
        </x:frag>;
    }

    return $html;
  }

}
