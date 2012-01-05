<?php

abstract class xhp_symfony__base extends xhp_ui__base{

static protected $container;

public static function setContainer($container){
self::$container=$container;
}

public static function getContainer(){
return self::$container;
}

protected function createForm($type,$data=null,array $options=array())
{
return self::$container
->get('form.factory')
->create($type,$data,$options);
}

protected function createFormBuilder($data=null,array $options=array())
{
return self::$container
->get('form.factory')
->createBuilder('form',$data,$options);
}

}