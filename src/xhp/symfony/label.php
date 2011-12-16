<?php

class xhp_symfony__label extends xhp_ui__base{





public function render(){
$formview=$this->getAttribute('formview');

$label=
new xhp_label(array('for' => $formview->get('id'),), array(
$this->getChildren(),), __FILE__, 13)
;
return $this->transferAttributes($label);
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), xhp_label::__xhpAttributeDeclaration(),array('formview'=>array(5, 'Symfony\Component\Form\FormView',null, 0),));}return $_;}
}