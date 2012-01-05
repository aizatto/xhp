<?php

class xhp_symfony__script extends xhp_symfony__base{







public function render(){
$assets=self::$container->get('templating.helper.assets');
$this->setAttribute('src',$assets->getURL($this->getAttribute('src')));

$element=new xhp_script(array(), array($this->getChildren(),), __FILE__, 15);
$this->transferAttributes($element);
return $element;
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), xhp_script::__xhpAttributeDeclaration(),array('rel'=>array(7, array('text/javascript'),'stylesheet', 0),));}return $_;}

}