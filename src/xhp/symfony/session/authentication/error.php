<?php

use Symfony\Component\Security\Core\SecurityContext;

class xhp_symfony__session__authentication_error extends xhp_symfony__base{

public function render(){
$session=self::$container->get('request')->getSession();
$error=$session->get(SecurityContext::AUTHENTICATION_ERROR);

if(!$error){
return new xhp_x__frag(array(), array(), __FILE__, 12);
}
$session->set(SecurityContext::AUTHENTICATION_ERROR,null);

return 
new xhp_div(array(), array(
new xhp_p(array(), array($error->getMessage(),), __FILE__, 18),
new xhp_p(array(), array($error->getExtraInformation(),), __FILE__, 19),), __FILE__, 17)
;
}

}