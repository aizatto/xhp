<?php

class xhp_twitter__topbar extends xhp_ui__base{

public function render(){
return 
new xhp_div(array('class' => 'topbar',), array(
new xhp_div(array('class' => 'topbar-inner',), array(
new xhp_div(array('class' => 'container',), array(
$this->getChildren(),), __FILE__, 9),), __FILE__, 8),), __FILE__, 7)


;
}

}