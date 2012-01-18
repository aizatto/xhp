<?php

class :sitemap:index extends :xhp:html-element {

  attribute
    string xlmns = "http://www.sitemaps.org/schemas/sitemap/0.9";

  children (:sitemap:url)*;

  protected $tagName = 'sitemapindex';

}
