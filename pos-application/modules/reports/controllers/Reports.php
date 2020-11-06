<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends MY_Controller
{

  function __construct() {
    parent:: __construct(); 
  }

	/**
	 * Index for the dashboard page
	 */
  public function index() {

    $data['title'] = 'Reports';
    $data['class'] = 'reports';
    $data['sales_total'] = $this->Model_Sales->sales_total_get();

    // Load template parts
    $this->template->set_master_template( 'layouts/layout_admin' );
    $this->template->write( 'title', $data['title'] );
    $this->template->write( 'body_class', $data['class'] );

    $this->template->write_view( 'content', 'templates/template_topbar' );
    $this->template->write_view( 'content', 'templates/template_sidebar', $data );
    $this->template->write_view( 'content', 'view_reports', $data );
    $this->template->write_view( 'content', 'templates/template_footer' );

    // Add CSS and JS for this page
    $this->template->add_css( 'pos-assets/vendors/daterangepicker/daterangepicker.css' );   
    $this->template->add_css( 'pos-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css' );   
    $this->template->add_js( 'pos-assets/js/helper_datepicker.js' );   
		$this->template->render();
  }

}

/* End of file Reports.php */
/* Location: ./application/modules/reports/controllers/Reports.php */
