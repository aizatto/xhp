<?php

class xhp_ui__base extends xhp_x__element{



protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1);return $_;}


public function addClass($class){
$class=trim($class);

$currentClasses=$this->getAttribute('class');
$has=strpos(' '.$currentClasses.' ',' '.$class.' ')!==false;
if($has){
return $this;
}

$this->setAttribute('class',trim($currentClasses.' '.$class));
return $this;
}


public function transferAttributes(xhp_x__base $element,$ignore=array()){
$attributes=$this->getAttributes();
if($ignore){
$attributes=array_diff_key($attributes,array_flip($ignore));
}

$supported=$element->__xhpAttributeDeclaration();

foreach($attributes as $key=>$value){
if(!isset($supported[$key])){
continue;
}

$element->setAttribute($key,$value);
}
return $element;
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), xhp_xhp__html_element::__xhpAttributeDeclaration(),array());}return $_;}

}