<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends MY_Controller
{

  function __construct() {
    parent:: __construct(); 

    // if ( ! $this->session->userdata( 'user_id' ) ) {
    //   redirect( base_url( 'login' ) );
    // }

    $this->load->model( 'sales/Model_Sales' );
  }

	/**
	 * Index page for the dashboard page
	 */
  public function index() {

    $data['title'] = 'Settings';
    $data['class'] = 'settings';


    // Load template parts
    $this->template->set_master_template( 'layouts/layout_admin' );
    $this->template->write( 'title', $data['title'] );
    $this->template->write( 'body_class', $data['class'] );
    $data['sales_total'] = $this->Model_Sales->sales_total_get();

    $this->template->write_view( 'content', 'templates/template_topbar' );
    $this->template->write_view( 'content', 'templates/template_sidebar', $data );
    $this->template->write_view( 'content', 'templates/template_chart' );
    $this->template->write_view( 'content', 'view_settings', $data );
    $this->template->write_view( 'content', 'templates/template_footer' );

    // Add CSS and JS for this page
    $this->template->add_css( 'pos-assets/css/style.min.css' );
    $this->template->add_js( 'pos-assets/vendors/chart.js/Chart.min.js' );
    $this->template->add_js( 'pos-assets/js/dashboard.js' );
    $this->template->add_js( 'pos-assets/js/script.js' );
		$this->template->render();
  }

}

/* End of file Dashboard.php */
/* Location: ./application/modules/dashboard/controllers/Dashboard.php */
