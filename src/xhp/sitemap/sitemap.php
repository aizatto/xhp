<?php

class :sitemap:sitemap extends :xhp:html-element {

  children (:sitemap:loc, :sitemap:lastmod?);

  protected $tagName = 'sitemapindex';

}
