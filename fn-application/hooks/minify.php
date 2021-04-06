<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Minify HTML
 */
function minifier() {

  $CI =& get_instance();
  $buffer = $CI->output->get_output();

  $search = array(
    '/\n/',             // replace end of line by a space
    '/\>[^\S ]+/s',     // strip whitespaces after tags, except space
    '/[^\S ]+\</s',     // strip whitespaces before tags, except space
    '/(\s)+/s',         // shorten multiple whitespace sequences
    '/<!--(.|\s)*?-->/' // remove comments
  );
 
  $replace = array( '', '>', '<', '\\1' );
  $buffer = preg_replace( $search, $replace, $buffer );
 
  $CI->output->set_output( $buffer );
  $CI->output->_display();

}
