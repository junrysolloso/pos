<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{
	/**
	 * Index page for the login page
	 */
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['title']  = 'Login';

		$this->template->set_master_template( 'layouts/template_site' );
		$this->template->write( 'title', $data['title'] );
		$this->template->write_view( 'content', 'view_login', $data );

		// Load CSS
		$this->template->add_css( 'assets/vendors/mdi/css/materialdesignicons.min.css' );
		$this->template->add_css( 'assets/vendors/ti-icons/css/themify-icons.css' );
		$this->template->add_css( 'assets/vendors/typicons/typicons.css' );
		$this->template->add_css( 'assets/vendors/css/vendor.bundle.base.css' );
		$this->template->add_css( 'assets/css/style.css' );

		// Load JS
		$this->template->add_js( 'assets/vendors/js/vendor.bundle.base.js' );
		$this->template->add_js( 'assets/js/shared/off-canvas.js' );
		$this->template->add_js( 'assets/js/shared/hoverable-collapse.js' );
		$this->template->add_js( 'assets/js/shared/misc.js' );
		$this->template->add_js( 'assets/js/shared/settings.js' );
		$this->template->add_js( 'assets/js/shared/todolist.js' );

		$this->template->render();
	}

}

/* End of file Setup.php */
/* Location: ./application/controllers/Setup.php */
