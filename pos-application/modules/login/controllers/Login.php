<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller 
{

	function __construct() {
		parent::__construct();
		$this->load->model( array('Model_Login', 'Model_Authattempts') );
		$this->load->library( array('form_validation', 'session') );
	}

	/**
	 * Index page for the login page
	 */
	public function index() {
		$fields = array(
			array(
				'field' => 'user_name',
				'label' => 'username',
				'rules'	=> 'required|trim',
			),
			array(
				'field' => 'user_pass',
				'label' => 'password',
				'rules'	=> 'required|trim',
			),
		);

		$this->form_validation->set_rules( $fields );
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
			if ( $this->form_validation->run() ) {
				if ( $this->input->post( 'user_name' ) && $this->input->post( 'user_pass' ) ) {
					$data = array(
						'username' 	=> $this->input->post( 'user_name' ),
						'user_pass' => $this->input->post( 'user_pass' ),
					);
					if ( $this->Model_Login->user_check( $data ) ) {
						if ( $this->Model_Authattempts->_attempt_clear() ) {
							redirect( 'dashboard' );
						}
					} else {
						intval( $attempt_count = $this->Model_Authattempts->_attempt_check() ); // Count the number of attempts
						if( $attempt_count < 4 ) {
							$this->Model_Authattempts->_attempt_insert( $this->input->post( 'user_name' ) ); // Limit the number of login attermpts
							$this->session->set_tempdata( array(
								'alert' => 'Sorry! login failed. You have <strong>' . ( 4 - $attempt_count ) . '</strong> attempt(s) remaining.',
								'class' => 'danger',
							), NULL, 5 );
						} else {
							redirect( 'login/access-blocked' ); // Block user if unable to provide correct credentials
						}
					}
				}
			}
		}

		$data['title']  = 'Admin Login';

		$this->template->set_master_template( 'layouts/layout_site' );
		$this->template->write( 'title', $data['title'] );
		$this->template->write_view( 'content', 'view_login', $data );
		$this->template->render();
	}

	/**
	 * Block user if too many attempts
	 */
	public function access_blocked() {
		$this->template->set_master_template( 'layouts/layout_site' );
		$this->template->write( 'title', 'Access Blocked' );
		$this->template->write_view( 'content', 'view_blocked' );
		$this->template->render();
	}

}

/* End of file Login.php */
/* Location: ./application/modules/login/controllers/Login.php */