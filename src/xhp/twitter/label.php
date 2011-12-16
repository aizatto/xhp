<?php

class xhp_twitter__label extends xhp_ui__base{










public function render(){
$element=
new xhp_span(array('class' => 'label',), array(
$this->getChildren(),), __FILE__, 16)
;

$type=$this->getAttribute('type');
if($type){
$element->addClass($type);
}

$this->transferAttributes($element);
return $element;
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), xhp_span::__xhpAttributeDeclaration(),array('type'=>array(7, array('success', 'warning', 'important', 'notice'),null, 0),));}return $_;}

}