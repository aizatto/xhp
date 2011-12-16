<?php

class xhp_twitter__alert extends xhp_ui__base{











public function render(){
$element=
new xhp_div(array('class' => 'alert-message',), array(
$this->getChildren(),), __FILE__, 17)
;

$type=$this->getAttribute('type');
if($type){
$element->addClass($type);
}

if($this->getAttribute('block')){
$element->addClass('block-message');
}

$this->transferAttributes($element);
return $element;
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), xhp_div::__xhpAttributeDeclaration(),array('type'=>array(7, array('warning', 'error', 'success', 'info'),'warning', 0),'block'=>array(2, null,false, 0),));}return $_;}

}