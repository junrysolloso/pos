<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Setup extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model( 'Model_Setup' );
	}

	/**
	 * Index page
	 */
	public function index() {
		$this->load->library( 'migration' );

		if ( ! $this->migration->current() ) {
			show_error( $this->migration->error_string() );
		} else {
			$this->template->set_master_template( 'layouts/layout_site' );
			$this->template->write( 'title', 'Setup' );
			$this->template->write( 'body_class', 'setup' );
			$this->template->write_view( 'content', 'view_setup' );
			$this->template->render();
		}
	}
	
}
