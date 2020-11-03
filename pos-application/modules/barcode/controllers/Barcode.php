<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barcode extends MY_Controller
{

  function __construct() {
    parent:: __construct(); 

    if ( ! $this->session->userdata( 'user_id' ) ) {
      redirect( base_url( 'login' ) );
    }
  }

  /**
   * Barcode index
   */
  public function index() {
    // Load Model
    $this->load->model( 'sales/Model_Sales' );
    $this->load->model( 'Model_Barcode' );

		// Generate random number
		$code = $this->Model_Barcode->_check_code();
    if( $code ) $this->barcode_generate( $code );
    
    $data['title']       = 'Generate Barcode';
    $data['class']       = 'barcode';
    $data['image_url']   = $code;
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
		$this->load->library('zend');
    $this->zend->load('Zend/Barcode');
    
    // Options
    $options = array(
      'text'      => $code,
      'barHeight' => 25,
      'factor'    => 15,
      'fontSize'  => 5,
    );

		// Save to file
    $image = Zend_Barcode::draw( 'upce', 'image', $options, array() );
    $path = imagepng( $image, FCPATH .'pos-uploads/barcodes/'. $code .'.jpg' );
    return $path;
	}

}

/* End of file Barcode.php */
/* Location: ./application/modules/barcode/controllers/Barcode.php */
