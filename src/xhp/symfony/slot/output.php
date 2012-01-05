<?php

class xhp_symfony__slot__output extends xhp_symfony__base{




public function render(){
$slots=self::$container->get('templating.helper.slots');
$name=$this->getAttribute('name');

return 
new xhp_x__frag(array(), array(
new \HTML($slots->get($name,null)),), __FILE__, 13)
;
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('name'=>array(1, null,null, 1),));}return $_;}
}