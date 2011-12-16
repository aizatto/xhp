<?php


class xhp_twitter__field extends xhp_x__element{








public function render(){
$class='clearfix';
$type=$this->getAttribute('type');
if($type){
$class.=' '.$type;
}

return 
new xhp_div(array('class' => $class,), array(
$this->getChildren(),), __FILE__, 21)
;
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('type'=>array(7, array('error', 'success', 'warning'),null, 0),));}return $_;}

}