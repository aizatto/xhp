<?php

class xhp_twitter__form extends xhp_ui__base{





public function render(){
$form=new xhp_form(array(), array($this->getChildren(),), __FILE__, 10);
$this->transferAttributes($form);
if($this->getAttribute('stacked')){
$form->addClass('form-stacked');
}

return $form;
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), xhp_form::__xhpAttributeDeclaration(),array('stacked'=>array(2, null,false, 0),));}return $_;}

}