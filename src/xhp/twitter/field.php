<?php
// http://twitter.github.com/bootstrap/#forms

class :twitter:field extends :x:element {

  attribute
    enum {
      'error',
      'success',
      'warning'
    } type;

  public function render() {
    $class = 'clearfix';
    $type = $this->getAttribute('type');
    if ($type) {
      $class .= ' '.$type;
    }

    return
      <div class={$class}>
        {$this->getChildren()}
      </div>;
  }

}
