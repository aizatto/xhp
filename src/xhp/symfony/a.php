<?php

class xhp_symfony__a extends xhp_symfony__route{




public function render(){
$this->setAttribute('href',$this->getPath());

return $this->transferToElement(new xhp_a(array(), array(), __FILE__, 11));
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), xhp_a::__xhpAttributeDeclaration(),array());}return $_;}

}