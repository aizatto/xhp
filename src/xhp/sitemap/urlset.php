<?php

class :sitemap:urlset extends :xhp:html-element {

  attribute
    string xlmns = "http://www.sitemaps.org/schemas/sitemap/0.9";

  children (:sitemap:url)*;

  protected $tagName = 'urlset';

}
