<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

  function __construct() {
    parent:: __construct(); 

    if ( ! $this->session->userdata( 'user_id' ) ) {
      redirect( base_url( 'login' ) );
    }

    $this->load->model( 'Model_Dashboard' );
    $this->load->model( 'settings/Model_Product_Info' );
  }

	/**
	 * Index for the dashboard page
	 */
  public function index() {

    $data['title']          = 'Dashboard';
    $data['class']          = 'dashboard';
    $data['sales_total']    = $this->Model_Sales->sales_total_get();
    $data['today_sales']    = $this->Model_Dashboard->today_sales();
    $data['daily_grocery']  = $this->Model_Dashboard->daily_sales_query( 'grocery', date( 'Y-m-d' ) );
    $data['daily_pharmacy'] = $this->Model_Dashboard->daily_sales_query( 'pharmacy', date( 'Y-m-d' ) );
    $data['daily_beauty']   = $this->Model_Dashboard->daily_sales_query( 'beauty', date( 'Y-m-d' ) );
    $data['almost_out']     = $this->Model_Product_Info->almost_out();
    
    // Load template parts
    $this->template->set_master_template( 'layouts/layout_admin' );
    $this->template->write( 'title', $data['title'] );
    $this->template->write( 'body_class', $data['class'] );

    $this->template->write_view( 'content', 'templates/template_topbar', $data );
    $this->template->write_view( 'content', 'templates/template_sidebar' );
    $this->template->write_view( 'content', 'templates/template_chart' );
    $this->template->write_view( 'content', 'view_dashboard' );
    $this->template->write_view( 'content', 'templates/template_footer' );

    // Add CSS and JS for this page
    $this->template->add_js( 'pos-assets/vendors/chart.js/Chart.min.js' );
    $this->template->add_js( 'pos-assets/js/helper_chart.js' );
		$this->template->render();
  }

  /**
   * 
   */
  public function sales() {

    /**
     * Set variables to empty arrays to be used if
     * any array is empty to avoid errors in the graph.
     */
    $daily['labels'] = array();
    $daily['gTotal'] = array();
    $daily['pTotal'] = array();
    $daily['bTotal'] = array();

    if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
      if ( isset( $_GET['limit'] ) ) {
        /**
         * Get daily sales and passing parameter
         * limit of $limit
         */
        $data = $this->Model_Dashboard->daily_sales( intval( $this->input->get( 'limit' ) ) );
        
        /**
         * Pass all the data to new array
         * Which will be converted into json format
         */
        if( array_key_exists( 0, $data ) ) {
          $daily['labels']  = array_reverse( $data[0] );
        }

        if( array_key_exists( 1, $data[1] ) ) {
          $daily['gTotal'] = array_reverse( $data[1][1] );
        }

        if( array_key_exists( 2, $data[1] ) ) {
          $daily['pTotal'] = array_reverse( $data[1][2] );
        }

        if( array_key_exists( 3, $data[1] ) ) {
          $daily['bTotal'] = array_reverse( $data[1][3] );
        }

        /**
         * content-type: application/json tells the server
         * that we're passing a data in json format.
         */
        header('content-type: application/json');
        exit( json_encode( $daily ) );
      }
    }
  }

}

/* End of file Dashboard.php */
/* Location: ./application/modules/dashboard/controllers/Dashboard.php */
