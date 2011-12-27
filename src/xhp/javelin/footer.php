<?php

class :javelin:footer extends :ui:base {

  public function render() {
    return
      <x:frag>
        {new HTML(Javelin::renderHTMLFooter())}
      </x:frag>;
  }

}
