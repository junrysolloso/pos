<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nothing extends MY_Controller
{

  function __construct() {
    parent:: __construct(); 
  }

	/**
	 * Index page for the 404 page
	 */
  public function index() {

    $data['title'] = 'Error 404';
    $data['class'] = 'page-404';

    // Load template parts
    $this->template->set_master_template( 'layouts/layout_site' );
    $this->template->write( 'title', $data['title'] );
    $this->template->write( 'body_class', $data['class'] );
    $this->template->write_view( 'content', 'view_nothing' );
		$this->template->render();
  }

}

/* End of file Nothing.php */
/* Location: ./application/modules/nothing/controllers/Nothing.php */
