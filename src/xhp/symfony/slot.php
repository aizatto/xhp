<?php

class xhp_symfony__slot extends xhp_symfony__base{




public function render(){
$slots=self::$container->get('templating.helper.slots');
$name=$this->getAttribute('name');

$proxy=new xhp_x__frag(array(), array($this->getChildren(),), __FILE__, 12);

$slots->set($name,$proxy->toString());
return new xhp_x__frag(array(), array(), __FILE__, 15);
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('name'=>array(1, null,null, 1),));}return $_;}
}