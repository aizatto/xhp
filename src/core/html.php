<?php
















/**
 * This is the base library of HTML elements for use in XHP. This includes all
 * non-deprecated tags and attributes. Elements in this file should stay as
 * close to spec as possible. Facebook-specific extensions should go into their
 * own elements.
 */
abstract class xhp_xhp__html_element extends xhp_x__primitive{



























protected 
$tagName;

public function requireUniqueId(){


if(!($id=$this->getAttribute('id'))){
$this->setAttribute('id',$id=substr(md5(mt_rand(0,100000)),0,10));
}
return $id;
}

protected final function renderBaseAttrs(){
$buf='<'.$this->tagName;
foreach($this->getAttributes() as $key=>$val){
if($val!==null&&$val!==false){
$buf.=' '.htmlspecialchars($key).'="'.htmlspecialchars($val,true).'"';
}
}
return $buf;
}

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

protected function stringify(){
$buf=$this->renderBaseAttrs().'>';
foreach($this->getChildren() as $child){
$buf.=xhp_x__base::renderChild($child);
}
$buf.='</'.$this->tagName.'>';
return $buf;
}protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('accesskey'=>array(1, null,null, 0),'class'=>array(1, null,null, 0),'dir'=>array(1, null,null, 0),'id'=>array(1, null,null, 0),'lang'=>array(1, null,null, 0),'style'=>array(1, null,null, 0),'tabindex'=>array(1, null,null, 0),'title'=>array(1, null,null, 0),'onabort'=>array(1, null,null, 0),'onblur'=>array(1, null,null, 0),'onchange'=>array(1, null,null, 0),'onclick'=>array(1, null,null, 0),'ondblclick'=>array(1, null,null, 0),'onerror'=>array(1, null,null, 0),'onfocus'=>array(1, null,null, 0),'onkeydown'=>array(1, null,null, 0),'onkeypress'=>array(1, null,null, 0),'onkeyup'=>array(1, null,null, 0),'onload'=>array(1, null,null, 0),'onmousedown'=>array(1, null,null, 0),'onmousemove'=>array(1, null,null, 0),'onmouseout'=>array(1, null,null, 0),'onmouseover'=>array(1, null,null, 0),'onmouseup'=>array(1, null,null, 0),'onreset'=>array(1, null,null, 0),'onresize'=>array(1, null,null, 0),'onselect'=>array(1, null,null, 0),'onsubmit'=>array(1, null,null, 0),'onunload'=>array(1, null,null, 0),'onmouseenter'=>array(1, null,null, 0),'onmouseleave'=>array(1, null,null, 0),'selected'=>array(1, null,null, 0),'otherButtonLabel'=>array(1, null,null, 0),'otherButtonHref'=>array(1, null,null, 0),'otherButtonClass'=>array(1, null,null, 0),'type'=>array(1, null,null, 0),'replaceCaret'=>array(1, null,null, 0),'replaceChildren'=>array(1, null,null, 0),));}return $_;}
}

/**
 * Subclasses of :xhp:html-singleton may not contain children. When rendered they
 * will be in singleton (<img />, <br />) form.
 */
abstract class xhp_xhp__html_singleton extends xhp_xhp__html_element{


protected function &__xhpChildrenDeclaration() {static $_ = 0; return $_;}protected function stringify(){
return $this->renderBaseAttrs().' />';
}
}

/**
 * Subclasses of :xhp:pseudo-singleton may contain exactly zero or one
 * children. When rendered they will be in full open\close form, no matter how
 * many children there are.
 */
abstract class xhp_xhp__pseudo_singleton extends xhp_xhp__html_element{


protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(0, 2, null)); return $_;}protected function escape($txt){
return htmlspecialchars($txt);
}

protected function stringify(){
$buf=$this->renderBaseAttrs().'>';
if($children=$this->getChildren()){
$buf.=xhp_x__base::renderChild($children[0]);
}
return $buf.'</'.$this->tagName.'>';
}
}

/**
 * Below is a big wall of element definitions. These are the basic building
 * blocks of XHP pages.
 */
class xhp_a extends xhp_xhp__html_element{


protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1,'interactive' => 1);return $_;}


protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'flow'))); return $_;}
protected $tagName='a';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('href'=>array(1, null,null, 0),'name'=>array(1, null,null, 0),'rel'=>array(1, null,null, 0),'target'=>array(1, null,null, 0),));}return $_;}
}

class xhp_abbr extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='abbr';
}

class xhp_acronym extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='acronym';
}

class xhp_address extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1);return $_;}

protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'flow'))); return $_;}
protected $tagName='address';
}

class xhp_area extends xhp_xhp__html_singleton{

protected $tagName='area';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('alt'=>array(1, null,null, 0),'coords'=>array(1, null,null, 0),'href'=>array(1, null,null, 0),'nohref'=>array(2, null,null, 0),'target'=>array(1, null,null, 0),));}return $_;}
}

class xhp_b extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='b';
}

class xhp_base extends xhp_xhp__html_singleton{



protected $tagName='base';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('href'=>array(1, null,null, 0),'target'=>array(1, null,null, 0),));}return $_;}
}

class xhp_big extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='big';
}

class xhp_blockquote extends xhp_xhp__html_element{

protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'flow'))); return $_;}
protected $tagName='blockquote';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('cite'=>array(1, null,null, 0),));}return $_;}
}

class xhp_body extends xhp_xhp__html_element{
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'flow'))); return $_;}
protected $tagName='body';
}

class xhp_br extends xhp_xhp__html_singleton{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected $tagName='br';
}

class xhp_button extends xhp_xhp__html_element{


protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1,'interactive' => 1);return $_;}

protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='button';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('disabled'=>array(2, null,null, 0),'name'=>array(1, null,null, 0),'type'=>array(7, array("submit", "button", "reset"),null, 0),'value'=>array(1, null,null, 0),));}return $_;}
}

class xhp_caption extends xhp_xhp__html_element{

protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'flow'))); return $_;}
protected $tagName='caption';
}

class xhp_cite extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='cite';
}

class xhp_code extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='code';
}

class xhp_col extends xhp_xhp__html_singleton{




protected $tagName='col';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('align'=>array(7, array("left", "right", "center", "justify", "char"),null, 0),'char'=>array(1, null,null, 0),'charoff'=>array(3, null,null, 0),'span'=>array(3, null,null, 0),'valign'=>array(7, array("top", "middle", "bottom", "baseline"),null, 0),'width'=>array(1, null,null, 0),));}return $_;}
}

class xhp_colgroup extends xhp_xhp__html_element{




protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(0, 3, 'xhp_col')); return $_;}
protected $tagName='colgroup';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('align'=>array(7, array("left", "right", "center", "justify", "char"),null, 0),'char'=>array(1, null,null, 0),'charoff'=>array(3, null,null, 0),'span'=>array(3, null,null, 0),'valign'=>array(7, array("top", "middle", "bottom", "baseline"),null, 0),'width'=>array(1, null,null, 0),));}return $_;}
}

class xhp_dd extends xhp_xhp__html_element{
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'flow'))); return $_;}
protected $tagName='dd';
}

class xhp_del extends xhp_xhp__html_element{

protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}

protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'flow'))); return $_;}
protected $tagName='del';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('cite'=>array(1, null,null, 0),'datetime'=>array(1, null,null, 0),));}return $_;}
}

class xhp_div extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'flow'))); return $_;}
protected $tagName='div';
}

class xhp_dfn extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='dfn';
}

class xhp_dl extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(4, array(3, 3, 'xhp_dt'),array(3, 3, 'xhp_dd'))); return $_;}
protected $tagName='dl';
}

class xhp_dt extends xhp_xhp__html_element{
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='dt';
}

class xhp_em extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='em';
}

class xhp_fieldset extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(0, 5, array(4, array(2, 3, 'xhp_legend'),array(1, 5, array(5, array(0, 2, null),array(0, 4, 'flow'))))); return $_;}
protected $tagName='fieldset';
}

class xhp_form extends xhp_xhp__html_element{



protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1);return $_;}

protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'flow'))); return $_;}
protected $tagName='form';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('action'=>array(1, null,null, 0),'accept'=>array(1, null,null, 0),'accept-charset'=>array(1, null,null, 0),'enctype'=>array(1, null,null, 0),'method'=>array(7, array("get", "post"),null, 0),'name'=>array(1, null,null, 0),'target'=>array(1, null,null, 0),'ajaxify'=>array(2, null,null, 0),));}return $_;}
}

class xhp_frame extends xhp_xhp__html_singleton{




protected $tagName='frame';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('frameborder'=>array(2, null,null, 0),'longdesc'=>array(1, null,null, 0),'marginheight'=>array(3, null,null, 0),'marginwidth'=>array(3, null,null, 0),'name'=>array(1, null,null, 0),'noresize'=>array(2, null,null, 0),'scrolling'=>array(7, array("yes", "no", "auto"),null, 0),'src'=>array(1, null,null, 0),));}return $_;}
}

class xhp_frameset extends xhp_xhp__html_element{
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(5, array(0, 3, 'xhp_frame'),array(0, 3, 'xhp_frameset')),array(0, 3, 'xhp_noframes'))); return $_;}
protected $tagName='frameset';
}

class xhp_h1 extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='h1';
}

class xhp_h2 extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='h2';
}

class xhp_h3 extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='h3';
}

class xhp_h4 extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='h4';
}

class xhp_h5 extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='h5';
}

class xhp_h6 extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='h6';
}

class xhp_head extends xhp_xhp__html_element{

protected function &__xhpChildrenDeclaration() {static $_ = array(0, 5, array(4, array(4, array(4, array(4, array(1, 4, 'metadata'),array(0, 3, 'xhp_title')),array(1, 4, 'metadata')),array(2, 3, 'xhp_base')),array(1, 4, 'metadata'))); return $_;}







protected $tagName='head';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('profile'=>array(1, null,null, 0),));}return $_;}
}

class xhp_hr extends xhp_xhp__html_singleton{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1);return $_;}
protected $tagName='hr';
}

class xhp_html extends xhp_xhp__html_element{

protected function &__xhpChildrenDeclaration() {static $_ = array(0, 5, array(4, array(0, 3, 'xhp_head'),array(0, 3, 'xhp_body'))); return $_;}
protected $tagName='html';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('xmlns'=>array(1, null,null, 0),));}return $_;}
}

class xhp_i extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='i';
}

class xhp_iframe extends xhp_xhp__pseudo_singleton{





protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1,'interactive' => 1);return $_;}protected function &__xhpChildrenDeclaration() {static $_ = 0; return $_;}

protected $tagName='iframe';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('frameborder'=>array(7, array("1", "0"),null, 0),'height'=>array(1, null,null, 0),'longdesc'=>array(1, null,null, 0),'marginheight'=>array(3, null,null, 0),'marginwidth'=>array(3, null,null, 0),'name'=>array(1, null,null, 0),'scrolling'=>array(7, array("yes", "no", "auto"),null, 0),'src'=>array(1, null,null, 0),'width'=>array(1, null,null, 0),));}return $_;}
}

class xhp_img extends xhp_xhp__html_singleton{






protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected $tagName='img';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('staticsrc'=>array(1, null,null, 0),'alt'=>array(1, null,null, 0),'src'=>array(1, null,null, 0),'height'=>array(1, null,null, 0),'ismap'=>array(2, null,null, 0),'longdesc'=>array(1, null,null, 0),'usemap'=>array(1, null,null, 0),'width'=>array(1, null,null, 0),));}return $_;}
}

class xhp_input extends xhp_xhp__html_singleton{













protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1,'interactive' => 1);return $_;}
protected $tagName='input';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('autocomplete'=>array(7, array("on", "off"),null, 0),'placeholder'=>array(1, null,null, 0),'accept'=>array(1, null,null, 0),'align'=>array(7, array("left", "right", "top", "middle", "bottom"),null, 0),'alt'=>array(1, null,null, 0),'checked'=>array(2, null,null, 0),'disabled'=>array(2, null,null, 0),'maxlength'=>array(3, null,null, 0),'name'=>array(1, null,null, 0),'readonly'=>array(2, null,null, 0),'size'=>array(3, null,null, 0),'src'=>array(1, null,null, 0),'type'=>array(7, array("button", "checkbox", "file", "hidden", "image", "password", "radio", "reset", "submit", "text"),null, 0),'value'=>array(1, null,null, 0),));}return $_;}
}

class xhp_ins extends xhp_xhp__html_element{

protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}

protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'flow'))); return $_;}
protected $tagName='ins';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('cite'=>array(1, null,null, 0),'datetime'=>array(1, null,null, 0),));}return $_;}
}

class xhp_kbd extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='kbd';
}

class xhp_label extends xhp_xhp__html_element{

protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1,'interactive' => 1);return $_;}

protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='label';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('for'=>array(1, null,null, 0),));}return $_;}
}

class xhp_legend extends xhp_xhp__html_element{
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='legend';
}

class xhp_li extends xhp_xhp__html_element{
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'flow'))); return $_;}
protected $tagName='li';
}

class xhp_link extends xhp_xhp__html_singleton{



protected function &__xhpCategoryDeclaration() {static $_ = array('metadata' => 1);return $_;}
protected $tagName='link';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('charset'=>array(1, null,null, 0),'href'=>array(1, null,null, 0),'hreflang'=>array(1, null,null, 0),'media'=>array(1, null,null, 0),'rel'=>array(1, null,null, 0),'rev'=>array(1, null,null, 0),'target'=>array(1, null,null, 0),'type'=>array(1, null,null, 0),));}return $_;}
}

class xhp_map extends xhp_xhp__html_element{

protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}

protected function &__xhpChildrenDeclaration() {static $_ = array(0, 5, array(5, array(3, 5, array(5, array(0, 2, null),array(0, 4, 'flow'))),array(3, 3, 'xhp_area'))); return $_;}
protected $tagName='map';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('name'=>array(1, null,null, 0),));}return $_;}
}

class xhp_meta extends xhp_xhp__html_singleton{







protected function &__xhpCategoryDeclaration() {static $_ = array('metadata' => 1);return $_;}
protected $tagName='meta';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('property'=>array(1, null,null, 0),'content'=>array(1, null,null, 1),'http-equiv'=>array(7, array("content-type", "content-style-type", "expires", "refresh", "set-cookie"),null, 0),'http-equiv'=>array(1, null,null, 0),'name'=>array(1, null,null, 0),'scheme'=>array(1, null,null, 0),));}return $_;}
}

class xhp_noframes extends xhp_xhp__html_element{
protected function &__xhpChildrenDeclaration() {static $_ = array(0, 5, array(0, 4, 'html_body')); return $_;}
protected $tagName='noframes';
}

class xhp_noscript extends xhp_xhp__html_element{

protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected $tagName='noscript';
}

class xhp_object extends xhp_xhp__html_element{





protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}

protected function &__xhpChildrenDeclaration() {static $_ = array(0, 5, array(4, array(1, 3, 'xhp_param'),array(1, 5, array(5, array(0, 2, null),array(0, 4, 'flow'))))); return $_;}
protected $tagName='object';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('align'=>array(7, array("left", "right", "top", "bottom"),null, 0),'archive'=>array(1, null,null, 0),'border'=>array(3, null,null, 0),'classid'=>array(1, null,null, 0),'codebase'=>array(1, null,null, 0),'codetype'=>array(1, null,null, 0),'data'=>array(1, null,null, 0),'declare'=>array(2, null,null, 0),'height'=>array(3, null,null, 0),'hspace'=>array(3, null,null, 0),'name'=>array(1, null,null, 0),'standby'=>array(1, null,null, 0),'type'=>array(1, null,null, 0),'usemap'=>array(1, null,null, 0),'vspace'=>array(3, null,null, 0),'width'=>array(3, null,null, 0),));}return $_;}
}

class xhp_ol extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(0, 3, 'xhp_li')); return $_;}
protected $tagName='ol';
}

class xhp_optgroup extends xhp_xhp__html_element{

protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(0, 3, 'xhp_option')); return $_;}
protected $tagName='optgroup';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('label'=>array(1, null,null, 0),'disabled'=>array(2, null,null, 0),));}return $_;}
}

class xhp_option extends xhp_xhp__pseudo_singleton{

protected $tagName='option';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('disabled'=>array(2, null,null, 0),'label'=>array(1, null,null, 0),'selected'=>array(2, null,null, 0),'value'=>array(1, null,null, 0),));}return $_;}
}

class xhp_p extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='p';
}

class xhp_param extends xhp_xhp__pseudo_singleton{



protected $tagName='param';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('name'=>array(1, null,null, 0),'type'=>array(1, null,null, 0),'value'=>array(1, null,null, 0),'valuetype'=>array(7, array("data", "ref", "object"),null, 0),));}return $_;}
}

class xhp_pre extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='pre';
}

class xhp_q extends xhp_xhp__html_element{

protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='q';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('cite'=>array(1, null,null, 0),));}return $_;}
}


class xhp_s extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='s';
}

class xhp_samp extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='samp';
}

class xhp_script extends xhp_xhp__pseudo_singleton{

protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1,'metadata' => 1);return $_;}
protected $tagName='script';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('charset'=>array(1, null,null, 0),'defer'=>array(2, null,null, 0),'src'=>array(1, null,null, 0),'type'=>array(1, null,null, 0),));}return $_;}
}

class xhp_select extends xhp_xhp__html_element{

protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1,'interactive' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 3, 'xhp_option'),array(0, 3, 'xhp_optgroup'))); return $_;}
protected $tagName='select';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('disabled'=>array(2, null,null, 0),'multiple'=>array(2, null,null, 0),'name'=>array(1, null,null, 0),'size'=>array(3, null,null, 0),));}return $_;}
}

class xhp_small extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='small';
}

class xhp_span extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='span';
}

class xhp_strong extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='strong';
}

class xhp_style extends xhp_xhp__pseudo_singleton{





protected function &__xhpCategoryDeclaration() {static $_ = array('metadata' => 1);return $_;}
protected $tagName='style';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('media'=>array(7, array("screen", "tty", "tv", "projection", "handheld", "print", "braille", "aural", "all"),null, 0),'type'=>array(1, null,null, 0),));}return $_;}
}

class xhp_sub extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(0, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='sub';
}

class xhp_sup extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(0, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='sup';
}

class xhp_table extends xhp_xhp__html_element{








protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1);return $_;}

protected function &__xhpChildrenDeclaration() {static $_ = array(0, 5, array(4, array(4, array(4, array(2, 3, 'xhp_caption'),array(1, 3, 'xhp_colgroup')),
array(2, 3, 'xhp_thead')),

array(0, 5, array(5, array(0, 5, array(4, array(0, 3, 'xhp_tfoot'),array(0, 5, array(5, array(3, 3, 'xhp_tbody'),array(1, 3, 'xhp_tr'))))),
array(0, 5, array(4, array(0, 5, array(5, array(3, 3, 'xhp_tbody'),array(1, 3, 'xhp_tr'))),array(2, 3, 'xhp_tfoot'))))))); return $_;}


protected $tagName='table';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('border'=>array(3, null,null, 0),'cellpadding'=>array(3, null,null, 0),'cellspacing'=>array(3, null,null, 0),'frame'=>array(7, array("void", "above", "below", "hsides", "lhs", "rhs", "vsides", "box", "border"),null, 0),'rules'=>array(7, array("none", "groups", "rows", "cols", "all"),null, 0),'summary'=>array(1, null,null, 0),'width'=>array(1, null,null, 0),));}return $_;}
}

class xhp_tbody extends xhp_xhp__html_element{



protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(0, 3, 'xhp_tr')); return $_;}
protected $tagName='tbody';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('align'=>array(7, array("right", "left", "center", "justify", "char"),null, 0),'char'=>array(1, null,null, 0),'charoff'=>array(3, null,null, 0),'valign'=>array(7, array("top", "middle", "bottom", "baseline"),null, 0),));}return $_;}
}


class xhp_td extends xhp_xhp__html_element{





protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'flow'))); return $_;}
protected $tagName='td';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('abbr'=>array(1, null,null, 0),'align'=>array(7, array("left", "right", "center", "justify", "char"),null, 0),'axis'=>array(1, null,null, 0),'char'=>array(1, null,null, 0),'charoff'=>array(3, null,null, 0),'colspan'=>array(3, null,null, 0),'headers'=>array(1, null,null, 0),'rowspan'=>array(3, null,null, 0),'scope'=>array(7, array("col", "colgroup", "row", "rowgroup"),null, 0),'valign'=>array(7, array("top", "middle", "bottom", "baseline"),null, 0),));}return $_;}
}

class xhp_textarea extends xhp_xhp__pseudo_singleton{

protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1,'interactive' => 1);return $_;}
protected $tagName='textarea';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('cols'=>array(3, null,null, 0),'rows'=>array(3, null,null, 0),'disabled'=>array(2, null,null, 0),'name'=>array(1, null,null, 0),'readonly'=>array(2, null,null, 0),));}return $_;}
}

class xhp_tfoot extends xhp_xhp__html_element{



protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(0, 3, 'xhp_tr')); return $_;}
protected $tagName='tfoot';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('align'=>array(7, array("left", "right", "center", "justify", "char"),null, 0),'char'=>array(1, null,null, 0),'charoff'=>array(3, null,null, 0),'valign'=>array(7, array("top", "middle", "bottom", "baseline"),null, 0),));}return $_;}
}

class xhp_th extends xhp_xhp__html_element{





protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'flow'))); return $_;}
protected $tagName='th';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('abbr'=>array(1, null,null, 0),'align'=>array(7, array("left", "right", "center", "justify", "char"),null, 0),'axis'=>array(1, null,null, 0),'char'=>array(1, null,null, 0),'charoff'=>array(3, null,null, 0),'colspan'=>array(3, null,null, 0),'rowspan'=>array(3, null,null, 0),'scope'=>array(7, array("col", "colgroup", "row", "rowgroup"),null, 0),'valign'=>array(7, array("top", "middle", "bottom", "baseline"),null, 0),));}return $_;}
}

class xhp_thead extends xhp_xhp__html_element{



protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(0, 3, 'xhp_tr')); return $_;}
protected $tagName='thead';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('align'=>array(7, array("left", "right", "center", "justify", "char"),null, 0),'char'=>array(1, null,null, 0),'charoff'=>array(3, null,null, 0),'valign'=>array(7, array("top", "middle", "bottom", "baseline"),null, 0),));}return $_;}
}

class xhp_title extends xhp_xhp__pseudo_singleton{


protected $tagName='title';
}

class xhp_tr extends xhp_xhp__html_element{



protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 3, 'xhp_th'),array(0, 3, 'xhp_td'))); return $_;}
protected $tagName='tr';protected static function &__xhpAttributeDeclaration() {static $_ = -1;if ($_ === -1) {$_ = array_merge(parent::__xhpAttributeDeclaration(), array('align'=>array(7, array("left", "right", "center", "justify", "char"),null, 0),'char'=>array(1, null,null, 0),'charoff'=>array(3, null,null, 0),'valign'=>array(7, array("top", "middle", "bottom", "baseline"),null, 0),));}return $_;}
}

class xhp_tt extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='tt';
}


class xhp_u extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='u';
}

class xhp_ul extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(0, 3, 'xhp_li')); return $_;}
protected $tagName='ul';
}

class xhp_var extends xhp_xhp__html_element{
protected function &__xhpCategoryDeclaration() {static $_ = array('flow' => 1,'phrase' => 1);return $_;}
protected function &__xhpChildrenDeclaration() {static $_ = array(1, 5, array(5, array(0, 2, null),array(0, 4, 'phrase'))); return $_;}
protected $tagName='var';
}

/**
 * Render an <html /> element with a DOCTYPE, great for dumping a page to a
 * browser. Choose from a wide variety of flavors like XHTML 1.0 Strict, HTML
 * 4.01 Transitional, and new and improved HTML 5!
 *
 * Note: Some flavors may not be available in your area.
 */
class xhp_x__doctype extends xhp_x__primitive{
protected function &__xhpChildrenDeclaration() {static $_ = array(0, 5, array(0, 3, 'xhp_html')); return $_;}

protected function stringify(){
$children=$this->getChildren();
return '<!DOCTYPE html>'.(xhp_x__base::renderChild($children[0]));
}
}