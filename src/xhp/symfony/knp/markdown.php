<?php

/**
 * To be used together with https://github.com/KnpLabs/KnpMarkdownBundle
 */
class xhp_symfony__knp__markdown extends xhp_symfony__base{

public function render(){
$contents='';
foreach($this->getChildren() as $text){
$contents.=self::$container->get('markdown.parser')->transform($text);
}

return 
new xhp_x__frag(array(), array(
new HTML($contents),), __FILE__, 15)
;
}

}