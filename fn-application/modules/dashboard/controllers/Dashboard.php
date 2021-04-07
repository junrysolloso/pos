<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

  function __construct() {
    parent:: __construct(); 
    $this->sess->unrestricted();
  }

	/**
	 * Index for the dashboard page
	 */
  public function index() {
    $config['view'] = 'view_dashboard';
    $config['title'] = 'Dashboard';

    $config['sales'] = $this->dbdelta->get_sum('tbl_sales', 'SUM(`sales_total`) as sum' );
    $config['products'] = $this->dbdelta->get_count( 'tbl_items', 'item_id' );
    $config['orders'] = $this->dbdelta->get_count( 'tbl_orders', 'order_id' );
    $this->content->view( $config );
    
  }

}
