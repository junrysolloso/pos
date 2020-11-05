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

    $order_details = array();

    if( is_array( $data ) ) {
      $order_data = array(
        'tmp_barcode'  => $data['item_id'],
        'tmp_date'     => date_format( date_create( $data['order_date'] ), 'Y-m-d' ), 
        'tmp_quantity' => intval( $data['orderdetails_quantity'] ),
        'tmp_price'    => $data['price_per_unit'], 
        'tmp_srp'      => $data['inv_item_srp'],
        'tmp_expiry'   => date_format( date_create( $data['expiration_date'] ), 'Y-m-d' ), 
      );

      if ( $this->db->insert( 'temp_orderdetails', $order_data ) ) {
        $this->db->select( '*' );
        $this->db->order_by( 'id', 'DESC' );
        array_push( $order_details, $this->db->get( 'temp_orderdetails' )->result() );

        $this->db->select( 'SUM(tmp_price) AS total' );
        array_push( $order_details, $this->db->get( 'temp_orderdetails' )->row()->total );

        $this->db->select( 'tmp_date AS date' );
        $this->db->distinct( 'tmp_date' );
        array_push( $order_details, $this->db->get( 'temp_orderdetails' )->row()->date );

        return $order_details;
      }
    }
  }

}

/* End of file Model_Orderdetails.php */
/* Location: ./application/modules/orders/models/Model_Orderdetails.php */
