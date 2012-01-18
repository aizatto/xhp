<?php

class :sitemap:lastmod extends :xhp:html-element {

  children (pcdata)+;

  category %sitemapopts;

  protected $tagName = 'lastmod';

}
