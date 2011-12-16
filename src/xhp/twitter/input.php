<?php
// http://twitter.github.com/bootstrap/#forms

class :twitter:input extends :ui:base {

  attribute
    enum {
      'mini',
      'small',
      'medium',
      'large',
      'xlarge',
      'xxlarge'
    } size;

  public function render() {
    $size = $this->getAttribute('size');

    $inputs = $this->getChildren('xhp_input');
    foreach ($inputs as $input) {
      $class = $input->getAttribute('class');
      $input->addClass($size);
    }

    return
      <div class="input">
        {$this->getChildren()}
      </div>;
  }

}
