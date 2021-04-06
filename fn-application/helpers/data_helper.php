<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists( 'clean_array' ) ) {
  /**
   * Clean array
   * @param array $array - array to be clean
   * @return array
   */
  function clean_array( $array ) {
    $n_array = [];
    if ( is_array( $array ) ) {
      foreach ( $array as $key => $val ) {
        if ( $val ) {
          $n_array[ $key ] = trim( $val );
        } else {
          unset( $array[ $key ] );
        }
      }
      return $n_array;
    }
  }
}

if ( ! function_exists( '_str' ) ) {
  /**
   * Just echo
   */
  function _str( $data = NULL, $cap = FALSE, $word = FALSE, $up = FALSE, $low = FALSE ) {
    if ( $up ) {
      echo strtoupper( $data );
    } elseif ( $low ) {
      echo strtolower( $data );
    } elseif ( $cap ) {
      echo ucfirst( $data );
    } elseif ( $word ) {
      echo  ucwords( $data );
    } else {
      echo $data;
    }
  }
}

if( ! function_exists( 'response' ) ) {
  /**
   * Server response
   */
  function response( $data ) {
    header( 'content-type: application/json' );
    exit( json_encode( $data ) );
  }
}
