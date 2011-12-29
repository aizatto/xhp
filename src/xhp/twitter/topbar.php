<?php

class :twitter:topbar extends :ui:base {

  public function render() {
    return
      <div class="topbar">
        <div class="topbar-inner">
          <div class="container">
            {$this->getChildren()}
          </div>
        </div>
      </div>;
  }

}
