<?php

class xhp_symfony__form extends xhp_symfony__route{





public function render(){
$this->setAttribute('action',$this->getPath());
$element=new xhp_form(array(), array(), __FILE__, 11);

if($formview=$this->getAttribute('formview')){
$children=$formview->getChildren();
foreach($children as $child){
$types=$child->get('types');
if(!is_array($types)){
continue;
}

$types=array_flip($types);

if(!isset($types['csrf'])){
continue;
}

$element->appendChild(
new xhp_symfony__input(array('formview' => $child,), array(), __FILE__, 28)
);
}

if($formview->get('multipart')){
$element->setAttribute('enctype','multipart/form-data');
}
}


return $this->transferToElement($element);
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), xhp_form::__xhpAttributeDeclaration(),array('formview'=>array(5, 'Symfony\Component\Form\FormView',null, 0),));}return $_;}

}