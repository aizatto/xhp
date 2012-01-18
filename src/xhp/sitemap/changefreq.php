<?php

class :sitemap:changefreq extends :xhp:html-element {

  children (pcdata)+;

  category %sitemapopts;

  protected $tagName = 'changefreq';

}
