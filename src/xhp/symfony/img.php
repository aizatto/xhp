<?php

class xhp_symfony__img extends xhp_symfony__base{




public function render(){
$assets=self::$container->get('templating.helper.assets');
$this->setAttribute('src',$assets->getURL($this->getAttribute('src')));

$element=new xhp_img(array(), array(), __FILE__, 12);
$this->transferAttributes($element);
return $element;
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), xhp_img::__xhpAttributeDeclaration(),array());}return $_;}

}