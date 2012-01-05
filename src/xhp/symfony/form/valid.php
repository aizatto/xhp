<?php

class xhp_symfony__form__valid extends xhp_symfony__base{




public function render(){
$valid=$this->getAttribute('valid');

if($valid===true){
$content=$this->renderTrue();
}else if($valid===false){
$content=$this->renderFalse();
}else if($valid===null){
$content=$this->renderNull();
}

return $content;
}

public function renderTrue(){
$children=$this->getChildren(
xhp_x__base::element2class('symfony:form:valid:success'));
if($children){
return 
new xhp_x__frag(array(), array(
$children,), __FILE__, 27)
;
}else {
return 
new xhp_div(array(), array(' Success ',), __FILE__, 32)

;
}
}

public function renderFalse(){
$children=$this->getChildren(
xhp_x__base::element2class('symfony:form:valid:failure'));
if($children){
return 
new xhp_x__frag(array(), array(
$children,), __FILE__, 43)
;
}else {
return 
new xhp_div(array(), array(' Failure ',), __FILE__, 48)

;
}
}

public function renderNull(){
return 
new xhp_x__frag(array(), array(), __FILE__, 56);
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('valid'=>array(2, null,null, 0),));}return $_;}

}