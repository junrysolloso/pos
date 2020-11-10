<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barcode extends MY_Controller
{

  function __construct() {
    parent:: __construct(); 

    if ( $this->session->userdata( 'user_rule' ) != 'administrator' ) {
      redirect( base_url( 'login' ) );
    }

    $this->load->model( 'Model_Barcode' );
  }

  /**
   * Barcode index
   */
  public function index() {

    $html = '';

		// Generate barcode number
    $code    = $this->Model_Barcode->_check_code();
    $element = $this->barcode_generate( $code );
  
    // Get DOM children elements
    $children = $element->childNodes;
    foreach ( $children as $child ) {
      $html .= $child->ownerDocument->saveXML( $child );
    }

    $data['barcode']     = $html;
    $data['title']       = 'Generate Barcode';
    $data['class']       = 'barcode';
    $data['sales_total'] = $this->Model_Sales->sales_total_get();

    // Load template parts
    $this->template->set_master_template( 'layouts/layout_admin' );
    $this->template->write( 'title', $data['title'] );
    $this->template->write( 'body_class', $data['class'] );

    $this->template->write_view( 'content', 'templates/template_topbar' );
    $this->template->write_view( 'content', 'templates/template_sidebar', $data );
    $this->template->write_view( 'content', 'view_barcode', $data );
    $this->template->write_view( 'content', 'templates/template_footer' );
    $this->template->render();
	}
  
  /**
   * Generate Barccode
   */
	private function barcode_generate( $code ) {
		//load library
		$this->load->library( 'zend' );
    $this->zend->load( 'Zend/Barcode' );
    
    // Options EAN13
    $options = array(
      'text'         => $code,
      'barHeight'    => 30,
      'factor'       => 8,
      'fontSize'     => 7,
      'withChecksum' => true,
    );

    // Draw barcode
    $image = Zend_Barcode::draw( 'ean13', 'svg', $options, array() );

		// Save to file
    // $image = Zend_Barcode::draw( 'upce', 'image', $options, array() );
    // $path = imagepng( $image, FCPATH .'pos-uploads/barcodes/'. $code .'.jpg' );

    return $image;
	}

}

/* End of file Barcode.php */
/* Location: ./application/modules/barcode/controllers/Barcode.php */
