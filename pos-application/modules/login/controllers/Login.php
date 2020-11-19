<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Login extends MY_Controller 
{

	function __construct() {
		parent::__construct(); // alway load the parent
		
		/**
		 * Load required library and model
		 */
		$this->load->model( array( 'Model_Login', 'Model_Authattempts' ) );
		$this->load->library( array( 'form_validation' ) );
	}

	/**
	 * Index page for the login page
	 */
	public function index() {

		/**
		 * Check if the user reach the maximum allowed login attempts.
		 * Otherwise user will be redirected to block page.
		 */
		intval( $attempt_count = $this->Model_Authattempts->_attempt_check() ); 
		if( $attempt_count > 3 ) {
			redirect( base_url( 'login/blocked' ) ); 
		}

		/**
		 * Add attempts if someone trying to login without administrator level
		 */
		if ( $this->session->userdata( 'user_rule' ) != 'administrator' ) {
			$this->Model_Authattempts->_attempt_insert( $this->session->userdata( 'user_id' ) );
		}

		/**
		 * Check if there is existing session.
		 */
		if ( $this->session->userdata( 'user_rule' ) && $this->session->userdata( 'user_rule' ) == 'administrator' ) {
      redirect( base_url( 'dashboard' ) );
		}

		/**
		 * This are the fields used in login form.
		 * Set in an array.
		 */
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
			/**
			 * Run form validation
			 */
			if ( $this->form_validation->run() ) { 
				if ( $this->input->post( 'user_name' ) && $this->input->post( 'user_pass' ) ) {
					$data = array(
						'username' 	=> $this->input->post( 'user_name' ),
						'user_pass' => $this->input->post( 'user_pass' ),
					);
					/**
					 * Check if user data exist in the databse
					 */
					if ( $this->Model_Login->user_check( $data ) ) {
						redirect( base_url( 'dashboard' ) );
					} else {
						/**
						 * Add login attempts.
						 */
						$attempt_count = intval( $this->Model_Authattempts->_attempt_check() ); 
						if ( $this->Model_Authattempts->_attempt_insert( $this->input->post( 'user_name' ) ) ) {
							$this->session->set_tempdata( array(
								'alert' => '<strong>Sorry!</strong> login failed. You have <strong>' . ( 4 - $attempt_count ) . '</strong> attempt(s) remaining.',
								'class' => 'danger',
							), NULL, 5 );
						}
					}
				}
			}
		}

		$data['title']  = 'Admin Login';

		/**
		 * Set the master templat otherwise site cause an error.
		 * Next the template files and views.
		 */
		$this->template->set_master_template( 'layouts/layout_site' );
		$this->template->write( 'title', $data['title'] ); 
		$this->template->write_view( 'content', 'view_login', $data );
		$this->template->render();
	}

	/**
	 * Block user if too many attempts
	 */
	public function blocked() {
		if ( $this->session->userdata( 'user_id' ) ) {
      redirect( base_url( 'dashboard' ) );
		} else {
			$this->template->set_master_template( 'layouts/layout_site' );
			$this->template->write( 'title', 'Access Blocked' );
			$this->template->write_view( 'content', 'view_blocked' );
			$this->template->render();
		}
	}

	/**
	 * User signout
	 * Destroys session after signout
	 */
	public function signout() {
		// Record log when logging out
		if ( $this->Model_Log->log_add( log_lang( 'login' )['out'] ) ) {
			$session_name  = array( 'user_id', 'user_name', 'user_rule' );
			foreach ( $session_name as $key ) {
				unset( $_SESSION[ $key ] ); 
			}
			if ( session_destroy() ) {

				// Load the DB utility
				$this->load->dbutil();
    
				// Name of the backup
				$name_non = 'DB_' . strval( date("Ymd") .'_'. date("his") ) . '.sql';
				$name_com = 'DB_' . strval( date("Ymd") .'_'. date("his") ) . '.zip';
		
				// Configs
				$config = array(
					'format'      => 'zip',
					'filename'    => $name_non,
					'add_drop'    => TRUE,
					'add_insert'  => TRUE,
					'newline'     => "\n"
				);
		
				// Backup your entire database
				$backup = $this->dbutil->backup( $config );
		
				// Load the file helper and write the file 
				if ( $this->load->helper( 'file' ) ) {
					if ( write_file( FCPATH . 'pos-backup/'. $name_com, $backup ) ) {
						redirect( base_url( 'login' ) );
					}
				}
			} 
		}
	}

}

/* End of file Login.php */
/* Location: ./application/modules/login/controllers/Login.php */
