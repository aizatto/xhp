<?php

/**
 * https://developers.facebook.com/docs/reference/plugins/like/
 */
class :fb:like extends :xhp:pseudo-singleton {

  attribute 
    string href,
    bool send,
    enum {
      'standard',
      'button_count',
      'box_count'
    } layout = 'standard',
    int width,
    bool show_faces,
    enum {
      'arial',
      'lucida grande',
      'segoe ui',
      'tahoma',
      'trebuchet ms',
      'verdana'
    } font,
    enum {
      'light',
      'dark'
    } colorscheme,
    string ref,
    enum {
      'like',
      'recommend'
    } action;

  category %flow;

  protected $tagName = 'fb:like';

}
