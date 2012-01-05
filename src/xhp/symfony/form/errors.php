<?php

class xhp_symfony__form__errors extends xhp_symfony__base{




public function render(){
$formview=$this->getAttribute('formview');

$errors=$this->getErrors($formview);

if(count($errors)==0){
return 
new xhp_x__frag(array(), array(), __FILE__, 15);
}

return 
new xhp_ul(array(), array(
$errors,), __FILE__, 19)
;
}

private function getErrors(Symfony\Component\Form\FormView $formview){
$errors=array();
foreach($formview->get('errors') as $error){
$errors[]=
new xhp_li(array(), array(
$error->getMessageTemplate(),), __FILE__, 28)
;
}

foreach($formview->getChildren() as $field){
$child_errors=$this->getErrors($field);
if(count($child_errors)==0){
continue;
}

$errors[]=
new xhp_li(array(), array(
$field->get('label'),': ',
new xhp_ul(array(), array($child_errors,), __FILE__, 42),), __FILE__, 40)
;
}

return $errors;
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('formview'=>array(5, 'Symfony\Component\Form\FormView',null, 0),));}return $_;}

}