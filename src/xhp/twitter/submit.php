<?php

class xhp_twitter__submit extends xhp_ui__base{











public function render(){
$type=$this->getAttribute('type');
if($type){
$this->addClass($type);
}

if($this->getAttribute('disabled')){
$this->addClass('disabled');
}

$element=$this->renderElement();
$this->transferAttributes($element,array('type'));
return $element;
}

private function renderElement(){
return new xhp_input(array('type' => 'submit','class' => 'btn',), array(), __FILE__, 31);
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), xhp_input::__xhpAttributeDeclaration(),array('type'=>array(7, array('primary', 'info', 'success', 'danger'),null, 0),'disabled'=>array(2, null,false, 0),));}return $_;}

}