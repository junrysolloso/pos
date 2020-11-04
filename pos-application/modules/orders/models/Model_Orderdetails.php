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
  
  function __construct() {
    parent:: __construct();
  }

  /**
   * Add Order Details
   * @param array $data
   * @return bool
   */
  public function order_details_add( $data = [] ) {
    if( is_array( $data ) ) {

      $this->db->select( 'MAX(order_id) as id' );
      $order_id = $this->db->get( $this->_relate_table )->row()->id;

      $orderdetails_data = array(
        $this->_order_id => $order_id,
        $this->_item_id  => $data['item_id'],
        $this->_unit_id  => $data['unit_id'],
        $this->_orderdetails_quantity  => $data['orderdetails_quantity'],
        $this->_price_per_unit         => $data['price_per_unit'],
      );

      if ( $this->db->insert( $this->_table, $orderdetails_data ) ) {
        $this->Model_Log->log_add( log_lang( 'order_details' )['add'] );
        $this->session->set_tempdata( array(
          'msg' 	=> 'Order successfully added.',
          'class' => 'alert-success',
        ), NULL, 5 );
        return true;
      }
    }
  }

  /**
   * Update Order Details
   * @param array $data
   * @return bool
   */
  public function order_details_update( $data = [] ) {
    
  }

  /**
   * Get Order Details
   * @param int $orderdetails_id
   * @return array
   */
  public function order_details_get( $orderdetails_id = 0 ) {
    
  }

}

/* End of file Model_Orderdetails.php */
/* Location: ./application/modules/orders/models/Model_Orderdetails.php */
