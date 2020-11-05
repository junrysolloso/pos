<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Orderdetails extends MY_Model
{

  protected $_table                 = 'tbl_orderdetails';
  protected $_orderdetails_id       = 'orderdetails_id';
  protected $_order_id              = 'order_id';
  protected $_item_id               = 'item_id';
  protected $_unit_id               = 'unit_id';
  protected $_orderdetails_quantity = 'orderdetails_quantity';
  protected $_price_per_unit        = 'price_per_unit';

  protected $_relate_table          = 'tbl_orders';
  protected $_order_date            = 'order_date';
  protected $_order_total           = 'order_total';
  
  function __construct() {
    parent:: __construct();
  }


}

/* End of file Model_Orderdetails.php */
/* Location: ./application/modules/orders/models/Model_Orderdetails.php */
