<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Barcode generator
 */
class Barcode extends MY_Controller
{

  function __construct() {
    parent:: __construct(); 
    $this->sess->unrestricted();
  }

  /**
   * Index page
   */
  public function index() {
    $html = '';
    $code = $this->check_barcode();
    $element = $this->barcode_generate( $code );
  
    // Get DOM children elements
    $children = $element->childNodes;
    foreach ( $children as $child ) {
      $html .= $child->ownerDocument->saveXML( $child );
    }

    $config['view']    = 'view_barcode';
    $config['barcode'] = $html;
    $config['title']   = 'Generate Barcode';
    $config['class']   = 'barcode';
    $this->content->view( $config );
	}
  
  /**
   * View barccode
   */
	private function barcode_generate( $code ) {
		$this->load->library( 'zend' );
    $this->zend->load( 'Zend/Barcode' );
    
    // Options EAN13
    $options = [
      'text'         => $code,
      'barHeight'    => 50,
      'factor'       => 10,
      'fontSize'     => 7,
      'withChecksum' => true,
    ];

    // Draw barcode
    $image = Zend_Barcode::draw( 'ean13', 'svg', $options, array() );

		// Save to file
    // $image = Zend_Barcode::draw( 'upce', 'image', $options, array() );
    // $path = imagepng( $image, FCPATH .'fn-uploads/barcodes/'. $code .'.jpg' );

    return $image;
	}

  /**
   * Check barcode
   */
  public function check_barcode() {
    $code = '480427' . mt_rand( 100000, 999999 );
    $arg = [ 'item_id' => $code ];

    if ( ! $this->dbdelta->check( 'tbl_items', $arg ) ) {
      return $code;
    }

    $this->check_barcode();
  }
}
