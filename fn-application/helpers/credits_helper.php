<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! function_exists( 'credits' ) ) {
  /**
   * Credits
   */
  function credits( $request ) {
    switch ( $request ) {
      case 'co':
        echo '© '. date( 'Y' ) .' '. TEXT_DOMAIN;
        break;
      case 'cr':
        echo 'Program by ' . TEXT_CREDIT . ' ' . TEXT_VERSION;
        break;
      default:
        return false;
        break;
    }
  }
}
