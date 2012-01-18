<?php

class :sitemap:url extends :xhp:html-element {

  children (:sitemap:loc, %sitemapopts*);

  protected $tagName = 'url';

}
