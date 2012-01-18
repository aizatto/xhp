<?php

class :sitemap:priority extends :xhp:html-element {

  children (pcdata)+;

  category %sitemapopts;

  protected $tagName = 'priority';

}
