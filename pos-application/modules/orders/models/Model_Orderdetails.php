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

  /**
   * Add Order Details
   * @return bool
   */
  public function order_details_add() {
    $flag = false;

    $order_data = array(
      $this->_order_date  => $this->db->select( '`tmp_date` AS `date`' )->limit( 1 )->get( 'tbl_temp_orderdetails' )->row()->date,
      $this->_order_total => $this->db->select( 'SUM((`tmp_quantity` * `tmp_price`)) AS `total`' )->get( 'tbl_temp_orderdetails' )->row()->total,
    );

    if( $this->db->insert( $this->_relate_table, $order_data ) ) {

      $this->db->select( 'MAX(`order_id`) as `id`' );
      $order_id = $this->db->get( $this->_relate_table )->row()->id;

      $orders_details = $this->db->get( 'tbl_temp_orderdetails' )->result();
      foreach ( $orders_details as $row ) {
        $orderdetails_data = array( 
          $this->_order_id => $order_id,
          $this->_item_id  => $row->tmp_barcode,
          $this->_orderdetails_quantity => $row->tmp_quantity,
          $this->_price_per_unit        => $row->tmp_price,
        );
        if( $this->db->insert( $this->_table, $orderdetails_data ) ) {
          $this->Model_Log->log_add( log_lang( 'order_details' )['add'] );
          $flag = true;
        }
      }

      if( $flag ) {
        return true;
      }
    }
  }

}

/* End of file Model_Orderdetails.php */
/* Location: ./application/modules/orders/models/Model_Orderdetails.php */
