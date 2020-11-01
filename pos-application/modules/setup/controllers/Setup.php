<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Setup extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model( 'Model_Setup' );
	}

	/**
	 * Inded page for setup
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

	/**
	 * Generate dummy data
	 */
	public function generate() {
		if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
			if( $this->input->post( 'year' ) ) {
				$data = array(
					'year' 	=> $this->input->post( 'year' ),
					'month' => $this->input->post( 'month' ),
					'prod'	=> $this->input->post( 'prod' ),
					'desc'	=> $this->input->post( 'desc' ),
					'cat'		=> $this->input->post( 'cat' ),
					'sub'		=> $this->input->post( 'sub' ),
					'unit'	=> $this->input->post( 'unit' ),
				);

				if ( $this->Model_Setup->generate_dummy( $data ) ) {
					$this->session->set_tempdata( array(
						'alert' => 'Done generating data.',
						'class' => 'success',
					), NULL, 5 );
				} else {
					$this->session->set_tempdata( array(
						'alert' => 'Error executing command.',
						'class' => 'danger',
					), NULL, 5 );
				}
			}
		}
		$this->template->set_master_template( 'layouts/layout_site' );
		$this->template->write( 'title', 'Setup' );
		$this->template->write( 'body_class', 'setup' );
		$this->template->write_view( 'content', 'view_generate' );
		$this->template->render();
		
	}

	/**
	 * Cleanup dummy data
	 */
	public function clean() {
		if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
			if ( $this->Model_Setup->clean_dummy() ) {
				$this->session->set_tempdata( array(
					'alert' => 'Done cleaning data.',
					'class' => 'success',
				), NULL, 5 );
			} else {
				$this->session->set_tempdata( array(
					'alert' => 'Error executing command.',
					'class' => 'danger',
				), NULL, 5 );
			}
		}

		$this->template->set_master_template( 'layouts/layout_site' );
		$this->template->write( 'title', 'Setup' );
		$this->template->write( 'body_class', 'setup' );
		$this->template->write_view( 'content', 'view_generate' );
		$this->template->render();
	}

}

/* End of file Setup.php */
/* Location: ./application/controllers/Setup.php */
