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
    if( is_array( $data ) ) {
      $order_data = array(
        $this->_order_total => $data['order_total'],
        $this->_order_date  => $data['order_date'],
      );
      if ( $this->db->insert( $this->_table, $order_data ) ) {
        $this->Model_Log->log_add( log_lang( 'orders' )['add'] );
        $this->session->set_tempdata( array(
          'msg' 	=> 'Order successfully added.',
          'class' => 'alert-success',
        ), NULL, 5 );
        return true;
      }
    }
  }

}

/* End of file Model_Orderdetails.php */
/* Location: ./application/modules/orders/models/Model_Orderdetails.php */
