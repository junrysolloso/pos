<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Orders extends MY_Model
{

  protected $_table       = 'tbl_orders';
  protected $_order_id    = 'order_id';
  protected $_order_total = 'order_total';
  protected $_order_date  = 'order_date';

  function __construct() {
    parent:: __construct();
  }

  /**
   * Add Orders
   * @param array $data
   * @return bool
   */
  public function order_add( $data = [] ) {

  }

  /**
   * Update Orders
   * @param array $data
   * @return bool
   */
  public function order_update( $data = [] ) {
    
  }

  /**
   * Get Orders
   * @param int $order_id
   * @return array $result
   */
  public function order_get( $order_id = 0 ) {
    
  }

}

/* End of file Model_Orderdetails.php */
/* Location: ./application/modules/orders/models/Model_Orderdetails.php */
