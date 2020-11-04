<?php if ( ! defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Model_Order_Inventory extends MY_Model
{

  protected $_table             = 'tbl_orderinventory';
  protected $_orderdetails_id   = 'orderdetails_id';
  protected $_ordinv_unit_price = 'ordinv_unit_price';
  protected $_no_of_stocks      = 'no_of_stocks';
  protected $_inv_item_srp      = 'inv_item_srp';

  protected $_relate_orddetails  = 'tbl_orderdetails';
  protected $_relate_ucjunc      = 'tbl_ucjunc';
  protected $_relate_unitconvert = 'tbl_unitconvert';
  protected $_relate_orders      = 'tbl_orders';
  protected $_relate_items       = 'tbl_items';
  protected $_relate_unit        = 'tbl_unit';
  
  function __construct() {
    parent:: __construct();
  }

  /**
   * Add Order Inventory
   * @param array $data
   * @return bool
   */
  public function order_inv_add( $data = [] ) {
    if( is_array( $data ) ) {

      $data = clean_array( $data );

      $this->db->select( 'MAX(orderdetails_id) AS id' );
      $orderdet_id = $this->db->get( $this->_relate_orddetails )->row()->id;

      $this->db->select( 'uc_number AS unit' );
      $this->db->join( $this->_relate_ucjunc, 'tbl_orderdetails.item_id=tbl_ucjunc.item_id' );
      $this->db->join( $this->_relate_unitconvert, 'tbl_ucjunc.uc_id=tbl_unitconvert.uc_id' );
      $unit = $this->db->get( $this->_relate_orddetails )->row()->unit;

      $no_of_stocks      = intval( $data['orderdetails_quantity'] ) * intval( $unit );
      $ordinv_unit_price = intval( $data['price_per_unit'] ) / intval( $no_of_stocks );

      $inv_data = array(
        $this->_orderdetails_id   => $orderdet_id,
        $this->_ordinv_unit_price => $ordinv_unit_price,
        $this->_no_of_stocks      => $no_of_stocks,
        $this->_inv_item_srp      => $ordinv_unit_price,
      );

      if ( $this->db->insert( $this->_table, $inv_data ) ) {
        $this->Model_Log->log_add( log_lang( 'item' )['add'] );
        $this->session->set_tempdata( array(
          'msg' 	=> 'Data successfully added.',
          'class' => 'alert-success',
        ), NULL, 5 );
        return true;
      }
    }
  }

  /**
   * Get Orders
   * @return array
   */
  public function order_inv_get() {
    $this->db->select( 'tbl_orders.order_id AS id, order_date, order_total, item_name, no_of_stocks, unit_sh' );
    $this->db->join( $this->_relate_orddetails, 'tbl_orderdetails.orderdetails_id=tbl_orderinventory.orderdetails_id' );
    $this->db->join( $this->_relate_orders, 'tbl_orderdetails.order_id=tbl_orders.order_id' );
    $this->db->join( $this->_relate_items, 'tbl_orderdetails.item_id=tbl_items.item_id' );
    $this->db->join( $this->_relate_ucjunc, 'tbl_items.item_id=tbl_ucjunc.item_id' );
    $this->db->join( $this->_relate_unit, 'tbl_unit.unit_id=tbl_items.unit_id' );
    $query = $this->db->get( $this->_table );
    if ( $query ) {
      return $query->result();
    }
  }

}

/* End of file Model_Order_Inventory.php */
/* Location: ./application/modules/orders/models/Model_Order_Inventory.php */
