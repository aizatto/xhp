<?php

class xhp_ui__mailto extends xhp_ui__base{









public function render(){
$element=$this->transferToElement(new xhp_a(array(), array(), __FILE__, 14));
$email=$this->getAttribute('email');
$params=array();

foreach(array('subject','cc','bcc','body') as $key){
if($value=$this->getAttribute($key)){
$params[$key]=$value;
}
}

$params=http_build_query(
$params,
null,
ini_get('arg_separator.output'));

$element->setAttribute(
'href',
'mailto:'.$email.'?'.$params);

if(!$element->getChildren()){
$element->appendChild(
new xhp_x__frag(array(), array(
$email,), __FILE__, 35)

);
}

return $element;
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), xhp_a::__xhpAttributeDeclaration(),array('email'=>array(1, null,null, 1),'subject'=>array(1, null,null, 0),'cc'=>array(1, null,null, 0),'bcc'=>array(1, null,null, 0),'body'=>array(1, null,null, 0),));}return $_;}

}