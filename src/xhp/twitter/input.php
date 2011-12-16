<?php


class xhp_twitter__input extends xhp_ui__base{











public function render(){
$size=$this->getAttribute('size');

$inputs=$this->getChildren('xhp_input');
foreach($inputs as $input){
$class=$input->getAttribute('class');
$input->addClass($size);
}

return 
new xhp_div(array('class' => 'input',), array(
$this->getChildren(),), __FILE__, 26)
;
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('size'=>array(7, array('mini', 'small', 'medium', 'large', 'xlarge', 'xxlarge'),null, 0),));}return $_;}

}