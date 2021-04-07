<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Login extends MY_Controller 
{

	function __construct() {
		parent::__construct();
		$this->load->model( [ 'model_login', 'model_authattempts' ] );
		$this->load->library( [ 'form_validation' ] );
	}

	/**
	 * Index
	 */
	public function index() {

		$role = $this->session->userdata( 'user_role' );

		// Check if the user reach the maximum allowed login attempts.
		// Otherwise user will be redirected to block page.
		intval( $attempt_count = $this->model_authattempts->_attempt_check() ); 
		if ( $attempt_count > 3 ) {
			redirect( base_url( 'login/blocked' ) ); 
		}

		// Add attempts if someone trying to login without a valid session
		if ( $role != 'administrator' || $role == 'user') {
			$this->model_authattempts->_attempt_insert( $this->session->userdata( 'user_id' ) );
		}

		// Check if there is existing session.
		if ( $role == 'administrator' || $role == 'user' ) {
      redirect( base_url( 'dashboard' ) );
		}

		// Login form fields
		$fields = [
			[
				'field' => 'user_name',
				'label' => 'username',
				'rules'	=> 'required|trim',
			],
			[
				'field' => 'user_pass',
				'label' => 'password',
				'rules'	=> 'required|trim',
			]
		];

		$this->form_validation->set_rules( $fields );

		// Check request method
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
			// Run form validation
			if ( $this->form_validation->run() ) { 

				// Assign values
				if ( $this->input->post( 'user_name' ) && $this->input->post( 'user_pass' ) ) {
					$data = [
						'username' 	=> $this->input->post( 'user_name' ),
						'user_pass' => $this->input->post( 'user_pass' ),
					];
					
					// Check user if exist in the database
					if ( $this->model_login->user_check( $data ) ) {

						$joins = [
							'tbl_user_login' => '`tbl_user_login`.`user_id`=`tbl_logs`.`user_id`',
							'tbl_user_meta' => '`tbl_user_meta`.`user_id`=`tbl_logs`.`user_id`'
						];

						$id = intval( $this->dbdelta->get_max_id( 'tbl_logs', 'log_id' ) ) - 3;
						$fields = '`tbl_logs`.`user_id` AS user_id, `login_level`, `user_fname`, `user_photo`, `log_date`';
						$recents = $this->dbdelta->get_all( 'tbl_logs', [], 0, $joins, [ 'log_id' => $id ], 0, $fields );

						$this->session->set_userdata( 'recents', $recents );
						if ( $this->session->has_userdata( 'recents' ) ) {
							redirect( base_url( 'dashboard' ) );
						}

					} else {
						
						// Add login attempts
						$attempt_count = intval( $this->model_authattempts->_attempt_check() ); 
						if ( $this->model_authattempts->_attempt_insert( $this->input->post( 'user_name' ) ) ) {
							$this->session->set_tempdata( [
								'alert' => '<strong>Sorry!</strong> login failed. You have <strong>' . ( 4 - $attempt_count ) . '</strong> attempt(s) remaining.',
								'class' => 'danger',
							], NULL, 5 );
						}
					}
				}
			}
		}

		$data['title'] = 'Admin Login';

		// Page templates
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
	 * Signout
	 */
	public function signout() {
		if ( $this->model_log->add( task( 'login' )['out'] ) ) {

			$sname  = [ 'user_id', 'user_name', 'user_role', 'user_photo', 'recents' ];
			foreach ( $sname as $key ) {
				unset( $_SESSION[ $key ] ); 
			}
			if ( session_destroy() ) {

				// $this->load->dbutil();
				// $name_non = 'DB_' . strval( date("Ymd") .'_'. date("his") ) . '.sql';
				// $name_com = 'DB_' . strval( date("Ymd") .'_'. date("his") ) . '.zip';
		
				// $config = [
				// 	'format'      => 'zip',
				// 	'filename'    => $name_non,
				// 	'add_drop'    => TRUE,
				// 	'add_insert'  => TRUE,
				// 	'newline'     => "\n"
				// ];
		
				// $backup = $this->dbutil->backup( $config );
				// if ( $this->load->helper( 'file' ) ) {
				// 	if ( write_file( FCPATH . 'fn-backup/'. $name_com, $backup ) ) {
				// 		redirect( base_url( 'login' ) );
				// 	}
				// }

				redirect( base_url( 'login' ) );
			} 
		}
	}

}
