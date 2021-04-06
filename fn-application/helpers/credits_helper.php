<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if( ! function_exists( 'credits' ) ) {
  /**
   * Credits
   */
  function credits( $request ) {
    switch ( $request ) {
      case 'co':
        echo '© '. date( 'Y' ) .' BOTICA JARIPPRE';
        break;
      case 'cr':
        echo 'Program by Dinagat Coders v1.1.0';
        break;
      default:
        return false;
        break;
    }
  }
}
