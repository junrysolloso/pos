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

    $fields = '`item_name`, `inv_rem_stocks`, `item_critlimit`';
    $filter = [ '`inv_rem_stocks` < `item_critlimit`' => NULL ];
    $joins = [ 'tbl_inventory' => '`tbl_items`.`item_id`=`tbl_inventory`.`item_id`' ];

    $config['sales'] = $this->dbdelta->get_sum('tbl_sales', 'SUM(`sales_total`) as sum' );
    $config['products'] = $this->dbdelta->get_count( 'tbl_items', 'item_id' );
    $config['orders'] = $this->dbdelta->get_count( 'tbl_orders', 'order_id' );
    $config['out_of_stocks'] = $this->dbdelta->get_all( 'tbl_items',  [ 'inv_rem_stocks' => 'ASC' ], 0, $joins, $filter,[], $fields );
    $config['count_out_of_stocks'] = $this->dbdelta->get_count( 'tbl_items', 'item_name', False, $filter, $joins );
    $this->content->view( $config );
    
  }

}
