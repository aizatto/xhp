<?php

class xhp_symfony__input extends xhp_symfony__base{





public function render(){
$formview=$this->getAttribute('formview');

$types=$formview->get('types');
$type=end($types);
$this->addClass($type);

switch($type){
case 'textarea':
return $this->renderTextArea();
break;

case 'choice':
return $this->renderChoice();
break;

case 'file':
$this->setAttribute('type','file');
break;

case 'radio':
$this->setAttribute('type','radio');
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

case 'email':
case 'password':
$this->addClass('text');
break;
};

return $this->renderField();
}

protected function renderField(){
$formview=$this->getAttribute('formview');
$input=new xhp_input(array(), array(), __FILE__, 57);

$this->transferFormViewAttributes($input,array('formview'))
->setAttribute('value',$formview->get('value'));

if($this->getAttribute('type')=='checkbox'&&
$formview->get('checked')){
$input->setAttribute('checked','checked');
}

return $input;
}

protected function renderTextArea(){
$textarea=new xhp_textarea(array(), array($this->getAttribute('formview')->get('value'),), __FILE__, 71);
$this->transferFormViewAttributes($textarea);

return $textarea;
}

protected function renderChoice(){
$formview=$this->getAttribute('formview');

if($formview->get('expanded')){
if($formview->get('multiple')){
$content=$this->renderChoiceCheckbox();
}else {
$content=$this->renderChoiceRadio();
}

return 
new xhp_x__frag(array(), array(
$content,), __FILE__, 88)
;
}else {
return $this->renderChoiceSelect();
}
}

protected function renderChoiceCheckbox(){
$formview=$this->getAttribute('formview');
$choices=$formview->get('choices');
$html=array();
foreach($choices as $value=>$option){
$input=new xhp_input(array('type' => 'checkbox','value' => $value,), array(), __FILE__, 101);
$this->transferFormViewAttributes($input);
$html[]=
new xhp_label(array(), array(
$input,
$option,), __FILE__, 104)
;
}

return $html;
}

protected function renderChoiceRadio(){
$formview=$this->getAttribute('formview');
$choices=$formview->get('choices');
$html=array();
foreach($choices as $value=>$option){
$input=new xhp_input(array('type' => 'radio','value' => $value,), array(), __FILE__, 118);
$this->transferFormViewAttributes($input);
$html[]=
new xhp_label(array(), array(
$input,
$option,), __FILE__, 121)
;
}

return $html;
}

protected function renderChoiceSelect(){
$formview=$this->getAttribute('formview');
$choices=$formview->get('choices');
$options=array();
foreach($choices as $value=>$option){
$options[]=
new xhp_option(array('value' => $value,), array(
$option,), __FILE__, 136)
;
}

$element=
new xhp_select(array(), array(
$options,), __FILE__, 142)
;

return $this->transferFormViewAttributes($element);
}

protected function transferFormViewAttributes($element){
$formview=$this->getAttribute('formview');
$element
->setAttribute('id',$formview->get('id'))
->setAttribute('name',$formview->get('full_name'))
->setAttribute('required',$formview->get('required'));

$this->transferAttributes($element,array('formview'));
return $element;
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), xhp_input::__xhpAttributeDeclaration(),array('formview'=>array(5, 'Symfony\Component\Form\FormView',null, 0),));}return $_;}

}