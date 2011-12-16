<?php

class xhp_symfony__twitter__field extends xhp_ui__base{





public function render(){
$formview=$this->getAttribute('formview');
$input=new xhp_symfony__input(array('formview' => $formview,), array(), __FILE__, 11);
$this->transferAttributes($input,array('type'));

return 
new xhp_twitter__field(array(), array(
new xhp_symfony__label(array('formview' => $formview,), array(
$this->getChildren(),), __FILE__, 16),

new xhp_twitter__input(array('size' => 'xxlarge',), array(
$input,), __FILE__, 19),), __FILE__, 15)

;
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), xhp_input::__xhpAttributeDeclaration(),array('formview'=>array(5, 'Symfony\Component\Form\FormView',null, 0),));}return $_;}

}