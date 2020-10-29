<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{

	function __construct() {
		parent::__construct();
		$this->load->model( 'Model_Login' );
		$this->load->library( array( 'form_validation', 'session' ) );
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
						redirect( 'dashboard' );
					} else {
						$this->session->set_tempdata( array(
							'alert' => 'Sorry! login failed, please try again.',
							'class' => 'danger',
						), NULL, 5);
					}
				}
			}
		}

		$data['title']  = 'Admin Login';

		$this->template->set_master_template( 'layouts/template_site' );
		$this->template->write( 'title', $data['title'] );
		$this->template->write_view( 'content', 'view_login', $data );

		// Load CSS
		$this->template->add_css( 'pos-assets/vendors/mdi/css/materialdesignicons.min.css' );
		$this->template->add_css( 'pos-assets/vendors/ti-icons/css/themify-icons.css' );
		$this->template->add_css( 'pos-assets/vendors/typicons/typicons.css' );
		$this->template->add_css( 'pos-assets/vendors/css/vendor.bundle.base.css' );
		$this->template->add_css( 'pos-assets/css/style.css' );

		// Load JS
		$this->template->add_js( 'pos-assets/vendors/js/vendor.bundle.base.js' );
		$this->template->add_js( 'pos-assets/js/shared/off-canvas.js' );
		$this->template->add_js( 'pos-assets/js/shared/hoverable-collapse.js' );
		$this->template->add_js( 'pos-assets/js/shared/misc.js' );
		$this->template->add_js( 'pos-assets/js/shared/settings.js' );
		$this->template->add_js( 'pos-assets/js/shared/todolist.js' );

		$this->template->render();
	}

}

/* End of file Login.php */
/* Location: ./application/modules/login/controllers/Login.php */