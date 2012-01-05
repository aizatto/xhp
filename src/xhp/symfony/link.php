<?php

class xhp_symfony__link extends xhp_symfony__base{







public function render(){
$assets=self::$container->get('templating.helper.assets');
$this->setAttribute('href',$assets->getURL($this->getAttribute('href')));

$element=new xhp_link(array(), array(), __FILE__, 15);
$this->transferAttributes($element);
return $element;
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), xhp_link::__xhpAttributeDeclaration(),array('rel'=>array(7, array('stylesheet'),'stylesheet', 0),));}return $_;}

}