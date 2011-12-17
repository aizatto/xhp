<?php

class HTML {

  private $contents;

  public function __construct($contents) {
    $this->contents = $contents;
  }

  public function render() {
    return $this->contents;
  }

}
