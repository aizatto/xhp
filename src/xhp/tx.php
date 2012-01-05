<?php

class xhp_tx extends xhp_x__element{

public function render(){
$string=trim(id(new xhp_x__frag(array(), array($this->getChildren(),), __FILE__, 6))->toString());

return 
new xhp_x__frag(array(), array(
new HTML($string),), __FILE__, 9)
;
}
}