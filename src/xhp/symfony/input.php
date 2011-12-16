<?php

class xhp_symfony__input extends xhp_ui__base{





public function render(){
$formview=$this->getAttribute('formview');

$types=$formview->get('types');
$type=end($types);

if($type=='textarea'){
return $this->renderTextArea();
}

switch(end($types)){
case 'file':
$this->setAttribute('type','file');
break;

case 'checkbox':
$this->setAttribute('type','checkbox');
break;

case 'entity':
case 'csrf':
$this->setAttribute('type','hidden');
break;

case 'text':
$this->setAttribute('type','text');
break;
};

return $this->renderField();
}

protected function renderField(){
$formview=$this->getAttribute('formview');
$input=new xhp_input(array(), array(), __FILE__, 43);

$this->transferFormViewAttributes($input,array('formview'))
->setAttribute('value',$formview->get('value'));

if($this->getAttribute('type')=='checkbox'&&
$formview->get('checked')){
$input->setAttribute('checked','checked');
}

return $input;
}

protected function renderTextArea(){
$textarea=new xhp_textarea(array(), array($this->getAttribute('formview')->get('value'),), __FILE__, 57);
$this->transferFormViewAttributes($textarea);

return $textarea;
}

private function transferFormViewAttributes($element){
$formview=$this->getAttribute('formview');
$element
->setAttribute('id',$formview->get('id'))
->setAttribute('name',$formview->get('full_name'));

$this->transferAttributes($element,array('formview'));
return $element;
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), xhp_input::__xhpAttributeDeclaration(),array('formview'=>array(5, 'Symfony\Component\Form\FormView',null, 0),));}return $_;}

}