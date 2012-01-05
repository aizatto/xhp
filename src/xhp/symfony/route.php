<?php

abstract class xhp_symfony__route extends xhp_symfony__base{





protected function getPath(){
$route=$this->getAttribute('route');

if(!$route){
return null;
}

$params=$this->getAttribute('params');
if(!is_array($params)){
$params=array();
}

$router=self::$container->get('router');
return $router->generate($route,$params);
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('route'=>array(1, null,null, 0),'params'=>array(4, null,null, 0),));}return $_;}

}