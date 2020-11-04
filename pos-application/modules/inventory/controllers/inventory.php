<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Inventory extends MY_Controller
{

  function __construct() {
    parent:: __construct(); 
  }

	/**
	 * Index for the inventory page
	 */
  public function index() {

    $data['title'] = 'Inventory';
    $data['class'] = 'inventory';
    $data['sales_total'] = $this->Model_Sales->sales_total_get();

    // Load template parts
    $this->template->set_master_template( 'layouts/layout_admin' );
    $this->template->write( 'title', $data['title'] );
    $this->template->write( 'body_class', $data['class'] );

    $this->template->write_view( 'content', 'templates/template_topbar' );
    $this->template->write_view( 'content', 'templates/template_sidebar', $data );
    //$this->template->write_view( 'content', 'templates/template_chart' );
    $this->template->write_view( 'content', 'view_inventory', $data );
    $this->template->write_view( 'content', 'templates/template_footer' );

    // Add CSS and JS for this page
    $this->template->add_js( 'pos-assets/vendors/chart.js/Chart.min.js' );
    $this->template->add_js( 'pos-assets/js/dashboard.js' );
    $this->template->render();
    
  }
}

/* End of file Inventory.php */
/* Location: ./application/modules/inventory/controllers/Inventory.php */
