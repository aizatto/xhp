<?php

class xhp_symfony__jquery extends xhp_symfony__base{




public function render(){
$protocol=self::$container->get('request')->isSecure()?'https':'http';
$key=self::$container->getParameter('google.api_key.'.$protocol);

$modules=array(
'modules'=>array(
array(
'name'=>'jquery',
'version'=>'1.7.1'
)
)
);
$modules=array();
$modules=json_encode($modules);

$params=array(
'key'=>$key,
'modules'=>$modules
);

if($callback=$this->getAttribute('callback')){
$params['callback']=$callback;
}

$query=http_build_query($params);

$src="https://www.google.com/jsapi?{$query}";

return 
new xhp_x__frag(array(), array(
new xhp_script(array('type' => 'text/javascript','src' => $src,), array(), __FILE__, 38),
new xhp_script(array(
'type' => 'text/javascript ',
'src' => 'https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js',), array(), __FILE__, 39),), __FILE__, 37)


;
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('callback'=>array(1, null,null, 0),));}return $_;}

}