<?php

class :symfony:twitter:field extends :symfony:base {

  attribute
    :input,
    Symfony\Component\Form\FormView formview;

  public function render() {
    $formview = $this->getAttribute('formview');
    $input = <symfony:input formview={$formview} />;
    $this->transferAttributes($input, array('type'));

    return
      <twitter:field>
        <symfony:label formview={$formview}>
          {$this->getChildren()}
        </symfony:label>
        <twitter:input size="xxlarge">
          {$input}
        </twitter:input>
      </twitter:field>;
  }
 
}
