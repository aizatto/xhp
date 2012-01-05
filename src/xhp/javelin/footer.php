<?php

class xhp_javelin__footer extends xhp_ui__base{

public function render(){
return 
new xhp_x__frag(array(), array(
new HTML(Javelin::renderHTMLFooter()),), __FILE__, 7)
;
}

}