<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Orderinventory extends MY_Model
{

  protected $_table             = 'tbl_orderinventory';
  protected $_ordinv_id         = 'ordinv_id';
  protected $_orderdetails_id   = 'orderdetails_id';
  protected $_ordinv_unit_price = 'ordinv_unit_price';
  protected $_no_of_stocks      = 'no_of_stocks';
  protected $_inv_item_srp      = 'inv_item_srp';
  
  protected $_join_orderdetails = 'tbl_orderdetails';
  protected $_join_orders       = 'tbl_orders';

  function __construct() {
    parent:: __construct();
  }

  /**
   * Add Order Inventory
   * @param array $data
   * @return bool
   */
  public function order_invetory_add( $data = [] ) {

  }

  /**
   * Update Order Inventory
   * @param array $data
   * @return bool
   */
  public function order_invetory_update( $data = [] ) {
    
  }

  /**
   * Get Order Inventory
   * @param int $ordinv_id
   * @return array
   */
  public function order_invetory_get( $ordinv_id = 0 ) {
    
  }

}

/* End of file Model_Orderinventory.php */
/* Location: ./application/modules/orders/models/Model_Orderinventory.php */
