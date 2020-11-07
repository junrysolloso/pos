<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales extends MY_Controller
{

  function __construct() {
    parent:: __construct(); 

    if ( ! $this->session->userdata( 'user_id' ) ) {
      redirect( base_url( 'login' ) );
    }
    $this->load->model( 'dashboard/Model_Dashboard' );
    $this->load->model( 'settings/Model_Product_Info' );
  }

	/**
	 * Index for the Sales page
	 */
  public function index() {

    $data['title']          = 'Sales';
    $data['class']          = 'sales';
    $data['sales_total']    = $this->Model_Sales->sales_total_get();
    $data['daily_grocery']  = $this->Model_Dashboard->daily_sales_query( 'grocery', date( 'Y-m-d' ) );
    $data['daily_pharmacy'] = $this->Model_Dashboard->daily_sales_query( 'pharmacy', date( 'Y-m-d' ) );
    $data['daily_beauty']   = $this->Model_Dashboard->daily_sales_query( 'beauty', date( 'Y-m-d' ) );

    $data['sales_grocery']  = $this->Model_Sales->sales_get( 'grocery' );
    $data['sales_pharmacy'] = $this->Model_Sales->sales_get( 'pharmacy' );
    $data['sales_beauty']   = $this->Model_Sales->sales_get( 'beauty' );

    $data['top_grocery']    = $this->Model_Product_Info->top_products( 'grocery' );
    $data['top_pharmacy']   = $this->Model_Product_Info->top_products( 'pharmacy' );
    $data['top_beauty']     = $this->Model_Product_Info->top_products( 'beauty' );

    // Load template parts
    $this->template->set_master_template( 'layouts/layout_admin' );
    $this->template->write( 'title', $data['title'] );
    $this->template->write( 'body_class', $data['class'] );

    $this->template->write_view( 'content', 'templates/template_topbar', $data );
    $this->template->write_view( 'content', 'templates/template_sidebar' );
    $this->template->write_view( 'content', 'templates/template_chart' );
    $this->template->write_view( 'content', 'view_sales' );
    $this->template->write_view( 'content', 'templates/template_footer' );

    // Add CSS and JS for this page
    $this->template->add_js( 'pos-assets/vendors/chart.js/Chart.min.js' );
    $this->template->add_js( 'pos-assets/js/helper_chart.js' );
		$this->template->render();
  }

}

/* End of file Sales.php */
/* Location: ./application/modules/sales/controllers/Sales.php */
